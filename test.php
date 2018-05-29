#!/usr/bin/php
<?php
// ******** START OF CONFIG VARS ***************

//Hostnames/MAC addresses to find
$hosts = "Tinus daadadads"; //space seperated, can be name, hostname or mac

//Unifi Config
$unifi['user'] = "";
$unifi['pass'] = "";
$unifi['port'] = 8443;
$unifi['base'] = "";

//Domoticz Config
$dom['switchidx'] = 483; //I have a blockly connected to this virtual switch so I can turn multiple things on and off
$dom['host'] = "http://<domoticz ip>";
$dom['port'] = 8080;
$dom['user'] = ""; //leave empty if no auth needed
$dom['pass'] = ""; //leave empty if no auth needed 

//You probably won't need to change these - but if you do.....
$unifi['site'] = "default";

//**************** END OF CONFIG ******************* 


//Attempt login 
$cookiejar = tempnam(sys_get_temp_dir(),"unifi_cookie.dat");
$login_url = "{$unifi['base']}:{$unifi['port']}/api/login";
$p['username'] = $unifi['user'];
$p['password'] = $unifi['pass'];
$p['strict'] = true;
$json = json_encode($p);
$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIESESSION,true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiejar);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_URL,$login_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json))
);
$resp = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

if (!empty($resp)) {
    $result = json_decode($resp,true);
    if ($result['meta']['rc'] !== "ok") { bailout("Credentials invalid or URL not found.\n{$login_url}",1); }
} else {
    bailout("Credentials invalid or URL not found.\n{$login_url}",1);
}

//OK - so we got here with valid credentials - let's get a list of connected stations (hopefully)

$sta_url = "{$unifi['base']}:{$unifi['port']}/api/s/{$unifi['site']}/stat/sta";
$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiejar);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiejar);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_URL,$sta_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

if (!empty($resp)) {
    $data = json_decode($resp,true);
    if ($data['meta']['rc'] !== "ok") { bailout("Logged in but couldn't get clients connected list",1); }
    $matches = processClients($data['data']);

    $switchstate = 0;

    if (count($matches)) {
        echo "Found " .count($matches) ." clients online\n";
        foreach($matches as $client) {
            $hname = (isset($client['hostname']) ? $client['hostname'] : "<No Host Name>");
            $host = (isset($client['name']) ? $client['name'] : $hname);
            echo "Host: {$host} == {$client['mac']}\n";
        }

        $switchstate = 1;
    }
    else { echo "No matching clients are currently connected\nNo-one is home!\n"; }

    processDomoticz($switchstate);
    @unlink($cookiejar);

} else { bailout("Logged in but couldn't get clients connected list",1); }

function processClients($clients) {
    global $hosts;
    $matches = array();
    foreach($clients as $id => $client) {
        if ($client['authorized']) {
            $hname = (isset($client['hostname']) ? $client['hostname'] : "<No Host Name>");
            $cname = (isset($client['name']) ? $client['name'] : $hname);
            //echo "{$cname} == {$client['mac']}\n";
            if (stristr($hosts,$cname) <> "" || stristr($hosts,$client['mac']) <> "") { $matches[] = $client; }
        }
    }
    return $matches;
}

function processDomoticz($state) {
    global $dom, $cookiejar;
//check what the existing switch state is
    $ch = curl_init();
    $url = "{$dom['host']}:{$dom['port']}/json.htm?type=devices&filter=light&used=true&order=Name";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if (!empty($dom['user'])) {
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "{$dom['user']}:{$dom['pass']}");
    }
    $resp = curl_exec($ch);
    curl_close($ch);

    if (!empty($resp)) {
        $data = json_decode($resp,true);
        $match = 0;
        foreach($data['result'] as $switch) {
            if ($switch['idx'] == $dom['switchidx']) {
                $match = 1;
                break;
            }
        }
        if (!$match) { bailout("Connected to Domoticz but didn't find SwitchIDX {$dom['switchidx']}",1); }
        $oldstate = ($switch['Status'] == "Off" ? 0 : 1);
        if ($oldstate == $state) { @unlink($cookiejar); exit("Switch state doesn't need changing"); }

        $newstate = ($state ? "On" : "Off");
        echo "\nTurning Switch {$newstate}";

        $ch = curl_init();
        $url = "{$dom['host']}:{$dom['port']}/json.htm?type=command&param=switchlight&idx={$dom['switchidx']}&switchcmd={$newstate}";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (!empty($dom['user'])) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "{$dom['user']}:{$dom['pass']}");
        }
        $resp = curl_exec($ch);
        curl_close($ch);


    } else { bailout("Couldn't connect to Domoticz!\nCheck URL",1); }
}

function bailout($msg,$exitcode = 1) {
    global $cookiejar;
    @unlink($cookiejar);
    echo "\n*** ERROR ***\n{$msg}\n";
    exit($exitcode);
}
?>
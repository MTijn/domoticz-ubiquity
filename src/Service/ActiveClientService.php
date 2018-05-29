<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Domoticz\Ubiquity\Service;


use Mtijn\Domoticz\Ubiquity\HttpClient;
use Mtijn\Domoticz\Ubiquity\ValueObject\Client;

class ActiveClientService
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getClientByMacAddress(string $macAddress) : Client
    {
        $request = $this->httpClient->request('get', sprintf(
            '%s/api/s/%s/stat/sta/%s',
                getenv('unifi.baseUrl'),
                getenv('unifi.site'),
                $macAddress
            ));
        $response = $this->httpClient->executeRequest($request);
        $content = json_decode($response->getBody()->getContents());
        if (!empty($content->data[0])) {
            return Client::createFromJson($content->data[0]);
        }
    }
}
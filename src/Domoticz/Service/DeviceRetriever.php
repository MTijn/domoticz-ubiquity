<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Automation\Domoticz\Service;

use Mtijn\Automation\Domoticz\ValueObject\Device;
use Mtijn\Automation\Domoticz\ValueObject\SwitchDevice;
use Mtijn\Automation\HttpClient;

class DeviceRetriever
{
    /** @var HttpClient */
    private $httpClient;

    /**
     * DeviceRetriever constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function retrieveDeviceById(string $idx) :SwitchDevice
    {
        $request = $this->httpClient->request('get', sprintf(
            '%s/json.htm?type=devices&rid=%s',
            getenv('domoticz.host'),
            $idx
        ));

        $response = $this->httpClient->executeRequest($request);
        $contents = json_decode($response->getBody()->getContents());
        $content = $contents->result[0];

        return SwitchDevice::formatFromStandardClass($content);
    }
}

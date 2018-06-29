<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Service;

use Mtijn\Automation\Domoticz\HttpClient\Authenticated;
use Mtijn\Automation\Domoticz\Service\DeviceRetriever;
use Mtijn\Automation\Exception\ClientNotConnectedException;
use Mtijn\Automation\HttpClient;
use Mtijn\Automation\Unifi\Service\ActiveClientService;

class DiscoverDeviceConnected
{
    /** @var ActiveClientService */
    private $activeClientService;
    /** @var DeviceRetriever */
    private $deviceRetriever;
    /** @var HttpClient */
    private $httpClient;

    /**
     * DiscoverDeviceConnected constructor.
     * @param ActiveClientService $activeClientService
     * @param DeviceRetriever $deviceRetriever
     * @param HttpClient $httpClient
     */
    public function __construct(
        ActiveClientService $activeClientService,
        DeviceRetriever $deviceRetriever,
        Authenticated $httpClient
    ) {
        $this->activeClientService = $activeClientService;
        $this->deviceRetriever = $deviceRetriever;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $idx
     */
    public function mark(string $idx)
    {
        $device = $this->deviceRetriever->retrieveDeviceById($idx);
        $deviceConnectedInDomoticz = ($device->getData() === 'Off') ? false : true;
        try {
            if (!empty($this->activeClientService->getClientByMacAddress(getenv('macAddress')))) {
                $request = $this->httpClient->request('GET', sprintf(
                    '%s/json.htm?type=command&param=switchlight&idx=%d&switchcmd=On',
                    getenv('domoticz.host'),
                    $device->getIdx()
                ));
                $this->httpClient->executeRequest($request);
            }
        } catch (ClientNotConnectedException $exception) {
            if (true === $deviceConnectedInDomoticz) {
                $request = $this->httpClient->request('GET', sprintf(
                    '%s/json.htm?type=command&param=switchlight&idx=%d&switchcmd=Off',
                    getenv('domoticz.host'),
                    $device->getIdx()
                ));
                $this->httpClient->executeRequest($request);
            }
        }
    }
}

<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
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


    public function mark(string $idx) :void
    {
        $device = $this->deviceRetriever->retrieveDeviceById($idx);
        $deviceConnectedInDomoticz = ($device->getData() === 'Off') ? false : true;
        try {
            $client = $this->activeClientService->getClientByMacAddress(getenv('macAddress'));
        } catch (ClientNotConnectedException $exception) {
            if (true === $deviceConnectedInDomoticz) {
                $request = $this->httpClient->request('GET', sprintf(
                    '%s/json.htm?type=command&param=switchlight&idx=%d&switchcmd=On',
                    $device->getIdx()
                ));
                $this->httpClient->executeRequest($request);
            }
        }
    }
}

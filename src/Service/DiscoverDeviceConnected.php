<?php

namespace Mtijn\Automation\Service;

use Mtijn\Automation\Domoticz\HttpClient\Authenticated;
use Mtijn\Automation\Domoticz\Service\DeviceRetriever;
use Mtijn\Automation\Exception\ClientNotConnectedException;
use Mtijn\Automation\HttpClient;
use Mtijn\Automation\Unifi\Service\ActiveClientService;
use Symfony\Component\Console\Output\OutputInterface;

class DiscoverDeviceConnected
{
    public function __construct(
        private ActiveClientService $activeClientService,
        private DeviceRetriever $deviceRetriever,
        private Authenticated $httpClient,
        private OutputInterface $output
    ) {
    }

    public function mark(string $idx): void
    {
        $device = $this->deviceRetriever->retrieveDeviceById($idx);
        $deviceConnectedInDomoticz = ($device->getData() === 'Off') ? false : true;
        try {
            if (!empty($this->activeClientService->getClientByMacAddress(getenv('macAddress')))) {
                if ($deviceConnectedInDomoticz === true) {
                    $this->output->writeln('Device is already switched on, leave it as is');
                    return;
                }
                $this->output->writeln('Device is connnected, switching it on');
                $request = $this->httpClient->request('GET', sprintf(
                    '%s/json.htm?type=command&param=switchlight&idx=%d&switchcmd=On',
                    getenv('domoticz.host'),
                    $device->getIdx()
                ));
                $this->httpClient->executeRequest($request);
            }
        } catch (ClientNotConnectedException) {
            if (true === $deviceConnectedInDomoticz) {
                $this->output->writeln('Device is not connected any more, switching it off');
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

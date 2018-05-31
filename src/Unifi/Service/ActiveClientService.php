<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Unifi\Service;

use GuzzleHttp\Exception\ClientException;
use Mtijn\Automation\Exception\ClientNotConnectedException;
use Mtijn\Automation\HttpClient;
use Mtijn\Automation\Unifi\ValueObject\Client;

class ActiveClientService
{
    /** @var HttpClient */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $macAddress
     * @return Client
     * @throws ClientNotConnectedException
     */
    public function getClientByMacAddress(string $macAddress): Client
    {
        try {
            $request = $this->httpClient->request('get', sprintf(
                '%s/api/s/%s/stat/sta/%s',
                getenv('unifi.baseUrl'),
                getenv('unifi.site'),
                $macAddress
            ));
            $response = $this->httpClient->executeRequest($request);
            $content = json_decode($response->getBody()->getContents());
            return Client::createFromJson($content->data[0]);
        } catch (ClientException $exception) {
            throw new ClientNotConnectedException('Client is not connected');
        }
    }
}

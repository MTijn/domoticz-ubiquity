<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Domoticz\Ubiquity;


class Authenticator
{
    /** @var HttpClient */
    private $httpClient;

    /**
     * Authenticator constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function authenticate() :array
    {
        try {
            $request = $this->httpClient->request('POST', sprintf('%s/api/login', getenv('unifi.baseUrl')));
            $request->getBody()->write(json_encode(
                ['username' => getenv('unifi.username'), 'password' => getenv('unifi.password'), 'strict' => true]
            ));
            $response = $this->httpClient->executeRequest($request);
            $contents = json_decode($response->getBody()->getContents());
            if ('ok' !== $contents->meta->rc) {
                throw new LoginFailedException('Failed to login');
            }
            $header = $response->getHeader('Set-Cookie');
            return $header;
        } catch (\Exception $exception) {
            throw new \RuntimeException('Exception caught before starting', $exception->getCode(), $exception->getMessage());
        }
    }

    public function logOut(array $cookies)
    {
        $request = $this->httpClient->request('GET', sprintf('%s/api/logout', getenv('unifi.baseUrl')))
        ->withAddedHeader('Cookie', $cookies[0]);
        $response = $this->httpClient->executeRequest($request);
    }
}

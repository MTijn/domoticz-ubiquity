<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Unifi\HttpClient;

use Mtijn\Automation\Exception\LoginFailedException;
use Mtijn\Automation\HttpClient;

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

    public function authenticate() :HttpClient
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
            return new AuthenticatedHttpClient($this->httpClient, $response->getHeader('Set-Cookie'));
        } catch (\Exception $exception) {
            throw new \RuntimeException('Exception caught before starting', null, $exception);
        }
    }

    public function logOut(array $cookies)
    {
        $request = $this->httpClient->request('GET', sprintf('%s/api/logout', getenv('unifi.baseUrl')))
        ->withAddedHeader('Cookie', $cookies[0]);
        $response = $this->httpClient->executeRequest($request);
    }
}

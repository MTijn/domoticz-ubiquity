<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Domoticz\Ubiquity;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

interface HttpClient
{
    public function request(string $method, string $url) :RequestInterface;
    public function executeRequest(RequestInterface $request) :ResponseInterface;
}
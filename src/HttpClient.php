<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Automation;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface HttpClient
{
    public function request(string $method, string $url) :RequestInterface;
    public function executeRequest(RequestInterface $request) :ResponseInterface;
}
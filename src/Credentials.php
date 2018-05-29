<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Domoticz\Ubiquity;


class Credentials
{
    /** @var string */
    private $username;
    /** @var string */
    private $password;

    /**
     * Credentials constructor.
     * @param $username
     * @param $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

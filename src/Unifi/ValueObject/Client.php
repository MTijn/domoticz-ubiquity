<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Unifi\ValueObject;

class Client
{
    /** @var string */
    private $id;
    /** @var bool */
    private $is_guest_by_uap;
    /** @var integer */
    private $last_seen_by_uap;
    /** @var integer */
    private $uptime_by_uap;
    /** @var string */
    private $ap_mac;
    /** @var integer */
    private $assoc_time;
    /** @var string */
    private $bssid;
    /** @var integer */
    private $bytes_r;
    /** @var integer */
    private $ccq;
    /** @var integer */
    private $channel;
    /** @var string */
    private $essid;
    /** @var integer */
    private $first_seen;
    /** @var string */
    private $hostname;
    /** @var integer */
    private $idletime;
    /** @var string */
    private $ip;
    /** @var bool */
    private $is_11r;
    /** @var bool */
    private $is_guest;
    /** @var bool */
    private $is_wired;
    /** @var integer */
    private $last_seen;
    /** @var integer */
    private $latest_assoc_time;
    /** @var string */
    private $mac;
    /** @var integer */
    private $noise;
    /** @var string */
    private $oui;
    /** @var bool */
    private $powersave_enabled;
    /** @var bool */
    private $qos_policy_applied;
    /** @var string */
    private $radio;
    /** @var string */
    private $radio_name;
    /** @var string */
    private $radio_proto;
    /** @var integer */
    private $rssi;
    /** @var integer */
    private $rx_bytes;
    /** @var integer */
    private $rx_bytes_r;
    /** @var integer */
    private $rx_packets;
    /** @var integer */
    private $rx_rate;
    /** @var integer */
    private $signal;
    /** @var string */
    private $site_id;
    /** @var integer */
    private $tx_bytes;
    /** @var integer */
    private $tx_bytes_r;
    /** @var integer */
    private $tx_packets;
    /** @var integer */
    private $tx_power;
    /** @var integer */
    private $tx_rate;
    /** @var integer */
    private $uptime;
    /** @var string */
    private $user_id;
    /** @var integer */
    private $vlan;

    public function __construct(
        string $id,
        bool $is_guest_by_uap,
        int $last_seen_by_uap,
        int $uptime_by_uap,
        string $ap_mac,
        int $assoc_time,
        string $bssid,
        int $bytes_r,
        int $ccq,
        int $channel,
        string $essid,
        int $first_seen,
        string $hostname,
        int $idletime,
        string $ip,
        bool $is_11r,
        bool $is_guest,
        bool $is_wired,
        int $last_seen,
        int $latest_assoc_time,
        string $mac,
        int $noise,
        string $oui,
        bool $powersave_enabled,
        bool $qos_policy_applied,
        string $radio,
        string $radio_name,
        string $radio_proto,
        int $rssi,
        int $rx_bytes,
        int $rx_bytes_r,
        int $rx_packets,
        int $rx_rate,
        int $signal,
        string $site_id,
        int $tx_bytes,
        int $tx_bytes_r,
        int $tx_packets,
        int $tx_power,
        int $tx_rate,
        int $uptime,
        string $user_id,
        int $vlan
    ) {
        $this->id = $id;
        $this->is_guest_by_uap = $is_guest_by_uap;
        $this->last_seen_by_uap = $last_seen_by_uap;
        $this->uptime_by_uap = $uptime_by_uap;
        $this->ap_mac = $ap_mac;
        $this->assoc_time = $assoc_time;
        $this->bssid = $bssid;
        $this->bytes_r = $bytes_r;
        $this->ccq = $ccq;
        $this->channel = $channel;
        $this->essid = $essid;
        $this->first_seen = $first_seen;
        $this->hostname = $hostname;
        $this->idletime = $idletime;
        $this->ip = $ip;
        $this->is_11r = $is_11r;
        $this->is_guest = $is_guest;
        $this->is_wired = $is_wired;
        $this->last_seen = $last_seen;
        $this->latest_assoc_time = $latest_assoc_time;
        $this->mac = $mac;
        $this->noise = $noise;
        $this->oui = $oui;
        $this->powersave_enabled = $powersave_enabled;
        $this->qos_policy_applied = $qos_policy_applied;
        $this->radio = $radio;
        $this->radio_name = $radio_name;
        $this->radio_proto = $radio_proto;
        $this->rssi = $rssi;
        $this->rx_bytes = $rx_bytes;
        $this->rx_bytes_r = $rx_bytes_r;
        $this->rx_packets = $rx_packets;
        $this->rx_rate = $rx_rate;
        $this->signal = $signal;
        $this->site_id = $site_id;
        $this->tx_bytes = $tx_bytes;
        $this->tx_bytes_r = $tx_bytes_r;
        $this->tx_packets = $tx_packets;
        $this->tx_power = $tx_power;
        $this->tx_rate = $tx_rate;
        $this->uptime = $uptime;
        $this->user_id = $user_id;
        $this->vlan = $vlan;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isGuestByUap(): bool
    {
        return $this->is_guest_by_uap;
    }

    /**
     * @return int
     */
    public function getLastSeenByUap(): int
    {
        return $this->last_seen_by_uap;
    }

    /**
     * @return int
     */
    public function getUptimeByUap(): int
    {
        return $this->uptime_by_uap;
    }

    /**
     * @return string
     */
    public function getApMac(): string
    {
        return $this->ap_mac;
    }

    /**
     * @return int
     */
    public function getAssocTime(): int
    {
        return $this->assoc_time;
    }

    /**
     * @return string
     */
    public function getBssid(): string
    {
        return $this->bssid;
    }

    /**
     * @return int
     */
    public function getBytesR(): int
    {
        return $this->bytes_r;
    }

    /**
     * @return int
     */
    public function getCcq(): int
    {
        return $this->ccq;
    }

    /**
     * @return int
     */
    public function getChannel(): int
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getEssid(): string
    {
        return $this->essid;
    }

    /**
     * @return int
     */
    public function getFirstSeen(): int
    {
        return $this->first_seen;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @return int
     */
    public function getIdletime(): int
    {
        return $this->idletime;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return bool
     */
    public function isIs11r(): bool
    {
        return $this->is_11r;
    }

    /**
     * @return bool
     */
    public function isGuest(): bool
    {
        return $this->is_guest;
    }

    /**
     * @return bool
     */
    public function isWired(): bool
    {
        return $this->is_wired;
    }

    /**
     * @return int
     */
    public function getLastSeen(): int
    {
        return $this->last_seen;
    }

    /**
     * @return int
     */
    public function getLatestAssocTime(): int
    {
        return $this->latest_assoc_time;
    }

    /**
     * @return string
     */
    public function getMac(): string
    {
        return $this->mac;
    }

    /**
     * @return int
     */
    public function getNoise(): int
    {
        return $this->noise;
    }

    /**
     * @return string
     */
    public function getOui(): string
    {
        return $this->oui;
    }

    /**
     * @return bool
     */
    public function isPowersaveEnabled(): bool
    {
        return $this->powersave_enabled;
    }

    /**
     * @return bool
     */
    public function isQosPolicyApplied(): bool
    {
        return $this->qos_policy_applied;
    }

    /**
     * @return string
     */
    public function getRadio(): string
    {
        return $this->radio;
    }

    /**
     * @return string
     */
    public function getRadioName(): string
    {
        return $this->radio_name;
    }

    /**
     * @return string
     */
    public function getRadioProto(): string
    {
        return $this->radio_proto;
    }

    /**
     * @return int
     */
    public function getRssi(): int
    {
        return $this->rssi;
    }

    /**
     * @return int
     */
    public function getRxBytes(): int
    {
        return $this->rx_bytes;
    }

    /**
     * @return int
     */
    public function getRxBytesR(): int
    {
        return $this->rx_bytes_r;
    }

    /**
     * @return int
     */
    public function getRxPackets(): int
    {
        return $this->rx_packets;
    }

    /**
     * @return int
     */
    public function getRxRate(): int
    {
        return $this->rx_rate;
    }

    /**
     * @return int
     */
    public function getSignal(): int
    {
        return $this->signal;
    }

    /**
     * @return string
     */
    public function getSiteId(): string
    {
        return $this->site_id;
    }

    /**
     * @return int
     */
    public function getTxBytes(): int
    {
        return $this->tx_bytes;
    }

    /**
     * @return int
     */
    public function getTxBytesR(): int
    {
        return $this->tx_bytes_r;
    }

    /**
     * @return int
     */
    public function getTxPackets(): int
    {
        return $this->tx_packets;
    }

    /**
     * @return int
     */
    public function getTxPower(): int
    {
        return $this->tx_power;
    }

    /**
     * @return int
     */
    public function getTxRate(): int
    {
        return $this->tx_rate;
    }

    /**
     * @return int
     */
    public function getUptime(): int
    {
        return $this->uptime;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getVlan(): int
    {
        return $this->vlan;
    }

    public static function createFromJson(\stdClass $json) : Client
    {
        return new self(
            $json->_id,
            $json->_is_guest_by_uap,
            $json->_last_seen_by_uap,
            $json->_uptime_by_uap,
            $json->ap_mac,
            $json->assoc_time,
            $json->bssid,
            $json->{'bytes-r'},
            $json->ccq,
            $json->channel,
            $json->essid,
            $json->first_seen,
            $json->hostname,
            $json->idletime,
            $json->ip,
            $json->is_11r,
            $json->is_guest,
            $json->is_wired,
            $json->last_seen,
            $json->latest_assoc_time,
            $json->mac,
            $json->noise,
            $json->oui,
            $json->powersave_enabled,
            $json->qos_policy_applied,
            $json->radio,
            $json->radio_name,
            $json->radio_proto,
            $json->rssi,
            $json->rx_bytes,
            $json->{'rx_bytes-r'},
            $json->rx_packets,
            $json->rx_rate,
            $json->signal,
            $json->site_id,
            $json->tx_bytes,
            $json->{'tx_bytes-r'},
            $json->tx_packets,
            $json->tx_power,
            $json->tx_rate,
            $json->uptime,
            $json->user_id,
            $json->vlan
        );
    }
}
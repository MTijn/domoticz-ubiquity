<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Unifi\ValueObject;

class Client
{
    public function __construct(
        private readonly string $id,
        private readonly bool $is_guest_by_uap,
        private readonly int $last_seen_by_uap,
        private readonly int $uptime_by_uap,
        private readonly string $ap_mac,
        private readonly int $assoc_time,
        private readonly string $bssid,
        private readonly int $bytes_r,
        private readonly int $ccq,
        private readonly int $channel,
        private readonly string $essid,
        private readonly int $first_seen,
        private readonly string $hostname,
        private readonly int $idletime,
        private readonly string $ip,
        private readonly bool $is_11r,
        private readonly bool $is_guest,
        private readonly bool $is_wired,
        private readonly int $last_seen,
        private readonly int $latest_assoc_time,
        private readonly string $mac,
        private readonly int $noise,
        private readonly string $oui,
        private readonly bool $powersave_enabled,
        private readonly bool $qos_policy_applied,
        private readonly string $radio,
        private readonly string $radio_name,
        private readonly string $radio_proto,
        private readonly int $rssi,
        private readonly int $rx_bytes,
        private readonly int $rx_bytes_r,
        private readonly int $rx_packets,
        private readonly int $rx_rate,
        private readonly int $signal,
        private readonly string $site_id,
        private readonly int $tx_bytes,
        private readonly int $tx_bytes_r,
        private readonly int $tx_packets,
        private readonly int $tx_power,
        private readonly int $tx_rate,
        private readonly int $uptime,
        private readonly string $user_id,
        private readonly int $vlan
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function isGuestByUap(): bool
    {
        return $this->is_guest_by_uap;
    }

    public function getLastSeenByUap(): int
    {
        return $this->last_seen_by_uap;
    }

    public function getUptimeByUap(): int
    {
        return $this->uptime_by_uap;
    }

    public function getApMac(): string
    {
        return $this->ap_mac;
    }

    public function getAssocTime(): int
    {
        return $this->assoc_time;
    }

    public function getBssid(): string
    {
        return $this->bssid;
    }

    public function getBytesR(): int
    {
        return $this->bytes_r;
    }

    public function getCcq(): int
    {
        return $this->ccq;
    }

    public function getChannel(): int
    {
        return $this->channel;
    }

    public function getEssid(): string
    {
        return $this->essid;
    }

    public function getFirstSeen(): int
    {
        return $this->first_seen;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function getIdletime(): int
    {
        return $this->idletime;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function isIs11r(): bool
    {
        return $this->is_11r;
    }

    public function isGuest(): bool
    {
        return $this->is_guest;
    }

    public function isWired(): bool
    {
        return $this->is_wired;
    }

    public function getLastSeen(): int
    {
        return $this->last_seen;
    }

    public function getLatestAssocTime(): int
    {
        return $this->latest_assoc_time;
    }

    public function getMac(): string
    {
        return $this->mac;
    }

    public function getNoise(): int
    {
        return $this->noise;
    }

    public function getOui(): string
    {
        return $this->oui;
    }

    public function isPowersaveEnabled(): bool
    {
        return $this->powersave_enabled;
    }

    public function isQosPolicyApplied(): bool
    {
        return $this->qos_policy_applied;
    }

    public function getRadio(): string
    {
        return $this->radio;
    }

    public function getRadioName(): string
    {
        return $this->radio_name;
    }

    public function getRadioProto(): string
    {
        return $this->radio_proto;
    }

    public function getRssi(): int
    {
        return $this->rssi;
    }

    public function getRxBytes(): int
    {
        return $this->rx_bytes;
    }

    public function getRxBytesR(): int
    {
        return $this->rx_bytes_r;
    }

    public function getRxPackets(): int
    {
        return $this->rx_packets;
    }

    public function getRxRate(): int
    {
        return $this->rx_rate;
    }

    public function getSignal(): int
    {
        return $this->signal;
    }

    public function getSiteId(): string
    {
        return $this->site_id;
    }

    public function getTxBytes(): int
    {
        return $this->tx_bytes;
    }

    public function getTxBytesR(): int
    {
        return $this->tx_bytes_r;
    }

    public function getTxPackets(): int
    {
        return $this->tx_packets;
    }

    public function getTxPower(): int
    {
        return $this->tx_power;
    }

    public function getTxRate(): int
    {
        return $this->tx_rate;
    }

    public function getUptime(): int
    {
        return $this->uptime;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }

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
            (string)$json->ip,
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

<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Domoticz\ValueObject;

use DateTime;

class SwitchDevice extends Device
{
    private $level;
    private $levelInt;
    private $maxDimLevel;
    private $stringParam1;
    private $stringParam2;
    private $switchType;
    private $switchTypeVal;
    private $usedByCamera;

    public function __construct(
        float $AddjMulti,
        float $AddjMulti2,
        float $AddjValue,
        float $AddjValue2,
        int $BatteryLevel,
        int $CustomImage,
        string $Data,
        string $Description,
        int $Favorite,
        int $HardwareID,
        string $HardwareName,
        string $HardwareType,
        int $HardwareTypeVal,
        bool $HaveTimeout,
        string $ID,
        DateTime $LastUpdate,
        string $Name,
        bool $Notifications,
        string $PlanID,
        array $PlanIDs,
        bool $Protected,
        bool $ShowNotifications,
        string $SignalLevel,
        string $SubType,
        bool $Timers,
        string $Type,
        string $TypeImg,
        int $Unit,
        int $Used,
        string $XOffset,
        string $YOffset,
        string $idx,
        string $level,
        int $levelInt,
        int $maxDimLevel,
        string $stringParam1,
        string $stringParam2,
        string $switchType,
        string $switchTypeVal,
        bool $usedByCamera
    ) {
        parent::__construct($AddjMulti, $AddjMulti2, $AddjValue, $AddjValue2, $BatteryLevel, $CustomImage, $Data,
            $Description, $Favorite, $HardwareID, $HardwareName, $HardwareType, $HardwareTypeVal, $HaveTimeout, $ID,
            $LastUpdate, $Name, $Notifications, $PlanID, $PlanIDs, $Protected, $ShowNotifications, $SignalLevel,
            $SubType, $Timers, $Type, $TypeImg, $Unit, $Used, $XOffset, $YOffset, $idx);

        $this->level = $level;
        $this->levelInt = $levelInt;
        $this->maxDimLevel = $maxDimLevel;
        $this->stringParam1 = $stringParam1;
        $this->stringParam2 = $stringParam2;
        $this->switchType = $switchType;
        $this->switchTypeVal = $switchTypeVal;
        $this->usedByCamera = $usedByCamera;
    }

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getLevelInt(): int
    {
        return $this->levelInt;
    }

    /**
     * @return int
     */
    public function getMaxDimLevel(): int
    {
        return $this->maxDimLevel;
    }

    /**
     * @return string
     */
    public function getStringParam1(): string
    {
        return $this->stringParam1;
    }

    /**
     * @return string
     */
    public function getStringParam2(): string
    {
        return $this->stringParam2;
    }

    /**
     * @return string
     */
    public function getSwitchType(): string
    {
        return $this->switchType;
    }

    /**
     * @return string
     */
    public function getSwitchTypeVal(): string
    {
        return $this->switchTypeVal;
    }

    /**
     * @return bool
     */
    public function isUsedByCamera(): bool
    {
        return $this->usedByCamera;
    }

    public static function formatFromStandardClass(\stdClass $json): SwitchDevice
    {
        return new self(
            $json->AddjMulti,
            $json->AddjMulti2,
            $json->AddjValue,
            $json->AddjValue2,
            $json->BatteryLevel,
            $json->CustomImage,
            $json->Data,
            $json->Description,
            $json->Favorite,
            $json->HardwareID,
            $json->HardwareName,
            $json->HardwareType,
            $json->HardwareTypeVal,
            $json->HaveTimeout,
            $json->ID,
            new DateTime($json->LastUpdate),
            $json->Name,
            $json->Notifications,
            $json->PlanID,
            $json->PlanIDs,
            $json->Protected,
            $json->ShowNotifications,
            $json->SignalLevel,
            $json->SubType,
            $json->Timers,
            $json->Type,
            $json->TypeImg,
            $json->Unit,
            $json->Used,
            $json->XOffset,
            $json->YOffset,
            $json->idx,
            $json->Level,
            $json->LevelInt,
            $json->MaxDimLevel,
            $json->StrParam1,
            $json->StrParam2,
            $json->SwitchType,
            $json->SwitchTypeVal,
            $json->UsedByCamera
        );
    }
}

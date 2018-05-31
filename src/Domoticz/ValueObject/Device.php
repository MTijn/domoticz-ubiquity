<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Domoticz\ValueObject;

use DateTime;

abstract class Device
{
    /** @var float */
    private $AddjMulti;
    /** @var float */
    private $AddjMulti2;
    /** @var float */
    private $AddjValue;
    /** @var float */
    private $AddjValue2;
    /** @var integer */
    private $BatteryLevel;
    /** @var integer */
    private $CustomImage;
    /** @var string */
    private $Data;
    /** @var string */
    private $Description;
    /** @var integer */
    private $Favorite;
    /** @var integer */
    private $HardwareID;
    /** @var string */
    private $HardwareName;
    /** @var string */
    private $HardwareType;
    /** @var integer */
    private $HardwareTypeVal;
    /** @var bool */
    private $HaveTimeout;
    /** @var string */
    private $ID;
    /** @var DateTime */
    private $LastUpdate;
    /** @var string */
    private $Name;
    /** @var boolean */
    private $Notifications;
    /** @var string */
    private $PlanID;
    /** @var array */
    private $PlanIDs;
    /** @var boolean */
    private $Protected;
    /** @var boolean */
    private $ShowNotifications;
    /** @var string */
    private $SignalLevel;
    /** @var string */
    private $SubType;
    /** @var boolean */
    private $Timers;
    /** @var string */
    private $Type;
    /** @var string */
    private $TypeImg;
    /** @var integer */
    private $Unit;
    /** @var integer */
    private $Used;
    /** @var string */
    private $XOffset;
    /** @var string */
    private $YOffset;
    /** @var string */
    private $idx;

    /**
     * Device constructor.
     * @param float $AddjMulti
     * @param float $AddjMulti2
     * @param float $AddjValue
     * @param float $AddjValue2
     * @param int $BatteryLevel
     * @param int $CustomImage
     * @param string $Data
     * @param string $Description
     * @param int $Favorite
     * @param int $HardwareID
     * @param string $HardwareName
     * @param string $HardwareType
     * @param int $HardwareTypeVal
     * @param bool $HaveTimeout
     * @param string $ID
     * @param DateTime $LastUpdate
     * @param string $Name
     * @param bool $Notifications
     * @param string $PlanID
     * @param array $PlanIDs
     * @param bool $Protected
     * @param bool $ShowNotifications
     * @param string $SignalLevel
     * @param string $SubType
     * @param bool $Timers
     * @param string $Type
     * @param string $TypeImg
     * @param int $Unit
     * @param int $Used
     * @param string $XOffset
     * @param string $YOffset
     * @param string $idx
     */
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
        string $idx
    ) {
        $this->AddjMulti = $AddjMulti;
        $this->AddjMulti2 = $AddjMulti2;
        $this->AddjValue = $AddjValue;
        $this->AddjValue2 = $AddjValue2;
        $this->BatteryLevel = $BatteryLevel;
        $this->CustomImage = $CustomImage;
        $this->Data = $Data;
        $this->Description = $Description;
        $this->Favorite = $Favorite;
        $this->HardwareID = $HardwareID;
        $this->HardwareName = $HardwareName;
        $this->HardwareType = $HardwareType;
        $this->HardwareTypeVal = $HardwareTypeVal;
        $this->HaveTimeout = $HaveTimeout;
        $this->ID = $ID;
        $this->LastUpdate = $LastUpdate;
        $this->Name = $Name;
        $this->Notifications = $Notifications;
        $this->PlanID = $PlanID;
        $this->PlanIDs = $PlanIDs;
        $this->Protected = $Protected;
        $this->ShowNotifications = $ShowNotifications;
        $this->SignalLevel = $SignalLevel;
        $this->SubType = $SubType;
        $this->Timers = $Timers;
        $this->Type = $Type;
        $this->TypeImg = $TypeImg;
        $this->Unit = $Unit;
        $this->Used = $Used;
        $this->XOffset = $XOffset;
        $this->YOffset = $YOffset;
        $this->idx = $idx;
    }

    /**
     * @return float
     */
    public function getAddjMulti(): float
    {
        return $this->AddjMulti;
    }

    /**
     * @return float
     */
    public function getAddjMulti2(): float
    {
        return $this->AddjMulti2;
    }

    /**
     * @return float
     */
    public function getAddjValue(): float
    {
        return $this->AddjValue;
    }

    /**
     * @return float
     */
    public function getAddjValue2(): float
    {
        return $this->AddjValue2;
    }

    /**
     * @return int
     */
    public function getBatteryLevel(): int
    {
        return $this->BatteryLevel;
    }

    /**
     * @return int
     */
    public function getCustomImage(): int
    {
        return $this->CustomImage;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->Data;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    /**
     * @return int
     */
    public function getFavorite(): int
    {
        return $this->Favorite;
    }

    /**
     * @return int
     */
    public function getHardwareID(): int
    {
        return $this->HardwareID;
    }

    /**
     * @return string
     */
    public function getHardwareName(): string
    {
        return $this->HardwareName;
    }

    /**
     * @return string
     */
    public function getHardwareType(): string
    {
        return $this->HardwareType;
    }

    /**
     * @return int
     */
    public function getHardwareTypeVal(): int
    {
        return $this->HardwareTypeVal;
    }

    /**
     * @return bool
     */
    public function isHaveTimeout(): bool
    {
        return $this->HaveTimeout;
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return DateTime
     */
    public function getLastUpdate(): DateTime
    {
        return $this->LastUpdate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @return bool
     */
    public function isNotifications(): bool
    {
        return $this->Notifications;
    }

    /**
     * @return string
     */
    public function getPlanID(): string
    {
        return $this->PlanID;
    }

    /**
     * @return array
     */
    public function getPlanIDs(): array
    {
        return $this->PlanIDs;
    }

    /**
     * @return bool
     */
    public function isProtected(): bool
    {
        return $this->Protected;
    }

    /**
     * @return bool
     */
    public function isShowNotifications(): bool
    {
        return $this->ShowNotifications;
    }

    /**
     * @return string
     */
    public function getSignalLevel(): string
    {
        return $this->SignalLevel;
    }

    /**
     * @return string
     */
    public function getSubType(): string
    {
        return $this->SubType;
    }

    /**
     * @return bool
     */
    public function isTimers(): bool
    {
        return $this->Timers;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * @return string
     */
    public function getTypeImg(): string
    {
        return $this->TypeImg;
    }

    /**
     * @return int
     */
    public function getUnit(): int
    {
        return $this->Unit;
    }

    /**
     * @return int
     */
    public function getUsed(): int
    {
        return $this->Used;
    }

    /**
     * @return string
     */
    public function getXOffset(): string
    {
        return $this->XOffset;
    }

    /**
     * @return string
     */
    public function getYOffset(): string
    {
        return $this->YOffset;
    }

    /**
     * @return string
     */
    public function getIdx(): string
    {
        return $this->idx;
    }

    abstract public static function formatFromStandardClass(\stdClass $json);
}

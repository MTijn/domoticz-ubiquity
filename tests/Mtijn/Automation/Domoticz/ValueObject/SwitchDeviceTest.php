<?php

namespace Mtijn\Automation\Domoticz\ValueObject;

use PHPUnit\Framework\TestCase;

class SwitchDeviceTest extends TestCase
{
    public function testSwitchDevice()
    {
        $json =  <<<JSON
{
    "AddjMulti":1,
    "AddjMulti2":1,
    "AddjValue":0,
    "AddjValue2":0,
    "BatteryLevel":255,
    "CustomImage":0,
    "Data":"Off",
    "Description":"",
    "DimmerType":"none",
    "Favorite":0,
    "HardwareID":9,
    "HardwareName":"Virtual",
    "HardwareType":"Dummy",
    "HardwareTypeVal":15,
    "HaveDimmer":true,
    "HaveGroupCmd":true,
    "HaveTimeout":false,
    "ID":"00014070",
    "Image":"Light",
    "IsSubDevice":false,
    "LastUpdate":"2018-05-30 11:55:04",
    "Level":100,
    "LevelInt":100,
    "MaxDimLevel":100,
    "Name":"Some Switch",
    "Notifications":"false",
    "PlanID":"0",
    "PlanIDs":[0],
    "Protected":false,
    "ShowNotifications":true,
    "SignalLevel":"-",
    "Status":"Off",
    "StrParam1":"",
    "StrParam2":"",
    "SubType":"Switch",
    "SwitchType":"On\/Off",
    "SwitchTypeVal":0,
    "Timers":"false",
    "Type":"Light\/Switch",
    "TypeImg":"lightbulb",
    "Unit":1,"Used":1,
    "UsedByCamera":false,
    "XOffset":"0",
    "YOffset":"0",
    "idx":"32"
}
JSON;


        $data = json_decode($json);

        $device = SwitchDevice::formatFromStandardClass($data);
        $this->assertSame(1.0, $device->getAddjMulti());
        $this->assertSame(1.0, $device->getAddjMulti2());
        $this->assertSame(0.0, $device->getAddjValue());
        $this->assertSame(0.0, $device->getAddjValue2());
        $this->assertSame(255, $device->getBatteryLevel());
        $this->assertSame(0, $device->getCustomImage());
        $this->assertSame('Off', $device->getData());
        $this->assertSame('', $device->getDescription());
        $this->assertSame(0, $device->getFavorite());
        $this->assertSame(9, $device->getHardwareID());
        $this->assertSame('Virtual', $device->getHardwareName());
        $this->assertSame('Dummy', $device->getHardwareType());
        $this->assertSame(15, $device->getHardwareTypeVal());
        $this->assertSame(false, $device->isHaveTimeout());
        $this->assertSame('00014070', $device->getID());
        $this->assertSame('2018-05-30 11:55:04', $device->getLastUpdate()->format('Y-m-d H:i:s'));
        $this->assertSame('Some Switch', $device->getName());
        $this->assertSame(true, $device->isNotifications());
        $this->assertSame('0', $device->getPlanID());
        $this->assertSame([0 => 0], $device->getPlanIDs());
        $this->assertSame(false, $device->isProtected());
        $this->assertSame(true, $device->isShowNotifications());
        $this->assertSame('-', $device->getSignalLevel());
        $this->assertSame('Switch', $device->getSubType());
        $this->assertSame(true, $device->isTimers());
        $this->assertSame('Light/Switch', $device->getType());
        $this->assertSame('lightbulb', $device->getTypeImg());
        $this->assertSame(1, $device->getUnit());
        $this->assertSame(1, $device->getUsed());
        $this->assertSame('0', $device->getXOffset());
        $this->assertSame('0', $device->getYOffset());
        $this->assertSame('32', $device->getIdx());
        $this->assertSame('100', $device->getLevel());
        $this->assertSame(100, $device->getLevelInt());
        $this->assertSame(100, $device->getMaxDimLevel());
        $this->assertSame('', $device->getStringParam1());
        $this->assertSame('', $device->getStringParam2());
        $this->assertSame('On/Off', $device->getSwitchType());
        $this->assertSame('0', $device->getSwitchTypeVal());
        $this->assertSame(false, $device->isUsedByCamera());
    }
}

<?php

declare(strict_types=1);

namespace happype\openapi\libdevicedata;

use pocketmine\network\mcpe\protocol\types\DeviceOS;
use pocketmine\utils\EnumTrait;
use function str_replace;

/**
 * This doc-block is generated automatically, do not modify it manually.
 * This must be regenerated whenever registry members are added, removed or changed.
 * @see \pocketmine\utils\RegistryUtils::_generateMethodAnnotations()
 *
 * @method static Device AMAZON()
 * @method static Device ANDROID()
 * @method static Device DEDICATED()
 * @method static Device GEAR_VR()
 * @method static Device HOLOLENS()
 * @method static Device IOS()
 * @method static Device NINTENDO()
 * @method static Device OSX()
 * @method static Device PLAYSTATION()
 * @method static Device TVOS()
 * @method static Device UNKNOWN()
 * @method static Device WIN32()
 * @method static Device WINDOWS_10()
 * @method static Device WINDOWS_PHONE()
 * @method static Device XBOX()
 */
class Device {
    use EnumTrait {
        EnumTrait::__construct as Enum___construct;
    }

    protected static function setup(): void {
        self::registerAll(
            new Device(DeviceOS::UNKNOWN, "Unknown"),
            new Device(DeviceOS::ANDROID, "Android"),
            new Device(DeviceOS::IOS, "iOS"),
            new Device(DeviceOS::OSX, "OSX"),
            new Device(DeviceOS::AMAZON, "Amazon"),
            new Device(DeviceOS::GEAR_VR, "Gear VR"),
            new Device(DeviceOS::HOLOLENS, "Hololens"),
            new Device(DeviceOS::WINDOWS_10, "Windows 10"),
            new Device(DeviceOS::WIN32, "Win32"),
            new Device(DeviceOS::DEDICATED, "Dedicated"),
            new Device(DeviceOS::TVOS, "TVOS"),
            new Device(DeviceOS::PLAYSTATION, "PlayStation"),
            new Device(DeviceOS::NINTENDO, "Nintendo"),
            new Device(DeviceOS::XBOX, "Xbox"),
            new Device(DeviceOS::WINDOWS_PHONE, "Windows Phone")
        );
    }

    /** @var int */
    protected int $id;
    /** @var string */
    protected string $name;

    private function __construct(int $id, string $name) {
        $this->Enum___construct(str_replace(" ", "_", $name));
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getId(): int {
        return $this->id;
    }

    /**
     * @internal
     */
    public static function fromId(int $id): Device {
        foreach (Device::getAll() as $device) {
            if($device->getId() == $id) {
                return $device;
            }
        }

        return Device::UNKNOWN();
    }
}
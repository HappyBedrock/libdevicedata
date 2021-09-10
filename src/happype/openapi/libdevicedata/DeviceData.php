<?php

declare(strict_types=1);

namespace happype\openapi\libdevicedata;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\Server;

class DeviceData implements Listener {

    /** @var Device[] */
    private static array $devices = [];

    public static function register(Plugin $plugin): void {
        Server::getInstance()->getPluginManager()->registerEvents(new DeviceData(), $plugin);
    }

    private function __construct() {}

    public static function getDeviceByPlayer(Player $player): Device {
        return DeviceData::$devices[$player->getName()] ?? Device::UNKNOWN();
    }

    public function onPreLogin(PlayerPreLoginEvent $event): void {
        DeviceData::$devices[$event->getPlayerInfo()->getUsername()] = Device::fromId($event->getPlayerInfo()->getExtraData()["DeviceOS"]);
    }

    /**
     * @noinspection PhpUnused
     * @internal
     */
    public function onQuit(PlayerQuitEvent $event): void {
        unset(DeviceData::$devices[$event->getPlayer()->getName()]);
    }
}
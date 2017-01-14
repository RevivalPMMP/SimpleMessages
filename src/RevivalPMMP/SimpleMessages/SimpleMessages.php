<?php

namespace RevivalPMMP\SimpleMessages;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;


class SimpleMessages extends PluginBase implements Listener{
    public function onEnable(){
        $this->getLogger()->info("Loading SimpleMessages!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
	$this->reloadConfig();
    }

    public function onDisable(){
        $this->getLogger()->info("Disabling SimpleMessages!");
    }
    
    function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getDisplayName();
        Server::getInstance()->broadcastMessage("".$name. $this->getConfig()->get("Join-Message"));

}
    function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getDisplayName();
        Server::getInstance()->broadcastMessage("".$name. $this->getConfig()->get("Leave-Message"));
        }
        
}


<?php

namespace Fouzi\AntiFly;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;
use pocketmine\event\Listener;
use pocketmine\event\PlayerMoveEvent;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener
{
  
  public function onEnable()
  {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TF::RED . "AntiFly by iiFouzi has been successfully enabled");
  }
  
  public function onMove(PlayerMoveEvent $event)
  {
    
    $player = $event->getPlayer();
    
    if ($player->getLevel()->getName() == "Lobby" || $player->getLevel()->getName() == "world"){
      
    } else {
      if($player->isFlying()){
        $player->kick(TF::GREEN . "You have been kicked by " . TF::RED . "AntiCheat" . TF::GREEN . " For Flying");
        Server::getInstance()->broadcastMessage(TF::RED . "AntiCheat has just kicked " . TF::WHITE . $player->getName() . TF::RED . " for using Fly Hacking");
        
      }
    }
  }
  
  public function onDisable()
  {
    $this->getLogger()->info(TF::RED . "AntiFly has been disabled");
  }
  
}
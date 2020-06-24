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
    // register the events so the functions will work
    
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    
    // when plugin is enabled
    
    $this->getLogger()->info(TF::RED . "AntiFly by iiFouzi has been successfully enabled");
  }
  
  public function onMove(PlayerMoveEvent $event)
  {
    
    $player = $event->getPlayer();
    
    if ($player->getAllowFlight(true)){
      
      //if player has fly Permission or creative he wont get kicked
      
    } elseif ($player->getAllowFlight(false)){
      
      //if player does not have Permission to fly
      
      if($player->isFlying()){
        
        //player will get kicked automatically because he is flying without Permission
        
        $player->kick(TF::RED . "You have been kicked By AntiCheat for using Fly hacks");
        
        //send message to all the online players
        
        Server::getInstance()->broadcastMessage(TF::RED . $player->getName() . TF::WHITE . "");
      }
    }
  }
  
  public function onDisable()
  {
    //when plugin is disabled
    
    $this->getLogger()->info(TF::RED . "AntiFly has been disabled");
  }
  
}
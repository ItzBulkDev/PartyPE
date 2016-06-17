<?php

namespace PartyPE;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info(TF::AQUA . "[PartyPE] enabled");
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        @mkdir($this->getDataFolder());
    }
}

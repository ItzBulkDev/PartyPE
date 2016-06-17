<?php

namespace PartyPE;

use pocketmine\plugin\PluginBase as P;
use pocketmine\event\Listener as L;
use pocketmine\utils\TextFormat as TF;

class Main extends P implements L{
    
    public function onEnable(){
        $this->getLogger()->notice("[PartyPE] enabled");//notice automatically does aqua I believe
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        @mkdir($this->getDataFolder());
    }
    //Start with public function onJoin()?
    public function onEnable(){
        $this->getLogger()->notice("[PartyPE] disabled");
    }
}

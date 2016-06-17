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
        @mkdir($this->getDataFolder()."players/");
    }
    //Start with public function onJoin()?
    public function onDisable(){ //kys <3
        $this->getLogger()->notice("[PartyPE] disabled");
    }
    public function onJoinEvent(PlayerJoinEvent $event){
        $name = $event->getPlayer()->getName();
        if (!file_exists($this->getDataFolder()."players/".$event->getPlayer()->getName().".yml")){
			$config = new Config($this->getDataFolder()."players/".strtolower($ev->getPlayer()->getName()).".yml", Config::YAML, array(
				"#---PartyPE---#",
				"members": array(),
				"#-------------#"
				));
			$config->save();
    }
}

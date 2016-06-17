<?php

namespace PartyPE;

use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\Plugin;

use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Task extends PluginTask{
  
	private $target;
	private $requestplayer;
	
	public function __construct(Plugin $owner, Player $target,Player $requestplayer){
	}

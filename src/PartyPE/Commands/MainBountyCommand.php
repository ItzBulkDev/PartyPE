<?php

namespace PartyPE\Commands;

use PartyPE\Main;
use PartyPE\Commands\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\OfflinePlayer;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;

class MainPartyCommand extends BaseCommand {
    private $plugin;
    public $config;
    public $player;

    /**
     * MainPartyCommand constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
        parent::__construct($plugin, "party", "This allows players to make parties, invite players, etc.", "/party [invite]", ["party", "p", "par"]);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if(count($args) < 1 ){
                $sender->sendMessage(TF::RED.'Usage: '. $this->getUsage());
                return false;
            }
                
                $sname = $sender->getName();
                $player = $this->plugin->getServer()->getPlayer($args[0]);
                if(!$player){
                    $sender->sendMessage(TF::RED.' That player is not online!');
                    return false;
                }
                $pname = $player->getName();
        }
        else {
            $sender->sendMessage(TF::RED."Run this command in-game!");
        }
    }

    /**
     * @return mixed
     */
    public function getPlugin()
    {
        return $this->plugin;
    }
}

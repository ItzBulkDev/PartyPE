<?php

namespace Bounties\Commands;

use Bounties\Main;
use Bounties\Commands\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\OfflinePlayer;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;

class MainBountyCommand extends BaseCommand {
    private $plugin;
    public $config;
    public $player;

    /**
     * MainReportCommand constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
        parent::__construct($plugin, "bounty", "This allows players to set bounties on other players", "/bounty [name] [amount]", ["bountyy", "bount", "bounttyy"]);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     */
    public function execute(CommandSender $sender, $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if(count($args) < 2 ){
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
                $amount = $args[1];
                $this->plugin->addBounty($sender, $player, $amount);
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
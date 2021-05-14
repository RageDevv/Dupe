<?php

declare(strict_types=1);

namespace Rage\Dupe;

use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    /**
     * @author RageDevv
     * @package Dupe plugin
     */


    public function onEnable()
    {
        $this->getServer()->getCommandMap()->register("Dupe", new DupeCommand($this));
    }

    public function onDisable()
    {
        if ($this->getServer()->getCommandMap()->getCommand("dupe") instanceof Command) $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("dupe"));
    }

    /**
     * @param Player $player
     * @return void
     */
    public function dupe(Player $player) : void
    {
        $item = clone $player->getInventory()->getItemInHand();

        $item->setCount(1);

        $player->getInventory()->addItem($item);

        /* Delete above and put your code here */
    }
}

<?php

namespace Rage\Dupe;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;

class DupeCommand extends Command {

    /** @var Main */
    private $plugin;


    public function __construct(Main $main)
    {
        parent::__construct("dupe");

        $this->setDescription("Dupe the item in your hand");
        $this->setPermission("dupe.command.use");
        $this->setPermissionMessage(TextFormat::RED . "Unknown command. Try /help for a list of commands");
        $this->setUsage("Usage: /dupe");

        $this->plugin = $main;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender->hasPermission($this->getPermission())) {
            if ($sender instanceof Player) {
                $this->plugin->dupe($sender);
            } else {
                $sender->sendMessage("This command is for players only");
            }
        } else {
            $sender->sendMessage($this->getPermissionMessage());
        }
    }
}
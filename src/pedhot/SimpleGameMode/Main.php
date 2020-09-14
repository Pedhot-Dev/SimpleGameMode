<?php

namespace pedhot\SimpleGamemode;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin Enabled");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $player = $this->getServer()->getPlayer($sender->getName());
        $serv = $this->getServer();
        $nocmd = TextFormat::RED . "You dont have permission to use this command";
        $notother = TextFormat::RED . "You do not have permission to change the gamemode of other players";
        switch($command->getName()){
            case "gms":
                if ($sender->hasPermission("gms.command")){
                    if (!$sender instanceof Player){
                        $sender->sendMessage("in Game only");
                    }
                    if ($sender instanceof Player){
                        if(count($args) < 1) {
                            $sender->sendMessage("Gamemode changed to Survival mode");
                            $player->setGamemode(0);
                        }
                        if(isset($args[0])){
                            $subject = $serv->getPlayer($args[0]);
                            if ($sender->hasPermission("gms.other")){
                                $subject->setGamemode(0);
                                $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Survival mode");
                                $subject->sendMessage("Your gamemode was changed to Survival Mode");
                            }else{
                                $sender->sendMessage($notother);
                                return true;
                            }
                        }
                    }
                }else{
                    $sender->sendMessage($nocmd);
                }
                break;
            case "gmc":
                if ($sender->hasPermission("gmc.command")){
                    if (!$sender instanceof Player){
                        $sender->sendMessage("In Game only");
                    }
                    if ($sender instanceof Player){
                        if(count($args) < 1) {
                            $sender->sendMessage("Gamemode changed to Creative mode");
                            $player->setGamemode(1);
                        }
                        if(isset($args[0])){
                            $subject = $serv->getPlayer($args[0]);
                            if ($sender->hasPermission("gmc.other")){
                                $subject->setGamemode(1);
                                $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Creative mode");
                                $subject->sendMessage("Your gamemode was changed to Creative Mode");
                            }else{
                                $sender->sendMessage($notother);
                                return true;
                            }
                        }
                    }
                }else{
                    $sender->sendMessage($nocmd);
                }
                break;
            case "gma":
                if ($sender->hasPermission("gma.command")){
                    if (!$sender instanceof Player){
                        $sender->sendMessage("In Game only");
                    }
                    if ($sender instanceof Player){
                        if(count($args) < 1) {
                            $sender->sendMessage("Gamemode changed to Adventure mode");
                            $player->setGamemode(2);
                        }
                        if(isset($args[0])){
                            $subject = $serv->getPlayer($args[0]);
                            if ($sender->hasPermission("gma.other")){
                                $subject->setGamemode(2);
                                $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Adventure mode");
                                $subject->sendMessage("Your gamemode was changed to Adventure Mode");
                            }else{
                                $sender->sendMessage($notother);
                                return true;
                            }
                        }
                    }
                }else{
                    $sender->sendMessage($nocmd);
                }
                break;
            case "gmspc":
                if ($sender->hasPermission("gmspc.command")){
                    if (!$sender instanceof Player){
                        $sender->sendMessage("In Game only");
                    }
                    if ($sender instanceof Player){
                        if(count($args) < 1) {
                            $sender->sendMessage("Gamemode changed to Spectator mode");
                            $player->setGamemode(3);
                        }
                        if(isset($args[0])){
                            $subject = $serv->getPlayer($args[0]);
                            if ($sender->hasPermission("gmsps.other")){
                                $subject->setGamemode(3);
                                $sender->sendMessage("Changed ". $subject->getName()."'s gamemode to Spectator mode");
                                $subject->sendMessage("Your gamemode was changed to Spectator Mode");
                            }else{
                                $sender->sendMessage($notother);
                                return true;
                            }
                        }
                    }
                }else{
                    $sender->sendMessage($nocmd);
                }
                break;
        }
        return false;
    }
}
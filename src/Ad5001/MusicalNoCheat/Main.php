<?php


namespace Ad5001\MusicalNoCheat;


use pocketmine\command\CommandSender;


use pocketmine\command\Command;


use pocketmine\event\Listener;


use pocketmine\plugin\PluginBase;


use pocketmine\Server;


use pocketmine\Player;






class Main extends PluginBase implements Listener {


    protected $prevention;




   public function onEnable(){


        $this->reloadConfig();


        if(!file_exists($this->getDataFolder()."players")) {
            file_put_contents($this->getDataFolder()."players", "…‡");// This means {}
        }


        $this->getServer()->getPluginManager()->registerEvents($this, $this);


        $cfg = file_get_contents($this->getDataFolder() . "players");

        $cfg = str_split($cfg);

        foreach($cfg as $key => $char) {
            $char = utf8_decode($char);
            $char -= 10;
            $cfg[$key] = utf8_encode($char);
        }

        $cfg = implode("", $cfg);

        $this->prevention = json_decode($cfg, true);


    }




    public function onLoad(){


        $this->saveDefaultConfig();


    }



    public function addSpoted(Player $player) {
        $this->prevention[$event->getPlayer()->getName()]
    }



    public function onDisable() {
        $cfg = json_encode($this->prevention);
        $cfg = str_split($cfg);

        foreach($cfg as $key => $char) {
            $char = utf8_decode($char);
            $char += 10;
            $cfg[$key] = utf8_encode($char);
        }

        $cfg = implode("", $cfg);
        file_put_contents($this->getDataFolder() . "players", $cfg);
    }



    public function onPlayerPreLogin(\pocketmine\event\player\PlayerPreLoginEvent $event) {
        if(!isset($this->prevention[$event->getPlayer()->getName()])) {
            $this->prevention[$event->getPlayer()->getName()] = 0;
        }
    }




    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){


        switch($cmd->getName()){


            case 'default':


            break;


        }


     return false;


    }


}
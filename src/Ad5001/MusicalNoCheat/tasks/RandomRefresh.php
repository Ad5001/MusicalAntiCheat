<?php


namespace Ad5001\MusicalNoCheat\tasks;



use pocketmine\Server;


use pocketmine\schedulerPluginTask;


use pocketmine\Player;



use Ad5001\MusicalNoCheat\Main;







class RanddomRefresh extends PluginTask {




   public function __construct(Main $main) {


        parent::__construct($main);


        $this->main = $main;


        $this->server = $main->getServer();


    }




   public function onRun($tick) {


        foreach($this->main->modules as $module) {
            $module->onRefresh($tick);
        }


    }




}
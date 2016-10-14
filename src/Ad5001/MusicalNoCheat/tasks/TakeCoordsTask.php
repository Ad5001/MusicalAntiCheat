<?php


namespace Ad5001\MusicalNoCheat\tasks;



use pocketmine\Server;


use pocketmine\scheduler\PluginTask;


use pocketmine\Player;


use pocketmine\math\Vector3;



use Ad5001\MusicalNoCheat\Main;







class TakeCoordsTask extends PluginTask implements Listener {



    private $server;

    private $main;

    private $v1;

    private $player;




   public function __construct($main, Player $player) {


        parent::__construct($main->getServer()->getPluginManager()->getPlugin("MusicalAntiCheat"));


        $this->main = $main;


        $this->server = $main->server;


        $this->v1 = new Vector3($player->x, $player->y, $player->z);


        $this->player = $player;


    }




   public function onRun($tick) {


        $this->main->onCoordsTake($this->player, $this->v1, new Vector3($this->player->x, $this->player->y, $this->player->z));


    }




}
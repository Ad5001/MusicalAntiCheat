<?php


namespace Ad5001\MusicalNoCheat\tasks;



use pocketmine\Server;


use pocketmine\scheduler\PluginTask;


use pocketmine\Player;


use pocketmine\math\Vector3;


use pocketmine\math\Vector2;



use Ad5001\MusicalNoCheat\Main;







class GetDistanceTask extends PluginTask {



    private $server;

    private $main;

    private $v1;

    private $player;




   public function __construct(Prevention $main, Player $player, int $times) {


        parent::__construct($main->getServer()->getPluginManager()->getPlugin("MusicalAntiCheat"));


        $this->main = $main;


        $this->server = $main->getServer();


        $this->dist = $dist;


        $this->player = $player;


        $this->time = $times;


    }




   public function onRun($tick) {


       $this->times-= 0.5;


        $this->server->getScheduler()->scheduleDelayedTask(new TakeCoordsTask($this, $this->player), 10);

        if((int) $this->times == 0) {
            $this->distance = $this->dist;
            $this->main->onDistanceTake($this->player, $this->dist);
            $this->server->getScheduler()->cancelTask($this->getTaskId());
        } 


    }



    public function onCoordsTake(\pocketmine\Player $player, \pocketmine\math\Vector3 $v1, \pocketmine\math\Vector3 $v2) {
        $this->dist+= \Ad5001\MusicalNoCheat\VectorUtils::getDistance(new Vector2($v1->x, $v1->z), new Vector2($v2->x, $v2->z));
    }




}
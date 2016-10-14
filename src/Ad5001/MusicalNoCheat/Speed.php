<?php


namespace Ad5001\MusicalNoCheat;



use pocketmine\Server;


use pocketmine\Player;



use Ad5001\MusicalNoCheat\utils\VectorUtils;



use Ad5001\MusicalNoCheat\Main;







class Speed  {


    const lyrics = [
        "Speed, an' how fast will it go",
        "Can it get me over her quickly"
    ];




    public function onRefresh($tick) {
        foreach($this->getServer()->getOnlinePlayers() as $player) {
            $this->getServer()->getScheduler()->scheduleDelayedTask(new TakeCoordsTask($this, $player), 20);
        }
    }


    public function onDistanceTake(Player $player, int $distance) {
        $speed = $player->getSpeed();
        $blockmax = $speed * 0.6; // It's a bit more than normal but it's preventing in case of small lag.
        if($distance > $blockmax) {
            $this->main->addPrevent($this, $player);
        }
    }



    public function showLyrics(Player $player, int $num) {
        $sender->sendMessage(self::lyrics[$num]);
    }




}
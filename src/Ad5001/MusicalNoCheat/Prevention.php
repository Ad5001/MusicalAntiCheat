<?php


namespace Ad5001\MusicalNoCheat;



use pocketmine\Server;


use pocketmine\Player;


use pocketmine\utils\MainLogger;





use Ad5001\MusicalNoCheat\Main;







abstract class Prevention {




   public function __construct(Main $main) {


        $this->main = $main;


        $this->server = $main->getServer();


        $this->prevention = [];


    }


    /*
    Show lyrics from the taken music
    @param      \pocketmine\Player $player
    @param      int $num
    */
    public abstract function showLyrics(Player $player, int $num);


    /*
    Spot a player
    @param      pocketmine\Player $player
    */
    public function spot(\pocketmine\Player $player) {
        $this->main->prevention[$player->getName()]++;
    }


    /*
    Refreshing the script
    @param      mixed $tick
    */
    public abstract function onRefresh($tick);


    /*
    Get server instance
    */
    public function getServer() {
        return Server::getInstance();
    }


    /*
    Log a message to the console
    @param      string $message
    */
    public function log(string $message) {
        return MainLogger::getInstance()->info($message);
    }


    /*
    Return of the TakeCoordsTask
    @param      \pocketmine\Player $player
    @param      \pocketmine\math\Vector3 $v1
    @param      \pocketmine\math\Vector3 $v2
    */
    public function onCoordTake(\pocketmine\Player $player, \pocketmine\math\Vector3 $v1, \pocketmine\math\Vector3 $v2) {}


    /*
    Return of the GetDistanceTask
    @param      \pocketmine\Player $player
    @param      int $distance
    */
    public function onDistanceTake(\pocketmine\Player $player, int $distance) {}


    /*
    Warn a player
    @param      \pocketmine\Player $player
    */
    public function addPrevent(Player $player) {
        if(!isset($this->prevention[$player->getName()])) {
            $this->prevention[$player->getName()] = 0;
        }
        $this->prevention->[$player->getName()]++;
    }


    




}
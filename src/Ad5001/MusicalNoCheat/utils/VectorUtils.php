<?php


namespace Ad5001\MusicalNoCheat;



use pocketmine\Server;


use pocketmine\Player;


use pocketmine\math\Vector3;


use pocketmine\math\Vector3;



use Ad5001\MusicalNoCheat\Main;







class VectorUtils {
    

    public static function getDistance(Vector2 $v1, Vector2 $v2) : int {
        if($v1->x == $v2->x) {
            $dist = $v1->y - $v2->y;
        } elseif($v1->y == $v2->y) {
            $dist = $v1->x - $v2->x;
        } else {
            $x = abs($v1->x - $v2->x);
            $y = abs($v1->y - $v2->y);
            $x = $x**2;
            $y = $y**2;
            $dist = sqrt($x+$y);
        }
        $dist = abs($dist);
        return $dist;
    }




}
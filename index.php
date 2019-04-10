<?php
require('Fighter.class.php');

$f1 = new Fighter('Vladimir', 80, 180, 15, 8, 17);
$f2 = new Fighter('Bonus BGC', 120, 190, 25, 10, 9);

echo '<pre>';
var_dump($f1->getDelay());
var_dump($f2->getDelay());


$interval = 1 / ($f1->getSpeed() * $f2->getSpeed()); //tablicowe 1/12
var_dump($interval);
$time = $interval;
while($f1->isAlive() && $f2->isAlive()) {
    if(fmod($time, $f1->getDelay()) == 0) //czas na uderzenie zawodnika 1
        $f2->incomingDamage($f1->outgoingDamage());
    if(fmod($time, $f2->getDelay()) == 0)
        $f1->incomingDamage($f2->outgoingDamage());
    $time += $interval;
}




echo '<pre>';
var_dump($f1);
var_dump($f2);
?>
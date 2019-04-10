<?php
class Fighter {
    private $name = "";
    private $weight = 0;
    private $height = 0;
    private $strenght = 0;
    private $speed = 0;
    private $agility = 0;
    private $hp;

    public function __construct($n, $w, $h, $st, $sp, $a) {
        $this->name = $n;
        $this->weight = $w;
        $this->height = $h;
        $this->strenght = $st;
        $this->speed = $sp;
        $this->agility = $a;
        $this->hp = $this->strenght * $this->weight / 5;
    }


    public function getWeight() {
        return $this->weight;
    } 
    public function setWeight($w) {
        $this->weight = $w;
    }
    public function getHeight() {
        return $this->height;
    } 
    public function setHeight($h) {
        $this->height = $h;
    }

    public function getDelay() : float {
        return round(1 / $this->speed, 5);
    }
    public function getSpeed() : float {
        return $this->speed;
    }

    public function isAlive() : bool {
        if ($this->hp > 0) return true;
        else return false;
    }

    public function outgoingDamage() : array {
        $damage = $this->strenght * $this->speed;
        $accuracy = $this->agility / 100;
        echo $this->name.': Wyprowadzam cios za '.$damage.'<br>';
        return array('damage' => $damage,
                    'accuracy' => $accuracy); 
    }


    public function incomingDamage(array $hit) {
        $r = rand(0,100);
        $accuracy = $hit['accuracy'];
        $damage = $hit['damage'];
        if($accuracy * 100 > $r) {
            //trafienie
            echo 'Trafinie<br>';
            $this->hp -= $damage;
        } else {
            //pudło
            echo 'Pudło<br>';
        }
        echo $this->name.': Zostało mi '.$this->hp.' hp<br>';
    }

}
?>
<?php 
    abstract class Creature extends Entity {
        protected $speed;
        protected $hp;
        function __construct($model, $speed, $hp) {
            parent::__construct($model);
            $this->speed = $speed;
            $this->hp = $hp;
        }

        abstract public function makeMove();
    }
?>
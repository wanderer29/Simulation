<?php 
    abstract class Creature extends Entity {
        protected $speed;
        protected $hp;

        abstract public function makeMove();
    }
?>
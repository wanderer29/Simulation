<?php
    class Predator extends Creature {
        protected $damage;
        
        public function __construct($model, $speed, $hp, $damage) {
            parent::__construct($model, $speed, $hp);
            $this->damage = $damage;
        }

        public function makeMove() {

        }

        public function attack($damage) {
        
        }
    }
?>
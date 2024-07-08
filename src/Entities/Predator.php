<?php
    class Predator extends Creature {
        protected $damage;
        
        public function __construct($model, Coordinates $coordinates, $speed, $hp, $damage) {
            parent::__construct($model, $coordinates, $speed, $hp);
            $this->damage = $damage;
        }

        public function makeMove() {

        }

        public function attack($damage) {
        
        }

        public function isSquareAvailableForMove($newCoordinates, Map $map): bool {
            return ($map->isPlaceEmpty($newCoordinates)) || (get_class($map->getEntity($newCoordinates)) == "Herbivore");
        }
    }
?>
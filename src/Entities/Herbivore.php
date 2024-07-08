<?php
    require 'Creature.php';
    class Herbivore extends Creature {

        public function __construct($model, $coordinates, $speed, $hp) {
            parent::__construct($model, $coordinates, $speed, $hp);
        }
        
        public function makeMove() {
            
        }

        public function isSquareAvailableForMove($newCoordinates, Map $map): bool {
            return ($map->isPlaceEmpty($newCoordinates)) || (get_class($map->getEntity($newCoordinates)) == "Grass");
        }

    }
?>
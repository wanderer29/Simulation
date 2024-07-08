<?php 
    abstract class Creature extends Entity {
        protected $speed;
        protected $hp;
        function __construct($model, Coordinates $coordinates, $speed, $hp) {
            parent::__construct($model, $coordinates);
            $this->speed = $speed;
            $this->hp = $hp;
        }

        abstract public function makeMove();

        public function getAvailableMovePlaces(Map $map) : array { //Вернет массив Coordinates-ов
            $result = [];

            foreach ($this->getCreatureMoves() as $move) {
                if ($this->coordinates->canShift($move, $map)) {
                    $newCoordinates = $this->coordinates->shift($move);
                    if ($this->isSquareAvailableForMove($newCoordinates, $map)) {
                        array_push($result, $newCoordinates);
                    }
                }
            }
            return $result;
        }

        public abstract function isSquareAvailableForMove($newCoordinates, Map $map) : bool;
        // return $map->isPlaceEmpty($newCoordinates) || get_class($map->getEntity($newCoordinates)) == "Herbivore" || get_class($map->getEntity($newCoordinates)) == "Grass";

        public function getCreatureMoves() : array {
            $moves = []; //Должен быть массив из CoordinatesShift-ов

            for ($i = 0; $i <= $this->speed; $i++) {
                for ($j = 0; $j <= $this->speed; $j++) {
                    $moves[] = new CoordinatesShift($i, $j);
                    $moves[] = new CoordinatesShift(-$i, -$j);
                    if ($i != 0 && $j != 0) {
                        $moves[] = new CoordinatesShift(-$i, $j);
                        $moves[] = new CoordinatesShift($i, -$j);
                    }
                }
            }
            return $moves;
        }

    }
?>
<?php
    require 'Creature.php';
    class Herbivore extends Creature {

        public function __construct($model, $coordinates, $speed, $hp) {
            parent::__construct($model, $coordinates, $speed, $hp);
        }
        
        public function makeMove(Map $map, PathFinder $pathFinder) {

            if ($map->isThereAnEntity("Grass") && $this->hp > 0) {
                $moves = $pathFinder->findPath($map->graph->getNode($this->coordinates), "Grass");
            }
            else {  
                return;
            };
            
            //Доступна ли трава чтобы съесть
            $coordinatesToMove = $this->getAvailableMovePlaces($map);
            $canEat = false;
            $grassCords = null;
        
            foreach($coordinatesToMove as $place) {
                if ($map->isPlaceEmpty($place) == false) {
                    if (get_class($map->getEntity($place)) == "Grass") {
                        $canEat = true;
                        $grassCords = $place;
                    }
                }
            }

            if ($canEat == true) {
                //Удалить траву
                $map->removeEntity($grassCords);
                
                //Удалить травоядного с текущей координаты
                $map->removeEntity($this->coordinates);

                //Переместить травоядного
                $this->coordinates = $grassCords;
                $map->addEntity($this, $grassCords);

            }
            else {
                //Переместиться на свободную координату на пути
                $map->removeEntity($this->coordinates);
                $this->coordinates = $moves[$this->speed]->coordinates;
                $map->addEntity($this, $this->coordinates);
            }
            //Обновить граф
            $map->graph->setGraph($map);        
        }

        public function isSquareAvailableForMove($newCoordinates, Map $map): bool {
            return ($map->isPlaceEmpty($newCoordinates)) || (get_class($map->getEntity($newCoordinates)) == "Grass");
        }

    }
?>
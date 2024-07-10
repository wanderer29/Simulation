<?php
    class Predator extends Creature {
        protected $damage;
        
        public function __construct($model, Coordinates $coordinates, $speed, $hp, $damage) {
            parent::__construct($model, $coordinates, $speed, $hp);
            $this->damage = $damage;
        }

        public function makeMove(Map $map, PathFinder $pathFinder) {
            if ($map->isThereAnEntity("Herbivore")) {
                $moves = $pathFinder->findPath($map->graph->getNode($this->coordinates), "Herbivore");
            }
            else return;
            
            //Доступно ли травоядное чтобы съесть
            $coordinatesToMove = $this->getAvailableMovePlaces($map);
            $canEat = false;
            $targetCords = null;
        
            foreach($coordinatesToMove as $place) {
                if ($map->isPlaceEmpty($place) == false) {
                    if (get_class($map->getEntity($place)) == "Herbivore") {
                        $canEat = true;
                        $targetCords = $place;
                    }
                }
            }
            if ($canEat == true) { //Атака
                $target = $map->getEntity($targetCords);

                // Отнимаем у травоядного hp
                if ($target->hp <= $this->damage) {
                    //Удалить травоядное
                    $map->removeEntity($target->coordinates);
                    
                    //Удалить хищника с текущей координаты
                    $map->removeEntity($this->coordinates);
                    //Переместить хищника
                    $this->coordinates = $targetCords;
                    $map->addEntity($this, $targetCords);
                }
                else {
                    $target->hp -= $this->damage;
                }

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
            return ($map->isPlaceEmpty($newCoordinates)) || (get_class($map->getEntity($newCoordinates)) == "Herbivore");
        }
    }
?>
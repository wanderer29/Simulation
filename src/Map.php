<?php
    require 'Entities/Entity.php';
    require 'Entities/Rock.php';
    require 'Entities/Tree.php';
    require 'Entities/Grass.php';
    require 'Coordinates/Coordinates.php';
    require 'Entities/Herbivore.php';
    require 'Entities/Predator.php';
    require 'Finder/Graph.php';

    class Map extends Entity {
        public $sizeX;
        public $sizeY;
        public $entities;
        public $graph;

        public function __construct($sizeX, $sizeY) {
            $this->sizeX = $sizeX;
            $this->sizeY = $sizeY;
            $this->entities = [];
            $this->graph = new Graph();
        }   

        public function getEntites() {
            return $this->entities;
        }

        public function addEntity(Entity $entity, Coordinates $coordinates) {
            $this->entities[$coordinates->toString()] = $entity;
            $entity->setCoordinates($coordinates);
        }

        public function removeEntity(Coordinates $coordinates) {
            unset($this->entities[$coordinates->toString()]);
        }

        public function isThereHerbivore() :bool {
            foreach ($this->entities as $entity) {
                if (get_class($entity) == "Herbivore") return true;
            }
            return false;
        }

        public function isThereGrass() :bool {
            foreach ($this->entities as $entity) {
                if (get_class($entity) == "Grass") return true;
            }
            return false;
        }

        public function isPlaceEmpty($coordinates) {
            return !array_key_exists($coordinates->toString(), $this->entities);
        }

        public function getEntity (Coordinates $coordinates) {
            return $this->entities[$coordinates->toString()];
        }

        public function isThereAnEntity(string $type) {
            foreach ($this->entities as $entity) {
                if (get_class($entity) == $type) {
                    return true;
                }
            }
            return false;
        }

        public function setupEntities() {
            //Добавление камней
            $this->addEntity(new Rock("🪨", new Coordinates(10,10)),new Coordinates(10,10));
            $this->addEntity(new Rock("🪨", new Coordinates(40,18)),new Coordinates(40,18));
            $this->addEntity(new Rock("🪨", new Coordinates(55,5)),new Coordinates(55,5));
            $this->addEntity(new Rock("🪨", new Coordinates(3,15)),new Coordinates(3,15));
            $this->addEntity(new Rock("🪨", new Coordinates(95,10)),new Coordinates(95,10));
            $this->addEntity(new Rock("🪨", new Coordinates(93,15)),new Coordinates(93,15));
            $this->addEntity(new Rock("🪨", new Coordinates(30,22)),new Coordinates(30,22));

            //Добавление деревьев
            $this->addEntity(new Tree("🌳", new Coordinates(10,15)),new Coordinates(10,15));
            $this->addEntity(new Tree("🌳", new Coordinates(5,5)),new Coordinates(5,5));
            $this->addEntity(new Tree("🌳", new Coordinates(70,6)),new Coordinates(70,6));
            $this->addEntity(new Tree("🌳", new Coordinates(50,14)),new Coordinates(50,14));
            $this->addEntity(new Tree("🌲", new Coordinates(30,2)),new Coordinates(30,2));
            $this->addEntity(new Tree("🌲", new Coordinates(60,17)),new Coordinates(60,17));
            $this->addEntity(new Tree("🌲", new Coordinates(14,16)),new Coordinates(14,16));
            $this->addEntity(new Tree("🌲", new Coordinates(30,10)),new Coordinates(30,10));

            //Добавление травы
            $this->addEntity(new Grass("🌿", new Coordinates(7,17)),new Coordinates(7,17));
            $this->addEntity(new Grass("🌿", new Coordinates(33,13)),new Coordinates(33,13));
            $this->addEntity(new Grass("🌿", new Coordinates(97,14)),new Coordinates(97,14));
            $this->addEntity(new Grass("🌿", new Coordinates(85,5)),new Coordinates(85,5));
            $this->addEntity(new Grass("🌿", new Coordinates(91,18)),new Coordinates(91,18));
            $this->addEntity(new Grass("🌿", new Coordinates(49,8)),new Coordinates(49,8));
            $this->addEntity(new Grass("🌿", new Coordinates(15,15)),new Coordinates(15,15));
            $this->addEntity(new Grass("🌿", new Coordinates(13,13)),new Coordinates(13,13));
            $this->addEntity(new Grass("🌿", new Coordinates(60,18)),new Coordinates(60,18));
            $this->addEntity(new Grass("🌿", new Coordinates(55,2)),new Coordinates(55,2));

            //Добавление травоядного
            $this->addEntity(new Herbivore("🐇", new Coordinates(33,15),2, 10),new Coordinates(33,15));


            //Добавление хищника
            $this->addEntity(new Predator("🐺", new Coordinates(20,2), 2, 15, 5),new Coordinates(20,2));

        }
    }
?>
<?php
    class Map extends Entity {
        private $sizeX;
        private $sizeY;
        private $entities;

        public function __construct($sizeX, $sizeY) {
            $this->sizeX = $sizeX;
            $this->sizeY = $sizeY;
            $this->entities = [];
        }

        public function getEntites() {
            return $this->entities;
        }

        public function addEntity(Entity $entity, int $x, int $y) {
            $this->entities["$x,$y"] = $entity;
        }

        public function drawMap() {
            for ($i = 0; $i < $this->sizeY; $i++) {
                for ($j = 0; $j < $this->sizeX; $j++) {
                    if ($i == 0 && $j == 0) {
                        echo "┌";
                    }
                    else if ($i == 0 && $j == ($this->sizeX - 1)) {
                        echo "┐\n";
                    }
                    else if ($i == ($this->sizeY - 1) && $j == 0) {
                        echo "└";
                    }
                    else if ($i == ($this->sizeY - 1) && $j == ($this->sizeX - 1)) {
                        echo "┘\n";
                    }
                    else if ($j == ($this->sizeX - 1)) {
                        echo "\n";
                    }
                    else if ($i == 0 || $i == ($this->sizeY - 1)) {
                        echo "━";
                    }
                    else {
                        $printed = false;
                        foreach ($this->entities as $position => $entity) {
                            list($posX, $posY) = explode(',', $position);
                            if ($posX == $j && $posY == $i) {
                                echo $entity->model;
                                $printed = true;
                            }
                        }
                        if ($printed == false) {
                            echo ' ';    
                        }
                    }
                }
            }
        }

    }
?>
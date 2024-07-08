<?php
    class MapRender {
        public function mapRender(Map $map) {
            for ($i = 0; $i < $map->sizeY; $i++) {
                for ($j = 0; $j < $map->sizeX; $j++) {
                    if ($i == 0 && $j == 0) {
                        echo "┌━━";
                    }
                    else if ($i == 0 && $j == ($map->sizeX - 1)) {
                        echo "━━┐\n";
                    }
                    else if ($i == ($map->sizeY - 1) && $j == 0) {
                        echo "└━━";
                    }
                    else if ($i == ($map->sizeY - 1) && $j == ($map->sizeX - 1)) {
                        echo "━━┘\n";
                    }
                    else if ($j == ($map->sizeX - 1)) {
                        echo "\n";
                    }
                    else if ($i == 0 || $i == ($map->sizeY - 1)) {
                        echo "━";
                    }
                    else {
                        $printed = false;
                        foreach ($map->entities as $position => $entity) {
                            list($posX, $posY) = explode(',', $position);
                            if ($posX == $j && $posY == $i) {
                                echo $entity->model;
                                $printed = true;
                            }
                        }
                        if ($printed == false) {
                            echo ".";    
                        }
                    }
                }
            }
        }
    }
?>
<?php
    class MakeMoveWithCreaturesAction extends Action{
        public function doing (Map $map) {
            foreach ($map->getEntites() as $entity) {
                $grassOnMap = $map->isThereGrass();
                $herbivoreOnMap = $map->isThereHerbivore();
                if ((get_class($entity) == "Herbivore" || get_class($entity) == "Predator") && $grassOnMap && $herbivoreOnMap) {
                    $entity->makeMove($map, new PathFinder($map));
                }
            }
        }
    }
?>  
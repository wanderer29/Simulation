<?php
    class PathFinder {
        private $map;

        private $entity;
        private $targetType;
        private $target;
        private $entityCords;
        private $targetCords;

        public function __construct($map, $entity, $targetType) {
            $this->map = $map;
            $this->entity = $entity;
            $this->targetType = $targetType;
            $this->entityCords = $entity->coordinates->getCoordinates();
        }

        public function calcDistance($start, $end) {
            return max(abs($end->getCoordinates()[0] - $start[0]), abs($end->getCoordinates()[1] - $start[1]));
        }

        public function findTarget() {
            $nearestTarget = "";
            $nearestTargetDist = 10000;
            foreach ($this->map->getEntites() as $cords => $target) {
                if (get_class($target) == $this->targetType) {
                    $distance = $this->calcDistance($this->entityCords, $target->coordinates);
                    if ($distance < $nearestTargetDist) {
                        $nearestTarget = $target;
                        $nearestTargetDist = $distance;
                    }
                }
            }
            return $nearestTarget;
        }
    }
?>
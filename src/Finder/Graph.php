<?php
    require 'Node.php';
    class Graph {
        public $nodes;

        public function __construct() {
            $this->nodes = [];
        }

        public function setGraph($map) {
            //Задать вершины
            for ($i = 1; $i < $map->sizeY - 1; $i++) {
                for ($j = 0; $j < $map->sizeX; $j++) {
                    if ($map->isPlaceEmpty(new Coordinates($j, $i))) {
                        $this->addNode(new Coordinates($j, $i), null);
                    }
                    else {
                        $this->addNode(new Coordinates($j, $i), $map->getEntity(new Coordinates($j, $i)));
                    }
                }
            }

            // Задать ребра вершин
            $this->addNeighbors($map);
        }

        public function addNode($coordinates, $entity) {
            $node = new Node($coordinates, $entity);
            $this->nodes[$coordinates->toString()] = $node;
            return $node;
        }
        public function getNode($coordinates) {
            if (!isset($this->nodes[$coordinates->toString()])) {
                return null;
            }
            else {
                return $this->nodes[$coordinates->toString()];
            }
        }
        public function getNodes() {
            return $this->nodes;
        }

        public function addEdge($start, $end) {
            $this->nodes[$start]->addNeighbor($this->nodes[$end]);
            $this->nodes[$end]->addNeighbor($this->nodes[$start]);
        }

        public function addNeighbors($map) {
            foreach ($this->nodes as $node) {
                foreach ($this->findNeighbors($node, $map) as $neighbor) {
                    $node->addNeighbor($neighbor);
                }
            }
        }

        public function findNeighbors(Node $node, $map) {
            $neighbors = [];
            if ($node->coordinates->x == 0 && $node->coordinates->y == 1) { //Левый вверх
                $neighbors[] = $this->getNode(new Coordinates(1, 1));
                $neighbors[] = $this->getNode(new Coordinates(0, 2));
                $neighbors[] = $this->getNode(new Coordinates(1, 2));
            }
            else if ($node->coordinates->x == 0 && $node->coordinates->y == $map->sizeY - 2) { //Левый низ
                $neighbors[] = $this->getNode(new Coordinates(1, $map->sizeY-2));
                $neighbors[] = $this->getNode(new Coordinates(1, $map->sizeY-3));
                $neighbors[] = $this->getNode(new Coordinates(0, $map->sizeY-3));
            }
            else if ($node->coordinates->x == $map->sizeX - 1 && $node->coordinates->y == $map->sizeY - 2) { //Правый низ
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-2, $map->sizeY-2));
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-2, $map->sizeY-3));
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-1, $map->sizeY-3));
            }
            else if ($node->coordinates->x == $map->sizeX - 1 && $node->coordinates->y == 1) { //Правый вверх
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-2, 1));
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-2, 2));
                $neighbors[] = $this->getNode(new Coordinates($map->sizeX-1, 2));
            }
            else {
                $x = $node->coordinates->x;
                $y = $node->coordinates->y;

                if ($this->isAvailableNode($x+1, $y, $map)) $neighbors[] = $this->getNode(new Coordinates($x+1, $y));
                if ($this->isAvailableNode($x+1, $y+1, $map)) $neighbors[] = $this->getNode(new Coordinates($x+1, $y+1));
                if ($this->isAvailableNode($x, $y+1, $map)) $neighbors[] = $this->getNode(new Coordinates($x, $y+1));
                if ($this->isAvailableNode($x-1, $y, $map)) $neighbors[] = $this->getNode(new Coordinates($x-1, $y));
                if ($this->isAvailableNode($x-1, $y-1, $map)) $neighbors[] = $this->getNode(new Coordinates($x-1, $y-1));
                if ($this->isAvailableNode($x, $y-1, $map)) $neighbors[] = $this->getNode(new Coordinates($x, $y-1));
                if ($this->isAvailableNode($x+1, $y-1, $map)) $neighbors[] = $this->getNode(new Coordinates($x+1, $y-1));
                if ($this->isAvailableNode($x-1, $y+1, $map)) $neighbors[] = $this->getNode(new Coordinates($x-1, $y+1));
            }
            return $neighbors;
        }

        public function isAvailableNode($x, $y, $map) : bool {
            $node = $this->getNode(new Coordinates($x, $y));
            if ($node !== null && $node->entity != null)  {
                $entity = $map->getEntity(new Coordinates ($x, $y));
                if (get_class($entity) == "Tree" || get_class($entity) == "Rock") return false;
            }
            if ($x < 0 || $y < 1) return false;
            if ($x > ($map->sizeX - 1) || $y > ($map->sizeY - 2)) return false;
            return true;
        }

    

    }
    
?>

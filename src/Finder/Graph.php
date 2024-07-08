<?php
    class Graph {
        private $nodes;

        public function __construct() {
            $this->nodes = [];
        }

        public function addNode($coordinates, $entity) {
            $node = new Node($coordinates, $entity);
            $this->nodes[$coordinates] = $node;
            return $node;
        }
        public function getNode($coordinates) {
            if (!isset($this->nodes[$coordinates])) {
                return null;
            }
            else {
                return $this->nodes[$coordinates];
            }
        }
        public function getNodes() {
            return $this->nodes;
        }

        public function addEdge($start, $end) {
            $this->nodes[$start]->addNeighbor($this->nodes[$end]);
            $this->nodes[$end]->addNeighbor($this->nodes[$start]);
        }

        public function findPath($startCords) { //Поиск пути 
            $visited = [];
            $queue = new SplQueue();
            
            $visited[$startCords] = true;
            $queue->enqueue($this->nodes[$startCords]);

            while ($queue->isEmpty() == false) {
                $node = $queue->dequeue();
                
                foreach ($node->neighbors as $neighbor) {
                    if (isset($visited[$neighbor->coordinates])) {
                        $visited[$neighbor->coordinates] = true;
                        $queue->enqueue($neighbor);
                    }
                }
            }
        }

        public function setGraphAsMap($map, $mapSizeX, $mapSizeY) {
            for ($i = 1; $i < $mapSizeY - 1; $i++) {
                for ($j = 0; $j < $mapSizeX; $j++) {
                    if (array_key_exists("$j,$i", $map->entities)) {
                        $node = new Node($map->entities["$j,$i"]->coordinates, $map->entities["$j,$i"]);
                    }
                }
            }
        }
    }
    
?>

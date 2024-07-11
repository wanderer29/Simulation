<?php
    class PathFinder {
        private $map;

        public function __construct($map) {
            $this->map = $map;
        }

        public function findPath(Node $startNode, string $target) { 
            $visited = []; 
            $queue = new SplQueue();

            $queue->enqueue([$startNode]); //Queue<Node>
            $visited[$startNode->coordinates->toString()] = true; //Visited<"coordinatesAsStr", bool>

            while ($queue->isEmpty() == false) { 
                $currentPath = $queue->dequeue(); //$currentPath = Array<Node>
                $currentNode = end($currentPath); //$currentNode = Node

                if ($currentNode->entity != null) { 
                    if (get_class($this->map->getEntity($currentNode->coordinates)) == $target) {
                        return $currentPath; //Вернет массив из Node
                    }
                }
            
                foreach($currentNode->neighbors as $neighbor) {
                    if (!isset($visited[$neighbor->coordinates->toString()])) { //Если еще не рассмотаривали по этим координатам
                        $visited[$neighbor->coordinates->toString()] = true;
                        $newPath = $currentPath; 
                        $newPath[] = $neighbor;
                        $queue->enqueue($newPath);
                    }
                }   
            }
            return null;
        }
    }
?>
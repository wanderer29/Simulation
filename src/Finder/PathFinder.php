<?php
    class PathFinder {
        private $map;

        public function __construct($map) {
            $this->map = $map;
        }

        // public function findPath(Creature $creatrue, string $target) { Исправить
        //     $visited = [];
        //     $queue = new SplQueue();
        //     $startCords = $creatrue->coordinates;

        //     $queue->enqueue([$startCords]);
        //     $visited[$startCords->toString()] = true;

        //     while ($queue->isEmpty() == false) {
        //         $currentPath = $queue->dequeue();
        //         $currentNode = end($currentPath);

        //     // if ($currentNode->coordinates != null) {
        //     //     if (get_class($this->map->getEntity($currentNode->coordinates)) == $target) {
        //     //         return $currentPath; //Вернет массив из Node
        //     //     }
        //     // }

            
        //         foreach($currentNode->neighbors as $neighbor) {
        //             if (!isset($visited[$neighbor->coordinates->toString()])) { //Если еще не рассмотаривали по этим координатам
        //                 $visited[$neighbor->coordinates->toString()] = true;
        //                 $newPath = $currentPath; 
        //                 $newPath[] = $neighbor;
        //                 $queue->enqueue($newPath);
        //             }
        //         }   
        //     }
        //     return null;
        // }






        // public function calcDistance($start, $end) { //Нахождение чебышёвского расстояния
        //     return max(abs($end->getCoordinates()[0] - $start[0]), abs($end->getCoordinates()[1] - $start[1]));
        // }



    }
?>
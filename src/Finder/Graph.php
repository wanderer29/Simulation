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

    public function addEdge($start, $end) {
        $this->nodes[$start]->addNeighbor($this->nodes[$end]);
        $this->nodes[$end]->addNeighbor($this->nodes[$start]);
    }

    public function findPath($startCords) { //Реализовать
        $visited = [];

        $queue = [];

    }

}
?>

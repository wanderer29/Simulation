<?php
    class Node {
        public $coordinates;
        public $neighbors;
        public $entity;
        public function __construct($coordinates, $neighbors, $entity = null) {
            $this->coordinates = $coordinates;
            $this->neighbors = $neighbors;
            $this->entity = $entity;
        }
        public function addNeighbor(Node $node) {
            $this->neighbors[] = $node;
        }

    }
?>

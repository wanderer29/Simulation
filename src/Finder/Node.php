<?php
    class Node {
        public $coordinates;
        public $neighbors;
        public $entity;
        public function __construct($coordinates, $entity = null) {
            $this->coordinates = $coordinates;
            $this->neighbors = [];
            $this->entity = $entity;
        }
        public function addNeighbor(Node $node) {
            $this->neighbors[] = $node;
        }
    }
?>

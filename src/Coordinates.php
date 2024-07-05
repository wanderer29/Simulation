<?php
    class Coordinates {
        private $x;
        private $y;
        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }
        public function setCoordinates($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }
        public function getCoordinates() {
            return [$this->x, $this->y];
        }
    }
?>
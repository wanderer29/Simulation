<?php
    abstract class Entity {
        public $model;
        public $coordinates; 
        
        public function __construct($model = "", $coordinates = new Coordinates(0,0)) {
            $this->model = $model;
            $this->coordinates = $coordinates;
        }

        public function setCoordinates($coordinates) {
            $this->coordinates = $coordinates;
        }
    }
?>
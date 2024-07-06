<?php
    require __DIR__ . '/../Coordinates.php';

    abstract class Entity {
        protected $model;
        public $coordinates; 
        public function __construct($model = "", $coordinates = new Coordinates(0,0)) {
            $this->model = $model;
            $this->coordinates = $coordinates;
        }
        public function setCoordinates($x, $y) {
            $this->coordinates->setCoordinates($x, $y);
        }
    }
?>
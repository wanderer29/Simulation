<?php 
    class Tree extends Entity {
        public function __construct($model = '', $coordinates = new Coordinates(0,0)) {
            parent::__construct($model, $coordinates);
        }
    }
?>
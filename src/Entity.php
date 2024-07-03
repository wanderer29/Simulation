<?php

    abstract class Entity {
        protected $x;
        protected $y;

        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }
    }
?>
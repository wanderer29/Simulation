<?php

    abstract class Entity {
        protected $model;
        public function __construct($model = "") {
            $this->model = $model;
        }
    }
?>
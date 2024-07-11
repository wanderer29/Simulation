<?php
    class setupEntitiesOnMapAction extends Action {
        public function doing(Map $map) {
            $map->setupEntities();
        }
    }
?>
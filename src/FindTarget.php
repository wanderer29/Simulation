<?php
class FindTarget{
    private $map;
    private $entity;
    public function __construct($map, $entity){
        $this->map = $map;
        $this->entity = $entity;
    }
    
    public function findTarget() {
        foreach ($this->map->entities as $entity) {
            
        }
    }
    
}

?>
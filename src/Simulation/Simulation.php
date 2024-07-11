<?php
    class Simulation {
        public Map $map;
        public $movesCounter;
        // public MapRender $mapRender = new MapRender();

        public $initActions = [];
        public $turnActions = [];

        public function __construct(Map $map) {
            $this->map = $map;
            $this->movesCounter = 0;
        }

        public function nextTurn() {
            foreach ($this->turnActions as $action) {
                $action->doing($this->map);
            }
        }

        public function startSimulation() {
            foreach ($this->initActions as $action) {
                $action->doing($this->map);
            }
            while(true) {
                if ($this->map->isThereGrass() && $this->map->isThereHerbivore()) {
                    
                    $this->nextTurn();
                    $this->movesCounter++;
                    $this->printMovesCounter();
                    sleep(1);
                }
                else {
                    break;  
                }
           }
        }

        public function printMovesCounter() {
            echo "\n";
            echo "Ход: $this->movesCounter \n";
        }

        public function stopSimulation() {
            
        }
    }
?>
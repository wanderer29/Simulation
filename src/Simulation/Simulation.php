<?php
    class Simulation {
        public $map;
        public $movesCounter;
        public MapRender $mapRender = new MapRender();

        public $initActions = [];
        public $turnActions = [];

        public function nextTurn() {
            //mapRender
            $this->mapRender->mapRender($this->map);

            foreach ($this->map->entities as $entity) {
                $entity->makeMove();
            }

            //mapRender
            $this->mapRender->mapRender($this->map);
        }

        public function startSimulation() {
            
            while(true) {
                //nextTurn()

                //Счетчик ходов ++

                //Проверка наличия травы или травоядных
                    //Если они еще есть: продожить
                    //Если нет: stopSimulation()
                
           }
        }

        public function stopSimulation() {

        }
    }
?>
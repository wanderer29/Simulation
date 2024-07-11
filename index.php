<?php
    include 'src/Map.php';
    include 'src/MapRender.php';
    require 'src/Coordinates/CoordinatesShift.php';
    require 'src/Finder/PathFinder.php';
    require 'src/Simulation/Simulation.php';
    require 'src/Actions/Action.php';
    require 'src/Actions/MakeMoveWithCreaturesAction.php';
    require 'src/Actions/RenderMapAction.php';
    require 'src/Actions/SetupEntitiesOnMapAction.php';

    const MAP_SIZE_X = 100;
    const MAP_SIZE_Y = 20;

    $map = new Map(MAP_SIZE_X, MAP_SIZE_Y);
    $map->graph->setGraph($map);
    
    $simulation = new Simulation($map);
    $simulation->initActions = [new SetupEntitiesOnMapAction(), new RenderMapAction()];
    $simulation->turnActions = [new MakeMoveWithCreaturesAction(), new RenderMapAction()];

    $simulation->startSimulation();




    // $map->getEntity(new Coordinates(33,13))->makeMove($map, $pathFinder);
    // $mapRender->mapRender($map);




    // $herbivore1 = $map->getEntity(new Coordinates(33,15));
    
    // foreach ($herbivore1->getAvailableMovePlaces($map) as $coordinatesForMove) { //1:17
    //     echo $coordinatesForMove->toString();
    //     echo "\n";
    // }

    // $predator = $map->getEntity(new Coordinates(20,2));
    
    // foreach ($predator->getAvailableMovePlaces($map) as $coordinatesForMove) {
    //     echo $coordinatesForMove->toString();
    //     echo "\n";
    // }


?>
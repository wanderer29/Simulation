<?php
    include 'src/Map.php';
    include 'src/MapRender.php';
    require 'src/Coordinates/CoordinatesShift.php';
    require 'src/Finder/PathFinder.php';

    const MAP_SIZE_X = 100;
    const MAP_SIZE_Y = 20;

    $map = new Map(MAP_SIZE_X, MAP_SIZE_Y);
    $map->setupEntities();
    
    $mapRender = new MapRender();
    $mapRender->mapRender($map);
    echo $map->isPlaceEmpty(new Coordinates(15,10)) ? "true" : "false";

    $pathFinder = new PathFinder($map);



    // Соседи в графе у ноды по координате 33 15
    $map->graph->setGraph($map);
    $node = $map->graph->getNode(new Coordinates(33,15));
    // foreach ($node->neighbors as $neighbor) { //Массив нод
    //     echo $neighbor->coordinates->toString();
    //     echo "\n";
    // }

    $pathOfNodes = $pathFinder->findPath($map->graph->getNode(new Coordinates(33,15)), "Grass"); //Node
    foreach ($pathOfNodes as $node) {
        echo $node->coordinates->toString();
        echo "\n";
    }

    $map->getEntity(new Coordinates(20,2))->makeMove($map, $pathFinder);
    $mapRender->mapRender($map);
    $map->getEntity(new Coordinates(30,12))->makeMove($map, $pathFinder);
    $mapRender->mapRender($map);
    $map->getEntity(new Coordinates(30,12))->makeMove($map, $pathFinder);
    $mapRender->mapRender($map);





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
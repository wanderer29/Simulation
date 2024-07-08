<?php
    include 'src/Map.php';
    include 'src/MapRender.php';
    require 'src/Coordinates/CoordinatesShift.php';

    const MAP_SIZE_X = 100;
    const MAP_SIZE_Y = 20;

    $map = new Map(MAP_SIZE_X, MAP_SIZE_Y);
    $map->setupStaticEntities();
    
    $mapRender = new MapRender();
    $mapRender->mapRender($map);
    echo $map->isPlaceEmpty(new Coordinates(15,10)) ? "true" : "false";

    $herbivore1 = $map->getEntity(new Coordinates(33,15));
    
    foreach ($herbivore1->getAvailableMovePlaces($map) as $coordinatesForMove) { //1:17
        echo $coordinatesForMove->toString();
        echo "\n";
    }

    // $predator = $map->getEntity(new Coordinates(20,2));
    
    // foreach ($predator->getAvailableMovePlaces($map) as $coordinatesForMove) {
    //     echo $coordinatesForMove->toString();
    //     echo "\n";
    // }


?>
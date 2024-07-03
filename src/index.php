<?php

    require 'Entity.php';
    require 'Map.php';
    require 'Tree.php';

    $mapSizeX = 100;
    $mapSizeY = 20;

    $map = new Map($mapSizeX, $mapSizeY);

    $tree1 = new Tree('t');
    $tree2 = new Tree('t');
    
    $map->addEntity($tree1, 10, 15);
    $map->addEntity($tree2, 5, 5);

    $map->drawMap();


?>
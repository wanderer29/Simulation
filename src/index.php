<?php

    require 'Entity.php';
    require 'Map.php';
    require 'Tree.php';
    require 'Rock.php';
    require 'Grass.php';

    $mapSizeX = 100;
    $mapSizeY = 20;

    $map = new Map($mapSizeX, $mapSizeY);

    $tree1 = new Tree('🌳');
    $tree2 = new Tree('🌳');
    $tree3 = new Tree('🌲');
    $tree4 = new Tree('🌲');
    $tree5 = new Tree('🌴');
    $tree6 = new Tree('🌴');
    $tree7 = new Tree('🌵');
    $tree8 = new Tree('🌵');

    $rock1 = new Rock('🪨');
    $rock2 = new Rock('🪨');
    $rock3 = new Rock('🪨');
    $rock4 = new Rock('🪨');
    $rock5 = new Rock('🪨');
    $rock6 = new Rock('🪨');
    $rock7 = new Rock('🪨');

    $grass1 = new Grass('🌿');
    $grass2 = new Grass('🌿');
    $grass3 = new Grass('🌿');
    $grass4 = new Grass('🌿');
    $grass5 = new Grass('🌿');
    $grass6 = new Grass('🌱');
    $grass7 = new Grass('🌱');
    $grass8 = new Grass('🌱');
    $grass9 = new Grass('🌱');
    $grass10 = new Grass('🌱');

    
    $map->addEntity($tree1, 10, 15);
    $map->addEntity($tree2, 5, 5);
    $map->addEntity($tree3, 70, 6);
    $map->addEntity($tree4, 50, 14);
    $map->addEntity($tree5, 30, 2);
    $map->addEntity($tree6, 60, 17);
    $map->addEntity($tree7, 14, 16);
    $map->addEntity($tree8, 30, 10);
    
    $map->addEntity($rock1, 10, 10);
    $map->addEntity($rock2, 40, 18);
    $map->addEntity($rock3, 55, 5);
    $map->addEntity($rock4, 3, 15);
    $map->addEntity($rock5, 95, 10);
    $map->addEntity($rock6, 93, 15);
    $map->addEntity($rock7, 30, 22);

    $map->addEntity($grass1, 7, 17);
    $map->addEntity($grass2, 33, 13);
    $map->addEntity($grass3, 97, 14);
    $map->addEntity($grass4, 85, 5);
    $map->addEntity($grass5, 91, 18);
    $map->addEntity($grass6, 49, 8);
    $map->addEntity($grass7, 15, 15);
    $map->addEntity($grass8, 13, 13);
    $map->addEntity($grass9, 60, 18);
    $map->addEntity($grass10, 55, 2);


    $map->drawMap();


?>
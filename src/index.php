<?php

    require 'Entity.php';
    require 'Map.php';

    $mapSizeX = 100;
    $mapSizeY = 20;

    $map = new Map($mapSizeX, $mapSizeY);
    $map->drawMap();


?>
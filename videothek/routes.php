<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/HomeController.php',
    'home' => 'app/Controllers/HomeController.php',
    'ausleiheerfassen' => 'app/Controllers/AusleiheErfassenController.php',
    'ausleihen' => 'app/Controllers/AusleihenListeController.php',
]);
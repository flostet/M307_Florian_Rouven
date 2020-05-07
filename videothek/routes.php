<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/HomeController.php',
    'home' => 'app/Controllers/HomeController.php',
    'erfassen' => 'app/Controllers/AusleiheErfassenController.php',
    'liste' => 'app/Controllers/AusleihenListeController.php',
    'bearbeiten' => 'app/Controllers/AusleiheBearbeitenController.php',
    'erfolgreich' => 'app/Controllers/SuccessController.php',
]);
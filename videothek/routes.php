<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'home' => 'app/Controllers/WelcomeController.php',
    'ausleihehinzufügen' => 'app/Controllers/AusleiheHinzufügenController.php',
    'Ausleihen' => 'app/Controllers/AusleihenListeController.php',
]);
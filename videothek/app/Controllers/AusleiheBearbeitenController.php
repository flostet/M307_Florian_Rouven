<?php

require 'app/Models/ausleihen.php';
require 'app/Models/filme.php';

$id = $_GET['id'];

$ausleihen = new Ausleihen();
$ausleihe = $ausleihen->getById($id);

$filme = new Filme();
$film = $filme->getById($ausleihe['FK_film_id']);

require 'app/Views/ausleihebearbeiten.view.php';
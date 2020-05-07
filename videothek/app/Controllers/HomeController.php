<?php

require 'app/Models/filme.php';
require 'app/Models/ausleihen.php';

$filme = new Filme();
$countFilme = $filme->getAll();

$ausleihen = new Ausleihen();
$countAusleihen = $ausleihen->getActive();


require 'app/Views/home.view.php';
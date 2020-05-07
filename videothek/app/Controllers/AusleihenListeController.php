<?php 

require 'app/Models/ausleihen.php'; 
require 'app/Models/filme.php';

$Ausleihen = new Ausleihen();
$Ausleihe = $Ausleihen->getActive();

$Filme = new Filme();




require 'app/Views/ausleihenliste.view.php';
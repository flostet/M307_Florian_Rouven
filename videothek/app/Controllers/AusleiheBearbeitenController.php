<?php 

require 'app/Models/ausleihen.php'; 
require 'app/Models/filme.php';

$Ausleihen = new Ausleihen();
$Ausleihe = $Ausleihen->getAll();

$Filme = new Filme();




require 'app/Views/ausleiheerfassen.view.php';
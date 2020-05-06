<?php

require 'app/Models/filme.php';

$filme = new Filme();
$countRecords = $filme->countRecords();
var_dump($countRecords);



require 'app/Views/home.view.php';
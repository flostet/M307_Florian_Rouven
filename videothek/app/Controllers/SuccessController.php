<?php

require 'app/Models/ausleihen.php';

$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $ausleihe = new Ausleihen($_POST['vorname'] ?? '', $_POST['nachname'] ?? '', $_POST['email'] ?? '', $_POST['telefon'] ?? '', $_POST['ausleihstatus'] ?? '', $_POST['film'] ?? '' );
    $ausleihe->update($id);
}


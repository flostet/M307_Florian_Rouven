<?php

require 'app/Models/ausleihen.php';
require 'app/Models/filme.php';

$id = $_GET['id'];

$ausleihen = new Ausleihen();
$ausleihe = $ausleihen->getById($id);

$filme = new Filme();
$film = $filme->getById($ausleihe['FK_film_id']);


$vorname = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$email = $_POST['email'] ?? '';
$ausgehlentesvideo     = $_POST['film'] ?? '';
$telefon = $_POST['telefon'] ?? '';
$ausleihstatus = $_POST['ausleihStatus'] ?? '';

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $vorname = trim($vorname);
    $nachname = trim($nachname);
    $email = trim($email);
    $telefon = trim($telefon);
    $ausgehlentesvideo = trim($ausgehlentesvideo);
    $ausleihstatus = trim($ausleihstatus);

    if($vorname === '')
    {
        $errors[] = 'Bitte geben sie einen Vornamen ein.';
    }
    if($nachname === '')
    {
        $errors[] = 'Bitte geben Sie einen Nachnamen ein.';
    }
    if(strpos($email, '@') === false)
    {
        $errors[] = 'Die Email Adresse muss ein @ Zeichen enthalten.';
    }
    if($telefon !== '')
    {
        if((preg_match('/^[\+ 0-9]+$/', $telefon)) === FALSE)
        {
            $errors[] = 'Die Telefonnummer ' . $telefon . ' ist ungültig';
        }
    }
    if($ausgehlentesvideo < 1 || $ausgehlentesvideo > 100 || $ausgehlentesvideo == '')
    {
        $errors[] = 'Der eingegebene Film ist ungültig';
    }
    if($ausleihstatus<0 || $ausleihstatus > 1)
    {
        $errors[] = 'Der eingegebene Ausleihstatus ist ungültig.';
    }


    if (count($errors) == 0) 
    {
        $ausleihe = new Ausleihen($vorname, $nachname, $email, $telefon, NULL, $ausgehlentesvideo, $ausleihstatus);
        $ausleihe->update($id);
        header('Location: liste');
    } else {
        require 'app/Views/ausleihebearbeiten.view.php';
        echo '<ul>';
        foreach($errors as $error)
        {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}


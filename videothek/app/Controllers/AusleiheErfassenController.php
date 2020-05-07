<?php

require 'app/Views/ausleiheerfassen.view.php';
require 'app/Models/filme.php';
require 'app/Models/ausleihen.php';


$errors   = [];

$vorname = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$email = $_POST['email'] ?? '';
$ausgehlentesvideo     = $_POST['film'] ?? '';
$telefon = $_POST['telefon'] ?? '';
$mitgliederstatus = $_POST['mitgliederstatus'] ?? '';


if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $vorname = trim($vorname);
    $nachname = trim($nachname);
    $email = trim($email);
    $telefon = trim($telefon);
    $ausgehlentesvideo = trim($ausgehlentesvideo);
    $mitgliederstatus = trim($mitgliederstatus);

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
    if(strtolower($mitgliederstatus) !== 'keine' && strtolower($mitgliederstatus) !== 'bronze' && strtolower($mitgliederstatus) !== 'silber' && strtolower($mitgliederstatus) !== 'gold')
    {
        $errors[] = 'Der eingegebene Mitgliederstatus ist ungültig.';
    }


    if (count($errors) == 0) 
    {
        $ausleihe = new Ausleihen($vorname, $nachname, $email, $telefon, $mitgliederstatus, $ausgehlentesvideo);
        $ausleihe->create();
        header('Location: home');
    } else {
        echo '<ul>';
        foreach($errors as $error)
        {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}
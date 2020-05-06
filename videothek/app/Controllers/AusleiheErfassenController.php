<?php

$database = 'database/filme.txt';
require 'app/Views/ausleiheerfassen.view.php';

// Datenbankfile erstellen, falls nicht vorhanden
if( ! file_exists($database)) {
    touch($database);
}

// Einträge laden
$guestbookEntries = json_decode(file_get_contents($database), true);

// Falls keine Einträge vorhanden ein leeres Array verwenden
if($guestbookEntries === null) {
    $guestbookEntries = [];
}

$errors   = [];
$newEntry = false;

$vorname     = $_POST['vorname'] ?? '';
$nachname     = $_POST['nachname'] ?? '';
$email     = $_POST['email'] ?? '';
$ausgehlentesvideo     = $_POST['ausgehlentes videos'] ?? '';
$telefon     = $_POST['telefon'] ?? '';
$mitgliederstatus     = $_POST['mitgliederstatus'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($vorname === '') {
        $errors[] = 'Bitte geben Sie einen Vornamen ein.';
    }
    if($nachname === '') {
        $errors[] = 'Bitte geben Sie einen Nachnamen ein.';
    }
    if($email === '') {
        $errors[] = 'Bitte geben Sie eine Email ein.';
    }
    if($ausgehlentesvideo === '') {
        $errors[] = 'Bitte geben Sie das Video an welches Sie auslehnen wollen.';
    }
    if($telefon === '') {
        $errors[] = 'Bitte geben Sie eine Telefonnummer an.';
    }
    if($mitgliederstatus === '') {
        $errors[] = 'Bitte geben Sie einen Mitgliederstatus an.';
    }

    if(count($errors) === 0) {
        
        saveToDatabase($vorname, $nachname, $email, $ausgehlentesvideo, $telefon, $mitgliederstatus);
        
        // Bestätigungsnachricht anzeigen
        $newEntry = true;

        // Formularfelder leeren
        $vorname     = '';
        $nachname  = '';
        $email = '';
        $ausgehlentesvideo  = '';
        $telefon     = '';
        $mitgliederstatus     = '';
    }

}

function saveToDatabase(string $name, string $message)
{
    global $database, $guestbookEntries;

    $newEntry = ['vorname' => $vorname, 'nachname' => $nachname, 'email' => $email, 'ausgehlentesvideo' => $ausgehlentesvideo, ];

    // Eintrag an Anfang von Array einfügen
    array_unshift($guestbookEntries, $newEntry);

    // Daten in File schreiben
    file_put_contents($database, json_encode($guestbookEntries));
}

<?php
/**
 * Stellt eine Verbindung zur Datenbank her und gibt die
 * Datenbankverbindung als PDO zurück.
 *
 * @return PDO
 */
function connectToDatabase()
{
    try{
        if($_SERVER['SERVER_NAME'] == 'web.kurse.ict-bz.ch'){
            $pdo = new PDO('mysql:host=web.kurse.ict-bz.ch;dbname=kurseictbz_30704', 'kurseictbz_30704', 'db_307_pw_04');
        } else {
            $pdo = new PDO('mysql:host=localhost;dbname=videothek', 'root', '');
        }
    }
    catch (PDOException $e){
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}
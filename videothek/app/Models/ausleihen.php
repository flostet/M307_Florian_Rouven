<?php

class Ausleihen{
    public $id;
    public $vorname;
    public $nachname;
    public $email;
    public $telefon;
    public $mitgliedStatus;
    public $FK_film_id;
    public $ausleihdatum;

    public $db;

    public function __construct($vorname = null, $nachname = null, $email = null, $telefon = null, $mitgliedstatus = null, $FK_film_id = null)
    {
        $this->vorname     = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->mitgliedstatus = $mitgliedStatus;
        $this->FK_film_id = $FK_film_id;

        // DB Verbinden (core/database.php)
        $this->db = connectToDatabase();
    }

    // Alle Elemente
    public function getAll()
    {
        $statement = $this->db->prepare('SELECT * FROM ausleihen');
        $statement->execute();

        return $statement->fetchAll();
    }

    // Element by ID
    public function getById(int $id)
    {
        $statement = $this->db->prepare('SELECT * FROM ausleihen WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    // Neue Ausleihe
    public function create()
    {
        $statement = $this->db->prepare('INSERT INTO ausleihen (vorname, nachname, email, telefon, mitgliedstatus, FK_film_id, ausleihdatum) VALUES (:vorname, :nachname, :email, :telefon, :mitgliedstatus, :FK_film_id, :ausleihdatum)');
        $statement->bindParam(':vorname', $vornahme, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $nachname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $telefon, PDO::PARAM_STR);
        $statement->bindParam(':mitgliedstatus', $mitgliedstatus, PDO::PARAM_STR);
        $statement->bindParam(':FK_film_id', $FK_film_id, PDO::PARAM_INT);
        $statement->bindParam(':ausleihdatum', $ausleihdatum, PDO::PARAM_STR);

        return $statement->execute();
    }

    
    public function update(int $id)
    {
        $statement = $this->db->prepare('UPDATE ausleihen SET vorname = :vorname, nachname = :nachname, email = :email, telefon = :telefon, FK_film_id = :FK_film_id, ausleihstatus = :ausleihstatus WHERE id = :id');
        $statement->bindParam(':vorname', $vorname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $nachname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $nachname, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // Lösche Task
    public function delete(int $id)
    {
        $statement = $this->db->prepare('DELETE FROM ausleihen WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }
}
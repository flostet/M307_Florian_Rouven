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
    public $ausleihstatus;

    public $db;

    public function __construct($vorname = null, $nachname = null, $email = null, $telefon = null, $mitgliedStatus = null, $FK_film_id = null, $ausleihstatus = null)
    {
        $this->vorname     = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->mitgliedStatus = $mitgliedStatus;
        $this->FK_film_id = $FK_film_id;
        $this->ausleihstatus = $ausleihstatus;

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

        return $statement->fetchAll()[0];
    }

    // Neue Ausleihe
    public function create()
    {
        if(strtolower($this->mitgliedStatus) === "keine")
        {
            $this->ausleihdatum = date("Y-m-d", strtotime("+30 days"));
        }
        else if(strtolower($this->mitgliedStatus) === "bronze")
        {
            $this->ausleihdatum = date("Y-m-d", strtotime("+40 days"));
        }
        else if(strtolower($this->mitgliedStatus) === "silber")
        {
            $this->ausleihdatum = date("Y-m-d", strtotime("+50 days"));
        }
        else if(strtolower($this->mitgliedStatus) === "gold")
        {
            $this->ausleihdatum = date("Y-m-d", strtotime("+70 days"));
        }

        $statement = $this->db->prepare("INSERT INTO ausleihen (vorname, nachname, email, telefon, mitgliedstatus, FK_film_id, ausleihdatum, ausleihStatus) VALUES (:vorname, :nachname, :email, :telefon, :mitgliedstatus, :FK_film_id, :ausleihdatum, :ausleihStatus)");
        $statement->bindParam(':vorname', $this->vorname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $this->nachname, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $this->telefon, PDO::PARAM_STR);
        $statement->bindParam(':mitgliedstatus', $this->mitgliedStatus, PDO::PARAM_STR);
        $statement->bindParam(':FK_film_id', $this->FK_film_id, PDO::PARAM_INT);
        $statement->bindParam(':ausleihdatum', $this->ausleihdatum);
        $statement->bindParam(':ausleihStatus', 0);

        return $statement->execute();
    }

    
    public function update(int $id)
    {
        $statement = $this->db->prepare('UPDATE ausleihen SET vorname = :vorname, nachname = :nachname, email = :email, telefon = :telefon, FK_film_id = :FK_film_id, ausleihstatus = :ausleihstatus WHERE id = :id');
        $statement->bindParam(':vorname', $this->vorname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $this->nachname, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':telefon', $this->telefon, PDO::PARAM_STR);
        $statement->bindParam(':FK_film_id', $this->FK_film_id, PDO::PARAM_INT);
        $statement->bindParam(':ausleihstatus', $this->ausleihstatus);

        return $statement->execute();
    }

    // Lösche Task
    public function delete(int $id)
    {
        $statement = $this->db->prepare('DELETE FROM ausleihen WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function getActive()
    {
        $statement = $this->db->prepare('SELECT * FROM ausleihen WHERE ausleihstatus = 0 ORDER BY ausleihdatum ASC');
        $statement->execute();

        return $statement->fetchAll();
    }



}
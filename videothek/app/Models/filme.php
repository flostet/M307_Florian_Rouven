<?php

class Filme
{
    public $id;
    public $titel;

    public $db;

    public function __construct($titel = null)
    {
        $this->titel     = $titel;

        // DB Verbinden (core/database.php)
        $this->db = connectToDatabase();
    }

    // Alle Elemente
    public function getAll()
    {
        $statement = $this->db->prepare('SELECT * FROM filme');
        $statement->execute();

        return $statement->fetchAll();
    }

    // Element by ID
    public function getById(int $id)
    {
        $statement = $this->db->prepare('SELECT * FROM filme WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getallFilms()
    {
        $select = $this->db->query("SELECT * FROM filme");
        return $select;
    }
}
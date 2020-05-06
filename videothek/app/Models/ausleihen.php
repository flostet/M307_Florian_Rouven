<?php

class Ausleihen{
    public $id;
    public $fk_kunden_id;
    public $fk_film_id;
    public $ausleihen_bis;
    public $ausleih_status;

    public $db;

    public function __construct($title = null, $completed = null)
    {
        $this->title     = $title;
        $this->completed = $completed;

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
        $statement = $this->db->prepare('INSERT INTO ausleihe (fk_kunden_id, fk_film_id, ausleihen_bis, ausleih_status) VALUES (:fk_kunden_id, :fk_film_id, :ausleihen_bis, 1)');
        $statement->bindParam(':fk_kunden_id', $this->fk_kunden_id, PDO::PARAM_INT);
        $statement->bindParam(':fk_film_id', $this->fk_film_id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // Update/Edit Task
    public function update(int $id)
    {
        $statement = $this->db->prepare('UPDATE tasks SET title = :title, completed = :completed WHERE id = :id');
        $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
        $statement->bindParam(':completed', $this->completed, PDO::PARAM_BOOL);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    // Lösche Task
    public function delete(int $id)
    {
        $statement = $this->db->prepare('DELETE FROM tasks WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }
}
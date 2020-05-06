<?php

class Kunden {
    public $kundenid;
    public $vorname;
    public $nachname;
    public $email;
    public $telefon;
    public $FK_Mitgliederstatus_id;

    /**
     * Kunden constructor.
     * @param $kundenid
     * @param $vorname
     * @param $nachname
     * @param $email
     * @param $telefon
     * @param $mitgliederstatus
     */
    public function __construct($vorname=null, $nachname=null, $email=null, $telefon=null, $mitgliederstatus=null)
    {
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->telefon = $telefon;
        $this->FK_Mitgliederstatus_id = $mitgliederstatus;
    }

    public function create(){
        $statement = connectToDatabase()->prepare('INSERT INTO `kunden` (vorname, nachname, email, telefon, Mitgliederstatus) VALUES (:vorname, :nachname, :email, :telefon, :Mitgliederstatus)');
        $statement->bindParam(':vorname', $this->vorname, PDO::PARAM_STR);
        $statement->bindParam(':nachname', $this->nachname, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $this->telefon, PDO::PARAM_STR);
        $statement->bindParam(':Mitgliederstatus', $this->Mitgliederstatus, PDO::PARAM_STR);
        return $statement->execute();
        $statement = null;
    }

    public static function getAll(){
        $statement = connectToDatabase()->prepare('SELECT * FROM kunden');
        $statement->execute();
        $result = $statement->fetchAll();
        $kunden = [];
        foreach($result as $a) {
            $kunden[] = $a;
        }
        return $kunden;
        $statement = null;
    }

    public static function countAll(){
        $statement = connectToDatabase()->prepare('SELECT COUNT(`kundenid`) FROM `kunden`');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $result[0];
        $statement = null;
    }

    private static function dbResultToTask($a){
        return new Kunden($a['kundenid'], $a['vorname'], $a['nachname'], $a['$email'], $a['telefon'], $a['mitgliederstatus']);
    }

    public function update()
    {
        $statement = connectToDatabase()->prepare('UPDATE `kunden` 
        SET 
        vorname = :vorname,
        nachname = :nachname,
        email = :email,
        telefon = :telefon,
        mitgliederstatus = :mitlgiederstatus
        WHERE kundenid = :kundenid');
        $statement->bindParam(':vorname', $this->vorname);
        $statement->bindParam(':nachname', $this->nachname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':telefon', $this->telefon);
        $statement->bindParam(':mitgliederstatus', $this->mitgliederstatus);
        $statement->bindParam(':kundenid', $this->kundenid);
        return $statement->execute();
        $statement = null;
    }

  /* NOT IMPLEMENTED PROPERLY
    public static function delete($id)
    {
        $statement = connectToDatabase()->prepare('DELETE FROM `tools` WHERE id = :id');
        $statement->bindParam(':id', $id);
        return $statement->execute();
        $statement = null;
    }
  NOT IMPLEMENTED PROPERLY */
}

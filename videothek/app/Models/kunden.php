<?php

class Kunden {
    public $kundenID;
    public $vorname;
    public $nachname;
    public $email;
    public $telefon;
    public FK_Mitgliederstatus_id;


    /**
     * address constructor.
     * @param $addressID
     * @param $name
     * @param $email
     * @param $telephone
     * @param $addressL1
     * @param $addressL2
     */
    public function __construct($name=null, $email=null, $telephone=null, $addressL1=null, $addressL2=null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->addressL1 = $addressL1;
        $this->addressL2 = $addressL2;
    }


    public function create(){
        $statement = connectToDatabase()->prepare('INSERT INTO `address` (name, email, telephone, addressL1, addressL2) VALUES (:name, :email, :telephone, :addressL1, :addressL2)');
        $statement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':telephone', $this->telephone, PDO::PARAM_STR);
        $statement->bindParam(':addressL1', $this->addressL1, PDO::PARAM_STR);
        $statement->bindParam(':addressL2', $this->addressL2, PDO::PARAM_STR);
        return $statement->execute();
        $statement = null;
    }

    public static function getAll(){
        $statement = connectToDatabase()->prepare('SELECT * FROM address');
        $statement->execute();
        $result = $statement->fetchAll();
        $addresses = [];
        foreach($result as $a) {
            $addresses[] = $a;
        }
        return $addresses;
        $statement = null;
    }

    public static function countAll(){
        $statement = connectToDatabase()->prepare('SELECT COUNT(`addressID`) FROM `address`');
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $result[0];
        $statement = null;
    }

    private static function dbResultToTask($a){
        return new Address($a['addressID'], $a['name'], $a['$email'], $a['telephone'], $a['addressL1'], $a['addressL2']);
    }

    public function update()
    {
        $statement = connectToDatabase()->prepare('UPDATE `address` 
        SET 
        name = :name,
        email = :email,
        telephone = :telephone,
        addressL1 = :addressL1,
        addressL2 = :addressL2
        WHERE addressId = :addressId');
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':addressL1', $this->addressL1);
        $statement->bindParam(':addressL2', $this->addressL2);
        $statement->bindParam(':addressId', $this->addressId);
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
<?php

    $id = $_GET['id'] ?? '';       
    $Ausleihe = Ausleihe::getByID($id);
    require 'app/Views/ausleihebearbeiten.view.php';
?>
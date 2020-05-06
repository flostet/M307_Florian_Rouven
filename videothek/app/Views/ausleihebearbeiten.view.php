<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Vidicted FilmAusleihe</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
<h2 class="firma">Vidicted</h3>
<h1 class="welcome">Ausleihe bearbeiten</h1>
<?php
 $actionString = "bearbeiteAusleihe?id=" . $ausleiehn->id . ""
?> 

<form action="<?= $actionString ?>" method="post">
    <br>
    <label for="inputName">Name:</label>
    <input name="inputName" type="text" value='<?= $Ausleihe->name ?>'>
    <br>
    <br>
    <label for="inputEmail">Email:</label>
    <input name="inputEmail" type="email" value='<?= $Ausleihe->email ?>'>
    <br><br>
    <label for="inputTelefon">Telefon:</label>
    <input name="inputTelefon" type="number" value='<?= $Ausleihe->telefon ?>'>
    <br><br>
    <label for="inputAusgeleihtesVideo">Ausgelehnter Film:</label>
    <select name="inputAusgeleihtesVideo">
        <option value='<?= $Ausleihe->filmname ?>'><?= $Ausleihe->filmname ?></option>
        <?php
            $statement = db()->prepare('SELECT title FROM movies');
            $statement->execute();

            $result = $statement->fetchAll();
            foreach ($result as $movie)
            {  
                echo "<option value='" . $movie["title"] . "'>" . $movie["title"] . "</option>";
            }
        ?>
    </select>
    <br><br>
    <label for="inputErledigt">Erledigt:</label>
    <select name="inputErledigt">
        <option value='0'>nicht erledigt</option>
        <option value='1'>erledigt</option>
    </select>
    <br><br>
    <div class="left-btn">        
        <input class="btn" type="submit" value="Speichern"/>
    </div>
    <div class="right-btn">
    <a href="uebersicht"> Abbrechen </a>
    </div>
    <br>
    <br>
</form>



</body>
</html>
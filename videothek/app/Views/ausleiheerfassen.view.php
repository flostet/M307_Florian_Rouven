<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausleihe erfassen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/form.css" rel="stylesheet">
    <link href="public/css/app.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">

<div class="topnav"> 
    <a  href="home">Home</a> 
    <a class="active" href="erfassen">Ausleihe Erfassen</a> 
    <a href="liste">Ausleihe Liste</a> 
</div>

    <h4 class="fontcolor">Neue Ausleihe erfassen</h4>
    <form action="erfassen" method="post">
        <div class="form-group">
            <label class="form-label" for="vorname">Vorname*: </label>
            <input class="form-control" type="text" name="vorname" id="vorname" required>

            <label class="form-label" for="nachname">Nachname*: </label>
            <input class="form-control" type="text" name="nachname" id="nachname" required>

            <label class="form-label" for="email">Email*: </label>
            <input class="form-control" type="email" name="email" id="email" required>

            <label class="form-label" for="telefon">Telefon: </label>
            <input class="form-control" type="text" name="telefon" id="telefon">

            <label class="form-label" for="film">Film*: </label>
            <input class="form-control" type="text" name="film" id="film" required>

            <label class="form-label" for="mitgliederstatus">Mitgliederstatus*: </label> <br>
            <select class="field-select" name="mitgliederstatus" id="mitgliederstatus">
                <option selected="mitgliederstatus" id="mitgliederstatus">Wähle einen Status aus</option>
                <?php

                $status = array("keine", "Bronze", "Silber", "Gold");

                foreach($status as $item)
                { ?>
                    <option value="<?= $item ?>"><?=$item?></option>
                <?php } ?> 
            </select>
            <br>
            
        </div>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Ausleihen">
            <input class="btn btn-secondary" type="reset" value="Abbrechen">
        </div>
    </form>

</div>
</body>
</html>
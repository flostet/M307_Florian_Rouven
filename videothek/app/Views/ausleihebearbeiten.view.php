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

<div class="topnav">
  <a  href="home">Home</a>
  <a href="erfassen">Ausleihe Erfassen</a>
  <a href="liste">Ausleihe Liste</a>
</div>

<div class="wrapper">
    <h1 class="fontcolor">Ausleihe bearbeiten</h1>
    <form action="erfolgreich?id=<?=$ausleihe['id']?>" method="post">
        <div class="form-group">
            <label class="form-label" for="vorname">Vorname: </label>
            <input class="form-control" type="text" name="vorname" id="vorname" value="<?=$ausleihe['vorname'] ?? '' ?>">

            <label class="form-label" for="nachname">Nachname: </label>
            <input class="form-control" type="text" name="nachname" id="nachname" value="<?=$ausleihe['nachname'] ?? '' ?>">

            <label class="form-label" for="email">Email: </label>
            <input class="form-control" type="email" name="email" id="email" value="<?=$ausleihe['email'] ?? '' ?>">

            <label class="form-label" for="telefon">Telefon: </label>
            <input class="form-control" type="text" name="telefon" id="telefon" value="<?=$ausleihe['telefon'] ?? '' ?>">

            <label class="form-label" for="film">Film: </label>
            <input class="form-control" type="text" name="film" id="film" value="<?=$ausleihe['FK_film_id']?>">

            <label class="form-label" for="mitgliederstatus">Mitgliederstatus: </label>
            <input class="form-control" type="text" name="mitgliederstatus" id="mitgliederstatus" value="<?=$ausleihe['mitgliedStatus'] ?? '' ?>" readonly>

            <label class="form-label" for="ausleihstatus">Ausleihstatus (0 = Ausgeliehen und 1 = Zurückgegeben):</label>
            <input class="form-control" type="text" name="ausleihStatus" id="ausleihStatus" value="<?=$ausleihe['ausleihStatus'] ?? '' ?>">
        </div>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Ausleihen">
            <input class="btn btn-secondary" type="cancel" value="Abbrechen">
        </div>
    </form>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausleihe erfassen</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/form.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">

<div class="topnav"> 
    <a  href="home">Home</a> 
    <a class="active" href="ausleiheerfassen">Ausleihe Erfassen</a> 
    <a href="ausleihen">Ausleihe Liste</a> 
</div>

    <h4>Neue Ausleihe erfassen</h4>
    <form action="erfassen" method="post">
        <div class="form-group">
            <label class="form-label" for="vorname">Vorname: </label>
            <input class="form-control" type="text" name="vorname" id="vorname">

            <label class="form-label" for="nachname">Nachname: </label>
            <input class="form-control" type="text" name="nachname" id="nachname">

            <label class="form-label" for="email">Email: </label>
            <input class="form-control" type="email" name="email" id="email">

            <label class="form-label" for="telefon">Telefon: </label>
            <input class="form-control" type="text" name="telefon" id="telefon">

            <label class="form-label" for="film">Film: </label>
            <input class="form-control" type="text" name="film" id="film">

            <!-- Dieses Feld mit einem Dropdown Menu machen -->
            <label class="form-label" for="mitgliederstatus">Mitgliederstatus: </label>
            <input class="form-control" type="text" name="mitgliederstatus" id="mitgliederstatus">
        </div>

        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Ausleihen">
            <input class="btn btn-secondary" type="cancel" value="Abbrechen">
        </div>
    </form>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href='public/css/app.css' rel="stylesheet" >
</head>
<body>

<div class="topnav"> 
<a class="active" href="home">Home</a> 
    <a href="ausleiheerfassen">Ausleihe Erfassen</a> 
    <a href="ausleihen">Ausleihe Liste</a> 
    </div>

<h1>Ausleihe erfassen</h1>

<p>Bitte Ausleihe erfassen</p>

<?php if(count($errors) > 0): ?>
    <ul class="alert alert-block">
        <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if($newEntry): ?>
    <div class="alert alert-success">
        <strong>Danke!</strong> Für Eintrag. OK, hat klappt!
    </div>
<?php endif; ?>

<form action="index.php?page=ausleiheerfassenController.php" method="post">
    <div class="control-group">
        <label class="control-label" for="vorname">Vorname:</label>
        <input value="<?= $vorname ?>" name="vorname" type="text" class="input-xlarge" id="vorname">
    </div>
    <div class="control-group">
        <label class="control-label" for="nachname">Nachname:</label>
        <input value="<?= $nachname ?>" name="nachname" type="text" class="input-xlarge" id="nachname">
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email:</label>
        <textarea name="email" class="input-xlarge" id="email"><?= $email ?></textarea>
    </div>
    <div class="control-group">
        <label class="control-label" for="ausgelehntes video">Ausgelehntes Video:</label>
        <input value="<?= $name ?>" name="ausgelehntes video" type="text" class="input-xlarge" id="ausgelehntes video">
    </div>
    <div class="control-group">
        <label class="control-label" for="telefon">Telefon:</label>
        <input value="<?= $name ?>" name="telefon" type="text" class="input-xlarge" id="telefon">
    </div>
    <div class="control-group">
        <label class="control-label" for="mitgliederstatus">Mitgliederstatus:</label>
        <input value="<?= $name ?>" name="mitgliederstatus" type="text" class="input-xlarge" id="mitgliederstatus">
    </div>
    
    <div class="control-group">
        <button type="submit" class="btn btn-primary">Ausleihen</button>
    </div>
    <div class="control-group">
        <button type="cancel" class="btn btn-primary">Abbrechen</button>
    </div>
</form>
<hr>
<div class="ausleiheerfassen">
    <?php foreach($ausleiheerfassenEntries as $entry): ?>
    <div class="ausleiheerfassen__entry">
        <h4><?= $entry['vorname'] ?></h4>
        <h4><?= $entry['nachname'] ?></h4>
        <h4><?= $entry['email'] ?></h4>
        <h4><?= $entry['ausgelehntes video'] ?></h4>
        <h4><?= $entry['telefon'] ?></h4>
        <h4><?= $entry['mitgliederstatus'] ?></h4>
        <hr>
    </div>
    <?php endforeach; ?>
</div>


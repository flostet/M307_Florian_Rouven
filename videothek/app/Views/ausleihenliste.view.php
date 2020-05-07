<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausleih Liste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/form.css" rel="stylesheet">
    <link href="public/css/app.css" rel="stylesheet">
</head>
<body>

<div class="topnav">
  <a  href="home">Home</a>
  <a href="erfassen">Ausleihe Erfassen</a>
  <a class="active" href="liste">Ausleihe Liste</a>
</div>

<div class="wrapper">
    <h1 class="fontcolor">Ausgeliehene Filme</h1>
    <ul>
        <?php foreach ($Ausleihe as $ausleihe): ?>
            <li class="fontcolor">
            <a href="bearbeiten?id=<?= htmlspecialchars($ausleihe['id']) ?> " ><?= $ausleihe['vorname'] ?> <?= $ausleihe['nachname'] ?> - <?php $filmName = $Filme->getById($ausleihe['FK_film_id']); foreach($filmName as $filme) {echo $filme[1];};; ?> - <?= $ausleihe['ausleihdatum'] ?> <?php if($ausleihe['ausleihdatum'] < date('Y-m-d')){echo ' 😠';}else{echo ' 😁';}?> </a>
            </li>
            <?php endforeach ?>
    </ul>
</div>

</body>
</html>
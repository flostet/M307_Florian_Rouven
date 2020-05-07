<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausleih Liste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/form.css" rel="stylesheet">
</head>
<body>

<div class="topnav">
  <a class="active" href="home">Home</a>
  <a href="ausleiheerfassen">Ausleihe Erfassen</a>
  <a href="ausleihen">Ausleihe Liste</a>
</div>

<div class="wrapper">
    <h1 class="form-title">Ausgeliehene Filme</h1>
    <ul>
        <?php foreach ($Ausleihe as $ausleihe): ?>
            <li>
            <a href="bearbeiten?id=<?= htmlspecialchars($ausleihe['id']) ?> " ><?= $ausleihe['vorname'] ?> <?= $ausleihe['nachname'] ?> - <?php $filmName = $Filme->getById($ausleihe['FK_film_id']); foreach($filmName as $filme) {echo $filme[1];};; ?> - <?= $ausleihe['ausleihdatum'] ?> </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
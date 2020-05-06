<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Ausleih Liste</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    <h4>Ausgelihene Filme</h4>
    <ul>
        <?php foreach ($Ausleihe as $ausleihe): ?>
            <li>
                <?= $ausleihe['vorname'] ?> <?= $ausleihe['nachname'] ?> - <?php $filmName = $Filme->getById($ausleihe['FK_film_id']); echo implode(', ', $filmName);; ?> - <?= $ausleihe['ausleihdatum'] ?>
            </li>
        <?php endforeach; ?>
    </ul>



</div>

</body>
</html>
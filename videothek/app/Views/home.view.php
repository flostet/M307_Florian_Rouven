<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href='public/css/app.css' rel="stylesheet">
</head>
<body class="body1">

<div class="topnav">
  <a class="active" href="home">Home</a>
  <a href="erfassen">Ausleihe Erfassen</a>
  <a href="liste">Ausleihe Liste</a>
</div>



<div>
        <div id="container" class="container">
            <div>
                <h2>
                Gesamt Anzahl Videos
                </h2>
                <p class="counter">
                <?= count($countFilme); ?>
                </p>
            </div>

            <div>
                <h2>
                    Ausgeliehene Videos
                </h2>
                <p class="counter">
                <?= count($countAusleihen); ?>
                </p>
            </div>

        </div>
    </div>

<script src="public/js/app.js"></script>
</body>
</html>
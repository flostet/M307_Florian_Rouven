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



<div>
        <div id="container" class="container">
            <div>
                <h2>
                Gesamt Anzahl Videos
                </h2>
                <p class="counter">
                <?=$countRecords ?>
                </p>
            </div>

            <div>
                <h2>
                    Ausgeliehene Videos
                </h2>
                <p class="counter">
                    20
                </p>
            </div>

            <div>
                <h2>
                    Verfügbare Videos
                </h2>
                <p class="counter">
                    10
                </p>
            </div>

        </div>
    </div>

<script src="public/js/app.js"></script>
</body>
</html>
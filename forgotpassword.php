<html>

<head>
    <title>Passwort zurücksetzen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
</head>

<body>
    <div id="Login" class="d-flex justify-content-center">
        <div class="row myborder">
            <div class="col">
                <div class="row">
                    <div class="col">
                        Bitte geben Sie ihren Benutzernamen ein.<br>Sie erhalten daraufhin einen Link per E-Mail,<br>mit
                        dem
                        Sie ihr Passwort zurücksetzen können.
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        Benutzername:
                    </div>
                    <div class="col">
                        <input type="text" required>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <a href="index.php">zurück</a>
                    </div>
                    <div class="col-8">
                        <button class="float-right">
                            Passwort zurücksetzen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
?>

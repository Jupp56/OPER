<html>

<head>
    <meta charset="utf-8">
    <title>OPER-Admin Panel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="adminpanel.css">
    <script lang="javascript" type="text/javascript" src="adminpanel.js"></script>

</head>

<body>
    <div id="userdata">
        <div class="row">
            <div class="col-auto myborder">
                Benutzer: Nutzername<br>
                <button class="mt-1 float-right">Abmelden</button>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row flex-xl-nowrap ml-5 mr-5">
            <main class="col-12" role="main">
                <div class="table-responsive">
                    <table id="usertable" class="table table-striped table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Mailadresse</th>
                            <th>Sonstiges</th>
                        </thead>
                        <tbody id="tablebody">
                            <tr>
                                <td>Lade Daten... <img class="loadingspinner" src="Images/loading-spinner.gif" alt="loading spinner"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>

        </div>
    </div>

    <div id="overlaystuff" class="overlay">
        <form action="updateuser.php" method="post">
            <div class="overlay-content">
                <div class="row">
                    <div class="col">
                        <h2>Details</h2>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class=" float-left">Name:</div>
                    </div>
                    <div class="col"><input id="Name-Single" class="float-right" type="text" name="Username"></div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class=" float-left">Mail:</div>
                    </div>
                    <div class="col"><input id="Mail-Single" class="float-right" type="text" name="E-Mail"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <button class="float-left button-alt" type="button" onclick="closeoverlay();">
                            Abbrechen
                        </button>
                    </div>
                    <div class="col">
                        <button class="button-warn" type="button" onclick="deleteaccount()">
                            Löschen
                        </button>
                    </div>
                    <div class="col">
                        <button class="float-right" type="submit" onclick="closeoverlay()">
                            Ändern
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div id="deletewindow" class="overlay">
        <div class="overlay-content">
            <div class="row">
                <div class="col">Diesen Account wirklich löschen?</div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button class="float-left button-alt" type="button" onclick="deleteaccountdeny();">
                        Abbrechen
                    </button>
                </div>
                <div class="col">
                    <button class="float-right button-warn" type="button" onclick="deleteaccountconfirm()">
                        Löschen
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
<?php
require_once('adminauth.php');
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>OPER-Admin Panel</title>

    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <script lang="javascript" type="text/javascript" src="global.js"></script>
    <script lang="javascript" type="text/javascript" src="participants.js"></script>

</head>

<body>
    <div id="container">
        <?php
        include 'userdata.php';
        ?>

        <div id="addparticipant" class="row ml-5 mt-4 mr-5">
            <div class="col"><a href="adminpanel.php"><button class="button-alt">Benutzerverwaltung</button></a></div>
            <div class="col"><button class="float-right" onclick="showcreateparticipant()">Neuer Teilnehmer</button></div>
        </div>

        <div id="accountlist" class="container-fluid mt-5">
            <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
                <main class="col-12" role="main">
                    <div class="table-responsive">
                        <table id="participanttable" class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Vorname</th>
                                <th>Nachname</th>
                                <th>BenutzerID</th>
                                <th>Geburtsdatum</th>
                                <th>Kursergebnisse</th>
                                <th>Löschen</th>
                            </thead>
                            <tbody id="participanttablebody">
                                <tr>
                                    <td>Lade Daten... <img class="loadingspinner" src="Images/loading-spinner.gif" alt="loading spinner"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>

            </div>
        </div>

        <div id="singleaccount" class="overlay">
            <form action="updateparticipant.php" method="post" target="wastebin">
                <div class="overlay-content">
                    <div class="row">
                        <div class="col">
                            <h2>Details</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class=" float-left">Vorname:</div>
                        </div>
                        <div class="col"><input id="FirstName-Single" class="float-right" type="text" name="FirstName"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class=" float-left">Nachname:</div>
                        </div>
                        <div class="col"><input id="LastName-Single" class="float-right" type="text" name="LastName"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class=" float-left">Geburtsdatum:</div>
                        </div>
                        <div class="col"><input id="DateOfBirth-Single" class="float-right" type="date" value="2000-01-01" name="DateOfBirth"></div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button class="float-left button-alt" type="button" onclick="hidesingleparticipant();">
                                Abbrechen
                            </button>
                        </div>
                        <div class="col">
                            <button class="button-warn" type="button" onclick="deleteparticipant()">
                                Löschen
                            </button>
                        </div>
                        <div class="col">
                            <button class="float-right" type="submit" onclick="hidesingleparticipant()">
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
                    <div class="col">
                        <h2>Teilnehmer löschen</h2>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">Diese/n Teilnehmer*in - und <strong> alle seine/ihre Daten </strong> wirklich löschen?</div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <button class="float-left button-alt" type="button" onclick="deleteparticipantdeny();">
                            Abbrechen
                        </button>
                    </div>
                    <div class="col">
                        <button class="float-right button-warn" type="button" onclick="deleteparticipantconfirm()">
                            Löschen
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="createparticipantwindow" class="overlay">
            <form id="createparticipantform" action="addparticipant.php" method="post">
                <div class="overlay-content">
                    <div class="row">
                        <div class="col">
                            <h2>Neue/n Teilnehmer/in anlegen</h2>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <button class="float-right button-alt" type="button" onclick="resetcreateparticipant()">
                                Zurücksetzen
                            </button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <div class=" float-left">Vorname:</div>
                        </div>
                        <div class="col"><input id="FirstName-Create" class="float-right" type="text" name="FirstName"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class=" float-left">Nachname:</div>
                        </div>
                        <div class="col"><input id="LastName-Create" class="float-right" type="text" name="LastName"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <div class=" float-left">Geburtsdatum:</div>
                        </div>
                        <div class="col"><input id="DateOfBirth-Create" class="float-right" type="date" value="2000-01-01" name="DateOfBirth"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button class="float-left button-alt" type="button" onclick="hidecreateparticipant();">
                                Abbrechen
                            </button>
                        </div>
                        <div class="col">
                            <button class="float-right" type="button" onclick="sendcreateparticipant()">
                                Erstellen
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <iframe name="wastebin" width="50" height="50" style="display: none;"></iframe>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>
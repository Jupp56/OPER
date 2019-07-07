<?php
require_once('auth.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <title>OPER</title>
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
    <link rel="stylesheet" href="bootstrap40min.css">
    <link rel="stylesheet" href="styles.css">
    <script lang="javascript" type="text/javascript" src="global.js"></script>
    <script lang="javascript" type="text/javascript" src="main.js"></script>

</head>

<body>
    <div id="container">
        <?php
        include 'userdata.php';
        ?>

        <div id="addbutton" class="row mt-5 mr-5">
            <div class="col">
                <button class="float-right" onclick="newcourse();">Neuer Kurs</button>
            </div>
        </div>

        <div id="coursecreateoverlay" class="overlay">
            <div class="overlay-content">
                <form class="mb-0 pb-0" action="addcourse.php">
                    <div class="row">
                        <div class="col">
                            <h2>Neuen Kurs anlegen</h2>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">Name des Kurses:</div>
                        <div class="col"><input class="float-right" type="text" name="CourseName"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col"><button class="float-left button-alt" type="button" onclick="hidecourseoverlay()">Abbrechen</button></div>
                        <div class="col"><button class="float-right" type="submit" onclick="hidecourseoverlay()">Hinzufügen</button></div>
                    </div>
                </form>
            </div>
        </div>

        <div id="deletecourseoverlay" class="overlay">
            <div class="overlay-content">
                <form action="deletecourse.php">
                    <div class="row">
                        <div class="col">
                            <h2>Kurs löschen</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Kurs <strong> und alle Ergebnisse </strong> wirklich endgültig löschen
                        </div>
                    </div>
                    <input id="deletecoursecourseid" class="hidden" readonly>
                    <div class="row mt-4 mb-0 pb-0">
                        <div class="col"><button id="deletecourseabort" class="float-left button-alt" type="button" onclick="hidedeletecourseoverlay()">Abbrechen</button></div>
                        <div class="col"><button id="deletecourseconfirm" class="float-right button-warn" type="submit">Kurs löschen</button></div>
                    </div>
                </form>
            </div>
        </div>

        <div id="accountlist" class="container-fluid mt-3">

            <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
                <main class="col-12" role="main">
                    <div class="table-responsive">
                        <table id="usertable" class="table table-striped table-hover">
                            <thead>
                                <th>Kurs</th>
                                <th>Teilnehmerzahl</th>
                                <th>Entfernen</th>
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
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
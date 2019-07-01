<html>

<head>
    <meta charset="utf-8">
    <title>OPER</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script lang="javascript" type="text/javascript" src="course.js"></script>

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

    <div id="buttons" class="row ml-5 mt-5 mr-5">
        <div class="col"><button class="float-left" onclick="back()">Zurück</button><button class="ml-2 float-left" onclick="save()">Sichern</button></div>
        <div class="col"><button class="float-right" onclick="showaddparticipant()">Teilnehmer hinzufügen</button></div>
    </div>

    <div id="accountlist" class="container-fluid mt-5">

        <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
            <main class="col-12" role="main">
                <div class="table-responsive">
                    <table id="usertable" class="table table-striped table-hover">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Note</th>
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

    <div id="addparticipantoverlay" class="overlay">
        <div class="overlay-content">
            <form action="addparticipant.php">
                <div class="row">
                    <div class="col">
                        <h2>Teilnehmer hinzufügen</h2>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="float-left">Name:</div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <input id="participantsearchbox" name="UserId" type="text" oninput="search()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table id="searchresulttable" class="float-right searchresults">
                                    <tbody id="searchresults"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col"><button class="float-left button-alt" type="button" onclick="hideaddparticipant()">Abbrechen</button></div>
                    <div class="col"><button class="float-right" type="submit" onclick="addparticipant()">Hinzufügen</button></div>
                </div>
            </form>
        </div>
    </div>

    

    <?php
    include 'footer.php';
    ?>
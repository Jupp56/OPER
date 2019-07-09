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
    <script lang="javascript" type="text/javascript" src="participantresults.js"></script>

</head>

<body>
    <div id="container">

        <?php
        include 'userdata.php';
        ?>

        <div class="row ml-5 mt-2">
            <div class="col"><a href="adminpanel.php"><button class="button-alt">Benutzerverwaltung</button></a></div>
        </div>

        <div id="buttons" class="row ml-5 mt-5 mr-5">
            <div class="col"><button class="float-left" onclick="back()">Zurück</button>
            </div>
        </div>
        <div id="accountlist" class="container-fluid mt-5">
            <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
                <main class="col-12" role="main">
                    <div class="table-responsive">
                        <table id="participanttable" class="table table-striped table-hover">
                            <thead>
                                <th>#</th>
                                <th>Kurs</th>
                                <th>Note</th>
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
    </div>

    <?php
    include 'footer.php';
    ?>
</body>

</html>
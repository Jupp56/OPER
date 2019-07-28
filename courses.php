<?php
require_once('auth.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <title>OPER</title>
    <link rel="icon" type="image/svg+xml" href="images/DLRG_Logo.svg" sizes="any">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script lang="javascript" type="text/javascript" src="global.js"></script>
    <script lang="javascript" type="text/javascript" src="courses.js"></script>

</head>

<body>
    <div id="container">
        <?php
        include 'userdata.php';
        ?>

        <div id="addaccount" class="row ml-5 mt-4 mr-5">
            <div class="col"><a href="adminpanel.php"><button class="button-alt">Benutzerverwaltung</button></a></div>
            <div class="col"><a href="participants.php"><button class="button-alt">Teilnehmerverwaltung</button></a></div>
            <div class="col"><a href="courses.php"><button class="button">Kursverwaltung</button></a></div>
            <div class="col"><div class="float-right"></div></div>
        </div>
        <div id="courselist" class="container-fluid mt-3">

            <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
                <main class="col-12" role="main">
                    <div class="table-responsive">
                        <table id="coursetable" class="table table-striped table-hover">
                            <thead>
                                <th>Kurs</th>
                                <th>KursID</th>
                            </thead>
                            <tbody id="coursetablebody">
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
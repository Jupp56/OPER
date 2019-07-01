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

    <div id="accountlist" class="container-fluid mt-5">

        <div class="row flex-xl-nowrap ml-5 mt-2 mr-5">
            <main class="col-12" role="main">
                <div class="table-responsive">
                    <table id="usertable" class="table table-striped table-hover">
                        <thead>
                            <th>Kurs</th>
                            <th>Teilnehmerzahl</th>
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

    <?php
    include 'footer.php';
    ?>
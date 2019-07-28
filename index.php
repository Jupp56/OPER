<html>

<head>
    <title>OPER-Login</title>
    <link rel="icon" type="image/svg+xml" href="images/DLRG_Logo.svg" sizes="any">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script lang="javascript" type="text/javascript" src="global.js"></script>
    <meta charset="utf-8">

    <!--<script lang="javascript">
        var msg = '<?php print($_GET['
        message ']); ?>';
        if (msg) alert(msg);
    </script>-->

</head>

<body>
    <div id="container">
        <form action="login.php" method="post">

            <div id="Login" class="d-flex justify-content-center align-items-center">
                <div class="row myborder">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <img height="150px" width="170px" src="Images/DLRG_Logo.svg">
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="mt-4">OPER</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <small>
                                            <strong>O</strong>nlineverwaltung der<br>
                                            <strong>P</strong>rüfungs<strong>E</strong>rgebnisse<br>
                                            im <strong>R</strong>ettungsdienst
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                Bitte melden Sie sich an:
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                Benutzername:
                            </div>
                            <div class="col">
                                <input name="Username" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                Passwort:
                            </div>
                            <div class="col">
                                <input name="Password" type="password" required>
                            </div>
                        </div>

                        <div class="row  mt-3">
                            <div class="col">
                                <a href="forgotpassword.php">Passwort vergessen</a>
                            </div>
                            <div class="col ">

                                <button class="float-right" type="submit">
                                    Login
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>
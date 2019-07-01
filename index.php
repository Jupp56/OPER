<html>

<head>
    <title>OPER-Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">

    <script lang="javascript">
    </script>

</head>

<body>
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
                                    Onlineverwaltung der<br>
                                    PrüfungsErgebnisse<br>
                                    im Rettungsdienst
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
                            <input name="Username">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            Passwort:
                        </div>
                        <div class="col">
                            <input name="Password" type="password">
                        </div>
                    </div>

                    <div class="row  mt-3">
                        <div class="col">
                            <a href="forgotpassword.html">Passwort vergessen</a>
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
     
<?php
    include 'footer.php';
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="/capstone/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <title>Used Cars of New England Tech</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/htdocs/capstone/assets/customerSavedCars.php">Used Cars of New England Tech</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="customerInventory.php">Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/customerSavedCars.php">Saved Cars</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/customerAppointments.php">Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/htdocs/capstone/assets/customerMyAccount.php">My Account</a>
            </li>
        </ul>
        <div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">Logged in as:
                    <?php
                        include_once ("functions.php"); include_once ("dbconnect.php");
                        session_start();
                        $id = $_SESSION['username'];
                        //echo $id;
                        $db = dbconnect();
                        $name = findUsername($db, $id);
                        echo $name['customer_fname'] . " <a href='/htdocs/capstone/assets/LogIn.php'>Log Out</a>";?>
                    <!--<a class="nav-link" href="/htdocs/capstone/assets/LogIn.php">Log Out</a> <!--- LOG OUT JUST RETURNING TO INDEX ATM !-->
                </li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <div class="container body-content" style="margin-top:90px">
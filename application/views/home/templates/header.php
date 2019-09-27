<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo $title; ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: white;" data-spy="scroll" data-offset="4" data-target=".navbar">
    <div id = "container">
        <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: black;">
        
            <a class="navbar-brand" href="http://localhost/VRS/index.php/homepage">
            Home
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">  
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link" href="http://localhost/VRS/index.php/login">
                            Login
                        </a>
                    </li>


                    <li class="nav-item">
                        <font color="black">~~~</font>
                    </li>

                    <li class="nav-item" style="font-size: 20px; font-weight: bolder;">
                        <a class="nav-link">
                            <?php
                                date_default_timezone_set('America/New_York');
                                
                                print date('l, F j');
                            ?>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
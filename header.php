<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Notes website</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;900&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>
    <script src="https://kit.fontawesome.com/14b6062f0b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class=title-area>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg" stlye="background-color:#293462;">
            <a class="navbar-brand" href="index.php">Notify</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="notes.php">Notes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php
                if(isset($_SESSION["userUID"]))
                {
                  echo"<li class='nav-item'><a class='nav-link' href='upload.php''>Upload</a></li>";
                  echo"<li class='nav-item'><a class='nav-link' href='profile.php'>Profile</a></li>";
                  echo"<li class='nav-item'><a class='nav-link' href='Logout.php'>Logout</a></li>";

                }
                else
                {
                  echo"<li class='nav-item'><a class='nav-link' href='register.php'>Register</a></li>";
                  echo"<li class='nav-item'><a class='nav-link' href='login.php'>Log In</a></li>";
                }
                ?>
              </ul>
            </div>
        </nav>

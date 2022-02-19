<?php
session_start();
echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">


</head>

<body>
    <header>
        <nav>
            <h2>ENIGMA</h2>
            <ul class="nav-links">
                <li><a href="movies.php">Movies</a></li>
                <li><a href="#">Our Story</a></li>
                <li><a href="form.php">Sign-Up</a></li>
                <li><a href="#">Contact-Us</a></li>
            </ul>
        </nav>
    </header>
    <div class="hero">
        <div class="main-text">
            <div class="">
                <h1>THINK MOVIE</h1>
            </div>
            <div class="">
                <h1>THINK ENIGMA</h1>
            </div>
            <button class="button" type="button" name="button">Browse Now</button>

        </div>



</body>

</html>
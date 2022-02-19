<?php
session_start();
// echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href=".//css/movies.css">
    <title>Movies</title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">ENIGMA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="story.php">Our Story</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="movies.php">Movies</a>
                    </li>
                    <?php
        if(isset($_SESSION['email'])){
        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="booking.php">My Bookings</a>
                            <a class="dropdown-item" href="account_info.php">Account Info</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="?logout=1">Logout</a>
                        </div>
                    </li>
                    <?php 
        }
        else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="form.php">Login</a>
                    </li>
                    <?php
        }
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>

            </div>
        </nav>
        <?php
if(isset($_GET['logout'])){
    session_unset();
    header('location: index.php'); 

}
?>
    </header>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "conn.php";
            $q="SELECT * FROM movie";
            $query=mysqli_query($con,$q);
            if(mysqli_num_rows($query) > 0){
                while($res=mysqli_fetch_array($query)){
                    
                
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <img src="<?php echo $res['Image']?>" width="100%" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $res['Name']?></h5>
                        <p class="card-text"><?php echo $res['Description']?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $res['Language']?></li>
                        <li class="list-group-item"><?php echo $res['Date']?></li>
                        <li class="list-group-item"><?php echo $res['Time']?></li>
                        <li class="list-group-item"> Rs. <?php echo $res['Price']?></li>
                        <li class="list-group-item">Seats Available : <?php echo $res['Seats_available']?></li>
                    </ul>
                    <div class="card-body">
                        <!-- TO prevent booking if no seats are available -->
                        <?php 
                        if(isset($_SESSION['id'])){
                        if($res['Seats_available']==0){
                            echo "<a href='#' class='btn btn-primary btn-block disabled' >Book now</a>";

                        }
                        else{
                            echo "<a href='movie.php?id="; ?> <?php echo $res['Movie_id'];?><?php echo " ' class='btn btn-primary btn-block'  >Book now</a>";


                        }
                        }
                        else{
                            echo "<a href='form.php' class='btn btn-primary btn-block' >Login</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php
            } }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

</body>

</html>
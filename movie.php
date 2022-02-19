<?php
session_start();
include "conn.php";
$movieId=$_GET['id'];
$q="SELECT * FROM movie WHERE Movie_id='$movieId'";
$query=mysqli_query($con,$q);
if(mysqli_num_rows($query) == 1){
    while($res=mysqli_fetch_array($query)){
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title><?php echo $res['Name'];?></title>
</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./index.php">ENIGMA</a>
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
                    <li class="nav-item">
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
                            <a class="dropdown-item" href="./account_info.php">Account Info</a>
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
        <h1><?php echo $res['Name'];?></h1>
        <p><?php echo $res['Description']?></p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo $res['Language']?></li>
            <li class="list-group-item"><?php echo $res['Date']?></li>
            <li class="list-group-item"><?php echo $res['Time']?></li>
            <li class="list-group-item"> Rs. <?php echo $res['Price']?></li>
            <li class="list-group-item">Seats Available : <?php echo $res['Seats_available']?></li>
        </ul>
        <form method='POST'>
            <div class="form-group">
                <label for="numberOfSeats">Number of Seats:</label>
                <input type="text" class="form-control" name="count" id="numberOfSeats" aria-describedby="emailHelp">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

<?php
$movieId= $res['Movie_id'];
if(isset($_POST['submit'])){
    $count=$_POST['count'];
    if($count> $res['Seats_available']){
        echo "<script>alert('Only"; ?> <?php echo $res['Seats_available'] ?> <?php echo "Seats are available')</script>";
    }
    else{
        $customerId=$_SESSION['id'];
        //Insert into booking table using the session username
        $a="INSERT INTO booking(Customer_id,Movie_id,Count) 
        VALUES ('$customerId','$movieId','$count');";
        $r=mysqli_query($con,$a);

        $b="UPDATE movie 
        SET Seats_available=Seats_available - '$count' WHERE Movie_id='$movieId'";
        $c=mysqli_query($con,$b);


        // Redirect to My Bookings page
        // header("location:booking.php");
        echo "<script>alert('Booking successful');</script>";

    }
}
?>

</html>
<?php
    }
 }
?>
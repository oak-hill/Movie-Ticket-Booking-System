<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".//css/ourstory.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
                    <li class="nav-item active">
                        <a class="nav-link" href="story.php">Our Story</a>
                    </li>
                    <li class="nav-item ">
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
        <div class="container">
            <h1>SERVING HAPPINESS!</h1>
            <p> As a flagship venture of the USD 3 Bn INOX Group, INOX Leisure Ltd has always worked upon improvising
                the
                experiences, right from creating a world class infrastructure which is high on comfort and aesthetics,
                to
                staying updated with the latest in the cinema technology space. Ever since commencing operations in year
                2002, INOX has already entertained more than 500 Mn guests in its glorious journey. With 626 perfectly
                appointed screens in 147 multiplexes across the country, INOX continues to get closer to the Indian
                cinema
                lovers, and also remain on a growth path which is envied across the globe.

            </p>
            <p>
                INOX has pioneered plenty of ‘firsts’ in the Indian cinema exhibition industry. INOX operates Megaplex
                at
                the Inorbit Mall Malad, Mumbai, a multiplex with highest number of cinema viewing experiences in the
                world,
                which is also home to India’s first ScreenX as well as India’s first screen with MX4D® Theater Effects.
                INOX
                was the 1st cinema chain in the country to operate a Laserplex, a multiplex with all the screens enabled
                with Laser Projection. With the grand & immersive IMAX screens already a part of its repertoire, INOX
                also
                has to its credit, Mumbai’s first Samsung ONYX LED screen at the Megaplex. INOX’s 7-star cinema viewing
                experience, INSIGNIA, has emerged as top luxury proposition in the country. INOX’s desire to offer
                tailor-made experiences to its patrons led to the creation of home-grown formats like the vibrant and
                lively
                KIDDLES for the young audience, the smart luxury experience CLUB for the discerning guests and BIGPIX a
                premium giant screen cinema format.
            </p>
            <p>
                Driven by the vision of being the most loved cinema brand across the globe, thousands of INOX’s
                happiness
                agents working in 68 Indian cities are always on their toes, with open arms, accomplished to bring
                emotions
                to life, and win hearts, every single day!
            </p>
            <img src="images/Ourstory.jpg" alt="">
        </div>
</body>

</html>
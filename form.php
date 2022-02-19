<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" href="css/form.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->


</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="POST">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" autocomplete="off" />
                <span>Name should be a minimum of 3 words</span>
                <input type="email" name="email" placeholder="Email" autocomplete="off" />
                <span>Email is invalid</span>
                <input type="password" name="password" placeholder="Password" autocomplete="off" />
                <span>Must be 8-12 char long</span>
                <input type="text" name="mobile" placeholder="Mobile No." maxlength="10" autocomplete="off">
                <span>Should contain 10 digits</span>
                <button type="submit" name="signUp">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="email" name="emailSign" placeholder="Email" autocomplete="off" />
                <span>Email is invalid</span>
                <input type="password" name="passwordSign" placeholder="Password" />
                <span>Must be 8-12 char long</span>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="signIn">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/form.js"></script>
    <script src="js/form_validation.js"></script>
    <?php
    include 'conn.php';

    //  Sign In (Registered User)
    if(isset($_POST['signIn'])){
        $emailSign=$_POST['emailSign'];
        $passwordSign=$_POST['passwordSign'];
        if(empty($emailSign) and empty($passwordSign)){
            echo "<script>alert('Email and Password cannot be empty');</script>";
        }
        else if(empty($emailSign)){
            echo "<script>alert('Email cannot be empty');</script>";
        }
        else if(empty($passwordSign)){
            echo "<script>alert('Password cannot be empty');</script>";
        }
        else{
            $query="SELECT * FROM customer WHERE Email= '$emailSign' AND Password= '$passwordSign' ";
            $result=mysqli_query($con,$query);

            if (mysqli_num_rows($result) == 1) { 

                //Finding Customer_id
                $q="SELECT * FROM customer WHERE Email= '$emailSign' AND Password= '$passwordSign' ";
                $r=mysqli_query($con,$q);
                $f=mysqli_fetch_all($r,MYSQLI_ASSOC)[0];

                // Storing username in session variable 
                $_SESSION['email'] = $emailSign; 
                $_SESSION['id']=$f['Customer_id'];  
                // Page on which the user is sent 
                // to after logging in 
                header('location: index.php'); 
            } 
            else { 
                  
                // If the username and password doesn't match
                echo "<script>alert('Email id and password do not match');</script>";
 
            } 
        }
    }
    //For Creating an account
    if(isset($_POST['signUp'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mobile=$_POST['mobile'];
        $q="SELECT * FROM customer WHERE Email= '$email' ";
        $check=mysqli_query($con,$q);
        if(mysqli_num_rows($check) != 0){
            echo "<script>alert('Email id is already registered');</script>";
           
        }
        else if(empty($name)){echo "<script>alert('Name can not be empty');</script>";}
        else if(empty($email)){echo "<script>alert('Email can not be empty');</script>";}
        else if(empty($password)){echo "<script>alert('Password can not be empty');</script>";}
        else if(empty($mobile)){echo "<script>alert('Mobile can not be empty');</script>";}
        else{
            $query="INSERT INTO customer(Name,Email,Password,Mobile)
             VALUES('$name','$email','$password','$mobile')";
             $r=mysqli_query($con,$query);
             echo "<script>alert('Account Created Successfully!');</script>";

        }

    }
    ?>

</body>

</html>
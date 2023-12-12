<?php

@include'config.php';
               
if(isset($_POST['submit'])){
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,$_POST['ps']);
    $user_type= mysqli_real_escape_string($conn,$_POST['role']);
    $select = "SELECT * FROM id_pass WHERE email='$email' && password = '$password'";
    $result = mysqli_query($conn,$select); 
    if(mysqli_num_rows($result)>0){
        $error[]='user already exists!';
    }
    else{
        $insert="INSERT INTO id_pass( Email,password,role) values('$email','$password', '$user_type') " ;
        mysqli_query($conn,$insert);
        header('location:login.php');

    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup-MAS</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="pic&vid/logo.png" type="image/x-icon">
</head>

<body class="body">
    <header>

        <nav>
            <li>
                <img class="logo" src="pic&vid/logo.png" alt="logo">
                <a href="portfolio.html">HOME</a></li>
            <li> <a href="login.html">LOGIN</a> </li>
            <li> <a href="about.html"> ABOUT</a></li>
            <li>CONTACT ME </li>
            <input class="search" type="search" placeholder="search here!" name="search" id="ss">
            <input class="but" type="button" value="search">
        </nav>
    </header>
    <div class="box">
        <form action="signup.php" method="post">
        <img class="img" src="pic&vid/logo.png" alt="sani's image">
        <br>
        <label for="email">Enter your user type.</label>
        <br>
        <select class="inp" aria-label="Default select example" name="role">
                <option selected value="1">User</option>
                <option value="2">Admin</option>
              </select>
        <br>
        <label for="em">Enter your email. </label>
        <br>
        <input class="inp" type="email" placeholder="enter your email " name="email" id="em">
        <br>
        <!-- <label for="em">Set your username. </label>
        <br>
        <input class="inp" type="text" placeholder="create your username " name="nm" id="nm">
        <br> -->
        <label for="ps">Set  your password. </label>
        <br>
        <input class="inp" type="password" placeholder="create your password " name="ps" id="ps">
        <br>
        <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span>'.$error.'</spam>';
                }
            }
            ?>
        <button type="submit" class="button2" name="submit">Signup</button>
        <br>
        <a class="a" href="login.php">Login</a>
        <br>
        <a class="a" href="forget.html">Forgget password</a>
        </form>
    </div>

</body>

</html>
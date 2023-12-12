 
<?php
// @include'user_ login_page.php';
@include'config.php';
session_start();
if(isset($_REQUEST['email']) && isset($_REQUEST["ps"]))
{
    $email = $_REQUEST['email'];
    $password = $_REQUEST['ps'];
    $user_type = mysqli_real_escape_string($conn,$_REQUEST['role']);
    $select = "SELECT * FROM id_pass WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$select); 
    
    if(mysqli_num_rows($result)>0){
    
          $row = mysqli_fetch_assoc($result);
        
      if($row['role'] == '1')
        {
            $_SESSION['email'] = $row['Email'];
            
            header('location:user_login_page.php');
        }
        elseif($row['role'] == '2')
        {
            $_SESSION['email'] = $row['Email'];
            header('location:admin_login_page.php');
        } 

    }  
    else{
        $error[]='incorrect email or password!';
    }  
    
}  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-MAS</title>
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
</head>

<body class="body">
    <header>

        <nav>
            <li>
                <img class="logo" src="pic&vid/logo.png" alt="logo">
                <a href="portfolio.html">HOME</a></li>
            <li> <a href="login.html">LOGIN</a> </li>
            <li> <a href="about.html"> ABOUT</a></li>
            <li> <a href="contact.html">CONTACT ME</a> </li>
            <input class="search" type="search" placeholder="search here!" name="search" id="ss">
            <input class="but" type="button" value="search">
        </nav>
    </header>
    <div class="box">
        <form  action="" method="POST">
            <img class="img" src="pic&vid/logo.png" alt="sani's image">
            <br>
            <label for="role">Enter your user type.</label>
            <br>
            <select class="inp" aria-label="Default select example" name="role">
                <option selected value="1">User</option>
                <option value="2">Admin</option>
              </select>
            <br>
            <label for="email">Enter your email. </label>
            <br>
            <input class="inp" type="email" placeholder="enter your email " name="email" id="email">
            <br>
            
            <label for="ps">Enter your password. </label>
            <br>
            <input class="inp" type="password" placeholder="enter your password " name="ps" id="ps">
            <br><?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span>'.$error.'</spam>';
                }
            }
            ?>
            
            <button type="submit" class="button2" name="submit" id="log">  login</button>
            <br>
            <a class="a" href="signup.php">Sign up</a>
            <br>
            <a class="a" href="forget.html">Forgget password</a>
        </form>
    </div>


</body>

</html>
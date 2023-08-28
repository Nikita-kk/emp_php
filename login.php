<?php
session_start();

?>

<?php
include("connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    // $password = password_hash($pwd, PASSWORD_BCRYPT);    //hash password
    $query = "SELECT * FROM `register` WHERE email = '$username'";
    $result = mysqli_query($conn, $query);
    $total = mysqli_num_rows($result);
    // echo $total;
    if($total==1){
         $_SESSION['user_name'] = $username;
        echo 'Login successful' ;
        echo "<script>window.open('form.php','_self')</script>";
    }
    else{

        echo 'login Failed';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="login-style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <center>
            <h1><strong>Login</strong></h1>
        </center>
        <hr>
        <form action="#" method="POST" autocomplete="off">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Username" name="username">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Password" name="password">
            </div>

            <center><a href="">Forget Password?</a></center>
            <button type="submit" class="btn-block" name="login">Login</button>
            <div class="signup">
                <center>New Members? <a href="register.php">SignUp Here</a></center>
            </div>
        </form>
    </div>
</body>

</html>

<
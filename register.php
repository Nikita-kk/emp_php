
<?php include("connection.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
    
    <style>
        
        .container{width: 600px;margin-top: 100px;font-weight: bold;}
        </style>
</head>
<body>


    <div class="container">
  
<form  action="#" method="POST">


<h4 style="text-align: center;color:blue"> Register Form</h4>
   <div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" aria-describedby="nameHelp" name="name" required>
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="address" class="form-control" id="address" aria-describedby="addressHelp" name="address"required>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  
  <!-- <button type="submit" class="btn btn-primary" name="button">Submit</button> -->
  <input type="submit" class="btn btn-primary" value="submit" name="submit">
  
</form>
</div>

</body>
</html>


<!-- php  for insert data -->

<?php
// error_reporting(0);

if(isset($_POST['submit'])) 


{
    $name      = $_POST['name'];
    $address   = $_POST['address'];
    $email     = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);    //hash password
    $password = $_POST['password'];



    $query ="INSERT INTO `register` (name,address,email,password ) values('$name','$address','$email',' $password')";
     $data =mysqli_query($conn,$query);

     if ($data)
      {
        header("refresh:0; url=http://localhost/emp-php/login.php");

     }
      else 
      {
         echo "<script> alert('Failed')</script>";
     }
     
 }

?>


<?php
session_start();
 // redirect the user to home page if he is login already
    if(isset($_SESSION["name"])){
header('location:index.php');    
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/admin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
<body>
 <div>
<div class="main mt-5 shadow">
   
    <div class="login col-md-5 offset-4 mt-5 pt-3">
        <h3>Login</h3>
        <hr>
    <form action="login.php" class="form-group" method ="POST">
<div>
    <label for="Username">Username</label>
    <input type="text" class="form-control" name ="username">
</div>

<div>
    <label for="Password">Password</label>
    <input type="password" class="form-control" name ="password">
</div>
<div class  = "mt-5">
    <button class ="btn btn-primary"  name = "login" type ="submit">Submit</button>
</div>

</form>

<a class ="p-3 text-decoration-none offset-4" href="register.php">I Do Not Have An Account</a>
    </div>
    

<?php


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];



    // including the connection
    include('connection.php');



    $query = "SELECT * FROM tbl_users WHERE username = '$username'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);

  
     $db_name = $row['name'];
     $db_username = $row['username'];
     $db_password = $row['password'];

     echo $db_name. '<br>'. $db_username . '<br>' . $db_password ;

     if(password_verify($password, $db_password)){
          
            // set session
            $_SESSION["username"] = $db_username ;
            $_SESSION["name"] = $db_name ;

            $cookie_name = "user";
            $cookie_value = $db_username;
            // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
         
          header('location:index.php');
          echo $db_name . " is login" ;
          
     }else{
        echo "Incorrect Credentials" . '<br>' ;
     }
     
     

}
?>

</div>   
    
</body>
</html>

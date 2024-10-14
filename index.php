<?php
session_start();


if(isset($_POST['logout'])){
    session_destroy();
    session_unset();

    header('location:login.php');
   
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
</head>

<body>
    <a href="https://www.youtube.com/">Home</a>
    <div class="container shadow text-center mt-4">
    
    <?php
    
    if(isset($_SESSION["name"])){
        echo 'Name :' . $_SESSION["name"]. '<br>' .'Username :' . $_SESSION["username"] ; ?>
    
        <form action="" method="POST"> 
        <button name="logout" class="btn btn-danger">Logout</button>
        </form> 
    
    
    <?php }else{ ?>
    <a href="login.php">Login</a>
    <?php } 

    

    ?>
    
    </div>

</body>

</html>
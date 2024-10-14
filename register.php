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
     <title>Sign up</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <div class="continer">
          <div>
               <h3>Register.......</h3>
               <form action="register.php" method ="POST" class ="offset-3">
                    <div>
                         <input type="text" class="form-control col-sm-6 w-50" placeholder="Name" name ="name">
                    </div>
                    <div>
                         <input type="text" class="form-control col-sm-6 w-50" placeholder="username" name ="username">
                    </div>
                  
                    <div>
                         <label for="">Password</label>
                         <input type="password" class="form-control col-sm-6 w-50" placeholder="" name ="real-password">
                    </div>
                    <div>
                         <label for="">Confirm Password</label>
                         <input type="password" class="form-control col-sm-6 w-50" placeholder="" name ="confirm-password">
                    </div>
                    <div>
                         <button name ="register_button" class ="btn btn-info mt-3" type ="submit">Register</button>
                    </div>
                   
                    <a class ="p-3 text-decoration-none offset-4" href="login.php">I Already Have An Account</a>
               </form>
          </div>
     </div>
</body>
</html>


<?php


$error = array();

// including the connection
include('connection.php');

if( isset( $_POST['register_button'] ) ){
     // getting input data
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['real-password'] ;
$c_password = $_POST['confirm-password'];



     // validations

     // validate username input
     if(strlen($username) < 7){
          echo "username character is too short" ;
          $array_push($error ,"username too short");
        
     }

     // to confirm pasword
     if($password != $c_password){

          $array_push($error ,"password input is not the same a confirm password input");
        
     }


     // to check length of password
     if(strlen($password) < 8){
     
          $array_push($error ,"upassword too short, enter atleast 8 characters");
        
     }


     // to check if user already exist
    
     $query = "SELECT * FROM tbl_users WHERE username = '$username' ";
     $result = mysqli_query($con, $query);
     $row = mysqli_fetch_assoc($result);
     

     if($row = mysqli_fetch_assoc($result)> 0){
          echo "Username Already Exist" . '<br>' ;
          $array_push($error ,"Username Already Exist");

     }



   if(count($error) < 1){
     // hash password
     $password = password_hash($password, PASSWORD_DEFAULT);
     $sql = "INSERT INTO tbl_users(name, username, password, created_at) 
     VALUES('$name', '$username', '$password', NOW()) ";

     $query = mysqli_query($con, $sql);
     if($query){
      echo $name . " registered successfully";
     }else{
          echo $sql . mysqli_error($con);
 
     }

   }else{
     // looping through the array of errors
     foreach ($error as $err ) {
          echo $err . '<br>';
      }
 
   }



     // if there is no error pls insert the record
   

          



     
}

?>
<?php
session_start();
$username = "";
$email = "";
$password="";
$errors = array();


$db = mysqli_connect('localhost', 'root', '', 'diary');//here diary is my database name
if(isset($_POST['register'])){
   $username=mysqli_real_escape_string($db, $_POST['username']);
   $email=mysqli_real_escape_string($db, $_POST['email']);
   $password=mysqli_real_escape_string($db, $_POST['password']);

   if (empty($username)){
        array_push($errors, "Username is required");
    }
   if (empty($email)){
            array_push($errors, "Email is required");
   }    
   if (empty($password)){
                array_push($errors, "Password is required");
   }
   if (count($errors)==0){ //if no error found, save to database
        $password = md5($password);
        $sql = "INSERT INTO user (username, email, password) 
                   VALUES ('$username', '$email', '$password')";
    
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now login";
        header('location: index.php');
   }

}
if (isset($_POST['login'])){
     
}   
if (isset($_GET['logout'])){
     session_destroy();
     unset($_SESSION['username']);
     header('location: login.php');
}
?>
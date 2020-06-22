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
        header('location: index.php');//this will be redirected to welcome page, that is in index.php.
   }

}
//user can login from login page, onne registration is successful.
if (isset($_POST['login'])){
     $username=mysqli_real_escape_string($db, $_POST['username']);
     $password=mysqli_real_escape_string($db, $_POST['password']);

   if (empty($username)){
        array_push($errors, "Username is required*");
    }
   if (empty($password)){
            array_push($errors, "Password is required*");
   }  
   if (count($errors)==0) {
        $password=md5($password);
        $query = "SELECT * FROM user WHERE username='$username'AND password='$password' ";
        $result = mysqli_query($db,$query);
        if (mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now login";
        header('location: index.php');

   }else{
        array_push($errors,"The username or password is invalid");
        header('locaion: login.php');
   } 
  }
     
}  
//logout 
if (isset($_GET['logout'])){
     session_destroy();
     unset($_SESSION['username']);
     header('location: login.php');//after destyoing the session, this will be redirected to login page.
}
?>
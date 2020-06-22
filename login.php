<?php include('server.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Login page</title>
</head>
<body>
  <div class="header">
    <h2>Login Now</h2>
   </div>
   <form method="post" action="login.php">
   <?php include('errors.php'); ?>
    <div class="input">
    <label>Username</label>
    <input type="text" name="username">
    </div>
    
    <div class="input">
    <label>Password</label>
    <input type="password" name="password">
    <div class="input">
    <button type="submit" name="login" class="btn">Login</button>
    </div>
    </div>
    <p>Not yet a member? <a href="registration.php">Sign up</a>
</p>
    </form>
    </body>
    </html> 
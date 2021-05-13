<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my blog</title>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="style.css">
</head>
<!-- ---- Include the above in your HEAD tag --------

<div class="wrapper fadeInDown">
  <div id="formContent">
    Tabs Titles

    Icon
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    Login Form
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    Remind Passowrd
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div> -->
<body>
    <h2>LOGIN</h2>
    
    <?php 
    require "blogger.php";
    // require "db.php";
    $login = new blogger();
    if(isset($_POST['submit'])){
        if($login->authUser($_POST['email'],$_POST['pass'])) {
          header('location:dashboard.php');} else{echo"Sorry email or password is incorrect";} }
    ?>
   

    <form action="login.php" method="POST">
        <label>Email:</label>
        <input type="email" placeholder="Enter your email" name="email"></input>
        <label>Password:</label>
        <input type="password" placeholder="Enter your password" name="pass"></input>
        <input type="submit" value="Log In" name="submit">
    </form>
    
</body>
</html>

<?php

#checking for non empty and non well format input type by regular expression
$user = $pass = $email = " ";
$userErr = $passErr = $emailErr = " ";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty($_POST['username'])){
    $userErr = " username can't be empty";
  }

  else {
    $user = $_POST['username'];
    if (!preg_match("/^[a-zA-Z ]*$/",$user)) {
      /* The preg_match() function searches a string for pattern, returning true
      if the pattern exists, and false otherwise */
      $userErr = " only letters and white spaces allowed";
    }
  }
  if(empty($_POST['password'])){
    $passErr = " field can't be empty";
  }

  else {
    $pass = $_POST['password'];
    if (!preg_match("/^\S*(?=\S{8,})\S*$/",$pass)) {
      $passErr = " password must contain 8 characters" ;
    }
      elseif (!preg_match("/^\S*(?=\S*[a-z])\S*$/",$pass)) {
        $passErr = " password must contain a lower casse letter" ;
      }
      elseif (!preg_match("/^\S*(?=\S*[A-Z])\S*$/",$pass)) {
        $passErr = " password must contain a upper casse letter" ;
      }
      elseif (!preg_match("/^\S*(?=\S*[\d])\S*$/",$pass)) {
        $passErr = " password must contain a number" ;
      }
      elseif (!preg_match("/^\S*(?=\S*[\W])\S*$/",$pass)) {
        $passErr = " password must contain a special character" ;
      }
  }

if(empty($_POST['email'])){
  $emailErr = " field can't be empty";
}

else {
  $email = $_POST['email'];
  if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $emailErr = " Invalid email format";
  }
 }
}
?>



<!DOCTYPE html>
<html>
  <head>
     <title>login form</title>
    <link  href="/loginform/style.css" rel="stylesheet" type="text/css" >
    <script src="https://kit.fontawesome.com/f6d3aea311.js" ></script>
  </head>
  <body>
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
          <i class="fas fa-user" style="font-size: 60px; color: aqua;margin-left :70px ;"></i><br>
          <input type="text" name="username"  placeholder="Username" style="margin-top: 20px;"><br>
          <span style="color: #c83647;"><?php echo $userErr ?></span><br><br>
          <input type="password" name="password" placeholder="Password" ><br>
          <span style="color: #c83647;"><?php echo $passErr ?></span><br><br>
          <input type="text" name="email" placeholder="Email" style="padding-left:20px;margin-top: -50px;"><br>
          <span style="color: #c83647;"><?php echo $emailErr ?></span><br><br>
          <label><input type="checkbox" name="rememberme" value="rememberme"> Remember Me</label>
           <input type="submit" name="login" value="Login"><br><br>
          <a href="#"><p style="color:rgb(66, 93, 245); font-size:1.2em;">Forgot password ?</p></a>
        </form>



  </body>
</html>

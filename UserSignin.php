<?php require_once("Include/DB.php");?>
<?php require_once("Include/Sessions.php");?>
<?php require_once("Include/Functions.php");?>
<?php
if(isset($_POST["Submit"])){
$Email=mysqli_real_escape_string($Connection,$_POST["Email"]);
$Password=mysqli_real_escape_string($Connection,$_POST["Password"]);
if(empty($Email) || empty($Password)){
  $_SESSION["ErrorMessage"]="All fields must be filled out";
  Redirect_To("UserSignin.php");
}else{
  if(ConfirmingAccountActiveStatus($Email))
  {
  $Found_Account=Signin_Attempt($Email,$Password);
  if($Found_Account){
    $_SESSION["User_Id"]=$Found_Account['id'];
    $_SESSION["User_Name"]=$Found_Account['username'];
    $_SESSION["User_Email"]=$Found_Account['email'];
    if(isset($_POST["Remember"])){
      $ExpireTime=time()+86400;//86400 is in second,that means 1 day
      setcookie("SettingEmail",$Email,$ExpireTime);
      setcookie("SettingName",$Username,$ExpireTime);
    }
      $_SESSION["SuccessMessage"]= "Welcome {$_SESSION["User_Name"]} ";
    Redirect_To("Welcome.php");
  }else{
    $_SESSION["ErrorMessage"]="Invalid Email / Password";
    Redirect_To("UserSignin.php");
  }
}else{
  $_SESSION["ErrorMessage"]="Account Confirmation Required";
  Redirect_To("UserSignin.php");
}
}
}
?>
<!DOCTYPE>
<html>
<head>
<title>LOGIN</title>
  
  <link rel="stylesheet"href="css/bootstrap.min.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet"href="css/publicstyles.css">
  <link rel="stylesheet"href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/sign.css">
    <style>
      .FieldInfo{
        color:green;
        font-family: Bitter,Georgia,"Times New Roman",Times,serif;
        font-size: 1.2em;
      }
    </style>
    </head>
<body>
  <div style="height: 10px; background:gray"></div>
  <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
          <div class="navbar-header">
        <a class="navbar-brand" href="Blog.php">
          <b>BLOG YOUR TOUR</b>
        </a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="Home.php">HOME</a></li>
            <li><a href="Blog.php?Page=0">BLOG</a></li>
            <li class="active"><a href="UserSignin.php">LOGIN</a></li>
            <li><a href="Gallery.php">GALLERY</a></li>
            <li><a href="AdminLogin.php" target="_blank">ADMINISTRATOR</a></li>
          </ul>
          <form action="Blog.php" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="search" name="Search">
              <button class="btn btn-default" name="SearchButton">Go</button>
          </form>
            </div>
  </div>
  </nav>
  <div class="Line" style="height: 10px; background:gray"></div>
  <div>
    <?php echo Message();
          echo SuccessMessage();
          ?>
        </div>
  <section id="contact-section">
    <div class="loginbox" style="margin-top:20px">
        <h1><b>LOGIN</b></h1>
        <form action="UserSignin.php" method="post">
          <fieldset>
            <p>Email</p>
            <input type="text" Name="Email" value="" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" Name="Password" value="" placeholder="Enter Password">
            <input type="submit" name="Submit" value="LOGIN"><br>
            <input id="cb" type="checkbox" name="Remember" style="margin-left: -155px; margin-top: 3px; ">
<div style="margin-left: 27px;margin-top:-37px;margin-bottom:5px;">
     REMEMBER ME <br/> <p/>
     
     <p/>
     <a href="UserSignUp.php" style="font-size: 16px; font-style: italic;">Haven't Register?</a>
    </div>
        </form>
    </div>
</section>
<div style="height: 10px; background: gray;"></div>
</body>

</html>

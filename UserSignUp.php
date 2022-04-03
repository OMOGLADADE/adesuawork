<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php
if ( isset( $_POST[ 'Submit' ] ) ) {
    $Username = mysqli_real_escape_string( $Connection, $_POST[ 'Username' ] );
    $Email = mysqli_real_escape_string( $Connection, $_POST[ 'Email' ] );
    $Password = mysqli_real_escape_string( $Connection, $_POST[ 'Password' ] );
    $ConfirmPassword = mysqli_real_escape_string( $Connection, $_POST[ 'ConfirmPassword' ] );
    $Token = bin2hex( openssl_random_pseudo_bytes( 40 ) );

    if ( empty( $Username ) || empty( $Email ) || empty( $Password ) || empty( $ConfirmPassword ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All fields must be filled out';
        Redirect_To( 'UserSignUp.php' );
    } elseif ( $Password !== $ConfirmPassword ) {
        $_SESSION[ 'ErrorMessage' ] = 'The value of both passwords must be same';
        Redirect_To( 'UserSignUp.php' );
    } elseif ( strlen( $Password )<6 ) {
        $_SESSION[ 'ErrorMessage' ] = 'There should be at least 6 values in your password';
        Redirect_To( 'UserSignUp.php' );
    } elseif ( CheckEmailExistsOrNot( $Email ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'This Email is Already in Use';
        Redirect_To( 'UserSignUp.php' );
    } elseif ( CheckUserExistsOrNot( $Username ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'This Username is already being used.Try a different username!';
        Redirect_To( 'UserSignUp.php' );
    } else {
        global $Connection;
        $Hashed_Password = Password_Encryption( $Password );
        $Query = "INSERT INTO user(username,email,password,token,active)
  Values('$Username','$Email','$Hashed_Password','$Token','ON')";
        $Execute = mysqli_query( $Connection, $Query );
        if ( $Execute ) {
            $subject = 'Registration Successful';
            if ( mail( $Email, $subject, $body, $SenderEmail ) ) {
                $_SESSION[ 'SuccessMessage' ] = '.';
                Redirect_To( 'UserSignin.php' );
            } else {
                $_SESSION[ 'SuccessMessage' ] = 'Registration Successful!';
                Redirect_To( 'UserSignin.php' );
            }
        }
    }

}

?>

<!DOCTYPE>
<html>
<head>
<title>REGISTER</title>

<link rel = 'stylesheet'href = 'css/bootstrap.min.css'>
<script src = 'js/jquery-3.5.1.min.js'></script>
<script src = 'js/bootstrap.min.js'></script>
<link rel = 'stylesheet'href = 'css/publicstyles.css'>
<link rel = 'stylesheet'href = 'css/footer.css'>
<link rel = 'stylesheet' type = 'text/css' href = 'css/sign1.css'>
</head>
<body>
<div style = 'height: 10px; background: gray'></div>
<nav class = 'navbar navbar-inverse' role = 'navigation'>
<div class = 'container'>
<div class = 'navbar-header'>
<a class = 'navbar-brand' href = 'Blog.php'>
BLOG YOUR TOUR
</a>
</div>
<ul class = 'nav navbar-nav'>
<li><a href = 'Home.php'>HOME</a></li>
<li><a href = 'Blog.php?Page=0'>BLOG</a></li>
<li><a href = 'UserSignin.php'>LOGIN</a></li>
<li class = 'active'><a href = 'UserSignUp.php'>REGISTER</a></li>
<li><a href = 'Gallery.php'>GALLERY</a></li>
<li><a href = 'AdminLogin.php' target = '_blank'>ADMINISTRATOR</a></li>
</ul>
<form action = 'Blog.php' class = 'navbar-form navbar-right'>
<div class = 'form-group'>
<input type = 'text' class = 'form-control' placeholder = 'search' name = 'Search'>
<button class = 'btn btn-default' name = 'SearchButton'>Go</button>
</form>
</div>

</div>

</nav>
<div class = 'Line' style = 'height: 10px; background:gray'></div>
<div>
<?php echo Message();
echo SuccessMessage();
?>
</div>
<section id = 'contact-section'>
<div class = 'loginbox' style = 'margin-top:50px'>
<h1 style = 'font-weight: bold; font-size: 35px;'>Register Here</h1>
<form action = 'UserSignUp.php' method = 'post'>
<fieldset>
<p>Username</p>
<input type = 'text' Name = 'Username' value = '' placeholder = 'Enter Username'>
<p>Email</p>
<input type = 'text' Name = 'Email' value = '' placeholder = 'Enter Email'>
<p>Password</p>
<input type = 'password' Name = 'Password' value = '' placeholder = 'Enter Password'>
<p>Confirm Password</p>
<input type = 'password' Name = 'ConfirmPassword' value = '' placeholder = 'Enter Confirm Password'>
<input type = 'submit' name = 'Submit' value = 'Signup'>
<br><br>

</form>

</div>
</section>

<div style = 'height: 10px; background: gray;'></div>
<div id = 'Footer'>

</p>
<p>

</p><hr>

</div>
<div style = 'height: 10px; background: gray;'></div>

</body>

</html>

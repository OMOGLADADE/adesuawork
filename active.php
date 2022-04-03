<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php
global $Connection;
if ( isset( $_GET[ 'token' ] ) ) {
    $TokenFromURL = $_GET[ 'token' ];
    $Query = "UPDATE user SET active='On' WHERE token='$TokenFromURL'";
    $Execute = mysqli_query( $Connection, $Query );
    if ( $Execute ) {
        $_SESSION[ 'SuccessMessage' ] = 'Account activated successfully';
        Redirect_To( 'UserSignin.php' );
    } else {
        $_SESSION[ 'message' ] = 'Something Went Wrong.Try Again!';
        Redirect_To( 'UserSignUp.php' );
    }
}

?>

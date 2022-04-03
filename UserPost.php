<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php Confirm_Signin();
?>
<?php
if ( isset( $_POST[ 'Submit' ] ) ) {
    $Title = mysqli_real_escape_string( $Connection, $_POST[ 'Title' ] );
    $Category = mysqli_real_escape_string( $Connection, $_POST[ 'Category' ] );
    $Post = mysqli_real_escape_string( $Connection, $_POST[ 'Post' ] );
    date_default_timezone_set( 'Asia/Dhaka' );
    $CurrentTime = time();
    //$DateTime = strftime( '%Y-%m-%d %H:%M:%S', $CurrentTime );
    $DateTime = strftime( '%B-%d-%Y %H:%M:%S', $CurrentTime );
    $DateTime;
    $Admin =  $_SESSION[ 'User_Name' ];
    $Image = $_FILES[ 'Image' ][ 'name' ];
    $Target = 'Upload/'.basename( $_FILES[ 'Image' ][ 'name' ] );
    if ( empty( $Title ) ) {
        $_SESSION[ 'ErrorMessage' ] = "Title can't be empty";
        Redirect_to( 'UserPost.php' );

    }
    if ( empty( $Image ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'Please add an image';
        Redirect_to( 'UserPost.php' );

    } elseif ( CheckImageExistsOrNot( $Image ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'Please Change The Name of image file and try again';
        Redirect_to( 'UserPost.php' );

    } elseif ( strlen( $Title )<2 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Title Should be at-least 2 Characters';
        Redirect_to( 'UserPost.php' );

    } elseif ( strlen( $Title )>99 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Title is too long';
        Redirect_to( 'UserPost.php' );

    } elseif ( strlen( $Post )<160 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too short post';
        Redirect_to( 'UserPost.php' );

    } elseif ( strlen( $Post )>9999 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long Post';
        Redirect_to( 'UserPost.php' );

    } elseif ( strlen( $Image )>199 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long name for image';
        Redirect_to( 'UserPost.php' );

    } else {
        global $Connection;
        $Query = "INSERT INTO admin_panel(datetime,title,category,author,image,post,status)
	VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post','OFF')";
        $Execute = mysqli_query( $Connection, $Query );
        move_uploaded_file( $_FILES[ 'Image' ][ 'tmp_name' ], $Target );
        if ( $Execute ) {
            $_SESSION[ 'SuccessMessage' ] = 'Post Added Successfully';
            Redirect_to( 'UserPost.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Something Went Wrong.Try Again!';
            Redirect_to( 'UserPost.php' );

        }

    }

}

?>

<!DOCTYPE>
<html>
<head>
<title>Add New Post</title>

<link rel = 'stylesheet'href = 'css/bootstrap.min.css'>
<script src = 'js/jquery-3.5.1.min.js'></script>
<script src = 'js/bootstrap.min.js'></script>
<script src = 'https://kit.fontawesome.com/b1c3598fcf.js' crossorigin = 'anonymous'></script>
<link rel = 'stylesheet'href = 'css/adminstyles.css'>
<link rel = 'stylesheet'href = 'css/publicstyles.css'>
</head>
<style>
.FieldInfo {
    color:green;
    font-family: Bitter, Georgia, 'Times New Roman', Times, serif;
    font-size: 1.2em;
}

</style>
<body>
<div style = 'height: 10px; background:gray'></div>
<nav class = 'navbar navbar-inverse' role = 'navigation'>
<div class = 'container'>
<div class = 'navbar-header'>

<a class = 'navbar-brand' href = 'Blog.php'>
<b>BLOG YOUR TOUR</b>
</a>
</div>

<ul class = 'nav navbar-nav'>
<li><a href = 'Home.php'>HOME</a></li>
<li class = 'active'><a href = 'Blog.php?Page=0'>BLOG</a></li>
<li><a href = 'Gallery.php'>GALLERY</a></li>
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
<div class = 'container-fluid'>
<div class = 'row'>
<div class = 'col-sm-2'>
<h1><span class = 'FieldInfo'>User Panel</span></h1>
<ul id = 'Side_Menu' class = 'nav nav-pills nav-stacked'>
<li><a href = 'Welcome.php'>
<i class = 'fas fa-align-justify'></i>
&nbsp;
Welcome</a></li>
<li class = 'active'><a href = 'UserPost.php'>
<i class = 'far fa-list-alt'></i>
&nbsp;
Add New Post</a></li>
<li><a href = 'UserSignOut.php'>
<i class = 'fas fa-sign-out-alt'></i>
&nbsp;
Signout</a></li>
</ul>

</div><!--Ending of side area -->

<div class = 'col-sm-10'>
<h1>Add New Post</h1>
<?php echo SuccessMessage();
echo Message();
?>
<div>
<form action = 'UserPost.php' method = 'post' enctype = 'multipart/form-data'>
<fieldset>
<div class = 'form-group'>
<label for = 'Title'><span class = 'FieldInfo'>Title:</span></label>
<input class = 'form-control' type = 'text' name = 'Title' id = 'title' placeholder = 'Title'>
</div>
<div class = 'form-group'>
<label for = 'categoryselect'><span class = 'FieldInfo'>Category:</span></label>
<select class = 'form-control' id = 'categoryselect' name = 'Category'>

<?php
global $Connection;
$ViewQuery = 'SELECT * FROM category ORDER BY datetime desc';
$Execute = mysqli_query( $Connection, $ViewQuery );
while( $DataRows = mysqli_fetch_array( $Execute ) ) {
    $Id = $DataRows[ 'id' ];
    $CategoryName = $DataRows[ 'name' ];
    ?>

    <option><?php echo $CategoryName;
    ?></option>
    <?php }
    ?>
    </select>
    </div>
    <div class = 'form-group'>
    <label for = 'imageselect'><span class = 'FieldInfo'>Select Image:</span></label>
    <input type = 'File' class = 'form-control' name = 'Image' id = 'imageselect'>
    </div>
    <div class = 'form-group'>
    <label for = 'postarea'><span class = 'FieldInfo'>Post:</span></label>
    <textarea class = 'form-control' name = 'Post' id = 'postarea'></textarea>
    </div>

    <br>
    <input class = 'btn btn-success btn-block' type = 'Submit' name = 'Submit' value = 'Add New Post'>
    </fieldset>
    </form>
    </div>

    </div><!--ending of main area -->

    </div><!--ending of row-->

    </div><!--ending of container fluid-->
    <div style = 'height: 10px; background: gray;'></div>
    <div id = 'Footer'>

    </p>
    <p>

    </p><hr>

    </div>
    <div style = 'height: 10px; background: gray;'></div>

    </body>
    </html>

<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php Confirm_Login();
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
    $Admin = '';
    $Image = $_FILES[ 'Image' ][ 'name' ];
    $Target = 'Upload/'.basename( $_FILES[ 'Image' ][ 'name' ] );
    if ( empty( $Title ) ) {
        $_SESSION[ 'ErrorMessage' ] = "Title can't be empty";
        Redirect_to( 'NewPost.php' );

    } elseif ( strlen( $Title )<2 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Title Should be at-least 2 Characters';
        Redirect_to( 'NewPost.php' );

    } elseif ( strlen( $Title )>99 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Title is too long';
        Redirect_to( 'NewPost.php' );

    } elseif ( strlen( $Post )<160 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too short post';
        Redirect_to( 'NewPost.php' );

    } elseif ( strlen( $Post )>9999 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long Post';
        Redirect_to( 'NewPost.php' );

    } elseif ( strlen( $Image )>199 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long name for image';
        Redirect_to( 'NewPost.php' );

    } else {
        global $Connection;
        $EditFromURL = $_GET[ 'Edit' ];
        $Query = "UPDATE admin_panel SET datetime='$DateTime',title='$Title',
	category='$Category',author='$Admin',image='$Image',post='$Post'
	WHERE id='$EditFromURL'";
        $Execute = mysqli_query( $Connection, $Query );
        move_uploaded_file( $_FILES[ 'Image' ][ 'tmp_name' ], $Target );
        if ( $Execute ) {
            $_SESSION[ 'SuccessMessage' ] = 'Post Updated Successfully';
            Redirect_to( 'dashboard.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Something Went Wrong.Try Again!';
            Redirect_to( 'dashboard.php' );

        }

    }

}

?>

<!DOCTYPE>
<html>
<head>
<title>Edit Post</title>

<link rel = 'stylesheet'href = 'css/bootstrap.min.css'>
<script src = 'js/jquery-3.5.1.min.js'></script>
<script src = 'js/bootstrap.min.js'></script>
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
<li><a href = 'Home.php' target = '_blank'>HOME</a></li>
<li><a href = 'Blog.php?Page=0' target = '_blank'>BLOG</a></li>
<li><a href = 'Gallery.php' target = '_blank'>GALLERY</a></li>
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
<h1><span class = 'FieldInfo'>Admin</span></h1>
<ul id = 'Side_Menu' class = 'nav nav-pills nav-stacked'>
<li><a href = 'dashboard.php'>
<span class = 'glyphicon glyphicon-th'></span>
&nbsp;
Dashboard</a></li>
<li><a href = 'NewPost.php'>
<span class = 'glyphicon glyphicon-list-alt'></span>
&nbsp;
Add New Post</a></li>
<li><a href = 'Categories.php'>
<span class = 'glyphicon glyphicon-tags'></span>
&nbsp;
Categories</a></li>

<li><a href = '#'>
<span class = 'glyphicon glyphicon-log-out'></span>
&nbsp;
Logout</a></li>
</ul>

</div><!--Ending of side area -->

<div class = 'col-sm-10'>
<h1>Update Post</h1>
<?php echo SuccessMessage();
echo Message();
?>
<div>
<?php
$SearchQueryParameter = $_GET[ 'Edit' ];
$Connection;
$Query = "SELECT * FROM admin_panel WHERE ID='$SearchQueryParameter'";
$ExecuteQuery = mysqli_query( $Connection, $Query );
while ( $DataRows = mysqli_fetch_array( $ExecuteQuery ) ) {
    $TitleToBeUpdated = $DataRows[ 'title' ];
    $CategoryToBeUpdated = $DataRows[ 'category' ];
    $ImageToBeUpdated = $DataRows[ 'image' ];
    $PostToBeUpdated = $DataRows[ 'post' ];
}
?>
<form action = "EditPost.php?Edit=<?php echo $SearchQueryParameter; ?>" method = 'post' enctype = 'multipart/form-data'>
<fieldset>
<div class = 'form-group'>
<label for = 'Title'><span class = 'FieldInfo'>Title:</span></label>
<input value = "<?php echo $TitleToBeUpdated;?>" class = 'form-control' type = 'text' name = 'Title' id = 'title' placeholder = 'Title'>
</div>
<div class = 'form-group'>
<span class = 'FieldInfo'>Existing Category:</span>
<?php echo $CategoryToBeUpdated;
?>
<br>
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
    <span class = 'FieldInfo'>Existing Image:</span>
    <img src = "Upload/<?php echo $ImageToBeUpdated;?>" width = 170px;
    height = 70px;
    >
    <br>
    <label for = 'imageselect'><span class = 'FieldInfo'>Select Image:</span></label>
    <input type = 'File' class = 'form-control' name = 'Image' id = 'imageselect'>
    </div>
    <div class = 'form-group'>
    <label for = 'postarea'><span class = 'FieldInfo'>Post:</span></label>
    <textarea class = 'form-control' name = 'Post' id = 'postarea'>
    <?php echo $PostToBeUpdated ?>
    </textarea>
    </div>

    <br>
    <input class = 'btn btn-success btn-block' type = 'Submit' name = 'Submit' value = 'Update Post'>
    </fieldset>
    </form>
    </div>

    </div><!--ending of main area -->

    </div><!--ending of row-->

    </div><!--ending of container fluid-->

    <div id = 'Footer'>

    </p>
    <p>

    </p><hr>

    </div>
    <div style = 'height: 10px; background: gray;'></div>

    </body>
    </html>

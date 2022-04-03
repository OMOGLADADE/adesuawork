<?php require_once 'Include/DB.php';
?>
<?php require_once 'Include/Sessions.php';
?>
<?php require_once 'Include/Functions.php';
?>

<?php
if ( isset( $_POST[ 'Submit' ] ) ) {
    $Name = mysqli_real_escape_string( $Connection, $_POST[ 'Name' ] );
    $Email = mysqli_real_escape_string( $Connection, $_POST[ 'Email' ] );
    $Comment = mysqli_real_escape_string( $Connection, $_POST[ 'Comment' ] );
    date_default_timezone_set( 'Asia/Dhaka' );
    $CurrentTime = time();
    $DateTime = strftime( '%B-%d-%Y %H:%M:%S', $CurrentTime );
    $DateTime;
    $PostId = $_GET[ 'id' ];
    if ( empty( $Name ) || empty( $Email ) || empty( $Comment ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All fields are required';
    } elseif ( strlen( $Name ) > 200 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long Name!';
    } elseif ( strlen( $Email ) > 200 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too long Email!';
    } elseif ( strlen( $Comment ) > 500 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Only 500 Characters are allowed in comment';
    } else {
        global $Connection;
        $PostIDFromURL = $_GET[ 'id' ];
        $Query = "INSERT INTO comments(datetime,name,email,comment,approvedby,status,admin_panel_id)
	VALUES('$DateTime','$Name','$Email','$Comment','pending','OFF','$PostIDFromURL')";
        $Execute = mysqli_query( $Connection, $Query );
        if ( $Execute ) {
            $_SESSION[ 'SuccessMessage' ] = 'Comment Submitted Successfully';
            Redirect_to( "FullPost.php?id={$PostId}" );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Something Went Wrong.Try Again!';
            Redirect_to( "FullPost.php?id={$PostId}" );

        }

    }
}

?>

<!DOCTYPE>
<html>
<head>
<title>Full Blog Post</title>

<link rel = 'stylesheet'href = 'css/bootstrap.min.css'>
<script src = 'js/jquery-3.5.1.min.js'></script>
<script src = 'js/bootstrap.min.js'></script>
<link rel = 'stylesheet'href = 'css/footer.css'>
<link rel = 'stylesheet'href = 'css/blog.css'>

<style>

.FieldInfo {
    color: green;
    font-family: Bitter, Georgia, 'Times New Roman', Times, serif;
    font-size: 1.2em;
}
.CommentBlock {
    background-color:#F6F7F9;
}
.Comment-info {
    color: #365899;
    font-family: sans-serif;
    font-size: 1.1em;
    font-weight: bold;
    padding-top: 10px;
}
.comment {
    margin-top:-2px;
    padding-bottom: 10px;
    font-size: 1.1em
}
</style>
</head>
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
<li><a href = 'UserSignin.php'>LOGIN</a></li>
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
<div class = 'container'><!--container-->
<div class = 'blog-header'>
<h1>The BLOG YOUR TOUR Feed </h1>
<p class = 'lead'>Document your travelling</p>
</div>
<div class = 'row'><!--row-->
<div class = 'col-sm-7'><!--main blog area-->
<?php echo SuccessMessage();
echo Message();
?>
<?php
global $Connection;
if ( isset( $_GET[ 'SearchButton' ] ) ) {
    $Search = $_GET[ 'Search' ];
    $ViewQuery = "SELECT * FROM admin_panel
          WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%'
           OR category LIKE '%$Search%' OR author LIKE '%$Search%' OR post LIKE '%$Search%'";
} else {
    $PostIDFromURL = $_GET[ 'id' ];
    $ViewQuery = "SELECT * FROM admin_panel WHERE id='$PostIDFromURL'
          ORDER BY datetime desc";
}
$Execute = mysqli_query( $Connection, $ViewQuery );
while ( $DataRows = mysqli_fetch_array( $Execute ) ) {
    $PostId = $DataRows[ 'id' ];
    $DateTime = $DataRows[ 'datetime' ];
    $Title = $DataRows[ 'title' ];
    $Category = $DataRows[ 'category' ];
    $Admin = $DataRows[ 'author' ];
    $Image = $DataRows[ 'image' ];
    $Post = $DataRows[ 'post' ];

    ?>

    <div class = 'blogpost thumbnail'>
    <img class = 'img-responsive img-rounded'src = "Upload/<?php echo $Image; ?>" >
    <div class = 'caption'>
    <h1 id = 'heading'> <?php echo htmlentities( $Title );
    ?></h1>
    <p class = 'description'>Category:<?php echo htmlentities( $Category );
    ?>&nbsp Published on:<?php echo htmlentities( $DateTime );
    ?></p>
    <p class = 'Post'><?php echo nl2br( $Post );
    ?></p>
    </div>

    </div>
    <?php }
    ?>

    <br><br><br><br>

    <span class = 'FieldInfo'>Comments</span>

    <?php
    $Connection;
    $PostIdForComments = $_GET[ 'id' ];
    $ExtractingCommentsQuery = "SELECT * FROM comments
 WHERE admin_panel_id='$PostIdForComments' AND status='ON'";
    $Execute = mysqli_query( $Connection, $ExtractingCommentsQuery );
    while ( $DataRows = mysqli_fetch_array( $Execute ) ) {
        $CommentDate = $DataRows[ 'datetime' ];
        $CommenterName = $DataRows[ 'name' ];
        $Comment = $DataRows[ 'comment' ];
        ?>

        <div class = 'CommentBlock'>
        <img style = 'margin-left: 10px; margin-top: 10px;' class = 'pull-left' src = 'images/comment.png' width = 70px;
        height = 70px;
        >
        <p style = 'margin-left: 90px;' class = 'Comment-info'><?php echo $CommenterName;
        ?></p>
        <p style = 'margin-left: 90px;' class = 'description'><?php echo $CommentDate;
        ?></p>
        <p style = 'margin-left: 90px;' class = 'comment'><?php echo nl2br( $Comment );
        ?></p>
        </div>

        <hr>
        <?php }
        ?>

        <br>
        <span class = 'FieldInfo'>Comment below your thoughts about this post</span>

        <div>
        <form action = "FullPost.php?id=<?php echo $PostId; ?>" method = 'post' enctype = 'multipart/form-data'>
        <fieldset>
        <div class = 'form-group'>
        <label for = 'Name'><span class = 'FieldInfo'>Name:</span></label>
        <input class = 'form-control' type = 'text' name = 'Name' id = 'Name' placeholder = 'Name'>
        </div>

        <div class = 'form-group'>
        <label for = 'Email'><span class = 'FieldInfo'>Email:</span></label>
        <input class = 'form-control' type = 'email' name = 'Email' id = 'Email' placeholder = 'Email'>
        </div>

        <div class = 'form-group'>
        <label for = 'commentarea'><span class = 'FieldInfo'>Comment:</span></label>
        <textarea class = 'form-control' name = 'Comment' id = 'commentarea'></textarea>
        </div>

        <br>
        <input class = 'btn btn-primary' type = 'Submit' name = 'Submit' value = 'Submit'>
        </fieldset>
        </form>
        </div>

        </div><!--main blog area ending-->
        <div class = 'col-sm-offset-1 col-sm-4'><!--side area-->
        <div class = 'panel panel-primary'>
        <div class = 'panel-heading'>
        <h2 class = 'panel-title'>Categories</h2>
        </div>
        <div class = 'panel-body'>
        <?php
        global $Connection;
        $ViewQuery = 'SELECT * FROM category ORDER BY id desc';
        $Execute = mysqli_query( $Connection, $ViewQuery );
        while ( $DataRows = mysqli_fetch_array( $Execute ) ) {
            $Id = $DataRows[ 'id' ];
            $Category = $DataRows[ 'name' ];
            $DateTime = $DataRows[ 'datetime' ];
            ?>
            <a href = "Blog.php?Category=<?php echo $Category; ?>">
            <span id = 'heading'><?php echo $Category . '<br>';
            ?></span>
            </a>
            <?php }
            ?>
            </div>
            <div class = 'panel-footer'></div>
            </div>
            <div class = 'panel panel-primary'>
            <div class = 'panel-heading'>
            <h2 class = 'panel-title'>Recent Post</h2>
            </div>
            <div class = 'panel-body background'>
            <?php
            global $Connection;
            $ViewQuery = 'SELECT * FROM admin_panel  ORDER BY  id desc LIMIT 0,5';
            $Execute = mysqli_query( $Connection, $ViewQuery );
            while ( $DataRows = mysqli_fetch_array( $Execute ) ) {
                $Id = $DataRows[ 'id' ];
                $Title = $DataRows[ 'title' ];
                $DateTime = $DataRows[ 'datetime' ];
                $Image = $DataRows[ 'image' ];
                if ( strlen( $DateTime ) > 12 ) {
                    $DateTime = substr( $DateTime, 0, 12 );
                }
                ?>

                <div>
                <img class = 'pull-left' style = 'margin-top: 10px; margin-left: 0px;'  src = "Upload/<?php echo htmlentities($Image); ?>" width = 120;
                height = 60;
                >
                <a href = "FullPost.php?id=<?php echo $Id; ?>">
                <p id = 'heading' style = 'margin-left: 130px; padding-top: 10px;'><?php echo htmlentities( $Title );
                ?></p>
                </a>
                <p class = 'description' style = 'margin-left: 130px;'><?php echo htmlentities( $DateTime );
                ?></p>
                <hr>
                </div>

                <?php }
                ?>
                </div>
                <div class = 'panel-footer'></div>
                </div>
                </div><!--Side area ending-->

                </div><!--row ending-->

                </div><!--container ending-->

                <div id = 'Footer'>

                </p>
                <p>

                </p><hr>

                </div>
                <div style = 'height: 10px; background: gray;'></div>

                </body>
                </html>

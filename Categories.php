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
    $Category = mysqli_real_escape_string( $Connection, $_POST[ 'Category' ] );
    date_default_timezone_set( 'Asia/Dhaka' );
    $CurrentTime = time();
    //$DateTime = strftime( '%Y-%m-%d %H:%M:%S', $CurrentTime );
    $DateTime = strftime( '%B-%d-%Y %H:%M:%S', $CurrentTime );
    $DateTime;
    $Admin = $_SESSION[ 'Username' ];
    if ( empty( $Category ) ) {
        $_SESSION[ 'ErrorMessage' ] = 'All Fields must be filled out';
        Redirect_to( 'Categories.php' );
    } elseif ( strlen( $Category )>99 ) {
        $_SESSION[ 'ErrorMessage' ] = 'Too Long Name for Category';
        Redirect_to( 'Categories.php' );
    } else {
        global $Connection;
        $Query = "INSERT INTO category(datetime,name,creatorname)
    VALUES('$DateTime','$Category','$Admin')";
        $Execute = mysqli_query( $Connection, $Query );
        if ( $Execute ) {
            $_SESSION[ 'SuccessMessage' ] = 'Category Added Successfully';
            Redirect_to( 'Categories.php' );
        } else {
            $_SESSION[ 'ErrorMessage' ] = 'Category failed to add';
            Redirect_to( 'Categories.php' );
        }
    }

}

?>
<!DOCTYPE>
<html>
<head>
<title>Manage Categories</title>

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
<b>BLOG YOUR TOUR</b>  </a>
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
<i class = 'fas fa-align-justify'></i>
&nbsp;
Dashboard</a></li>
<li><a href = 'NewPost.php'>
<i class = 'far fa-list-alt'></i>
&nbsp;
Add New Post</a></li>
<li class = 'active'><a href = 'Categories.php'>
<i class = 'fas fa-tags'></i>
&nbsp;
Categories</a></li>
<li><a href = 'Administrator.php'>
<i class = 'far fa-user'></i>
&nbsp;
Manage Administrator</a></li>
<li><a href = 'Comments.php'>
<i class = 'far fa-comment'></i>
&nbsp;
Comments

<?php
$Connection;
$QueryTotal = "SELECT COUNT(*) FROM comments WHERE status='OFF'";
$ExecuteTotal = mysqli_query( $Connection, $QueryTotal );
$RowsTotal = mysqli_fetch_array( $ExecuteTotal );
$Total = array_shift( $RowsTotal );
if ( $Total>0 ) {
    ?>
    <span class = 'label pull-right label-warning'>
    <?php echo $Total;
    ?>
    </span>
    <?php }
    ?>

    </a>
    </li>
    <li><a href = 'PendingPost.php'>
    <i class = 'fas fa-list'></i>
    &nbsp;
    Pending Post
    <?php
    $Connection;
    $QueryTotal = "SELECT COUNT(*) FROM admin_panel WHERE status='OFF'";
    $ExecuteTotal = mysqli_query( $Connection, $QueryTotal );
    $RowsTotal = mysqli_fetch_array( $ExecuteTotal );
    $Total = array_shift( $RowsTotal );
    if ( $Total>0 ) {
        ?>
        <span class = 'label pull-right label-warning'>
        <?php echo $Total;
        ?>
        </span>
        <?php }
        ?>
        </a></li>

        <li><a href = 'AdminLogout.php'>
        <i class = 'fas fa-sign-out-alt'></i>
        &nbsp;
        Logout</a></li>
        </ul>

        </div><!--Ending of side area -->

        <div class = 'col-sm-10'>
        <h1>Manage Categories</h1>
        <?php echo Message();
        echo SuccessMessage();
        ?>
        <div>
        <form action = 'Categories.php' method = 'post'>
        <fieldset>
        <div class = 'form-group'>
        <label for = 'categoryname'><span class = 'FieldInfo'>Name:</span></label>
        <input class = 'form-control' type = 'text' name = 'Category' id = 'categoryname' placeholder = 'Name'>
        </div>
        <br>
        <input class = 'btn btn-success btn-block' type = 'Submit' name = 'Submit' value = 'Add New Category'>
        </fieldset>
        </form>
        </div>

        <div class = 'table-responsive'>
        <table class = 'table table-striped table-hover'>
        <tr>
        <th>Sr No. </th>
        <th>Date Time </th>
        <th>Category Name </th>
        <th>Creator Name </th>
        <th>Action</th>

        </tr>
        <?php
        global $Connection;
        $ViewQuery = 'SELECT * FROM category ORDER BY datetime desc';
        $Execute = mysqli_query( $Connection, $ViewQuery );
        $SrNo = 0;
        while( $DataRows = mysqli_fetch_array( $Execute ) ) {
            $Id = $DataRows[ 'id' ];
            $DateTime = $DataRows[ 'datetime' ];
            $CategoryName = $DataRows[ 'name' ];
            $CreatorName = $DataRows[ 'creatorname' ];
            $SrNo++;

            ?>
            <tr>
            <td><?php echo $SrNo;
            ?></td>
            <td><?php echo $DateTime;
            ?></td>
            <td><?php echo $CategoryName;
            ?></td>
            <td><?php echo $CreatorName;
            ?></td>
            <td><a href = "DeleteCategory.php?id=<?php echo $Id; ?>">
            <span class = 'btn btn-danger'>Delete</span>
            </a></td>
            </tr>

            <?php }
            ?>

            </table>
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

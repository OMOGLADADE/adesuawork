<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php Confirm_Login();
?>
<!DOCTYPE>
<html>
<head>
<title>Comments</title>

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
<b>BLOG YOUR TOUR</b></a>
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
<li><a href = 'Categories.php'>
<i class = 'fas fa-tags'></i>
&nbsp;
Categories</a></li>
<li><a href = 'Administrator.php'>
<i class = 'far fa-user'></i>
&nbsp;
Manage Administrator</a></li>
<li class = 'active'><a href = 'Comments.php'>
<i class = 'far fa-comment'></i>
&nbsp;
Comments
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

    <div class = 'col-sm-10'><!--Main Area-->
    <div><?php echo Message();
    echo SuccessMessage();
    ?></div>
    <h1>Un-Approved Comments</h1>
    <div class = 'table-responsive'>
    <table class = 'table table-striped table-hover'>
    <tr>
    <th>No.</th>
    <th>Name</th>
    <th>Date</th>
    <th>Comment</th>
    <th>Approve</th>
    <th>Delete Comment</th>
    <th>Details</th>
    </tr>
    <?php
    $Connection;
    $Query = "SELECT * FROM comments WHERE status='OFF' ORDER BY admin_panel_id desc ";
    $Execute = mysqli_query( $Connection, $Query );
    $SrNo = 0;
    while( $DataRows = mysqli_fetch_array( $Execute ) ) {
        $CommentId = $DataRows[ 'id' ];
        $DateTimeofComment = $DataRows[ 'datetime' ];
        $PersonName = $DataRows[ 'name' ];
        $PersonComment = $DataRows[ 'comment' ];
        $CommentedPostId = $DataRows[ 'admin_panel_id' ];
        $SrNo++;
        ?>
        <tr>
        <td><?php echo htmlentities( $SrNo ) ?></td>
        <td style = 'color: #5e5eff;'><?php echo htmlentities( $PersonName ) ?></td>
        <td><?php echo htmlentities( $DateTimeofComment ) ?></td>
        <td><?php echo nl2br( $PersonComment ) ?></td>
        <td><a href = "ApproveComments.php?id=<?php echo $CommentId; ?>"><span class = 'btn btn-success'>Approve</span></a></td>
        <td><a href = "DeleteComments.php?id=<?php echo $CommentId; ?>"><span class = 'btn btn-danger'>Delete</span></a></td>
        <td><a href = "FullPost.php?id=<?php echo $CommentedPostId; ?>"target = '_blank'>
        <span class = 'btn btn-primary'>Live Preview</span></a></td>
        </tr>
        <?php }
        ?>
        </table>

        </div>

        <h1>Approved Comments</h1>
        <div class = 'table-responsive'>
        <table class = 'table table-striped table-hover'>
        <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Date</th>
        <th>Comment</th>
        <th>Approved By</th>
        <th>Revert Approve</th>
        <th>Delete Comment</th>
        <th>Details</th>
        </tr>
        <?php
        $Connection;
        $Query = "SELECT * FROM comments WHERE status='ON' ORDER BY admin_panel_id desc";
        $Execute = mysqli_query( $Connection, $Query );
        $SrNo = 0;
        while( $DataRows = mysqli_fetch_array( $Execute ) ) {
            $CommentId = $DataRows[ 'id' ];
            $DateTimeofComment = $DataRows[ 'datetime' ];
            $PersonName = $DataRows[ 'name' ];
            $PersonComment = $DataRows[ 'comment' ];
            $ApprovedBy = $DataRows[ 'approvedby' ];
            $CommentedPostId = $DataRows[ 'admin_panel_id' ];
            $SrNo++;
            ?>
            <tr>
            <td><?php echo htmlentities( $SrNo ) ?></td>
            <td style = 'color: #5e5eff;'><?php echo htmlentities( $PersonName ) ?></td>
            <td><?php echo htmlentities( $DateTimeofComment ) ?></td>
            <td><?php echo nl2br( $PersonComment ) ?></td>
            <td><?php echo htmlentities( $ApprovedBy ) ?></td>
            <td><a href = "DisApproveComments.php?id=<?php echo $CommentId  ?>"><span class = 'btn btn-warning'>Dis-Approve</span></a></td>
            <td><a href = "DeleteComments.php?id=<?php echo $CommentId; ?>"><span class = 'btn btn-danger'>Delete</span></a></td>
            <td><a href = "FullPost.php?id=<?php echo $CommentedPostId; ?>"target = '_blank'>
            <span class = 'btn btn-primary'>Live Preview</span></a></td>
            </tr>
            <?php }
            ?>
            </table>

            </div>

            </div><!--ending of main area -->

            </div><!--ending of row-->

            </div><!--ending of container fluid-->
            <div style = 'height: 10px; background: gray;'></div>

            <div id = 'Footer' >

            </p>
            <p>

            </p></hr>

            </div>
            <div style = 'height: 10px; background: gray;'></div>

            </body>
            </html>

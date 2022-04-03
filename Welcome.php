<?php require_once( 'Include/DB.php' );
?>
<?php require_once( 'Include/Sessions.php' );
?>
<?php require_once( 'Include/Functions.php' );
?>
<?php Confirm_Signin();
?>
<!DOCTYPE>
<html>
<head>
<title>Welcome</title>

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
<li class = 'active'><a href = 'Welcome.php'>
<i class = 'fas fa-align-justify'></i>
&nbsp;
Welcome</a></li>
<li><a href = 'UserPost.php'>
<i class = 'far fa-list-alt'></i>
&nbsp;
Add New Post</a></li>
<li><a href = 'UserSignOut.php'>
<i class = 'fas fa-sign-out-alt'></i>
&nbsp;
Signout</a></li>
</ul>

</div><!--Ending of side area -->

<div class = 'col-sm-10' style = 'background-color: 	#FAEBD7'><!--Main Area-->

<p style = 'color: #681D1D;font-size:50px;'>WELCOME to User Section of BLOG YOUR TOUR</p>
<p style = 'color: #681D1D;font-size:20px;'>
<div><?php echo Message();
echo SuccessMessage();
?></div>

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

<!doctype html>
<html lang="en">
  <head>
		<title>GALLERY </title>
    <link rel="stylesheet"href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/slide_1.css">
    <link rel="stylesheet" href="css/slide.css">
    <link rel="stylesheet"href="css/publicstyles.css">
    <link rel="stylesheet"href="css/footer.css">
 </head>
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
              <li><a href="UserSignin.php">LOGIN</a></li>
              <li><a href="UserSignUp.php">REGISTER</a></li>
              <li class="active"><a href="Gallery.php">GALLERY</a></li>
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

    <section class="slideshow">

      <ul class="navigation">

        <li class="navigation-item active">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub1.jpg);"></span>
        </li>
        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub2.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub3.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub4.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub5.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub6.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub7.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub8.jpg);"></span>
        </li>

        <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url(images/assets/img/dub9.jpg);"></span>
        </li>


      </ul>

      <div class="detail">

        <div class="detail-item active">
          <div class="headline">ABERDEEN</div>
          <div class="background" style="background-image: url(images/assets/img/dub1.jpg);height: 100vh; background-size: cover; background-position: center;"></div>
        </div>

        <div class="detail-item">
          <div class="headline">FORT- WILLIAM</div>
          <div class="background" style="background-image: url(images/assets/img/dub2.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">GLASGOW</div>
          <div class="background" style="background-image: url(images/assets/img/dub3.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">ISLE- OF- ARRAN</div>
          <div class="background" style="background-image: url(images/assets/img/dub4.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">ISLE- OF- SKYE</div>
          <div class="background" style="background-image: url(images/assets/img/dub5.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">LOCHNESS</div>
          <div class="background" style="background-image: url(images/assets/img/dub6.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">SCOTLAND-HIGHLANDS</div>
          <div class="background" style="background-image: url(images/assets/img/dub7.jpg);"></div>
        </div>


        <div class="detail-item">
          <div class="headline">ST.ANDREWS</div>
          <div class="background" style="background-image: url(images/assets/img/dub8.jpg);"></div>
        </div>

        <div class="detail-item">
          <div class="headline">STIRLING</div>
          <div class="background" style="background-image: url(images/assets/img/dub9.jpg);"></div>
        </div>
      </div>
    </section>
    <div style="height: 10px; background: gray;"></div>
    <script src="js/gallery1.js"></script>
    <script src="js/gallery2.js"></script>
    <script src="js/gallery3.js"></script>
    <script src="js/gallery4.js"></script>
    <script src="js/gallery5.js"></script>
    <script src="js/demo.js"></script>
  </body>
</html>

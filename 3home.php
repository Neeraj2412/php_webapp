<?php include('server.php') ?>
<?php
session_start();
if(isset($_SESSION['username'])){
  $_SESSION['msg'] = "You must log in first to view this page";
  header("location:login.php");
}
if(isset($_GET["logout"])){
  session_destroyed();
  unset($_SESSION['username']);
  header("location : login.php");
}
 ?>
<!Docktype HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>www.homeVlogBlog.com</title><br>
    <link rel="stylesheet" href="3home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="3home.js"></script>
    </head>
  <body>
    <?php
    if(isset($_SESSION['success'])) : ?>
    <div class="logout">
      <?php
      echo $_SESSION['success'];
      unset($_SESSION['success'])
      ?>
    </div>
  <?php endif ?>
  <!--if the user want to logout-->
  <?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome<strong><?php echo $_SESSION['username']  ?></strong></h3>
    <button><a href="3home.php?logout='1'"></a></button>
  <?php endif ?>
<h1><marquee>www.VlogBlog.com</marquee></h1><br>
<div class="buttons">
  <form action="http://www.google.com" class="navpro" target="" method="get">
      <input type="search" class="navpro" placeholder="Search..">
      <!--<input type="button"  id="s" value="search">1-->
   </form>
  <a href="#" class="fa fa-bars"></a>
  <a href="3home.html" class="transparent_btn home">Home</a>
  <a href="travel.html" class="transparent_btn travel">Travel</a>
    <a href="style.html" class="transparent_btn">Style</a>
      <a href="food.html" class="transparent_btn">Food</a>
      <a href="support.html" class="transparent_btn support">Support</a>
</div><br>
<button><a href="3home.php?logout='1'"></a></button>
<div class="sample">VlogBlog.</div><br>
<div class="main">
<p><b>Start Exploring World With VlogBlog.</b></p><br>
</div>
<div class="one43">
    <div class="coloum" id="a41"></div>
    <div class="coloum1" id="a42"></div>
    <div class="coloum2" id="a43"></div>
</div><br><br>
<div class="letsee">
  <h6 class="h6"> How it works.</h6>
<div class="left">
 <header>
   What is My Project.
 </header>
 <p class="p1"></p>
</div>
<div class="right">
 <img src="slide1.jfif"   id="slide">
</div>
<!--Here is third page. !-->
<div class="down2">

</div>

</body>
</html>

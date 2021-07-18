<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slides</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
</head>
<body style="margin: 0 !important;">
<?php
  session_start();
  if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
      header("Location: ../../../login_k.php");
  }
?>


    <div class="col-md-13 ">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
      <!-- indicator dot nov -->
      <ol class="carousel-indicators">
        <li data-target="#my_slider" data-slide-to="0" class="active"></li>
        <li data-target="#my_slider" data-slide-to="1"></li>
      </ol>
      <!--wrapper for slider-->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="../../../image/img22.jpg" alt="slide" class="center-block img-responsive" />
          <div class="carousel-caption">
            <h1>بەخێربێیت</h1>
          </div>
        </div>
        <div class="item">
          <img src="../../../image/img33.jpg" alt="slide" class="center-block img-responsive" />
          <div class="carousel-caption">
            <h1>بەشی میلاکات</h1>
          </div>
        </div>
      </div>
      <!-- control or next and prev buttun-->

      <a href="#my_slider" class="left carousel-control" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left " aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a href="#my_slider" class="right carousel-control" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        
      </a>
    </div>
    </div>
  </div>

</body>
</html>
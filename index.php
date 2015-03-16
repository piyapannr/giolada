<?php
 include 'header.php';
?>
  <?php $page = "index.php"; ?>
   <div class="row" style="padding-top:50px;">
          <div id="myCarousel" class="carousel slide" data-interval="5000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
              <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img src="img/home/header/header1.png"/>
              </div>
              <div class="item">
                <img src="img/home/header/header2.png"/>
              </div>
              <div class="item">
                <img src="img/home/header/header3.png"/>
              </div>
              <div class="item">
                <img src="img/home/header/header4.png"/>
              </div>
              <div class="item">
                <img src="img/home/header/header5.png"/>
              </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>

            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div><!-- .row slide -->

          <!-- menu row -->
        <div class="row" style="padding-top:20px;">
          <div class="col-md-1 col-md-offset-2">
            <a href="#"><img src="img/home/home_icon.png"></a>
          </div>

          <div class="col-md-1 col-md-offset-1">
            <a href="about.php"><img src="img/home/about_icon.png"></a>
          </div>

          <div class="col-md-1 col-md-offset-1">
            <a href="product.php"><img src="img/home/product_icon.png"></a>
          </div>
            
          <div class="col-md-1 col-md-offset-1">
            <a href="contact.php"><img src="img/home/contact_icon.png"></a>
          </div>
        </div><!--.menu row -->


        <div class="col-md-10 col-md-offset-1" style="padding-top:25px;padding-bottom:40px;">
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/earing.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/nacklace.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/ring.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/bangle.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/brooch.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/set.png">
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/watch.png"
          </div>
          <div class="col-md-1-5 col-sm-1-5">
            <img class="img-responsive" src="img/home/accessories.png">
          </div>
        </div><!-- . row product -->

        <hr/>

      </div><!-- .content -->
      <div style="padding-top:200px;">
      <div id="footer">
        <div class="container">
          <div class="row" >
            <div class="col-md-5 col-md-offset-4" style="padding-left:55px;">
              <a href="index.php"><font color="#73421B" class="boon-300">Home |</font></a>
              <a href="about.php"><font color="#73421B" class="boon-300">&nbsp;About us |</font></a>
              <a href="product.php"><font color="#73421B" class="boon-300">&nbsp;Product |</font></a>
              <a href="contact.php"><font color="#73421B" class="boon-300">&nbsp;Contact us</font></a>
            </div>
            <div class="col-md-5 col-md-offset-4 gfont boon-300" style="padding-left:15px;margin-top:10px;">
              <img src="img/home/line.png" height="19" width="20"> Giolada.123
              <img src="img/home/facebook.png" height="18" width="19"> /Giolada
              <img src="img/home/mail.png" height="13" width="16"> contact@giolada.com
            </div>
            <div class="col-md-5 col-md-offset-5 gfont boon-300" style="padding-left:6px;margin-top:5px;">
              © 2014 Giolada Original
            </div>
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .footer -->
      </div>
    </div><!-- .wrapper -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
           $('.carousel').carousel();
       });
    </script>
    <script type="text/javascript" src="js/fittext.js"></script>
  </body>
</html>
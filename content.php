
<!-- slideshow -->
<div class="container">
   <div class="row overflownone">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner res" role="listbox">
            <div class="item active">
                <img src="img/banner1.jpg"/>
            </div>
            <div class="item">
            <img src="img/banner2.jpg">
            </div>
            <div class="item">
            <img src="img/banner3.jpg"/>
            </div>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
</div>
</div>
</br>
 <!-- slideshow -->
<!-- display products -->
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
                <div class="latest-product">
                    <h2 align="center" class="section-title"><b style="border-bottom: solid black 3px;">TOP PICKS FOR YOU</bs></h2></br>
                    <div class="product-carousel">
                        <?php
                            // 	include_once("database.php");
                            $result = mysqli_query($conn, "SELECT * FROM product LIMIT 8");

                            if (!$result) { //add this check.
                                die('Invalid query: ' . mysqli_error($conn));
                            }

                        
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        ?>
                        <div class="col-lg-3 col-sm-6 col-md-4">
                        <a href="index.php?page=productpage&&id=<?php echo $row['Pro_ID']; ?>">
                            <div class="box-img">
                            </br>
                                <img src="product_image/<?php echo $row['Image']?>" width="200" height="200"></br></br>
                                <b style="color: black;"><?php echo  $row['Pro_Name']?></b></br>
                                <b><i style="color: black;">Price: <?php echo number_format($row['Price'],0,",",".")."VND";?></i></b>
                            </div>
                            </a>
                        </div>          
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$pageTitle = "BaazarOnline : Shopping website.";
$metaPage = 'index';
include_once("includes/header.php"); 
?>

    <?php require_once("includes/components/Comp-hero_slider.php"); ?>
        <div class="split-banner-area mb-40 mb-sm-30">
            <div class="container">
                <!-- <div class="section-title mb-20">
                    <h2>Today's Best Offer</h2>
                </div>     -->
                <div class="row row-5">
                <?php 
                    $showcase = $settingsClass->getShowCase();
                    foreach ( $showcase as $key => $show ) {
                    ?>
                        <div class="col-md-6 mb-sm-10">
                        <div class="single-split-banner">
                            <div class="single-split-banner__image">
                                <a href="<?php echo $show->link_Url; ?>">
                                   <!-- <img src="<?php echo $show->img_url; ?>" class="img-fluid" alt="">
                                    <div class="single-split-banner__image__content">
                                        <p class="split-banner-title split-banner-title--light"><?php echo ucfirst($show->text); ?></p>
                                        <p class="split-banner-title split-banner-title--bold"><?php echo strtoupper($show->desc_); ?></p>
                                        <p class="split-banner-title split-banner-title--price">from <span class="amount">Rs <?php echo $show->price; ?></span></p>
                                    </div> -->
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-double-row-slider-area mb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  section title  =======-->
                        <div class="section-title mb-20">
                            <h2>New Products</h2>
                        </div>                        
                        <!--=======  End of section title  =======-->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <!--=======  product double row slider wrapper  =======-->
                        <div class="product-double-row-slider-wrapper">
                            <div class="ht-slick-slider"
                            data-slick-setting='{
                                "slidesToShow": 5,
                                "slidesToScroll": 1,
                                "dots": false,
                                "autoplay": false,
                                "autoplaySpeed": 5000,
                                "speed": 1000,
                                "arrows": true,
                                "rows": 1,
                                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                                "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                            }'
                            data-slick-responsive='[
                                {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                                {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                                {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                                {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                            ]'
                            >  
                            <?php 
                                $newProducts = $productClass->newProducts();
                                if ( $newProducts !== FALSE ) {
                                    foreach ($newProducts as $key => $product) {
                                    ?>
                                        <div class="single-slider-product-wrapper">
                                            <div class="single-slider-product">
                                                <div class="single-slider-product__image">
                                                    <a href="product.php?id=<?php echo $product->product_id;?>&slug=<?php echo $product->slug;?>">
                                                        <img src="<?php echo !empty($product->product_imgUrl) ? $product->product_imgUrl : 'uploads/no_image.jpg'; ?>" class="img-fluid" alt="<?php echo $product->product_name; ?>" width="160">
                                                    </a>
                                                    
                                                    <span class="discount-label discount-label--red">
                                                    <?php 
                                                    if(!empty($product->offer_discount)) {
                                                        echo percent($product->retail_price , $product->offer_discount). ' %';

                                                    } 
                                                    ?>
                                                    </span>

                                                    <div class="hover-icons">
                                                        <ul>
                                                            <li><a  href="product.php?id=<?php echo $product->product_id;?>&slug=<?php echo $product->slug;?>"><i class="icon-eye"></i></a></li>
                                                            <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                                <div class="single-slider-product__content">
                                                    <p class="product-title"><a href="product.php"><?php echo ucfirst($product->product_name);?></a></p>
                                                    <div class="rating">
                                                        <i class="ion-android-star active"></i>
                                                        <i class="ion-android-star active"></i>
                                                        <i class="ion-android-star active"></i>
                                                        <i class="ion-android-star active"></i>
                                                        <i class="ion-android-star"></i>
                                                    </div>
                                                    <p class="product-price">
                                                    <?php 
                                                    if(!empty($product->offer_discount)) {
                                                        echo "<span class='discounted-price'>Rs  $product->offer_discount</span>"; 
                                                        echo "<span class='main-price discounted'>".$product->retail_price."</span></p>";
                                                    } else {
                                                        echo "<span class='discounted-price'>Rs  $product->retail_price</span>";
                                                    }
                                                    ?>
            <span class="cart-icon"><a href="<?php echo hash_($product->product_id); ?>" class='icon_addtocart'><i class="icon-shopping-cart" ></i></a></span>
                                                </div>
                                            </div>
                                        </div>
                                   <?php }
                                } ?>
                            </div>
                        </div>
                        <!--=======  End of product double row slider wrapper  =======-->
                    </div>
                </div>
            </div>
        </div>
		<div class="container">
		     <!--=======  section title  =======-->
                        <div class="section-title mb-20">
                            <h2>Latest Products</h2>
                        </div>                        
                        <!--=======  End of section title  =======-->
<div class="card card-body">
	<div class="row">
		<div class="col-md-3">
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/water.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Water Purifier</a><br>
					<strong class="price">₹ 4000</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

		<div class="col-md-3">
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/chimney.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Chimney</a><br>
					<strong class="price">₹ 7000</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

		<div class="col-md-3">
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/dome.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">CCTv Camera</a><br>
					<strong class="price">₹ 2000</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

		<div class="col-md-3">
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/table-fan.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Table Fan </a><br>
					<strong class="price">₹ 1500</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->
	</div> <!-- row.// -->
</div>
</div>

<!-- images --->
<div class="container paddingtopbottom">
<div class="row">
<div class="col-sm-4"><a href=""><img src="http://htmldemo.themessoft.com/organ/version1/images/speakers.png" class="img-responsive"></a>
</div><div class="col-sm-4"><a href=""><img src="http://htmldemo.themessoft.com/organ/version1/images/schedule.png"></a>
</div><div class="col-sm-4"><a href=""><img src="http://htmldemo.themessoft.com/organ/version1/images/details.png"></a>
</div>
</div>
</div></div>
<!-- images-->
<!-- features Products-->
<div class="container-fulid backgroundfixed">
		<div class="container">
<div class="card card-body">
	<div class="row">
		<div class="col-md-4">
		 <!--=======  section title  =======-->
                        <div class="section-title mb-20">
                            <h2>CCTv Camera</h2>
                        </div>                        
                        <!--=======  End of section title  =======-->
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/bullet.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Bullet Camera</a><br>
					<strong class="price">₹ 2000</strong>
				</figcaption>
			</figure>
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/robot.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Robot Camera</a><br>
					<strong class="price">₹ 2500</strong>
				</figcaption>
			</figure><figure class="itemside mb-2">
				<div class="aside"><img src="uploads/dome.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Dome Camera</a><br>
					<strong class="price">₹ 2800</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

		<div class="col-md-4">
		 <!--=======  section title  =======-->
                        <div class="section-title mb-20">
                            <h2>Grocery</h2>
                        </div>                        
                        <!--=======  End of section title  =======-->
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/hide-seek.webp" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Hide & Seek</a><br>
					<strong class="price">₹ 50</strong>
				</figcaption>
			</figure>
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/kitkat.webp" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">KitKat</a><br>
					<strong class="price">₹ 999</strong>
				</figcaption>
			</figure>
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/mushrooms.webp" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Fresho Mushrooms - Button, 200 g</a><br>
					<strong class="price">₹ 69</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

		<div class="col-md-4">
		 <!--=======  section title  =======-->
                        <div class="section-title mb-20">
                            <h2>Mobile</h2>
                        </div>                        
                        <!--=======  End of section title  =======-->
			<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/mobiles/nord.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">One Plus Nord 5G</a><br>
					<strong class="price">₹ 27000</strong>
				</figcaption>
			</figure>
				<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/mobiles/iphone-se.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Apple Iphone SE</a><br>
					<strong class="price">₹ 37000</strong>
				</figcaption>
			</figure>	<figure class="itemside mb-2">
				<div class="aside"><img src="uploads/mobiles/pixel.jpg" class="border img-sm"></div>
				<figcaption class="info align-self-center">
					<a href="#" class="title">Google Pixel 4a</a><br>
					<strong class="price">₹ 55000</strong>
				</figcaption>
			</figure>
		</div> <!-- col.// -->

	</div> <!-- row.// -->
</div>
</div>
</div>
<!-- End features Products-->
<!--<div class="container-fulid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://www.bigbasket.com/media/uploads/banner_images/NNP1738-28may20.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.bigbasket.com/media/uploads/banner_images/NNP1743-28may20.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://www.bigbasket.com/media/uploads/banner_images/NNP1739-28may20.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>-->
<!--offer slider -->
<div class="container paddingtopbottom">
<div class="row">
<div class="col-md-3">
	<article class="card card-body border" style="
    background: #79b103;
">
		<figure class="text-center">
			<figcaption class="pt-4">
			<h5 class="title" style="
    color: #fff;
    font-size: 18px;
">Creative Strategy &amp; solution</h5>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article>
</div><!-- col // -->
<div class="col-md-3">
	<article class="card card-body border" style="
    background: #685c88;
">
		<figure class="text-center">
			<figcaption class="pt-4">
			<h5 style="
    color: #fff;
    font-size: 18px;
">Creative Strategy &amp; solution</h5>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article>
</div> <!-- col // -->
<div class="col-md-3">
<article class="card card-body border" style="
    background: #dc4720;
">
		<figure class="text-center">
			<figcaption class="pt-4">
			<h5 style="
    color: #fff;
    font-size: 18px;
">Creative Strategy &amp; solution</h5>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article>
</div> <!-- col // -->
<div class="col-md-3">
	<article class="card card-body border" style="
    background: #fc9cc4;
">
		<figure class="text-center">
			<figcaption class="pt-4">
			<h5 style="
    color: #fff;
    font-size: 18px;
">Creative Strategy &amp; solution</h5>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article>
</div> <!-- col // -->
</div>
</div>
<!--end offer slider-->
        <!--====================  End of product double row slider area  ====================-->
        <?php include_once("includes/components/Comp-news_letter.php"); ?>
        
<?php include_once("includes/footer.php"); ?>

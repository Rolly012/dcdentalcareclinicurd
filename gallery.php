<?php
	
	include 'content/head.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="<?php echo $web_name; ?>" />
	
	<!-- OG -->
	<meta property="og:title" content="<?php echo $web_name; ?>" />
	<meta property="og:description" content="<?php echo $web_name; ?>" />
	<meta name="og:image" content="images/preview.png" align="middle"/>
	<meta name="format-detection" content="telephone=no">
	
	<link rel="icon" href="assets/images/<?php echo $web_icon; ?>.png"" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $web_icon; ?>.png"" />
		<title><?php echo $web_name; ?></title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">	
</head>
<?php include 'assets/css/color/color-1.php';  ?>
<style type="text/css">
	ul {
  list-style-type: none; /* Remove bullets */
  padding: 0; /* Remove padding */
  margin: 0; /* Remove margins */
}
</style>
<body id="bg">
<div class="page-wraper">

	<?php include 'content/navigation.php'; ?>
	
    <!-- Inner Content Box ==== -->
    <div class="page-content bg-white">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/cover.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?php echo $web_header; ?> Gallery</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>Gallery</li>
				</ul>
			</div>
		</div>
		<div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
<!-- 					<div class="feature-filters clearfix center m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="#"><span>All</span></a> 
							</li>
							<li data-filter="book" class="btn">
								<input type="radio">
								<a href="#"><span>Book</span></a> 
							</li>
							<li data-filter="courses" class="btn">
								<input type="radio">
								<a href="#"><span>Courses</span></a> 
							</li>
							<li data-filter="education" class="btn">
								<input type="radio">
								<a href="#"><span>Education</span></a> 
							</li>
						</ul>
					</div> -->
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<?php
												
								$status = 1;
								$rows = $model->fetchGallery($status);

								if (!empty($rows)) {
									foreach ($rows as $row) {

							?>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 education book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/gallery/<?php echo $row['image_unique']; ?>.jpg" alt="" style="width: 262.5px; height: 262.5px; object-fit: cover;"> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/gallery/<?php echo $row['image_unique']; ?>.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#"><?php echo $row['details']; ?></a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php

									}
								}

							?>
						</ul>
					</div>
				</div>
			</div>
        </div>


			 <!-- Our Story ==== -->
            <div class="section-area section-sp1">
                <div class="container">

					
                </div>
            </div>
            <!-- Our Story End -->	
			
			<?php include 'content/footer.php' ?>
			
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

</html>

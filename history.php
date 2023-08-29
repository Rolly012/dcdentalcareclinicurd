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
<body id="bg">
<div class="page-wraper">

	<?php include 'content/navigation.php'; ?>
	
    <!-- Inner Content Box ==== -->
    <div class="page-content bg-white">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/cover.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?php echo $web_header; ?> Story</h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>Our Story</li>
				</ul>
			</div>
		</div>
		<!-- Page Heading Box END ==== -->
        <!-- Page Content Box ==== -->
		<div class="content-block">


			 <!-- Our Story ==== -->
            <div class="section-area section-sp1">
                <div class="container">
					<div class="row align-items d-flex">
						<div class="col-lg-7 col-md-12">
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Our <span> Story</span></h2>
							</div>
								<p style="text-align: justify; "><?php echo $story; ?></p>						
						</div>
						<div class="col-lg-5 col-md-12">


							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Your <span>Doctor</span></h2>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<div class="profile text-center">
										<div>
											<img src="assets/images/org-structure/<?php echo $brgy_head_pic; ?>.jpg" style="width: 150px; height: 200px;">												
										</div>
										<div class="profile-info">
											<h4><?php echo $brgy_head; ?></h4>
											<span>DC Dental Care Clinic</span>
										</div>
									</div>
								</div>		
							</div>		   
						</div>
					</div>
					
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

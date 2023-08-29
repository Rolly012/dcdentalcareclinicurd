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
	<meta name="theme-color" content="#810725" />
	
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
	
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
</head>
<?php include 'assets/css/color/color-1.php';  ?>
<body id="bg">

    <?php include 'content/navigation.php'; ?>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
    	<div class="page-banner ovbl-dark" style="background-image:url(assets/images/cover.jpg);">
           <div class="container">
					<div class="row">

						<div class="col-md-12 text-center text-white">
							<h1><br><br>Transforming smiles everyday</h1>
							<h4>Modern Dentistry, Cosmetic Dentistry, and Orthodontics<br><br></h4>
						</div>
					</div>
					<div class="mw800 m-auto">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-harddrives"></i><span class="counter">5</span></h3>
									</div>
									<span class="cours-search-text">Branches in Cavite</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-support"></i><span class="counter">10</span></h3>
									</div>
									<span class="cours-search-text">Doctors</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-comments-smiley"></i><span class="counter">158</span></h3>
									</div>
									<span class="cours-search-text">Happy Patients</span>
								</div>
							</div>
						</div>
						<br><br>
					</div>
				</div>
        </div>

    		<!-- <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(assets/images/cover.jpg);">
 -->
		<div class="content-block">

            <!-- Our Services END -->
			
			<!-- Popular Courses -->
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Recent <span>Announcements</span></h2>
							<p>Check out the latest news, events and announcements here.</p>
						</div>
					</div>	
					<div class="row">
					<div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
						<?php
							$category = 0;
							$status = 1;
							$rows = $model->displayRecentAnnouncements($category, $status);

							if (!empty($rows)) {
								foreach ($rows as $row) {

									$class = date('M. d, Y', strtotime($row['date']));
									$class_today = date('M. d, Y');

						?>
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="assets/images/announcement/<?php echo $row['image_unique']; ?>.jpg" style="height: 250px;object-fit: cover;" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date"><?php echo date('d', strtotime($row['date'])); ?></div>
											<div class="event-month"><?php echo date('F', strtotime($row['date'])); ?></div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="announcement-details?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> <?php echo date('g:i A', strtotime($row['date'])); ?></a></li>
										</ul>
										<p><?php echo substr($row['details'], 0, 150); ?><a href="announcement-details?id=<?php echo $row['id']; ?>" style="color: brown;">.... See More</a></p>
									</div>
								</div>
							</div>
						</div>
						<?php 
							}
						}
						?>
					</div>
					</div>
					<div class="text-center">
						<a href="all-announcements" class="btn">View All Announcements</a>
					</div>
				</div>
			</div>
			<!-- Popular Courses END -->
			

			

			
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->

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
<!-- Revolution JavaScripts Files -->
<script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript">
    $("img").mousedown(function(){
	return false;
	});
</script>
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"assets/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},
				
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});	
</script>
</body>

</html>

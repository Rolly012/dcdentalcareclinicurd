<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	
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
	<meta name="description" content="<?php echo $web_name; ?>" />
	
	<!-- OG -->
	<meta property="og:title" content="<?php echo $web_name; ?>" />
	<meta property="og:description" content="<?php echo $web_name; ?>" />
	<meta name="og:image" content="images/preview.png" align="middle"/>
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $web_icon; ?>.png" />
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
	.responsive-iframe {
	  position: absolute;
	  top: 0;
	  left: 0;
	  bottom: 0;
	  right: 0;
	  width: 100%;
	  height: 100%;
	  border: none;
	}
	.container2 {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
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
					<h1 class="text-white">My Appointment</h1>
				 </div>
			</div>
		</div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>My Appointment</li>
				</ul>
			</div>
		</div>
		<div class="content-block">
			<div class="content-block">
			<div class="section-area section-sp1">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<form class="contact-bx dzForm" method="POST">
							<div class="dzFormMsg"></div>
								<div class="heading-bx left">
									<h2 class="title-head">My <span>Appointment</span></h2>
									<p>Check the status of your appointment now!</p>
								</div>
								<div class="row placeani" id="sent">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Reference Code</label>
											<div class="input-group">
												<input name="ref_code" type="text" class="form-control" minlength="6" maxlength="6" placeholder="Enter Reference Code" value="<?php if(isset($_POST['ref_code'])){ echo $_POST['ref_code'];} ?>" required>
											</div>
										</div>
									</div>

									<div class="col-lg-12" align="right">
										<button name="post_msg" type="submit" value="Submit" class="btn button-md btn-block">TRACK APPOINTMENT</button>
									</div>
									<div class="col-lg-12">
									<br>
									<?php
										if (isset($_POST['post_msg'])) {
											$ref_code = $_POST['ref_code'];
											$rows = $model->trackAppointment($ref_code);

											if (!empty($rows)) {
												foreach ($rows as $row) {
													
												}
									?>	
																<div class="row">
																	<div class="form-group col-6">
																		<label class="col-form-label">Fullname</label>
																		<input class="form-control" type="text" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Preferred Date & Time</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Concern</label>
																		<input class="form-control" name="approve-email" type="text" value="<?php echo $row['concern']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Date Sent</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($row['date_sent'])); ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-12">
																		<?php 
																		if ($row['status'] == 1) {
																			echo "<center><h4 style='color: green;'>YOUR REQUEST HAS BEEN APPROVED.</h4></center>";
																		}
																		else if ($row['status'] == 2) {
																			echo "<center><h4 style='color: blue;'>YOUR REQUEST IS PENDING.</h4></center>";
																		}
																		else if ($row['status'] == 3) {
																			echo "<center><h4 style='color: red;'>YOUR REQUEST HAS BEEN DECLINED.</h4></center>";
																		}
																		else if ($row['status'] == 4) {
																			echo "<center><h4 style='color: red;'>YOUR REQUEST HAS BEEN CANCELLED.</h4></center>";
																		}
																		else {
																			echo "<center><h4 style='color: red;'>YOUR REQUEST HAS BEEN CANCELLED.</h4></center>";
																		}
																		?>
																	</div>
																</div>
									<?php
											}
											else {
												echo "<center><h4 style='color: red;'>REFERENCE CODE NOT FOUND. PLEASE TRY AGAIN.</h4></center><br><br>";
											}
										}
									?>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Dental <span>Appointment Guidelines</span></h2>
							</div>
								1. No companion/s are allowed except for PWDs, senior citizens, and minors.<br>
								2. No mask, no entry policy. Mask should be worn at all times, only to be removed upon the instruction of our staff/dentists<br>
								3. If you have flu-like symptoms like fever, cough, colds, or headache, please have your appointment rescheduled.<br>
								4. Observe physical distancing<br>
								5. Disinfect hands/foot wear prior to entering (Hand disinfectant, foot wear disinfectant and fogging/misting machine disinfectant are available at the entrance. We will also provide you with your clean protective equipments.) <br>
								6. Be on time. (We can cancel an appointment if you're late, to give way for disinfection in preparation for the next patient.)<br>
								7. Cancellation/rebooking should be done at least two (2) days prior to your scheduled appointment. Cancellation/rebooking terms and charges shall be applied accordingly.<br>
						</div>
					</div>
				</div>
			</div>

			<?php include 'content/footer.php' ?>

		</div>
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

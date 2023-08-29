<?php
	
	//use PHPMailer\PHPMailer\PHPMailer;
	
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
					<h1 class="text-white">Health Declaration</h1>
				 </div>
			</div>
		</div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>Health Declaration</li>
				</ul>
			</div>
		</div>
		<div class="content-block">
			<div class="content-block">
			<div class="section-area section-sp1">
				<div class="container">
					<div class="row">
						<?php 
						if (empty($_GET['id'])) {
							echo "<script>window.open('index','_self');</script>";
						}
						else {
							$appointment_id = isset($_GET['id']) ? $_GET['id'] : '';
							$rows = $model->trackHealthDeclaration($appointment_id);
							if (!empty($rows)) {
								foreach ($rows as $row) {
						?>
						<div class="col-lg-6 col-md-12">
							<form class="contact-bx dzForm" method="POST">
							<div class="dzFormMsg"></div>
								<div class="row placeani" id="sent">
									<div class="col-lg-12">
										<center>
											<h3>Your <span style="color: <?php echo $primary_color; ?>;">Health Declaration</span> is already submitted.</h3>
											<img src="assets/images/<?php echo $web_icon; ?>.png" style="width: 300px;height: 300px;"><br><br>
											<h3>Reference Code: <span style="color: <?php echo $primary_color; ?>;"><?php echo $row['code']; ?></span></h3>
											<h5>Date Submitted: <span style="color: <?php echo $primary_color; ?>;"><?php echo date('M. d, Y - g:i A', strtotime($row['date_sent'])); ?></span><br>
												Appointment Schedule: <span style="color: <?php echo $primary_color; ?>;"><?php echo date('M. d, Y', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></span>
											</h5>
										</center>
									</div>
								</div>
								<hr>
						</div>
						<?php			
								}
							}
							else {
						?>
						<div class="col-lg-6 col-md-12">
							<form class="contact-bx dzForm" method="POST">
							<div class="dzFormMsg"></div>
								<div class="heading-bx left">
									<h2 class="title-head">Health <span>Declaration</span></h2>
								</div>
								<div class="row placeani" id="sent">
									<div class="col-lg-12">
										<div class="form-group">
											<label>1. In the past 14 days, have you or any member of your household, traveled to any areas with known cases of COVID-19?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd1" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd1" value="No">&nbsp;&nbsp;No
											</span>
										</div>
										<div class="form-group">
											<label>If YES please state the exact location </label><div class="input-group">
											<input name="hd1a" type="text" class="form-control" maxlength="50"></div>
										</div>
										<div class="form-group">
											<label>2. In the past 14 days, have you or any member or your household has had any contact with any COVID-19 patient?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd2" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd2" value="No">&nbsp;&nbsp;No
											</span>
										</div>
										<div class="form-group">
											<label>3. Have you or any household member have any history of exposure to any COVID-19 biological material (eg saliva)?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd3" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd3" value="No">&nbsp;&nbsp;No
											</span>
										</div>
										<div class="form-group">
											<label>4. Have you had any history of fever for the last 14 days?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd4" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd4" value="No">&nbsp;&nbsp;No
											</span>
										</div>
										<div class="form-group">
											<label>5. Have you had any symptoms in the last 14 days such as: cough, nausea, diarrhea, loss of taste, breathing difficulty, body ache, loss of smell, fever?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd5" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd5" value="No">&nbsp;&nbsp;No
											</span>
										</div>
										<div class="form-group">
											<label>6. Urgent dental need in the last 14 days such as uncontrolled dental/oral pain, sweling, bleeding,infection, trauma?</label><br>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd6" required value="Yes">&nbsp;&nbsp;Yes
											</span>
											<span class="container">
											  <span class="checkmark"></span><input type="radio" name="hd6" value="No">&nbsp;&nbsp;No
											</span>
										</div>
									</div>

									<div class="col-lg-12">
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="confirm_terms" required>
												<label class="custom-control-label" for="confirm_terms" style="font-size: 13px;text-align: justify;">I give my full consent to have dental treatment done to me in this time of pandemic caused by COVID-19 disease</label>
											</div>
										</div>
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="affirm_rights" required>
												<label class="custom-control-label" for="affirm_rights" style="font-size: 13px;text-align: justify;">As explained by my dentist, the virus can be transmitted by contact through surfaces and that it can stay in the air for 5 to 72 hours. I am aware that it is impossible to identify who is probable, suspect or COVID-19 positive. Because of this, treatment options are limited to urgent and emergent care to protect me, other patients and the dental staff.</label>
											</div>
										</div>
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="22" required>
												<label class="custom-control-label" for="22" style="font-size: 13px;text-align: justify;">I recognize that the clinic is adhering to the strictest infection control protocols for my protection and such, I agree to cover the fees that this entails. </label>
											</div>
										</div>
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="33" required>
												<label class="custom-control-label" for="33" style="font-size: 13px;text-align: justify;">I fully understand the risk that because of the nature of the virus, traveling to the clinic, the clinical procedures, and even by simply staying in the dental office, I have a higher chance of contracting the virus. Should I contract the virus, I hereby agree that I shall not hold the dental office liable.</label>
											</div>
										</div>
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="44" required>
												<label class="custom-control-label" for="44" style="font-size: 13px;text-align: justify;">I am also giving my consent that in accordance to the IATF rules, my identity shall be revealed for possible contact tracing for the interest and safety of the community.</label>
											</div>
										</div>
										<div class="form-group form-forget">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="55" required>
												<label class="custom-control-label" for="55" style="font-size: 13px;text-align: justify;">I am TRUTHFULLY answering the questionnaire and fully understood the informed consent form.</label>
											</div>
										</div>
									</div>

									<div class="col-lg-12" align="right">
										<button name="post_msg" type="submit" value="Submit" class="btn button-md btn-block">SUBMIT INFORMATION</button><hr>
									</div>
									<div class="col-lg-12" align="center">
									<br>
									<label style="color: green;font-weight: 540;">
									<?php

										if(isset($_POST['post_msg'])){
											$hd1 = $_POST['hd1'];
			                                $hd1a = $_POST['hd1a'];
			                                $hd2 = $_POST['hd2'];
			                                $hd3 = $_POST['hd3'];
			                                $hd4 = $_POST['hd4'];
			                                $hd5 = $_POST['hd5'];
			                                $hd6 = $_POST['hd6'];
			                                $date_sent = date("Y-m-d H:i:s");

			                                $model = new Model();
			                               	$new = $model->addHealthDeclaration($appointment_id, $hd1, $hd1a, $hd2, $hd3, $hd4, $hd5, $hd6, $date_sent);
			                               	echo "<script>window.open('health-declaration?id=".$appointment_id."', '_self');</script>";
										}

									?>
									</label>
									</div>
								</div>
							</form>
						</div>
						<?php
							}
						}
						?>

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
								7. Cancellation/rebooking should be done at least two (2) days prior to your scheduled appointment. Cancellation/rebooking terms and charges shall be applied accordingly.<hr>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Contact <span> Us</span></h2>
							</div>
								<a href="https://www.facebook.com/guibandentalclinic" style="font-size: 20px; color: black;"><i class="fa fa-facebook" style="font-size: 25px;"></i> Guiban Dental Clinic</a><br>
								<a href="https://www.facebook.com/guibandentalclinic" style="font-size: 20px; color: black;"><i class="fa fa-phone" style="font-size: 25px;"></i> 0960-682-0814<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0975-383-6250<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(046) 890 0033</a><br><br>
							<div class="container2">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247257.60899677538!2d120.84646011725373!3d14.461697804266057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d5d5e3ecdd9b%3A0x51dff9e288ae154c!2sGuiban%20Dental%20Clinic%20Dasmari%C3%B1as%20Branch!5e0!3m2!1sen!2sph!4v1635726480745!5m2!1sen!2sph" class="responsive-iframe"allowfullscreen="" loading="lazy"></iframe>
							</div>


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

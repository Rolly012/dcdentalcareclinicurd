<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
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

	.btn.dropdown-toggle.btn-default:focus {
		color: black;
	}

	.btn.dropdown-toggle.btn-default:hover {
		color: black;
	}

	.disabled > a {
		color: red!important;
	}

	li[data-original-index="0"] > a {
		color: black!important;
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
					<h1 class="text-white">Book Appointment</h1>
				 </div>
			</div>
		</div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>Book Appointment</li>
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
									<h2 class="title-head">Book <span>Appointment</span></h2>
									<p>Schedule your appointment now!</p>
								</div>
								<div class="row placeani" id="sent">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Full name</label>
											<div class="input-group">
												<input name="name" type="text" class="form-control" minlength="3" maxlength="70" required>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Age</label><div class="input-group">
												<input name="age" type="text" class="form-control" minlength="1" maxlength="2" required>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Email</label><div class="input-group"> 
												<input name="contact" type="email" class="form-control" minlength="3" maxlength="50" required>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Unit/Floor</label>
											<div class="input-group"> 
												<input name="address1" type="text" class="form-control" minlength="5" maxlength="100" required>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Street/Building Name</label>
											<div class="input-group"> 
												<input name="address2" type="text" class="form-control" minlength="5" maxlength="100" required>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Region/City/District</label>
											<div class="input-group"> 
												<input name="address3" type="text" class="form-control" minlength="5" maxlength="100" required>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Preferred DATE of appointment:</label>
											<div class="input-group"> 
												<input name="appointment_date" id="appointment_date" type="date" class="form-control" min="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" required>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Preferred TIME of appointment: </label>
											<select class="form-control" name="appointment_time" id="appointment_time" required style="color: black!important;">
												<option value="" disabled selected hidden="">-- Please select --</option>
												<option value="9-10 AM">9-10 AM</option>
												<option value="10-11 AM">10-11 AM</option>
												<option value="11-12 PM">11-12 PM</option>
												<option value="12-1 PM">12-1 PM</option>
												<option value="1-2 PM">1-2 PM</option>
												<option value="2-3 PM">2-3 PM</option>
												<option value="3-4 PM">3-4 PM</option>
												<option value="4-5 PM">4-5 PM</option>
											</select>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Dental Concern/Procedure:</label>
											<select class="form-control" name="procedure" id="procedure" required style="color: black!important;">
												<option value="" disabled selected hidden="">-- Please select --</option>
												<option value="Orthodontic Treatment">Orthodontic Treatment</option>
												<option value="Oral Prophylaxis/Cleaning">Oral Prophylaxis/Cleaning</option>
												<option value="Restoration">Restoration</option>
												<option value="Oral Surgery">Oral Surgery</option>
												<option value="Root Canal">Root Canal</option>
												<option value="Prosthodontics">Prosthodontics</option>
												<option value="Cosmetic">Cosmetic</option>
											</select>
										</div>
									</div>
									<div class="col-lg-12" align="right">
										<button name="post_msg" type="submit" value="Submit" class="btn button-md btn-block">BOOK APPOINTMENT</button><hr>
										<center><b>**Please wait for the booking confirmation message and appointment guidelines after sending this form.***</b><center>
									</div>
									<div class="col-lg-12" align="center">
									<br>
									<label style="color: green;font-weight: 540;">
									<?php

										if(isset($_POST['post_msg'])){
											$name = $_POST['name'];
											$age = $_POST['age'];
											$contact = $_POST['contact'];
											//$address = $_POST['address'];
											$address = "".$_POST['address1'].", ".$_POST['address2'].", ".$_POST['address3']." ";
											$appointment_date = $_POST['appointment_date'];
											$appointment_time = $_POST['appointment_time'];
											$procedure = $_POST['procedure'];
											$code = random_int(100000, 999999);
											$date = date("Y-m-d H:i:s");
											$status = 2;

											$model->requestAppointment($name, $age, $contact, $address, $appointment_date, $appointment_time, $procedure, $code, $status, $date);

											require 'vendor/autoload.php';

											$mail = new PHPMailer(true);
												
											$mail->SMTPDebug = SMTP::DEBUG_SERVER;
											$mail->SMTPDebug = false;
											$mail->isSMTP();
											$mail->Host = 'smtp.gmail.com';
											$mail->SMTPAuth = true;
											$mail->Username = 'mhoinfanta2022@gmail.com';
											$mail->Password = 'pkjkgahfxctssdec';
											$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
											$mail->Port = 465;
 
											$mail->isHTML(true);
											$mail->setFrom("mhoinfanta2022@gmail.com", 'DC Dental Care Clinic - Book Appointment');
											$mail->addAddress($_POST['contact']);
											$mail->Subject = 'DC Dental Care Clinic - Appointment Request - Reference Code: '.$code.'';
											$mail->Body = "Hi $name,<br><br>Your request for appointment on $appointment_date - $appointment_time has been submitted.<br>Your reference code is $code <br>Please wait for another email for the status of your request.<br><br>You can track the status of your appointment with this link using your reference code. <a href='http://localhost/dc-dental/my-appointment' target='_blank'>Click Here</a>";

											if ($mail->send()) {
												echo 'Appointment request has been sent<br>Reference code: '.$code.'';
											} 
											else {
												echo $mail->ErrorInfo;
											}
										}

									?>
									</label>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Contact <span> Us</span></h2>
							</div>
								<!-- <a href="https://www.facebook.com/dcdentalcareclinicurdaneta" style="font-size: 20px; color: black;"><i class="fa fa-facebook" style="font-size: 25px;"></i> DC Dental Care Clinic</a><br>
								<a href="https://www.facebook.com/guibandentalclinic" style="font-size: 20px; color: black;"><i class="fa fa-phone" style="font-size: 25px;"></i> 0960-682-0814<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0975-383-6250<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(046) 890 0033</a><br><br> -->
							<div class="container2">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d932.6902908218017!2d120.57344156956124!3d15.980061288324455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913e4cab104e9d%3A0xd1c3708a8f12ed8b!2sDental%20Care%20Clinic%20Co!5e1!3m2!1sen!2sph!4v1691418231429!5m2!1sen!2sph" class="responsive-iframe"allowfullscreen="" loading="lazy"></iframe>
							</div>


						</div>
					</div>
				</div>
			</div>

			<?php include 'content/footer.php' ?>

		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#appointment_date').change( function() {
					var appointment_date = $(this).val();

					$.ajax({
						url:'assets/fetch-time.php',
						method:'POST',
						data: {
							appointment_date : appointment_date
						},
						success:function(data) {
							$("#appointment_time option").prop('disabled', false);
							$('#appointment_time option[value=""]').prop('disabled', true);

							if (data != 'No result') {
								const result = data.split(", ")

								result.forEach( function(item) {
									if (item == $("#appointment_time option:selected").val()) {
										$('#appointment_time option[value="'+item+'"]').prop('selected', false);
									}

									$('#appointment_time option[value="'+item+'"]').prop('disabled', true);
								});
							}

							else {}

							$('#appointment_time').selectpicker('render');
						}
					});
				});
			});
		</script>
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

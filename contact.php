<?php
	
include 'content/head.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="<?php echo $web_name; ?>" />
	<meta property="og:title" content="<?php echo $web_name; ?>" />
	<meta property="og:description" content="<?php echo $web_name; ?>" />
	<meta name="og:image" content="images/preview.png" align="middle"/>
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $web_icon; ?>.png" />
	<title><?php echo $web_name; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
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
	  padding-top: 56.25%;
	}
</style>
<body id="bg">
<div class="page-wraper">
	<?php include 'content/navigation.php'; ?>
    <div class="page-content bg-white">
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/cover.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Contact <?php echo $web_header; ?></h1>
				 </div>
            </div>
        </div>
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="home">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
		<div class="content-block">
			<div class="content-block">
            <div class="section-area section-sp1">
                <div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Contact <span> Us</span></h2>
							</div>
							<div class="container2">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d932.6902908218017!2d120.57344156956124!3d15.980061288324455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913e4cab104e9d%3A0xd1c3708a8f12ed8b!2sDental%20Care%20Clinic%20Co!5e1!3m2!1sen!2sph!4v1691418231429!5m2!1sen!2sph" class="responsive-iframe"allowfullscreen="" loading="lazy"></iframe>
							</div>
						</div>
						<div class="col-lg-5 col-md-12">
							<form action="contact#sent" class="contact-bx dzForm" method="post" >
							<div class="dzFormMsg"></div>
								<div class="heading-bx left">
									<h2 class="title-head">Inquiries <span></span></h2>
									<p>Send a message to us!</p>
								</div>
								<div class="row placeani" id="sent">
								    <!-- <div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<center><h3>If you have any concerns you may contact us <a href="https://mail.google.com/" target="_blank" style="color: #9EC80D;">dc.dentalcare@gmail.com</a></h3>
												<hr>
												<a href="https://www.facebook.com/guibandentalclinic" style="font-size: 20px; color: black;"><i class="fa fa-facebook" style="font-size: 25px;"></i> DC Dental Care</a><br>
								                <a href="https://www.facebook.com/guibandentalclinic" style="font-size: 20px; color: black;"><i class="fa fa-phone" style="font-size: 25px;"></i> 0945 124 5233<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(02) 8267 7935</a><br><br>
												
												</center>
											</div>
										</div>
									</div> -->
									<div class="col-lg-6 ">
										<div class="form-group">
											<div class="input-group">
												<label>Your Name</label>
												<input name="name" type="text" required class="form-control" minlength="3" maxlength="25">
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<div class="input-group"> 
												<label>Your Email Address</label>
												<input name="email" type="email" class="form-control" required minlength="5" maxlength="35">
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<label>Subject</label>
												<input name="subject" type="text" required class="form-control" minlength="3" maxlength="25">
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<label>Type Message</label>
												<textarea name="message" rows="4" class="form-control" required minlength="5" maxlength="300" ></textarea>
											</div>
										</div>
									</div>
									<div class="col-lg-12" align="center">
										<button name="post_msg" type="submit" value="Submit" class="btn button-md button-block">Send Message</button>
									</div>
									<div class="col-lg-12" align="center">
									<br>
									<label style="color: green;font-weight: 540;">
									<?php
									if(isset($_POST['post_msg'])){
                                        
		                                $name = $_POST['name'];
		                                $email = $_POST['email'];
		                                $subject = $_POST['subject'];
		                                $message = $_POST['message'];
		                                $date = date("Y-m-d H:i:s");

		                                $model = new Model();
		                               	$new = $model->post_message($name, $email, $subject, $message, $date);

		                                if ($new) {
		                                    echo "MESSAGE SENT!";
		                                }                       
		                            }
									?>
									</label>
									</div>
								</div>
							</form>
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

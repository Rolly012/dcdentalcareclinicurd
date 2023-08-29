<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	ob_start();
	session_start();

	include('../global/model.php');
	$model = new Model();
	include('department.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta name="robots" content="" />

		<meta name="description" content="" />

		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:image" content="" />
		<meta name="format-detection" content="telephone=no">

		<link rel="icon" href="../assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/<?php echo $web_icon; ?>.png" />

		<title><?php echo $web_name; ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">



		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">

		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/dashboard.css">
	</head>
	<style type="text/css">
		.btn.dropdown-toggle.btn-default:hover {
			color: #000!important;
		}

		.btn.dropdown-toggle.btn-default:focus {
			color: #000!important;
		}


		.widget-card .icon {
			position: absolute;
			top: auto;
			bottom: -20px;
			right: 5px;
			z-index: 0;
			font-size: 65px;
			color: rgba(0, 0, 0, 0.15);
		}

		.disabled > a {
			color: red!important;
		}

		.disabled > a.page-link {
			color: #505050!important;
		}

		li[data-original-index="0"] > a {
			color: black!important;
		}
	</style>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar"  style="background-color: #FBFBFB!important;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar">
			<div class="ttr-sidebar-wrapper content-scroll">
				
				<?php include 'sidebar.php'; ?>

				<nav class="ttr-sidebar-navi">
					<ul>
						<li style="padding-left: 20px; padding-top: 5px; padding-bottom: 5px; background-color: #e0e0e0; margin-top: 0px; margin-bottom: 0px;">
							<span class="ttr-label" style="color: black; font-weight: 500;">Main Navigation</span>
						</li>
						<li style="margin-top: 0px;">
							<a href="index" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-home"></i></span>
								<span class="ttr-label">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="patient-profile" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-user"></i></span>
								<span class="ttr-label">My Profile</span>
							</a>
						</li>
						<li class="show">
							<a href="walk-in" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-list"></i></span>
								<span class="ttr-label">Book Appointment</span>
							</a>
						</li>
						<li>
							<a href="reports" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-stats-up"></i></span>
								<span class="ttr-label">Appointment History</span>
							</a>
						</li>
						<li class="ttr-seperate"></li>
					</ul>
				</nav>
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FBFBFB;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Book Appointment</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-list"></i>Reservation</li>
					</ul>
				</div> 
				
				<?php include 'widget.php'; ?>

				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<style type="text/css">
				.chart {
					width: 100%; 
					min-height: 500px;
				}
				.rowy {
					margin:0 !important;
				}
				</style>
				<div class="row">
					<div class="col-lg-5 m-b30">
						<br>
						<form class="contact-bx dzForm" method="POST">
							<div class="dzFormMsg"></div>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Book <span>Appointment</span></h2>
								</div>
								<div class="row placeani" id="sent">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Full name</label>
											<div class="input-group">
												<input name="name" type="text" class="form-control" minlength="3" maxlength="70" required value="<?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?>">
											</div>
										</div>
									</div>
									<?php
									$bdt = date('Y', strtotime($birthdate));
                            		$dttt = date("Y");
                            		$age = $dttt - $bdt;
									?>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Age</label><div class="input-group">
												<input name="age" type="text" class="form-control" value="<?php echo $age; ?>" minlength="1" maxlength="2" required>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Email</label><div class="input-group"> 
												<input name="contact" type="email" class="form-control" value="<?php echo $email; ?>" minlength="3" maxlength="50" readonly>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>Address</label>
											<div class="input-group"> 
												<input name="address" type="text" class="form-control" value="<?php echo $address; ?>" minlength="5" maxlength="100" required>
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
									</div>
									<div class="col-lg-12" align="center">
									<label style="color: green;font-weight: 540;">
									<?php

										if(isset($_POST['post_msg'])){
											$name = $_POST['name'];
											$age = $_POST['age'];
											$contact = $_POST['contact'];
											$address = $_POST['address'];
											$appointment_date = $_POST['appointment_date'];
											$appointment_time = $_POST['appointment_time'];
											$procedure = $_POST['procedure'];
											$code = random_int(100000, 999999);
											$date = date("Y-m-d H:i:s");
											$status = 2;

											$last_id = $model->requestAppointment($name, $age, $contact, $address, $appointment_date, $appointment_time, $procedure, $code, $status, $date);

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
											$mail->setFrom("dentalclinicguiban@gmail.com", 'DC Dental Care Clinic - Reference Code: '.$code.'');
											$mail->addAddress($contact);
											$mail->Subject = 'DC Dental Care - Appointment Request - Reference Code: '.$code.'';
											$mail->Body = "Hi $name,<br><br>Your request for appointment on $appointment_date - $appointment_time has been submitted.<br>Your reference code is $code <br>Please wait for another email for the status of your request.<br><br>You can track the status of your appointment with this link using your reference code. <a href='http://localhost/dc-dental/book-appointment' target='_blank'>Click Here</a>";

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
					<div class="col-lg-7 m-b30">
						<br>
						<div class="heading-bx left">
								<h2 class="m-b10 title-head">Appointment <span>History</span></h2>
							</div>
							<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="5">Action</th>
												<th>Date & Time</th>
												<th>Ref. Code</th>
												<th>Status</th>
												<!-- <th>HDF</th> -->
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 10;
												$rows = $model->displayReservationsHistoryByEmail($status, $email);

												if (!empty($rows)) {
													foreach ($rows as $row) {
													
													$rowss = $model->trackHealthDeclaration($row['id']);
													if (!empty($rowss)) {
														foreach ($rowss as $rows) {

														$status_2 = '<span><a href="" data-toggle="modal" data-target="#hdf-'.$rows['id'].'" style="color: green;">YES</a></span>';
														$hd1 = $rows['hd1'];
														$hd1a = $rows['hd1a'];
														$hd2 = $rows['hd2'];
														$hd3 = $rows['hd3'];
														$hd4 = $rows['hd4'];
														$hd5 = $rows['hd5'];
														$hd6 = $rows['hd6'];
														}
													}
													else {
														$status_2 = '<span><a href="https://guibandentalclinic.tech/health-declaration?id='.$row['id'].'" target="_blank" style="color: red;">NO</a></span>';
													}

													$modal_button = "";
													if ($row['status'] == 0) {
														$modal_button = '<a href="procedure-details?id='.$row['id'].'" class="btn green radius-xl outline"><span>Procedure Details</span></a>';
														$status_ = '<a href="procedure-details?id='.$row['id'].'"><span style="color: green;">PROCESSED</span></a>';
														// $modal_button = '<input type="submit" class="btn red radius-xl outline" name="cancel" value="Cancel">';
													}
													else if ($row['status'] == 1) {
														$date_appointment = date('Y-m-d', strtotime($row['date']));
														$date_today = date("Y-m-d");

														if ($date_appointment == $date_today) {
															$status_ = '<span style="color: green;">WAITING</span>';
														}

														else if ($date_appointment < $date_today) {
															$status_ = '<span style="color: gray;">NO SHOW</span>';
														}
														else {
															$status_ = '<span style="color: green;">APPROVED</span>';
															$modal_button = '<a href="procedure-details?id='.$row['id'].'" class="btn green outline radius-xl">Procedure Details</a>';
														}
													}
													else if ($row['status'] == 2) {
														$status_ = '<span style="color: blue;">PENDING</span>';
														$status_2 = '<span>N/A</span>';
														$modal_button = '<input type="submit" class="btn red radius-xl outline" name="cancel" value="Cancel">';
													}
													else if ($row['status'] == 3) {
														$status_ = '<span style="color: red;">DECLINED</span>';
														$status_2 = '<span>N/A</span>';
													}
													else if ($row['status'] == 4) {
														$status_ = '<span style="color: red;">CANCELLED</span>';
														$status_2 = '<span>N/A</span>';
													}
													else {
														$status_ = '<span style="color: red;">ERROR</span>';
														$status_2 = '<span>N/A</span>';
													}
											?>
											<tr>
												<td>
													<center>
														<button data-toggle="modal" data-target="#approve-<?php echo $row['id']; ?>" class="btn blue" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="View Details">
																<i class="ti-search" style="font-size: 12px;"></i>
															</div>
														</button>
													</center>
												</td>
												<td><?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></td>
												<td><?php echo $row['code']; ?></td>
												<td><center><b><?php echo $status_; ?></b></center></td>
												<!-- <td><center><b><?php echo $status_2; ?></b></center></td> -->
											</tr>
											<div id="approve-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Appointment Details</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="approve-id" value="<?php echo $row['id']; ?>">
																<div class="row">
																	<div class="form-group col-4">
																		<label class="col-form-label">Fullname</label>
																		<input class="form-control" type="text" name="name" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Email</label>
																		<input class="form-control" name="aapprove-email" type="text" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Date & Time</label>
																		<input class="form-control" type="text" name="datextime" value="<?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Concern</label>
																		<input class="form-control" name="approve-email" type="text" value="<?php echo $row['concern']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Address</label>
																		<input class="form-control" name="approve-email" type="text" value="<?php echo $row['address']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Code</label>
																		<input class="form-control" name="code" type="text" value="<?php echo $row['code']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Date Sent</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($row['date_sent'])); ?>" readonly style="background-color: white;">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<?php echo $modal_button; ?>
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div id="hdf-<?php echo $rows['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Health Declaration</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="approve-id" value="<?php echo $row['id']; ?>">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="form-group">
																			<label>1. In the past 14 days, have you or any member of your household, traveled to any areas with known cases of COVID-19?</label><br>
																			<p><?php echo $rows['hd1']; ?></p>
																		</div>
																		<div class="form-group">
																			<label>If YES please state the exact location </label><div class="input-group">
																			<p><?php if ($rows['hd1a'] == "") { echo "N/A"; } else { echo $rows['hd1a']; } ?></p>
																		</div>
																		<div class="form-group">
																			<label>2. In the past 14 days, have you or any member or your household has had any contact with any COVID-19 patient?</label><br>
																			<p><?php echo $rows['hd2']; ?></p>
																		</div>
																		<div class="form-group">
																			<label>3. Have you or any household member have any history of exposure to any COVID-19 biological material (eg saliva)?</label><br>
																			<p><?php echo $rows['hd3']; ?></p>
																		</div>
																		<div class="form-group">
																			<label>4. Have you had any history of fever for the last 14 days?</label><br>
																			<p><?php echo $rows['hd4']; ?></p>
																		</div>
																		<div class="form-group">
																			<label>5. Have you had any symptoms in the last 14 days such as: cough, nausea, diarrhea, loss of taste, breathing difficulty, body ache, loss of smell, fever?</label><br>
																			<p><?php echo $rows['hd5']; ?></p>
																		</div>
																		<div class="form-group">
																			<label>6. Urgent dental need in the last 14 days such as uncontrolled dental/oral pain, sweling, bleeding,infection, trauma?</label><br>
																			<p><?php echo $rows['hd6']; ?></p>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													}
												}
													

													if (isset($_POST['cancel'])) {
													$name = $_POST['name'];
													$appointment_date_time = $_POST['datextime'];
													$code = $_POST['code'];
													$approve_iddd = $_POST['approve-id'];
													$myemail = "dentalclinicguiban@gmail.com";
													$model->updateAppointmentStatus(4, $_POST['approve-id']);

													require_once "PHPMailer/PHPMailer.php";
													require_once "PHPMailer/SMTP.php";
													require_once "PHPMailer/Exception.php";
													$mail = new PHPMailer();
													//$mail->isSMTP();
													$mail->isSendMail();
													$mail->Host = "smtp.gmail.com";
													$mail->SMTPAuth = true;
													$mail->Username = "dentalclinicguiban@gmail.com";
													$mail->Password = "dental2021?";
													$mail->Port = 465;
													$mail->SMTPSecure = "ssl";
													$mail->isHTML(true);

													$mail->setFrom("dentalclinicguiban@gmail.com", 'Guiban Dental Clinic');
													$mail->addAddress($myemail);
													$mail->Subject = 'Guiban Dental Clinic - Appointment Cancelled - Reference Code: '.$code.'';
													$mail->Body = "$name has cancelled the appointment schedule on $appointment_date_time";
														if ($mail->send()) {
															echo "<script>window.open('walk-in', '_self');</script>";
														} 

														else {
															echo "<script>window.open('walk-in', '_self');</script>";
														}
													}
											?>
										</tbody>
									</table>
								</div>
					</div>

				</div>
			</div>
		</main>
		<div class="ttr-overlay"></div>


		<script src="../dashboard/assets/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#appointment_date').change( function() {
					var appointment_date = $('#appointment_date').val();

					$.ajax({
						url:'vendor/fetch-time.php',
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
		<script src="../dashboard/assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="../dashboard/assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="../dashboard/assets/vendors/counter/waypoints-min.js"></script>
		<script src="../dashboard/assets/vendors/counter/counterup.min.js"></script>
		<script src="../dashboard/assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="../dashboard/assets/vendors/masonry/masonry.js"></script>
		<script src="../dashboard/assets/vendors/masonry/filter.js"></script>
		<script src="../dashboard/assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src='../dashboard/assets/vendors/scroll/scrollbar.min.js'></script>
		<script src="../dashboard/assets/js/functions.js"></script>
		<script src="../dashboard/assets/vendors/chart/chart.min.js"></script>
		<script src="../dashboard/assets/js/admin.js"></script>
		<script src='../dashboard/assets/vendors/calendar/moment.min.js'></script>
		<script src='../dashboard/assets/vendors/calendar/fullcalendar.js'></script>
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>

		<script type="text/javascript">
			function blockSpecialChar(evt) { 
				var charCode = (evt.which) ? evt.which : window.event.keyCode; 
				if (charCode <= 13) { 
					return true; 
				} 
				
				else { 
					var keyChar = String.fromCharCode(charCode); 
					var re = /^[A-Za-z. ]+$/ 
					return re.test(keyChar); 
				} 
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table').DataTable();
			});

			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>
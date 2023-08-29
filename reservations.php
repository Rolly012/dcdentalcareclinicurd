<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	ob_start();
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$depart = "1";
	$status = "1";
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
			tbody tr:hover {
				background-color: #d4d4d4;
			}
		</style>
	</head>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar" style="background-color: #FBFBFB;">

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
						<li class="show">
							<a href="reservations" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-menu"></i></span>
								<span class="ttr-label">Reservations (<?php echo $pending_reservations; ?>)</span>
							</a>
						</li>
						<li>
							<a href="patients" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-user"></i></span>
								<span class="ttr-label">Patients</span>
							</a>
						</li>
						<li>
							<a href="walk-in" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-reload"></i></span>
								<span class="ttr-label">Walk-In</span>
							</a>
						</li>
						<li>
							<a href="inquiries" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-help"></i></span>
								<span class="ttr-label">Inquiries (<?php echo $unread; ?>)</span>
							</a>
						</li>
						<li>
							<a href="announcement" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-announcement"></i></span>
								<span class="ttr-label">Announcement</span>
							</a>
						</li>
						<li>
							<a href="services" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-list"></i></span>
								<span class="ttr-label">Services</span>
							</a>
						</li>
						<li>
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives"></i></span>
								<span class="ttr-label">Content Management</span>
								<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="content-management" class="ttr-material-button"><span class="ttr-label">Story, Logo, Gallery, Feedbacks</span></a>
								</li>
								<li>
									<a href="org-structure" class="ttr-material-button"><span class="ttr-label">Our Team</span></a>
								</li>
							</ul>
						</li>
						<li>
							<a href="reports" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-stats-up"></i></span>
								<span class="ttr-label">Reports</span>
							</a>
						</li>
						<!-- <li>
							<a href="settings" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-settings"></i></span>
								<span class="ttr-label">Settings</span>
							</a>
						</li> -->
						<li class="ttr-seperate"></li>
					</ul>
				</nav>
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #FBFBFB;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">Appointments</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-menu"></i>Pending Appointments</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<br>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Pending <span>Appointments</span></h2>
							</div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="100">Action</th>
												<th>Fullname</th>
												<th>Contact</th>
												<th>Date & Time</th>
												<th>Concern</th>
												<th>Ref. Code</th>
												<th>Date Sent</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 2;
												$rows = $model->displayReservationsPending($status);

												if (!empty($rows)) {
													foreach ($rows as $row) {

														$date_appointment = date('Y-m-d', strtotime($row['date']));
														$date_today = date("Y-m-d");

														if ($date_appointment < $date_today) {
															$status_ = '<span style="color: gray;">NO SHOW</span>';

															$model->updateAppointmentStatus(3, $row['id']);

														}
														else {
															$status_ ="";
														}
											?>
											<tr>
												<td>
													<center>
														<button data-toggle="modal" data-target="#approve-<?php echo $row['id']; ?>" class="btn green" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Approve">
																<i class="ti-check" style="font-size: 12px;"></i>
															</div>
														</button>
														<button data-toggle="modal" data-target="#delete-<?php echo $row['id']; ?>" class="btn red" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Decline">
																<i class="ti-archive" style="font-size: 12px;"></i>
															</div>
														</button>
														<?php echo $status_; ?>
													</center>
												</td>
												<td><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['contact']; ?></td>
												<td><?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></td>
												<td><?php echo $row['concern']; ?></td>
												<td><?php echo $row['code']; ?></td>
												<td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($row['date_sent'])); ?></td>
											</tr>
											<div id="approve-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Approve Appointment Request</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="approve-id" value="<?php echo $row['id']; ?>">
																<div class="row">
																	<div class="form-group col-12">
																		<label class="col-form-label">Fullname</label>
																		<input class="form-control" name="name"  type="text" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Email</label>
																		<input class="form-control" name="aapprove-email" type="text" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Preferred Date & Time</label>
																		<input class="form-control" name="appointment_date_time" type="text" value="<?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Concern</label>
																		<input class="form-control" name="" type="text" value="<?php echo $row['concern']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Address</label>
																		<input class="form-control" name="" type="text" value="<?php echo $row['address']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Code</label>
																		<input class="form-control" name="code" type="text" value="<?php echo $row['code']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Date Sent</label>
																		<input class="form-control" name="" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($row['date_sent'])); ?>" readonly style="background-color: white;">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn green radius-xl outline" name="approve" value="Approve">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div id="delete-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Decline Appointment Request</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="delete-id" value="<?php echo $row['id']; ?>">
																<div class="row">
																	<div class="form-group col-12">
																		<label class="col-form-label">Fullname</label>
																		<input class="form-control" name="name" type="text" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Email</label>
																		<input class="form-control" name="delete-email" type="text" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Preferred Date & Time</label>
																		<input class="form-control" name="appointment_date_time" type="text" value="<?php echo $row['date']; ?> <?php echo $row['time']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Concern</label>
																		<input class="form-control" name="" type="text" value="<?php echo $row['concern']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-12">
																		<label class="col-form-label">Address</label>
																		<input class="form-control" name="" type="text" value="<?php echo $row['address']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Code</label>
																		<input class="form-control" name="code" type="text" value="<?php echo $row['code']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-6">
																		<label class="col-form-label">Date Sent</label>
																		<input class="form-control" name="" type="text" value="<?php echo date('M. d, Y g:i A', strtotime($row['date_sent'])); ?>" readonly style="background-color: white;">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="delete" value="Decline">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													}
												}

												



												if (isset($_POST['approve'])) {

													

													$name = $_POST['name'];
													$appointment_date_time = $_POST['appointment_date_time'];
													$code = $_POST['code'];
													$approve_iddd = $_POST['approve-id'];

													$model->updateAppointmentStatus(1, $_POST['approve-id']);

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
													$mail->setFrom("mhoinfanta2022@gmail.com", 'DC Dental Care Clinic');
													$mail->addAddress($_POST['aapprove-email']);
													$mail->Subject = 'DC Dental Care Clinic - Appointment Approved - Reference Code: '.$code.'';
													$mail->Body = "Hi $name,<br><br>
													Your request for appointment on $appointment_date_time has been approved.<br>
													<hr>
													<b>DENTAL APPOINTMENT GUIDELINES </b><br>
													1. No companion/s are allowed except for PWDs, senior citizens, and minors.<br>
													2. No mask, no entry policy. Mask should be worn at all times, only to be removed upon the instruction of our staff/dentists<br>
													3. If you have flu-like symptoms like fever, cough, colds, or headache, please have your appointment rescheduled.<br>
													4. Observe physical distancing<br>
													5. Disinfect hands/foot wear prior to entering (Hand disinfectant, foot wear disinfectant and fogging/misting machine disinfectant are available at the entrance. We will also provide you with your clean protective equipments.) <br>
													6. Be on time. (We can cancel an appointment if you're late, to give way for disinfection in preparation for the next patient.)<br>
													7. Cancellation/rebooking should be done at least two (2) days prior to your scheduled appointment. Cancellation/rebooking terms and charges shall be applied accordingly.<br>";

													if ($mail->send()) {
														echo "<script>window.open('reservations', '_self');</script>";
													} 

													else {
														//echo $mail->ErrorInfo;
														echo "<script>window.open('reservations', '_self');</script>";
													}
												}

												if (isset($_POST['delete'])) {
													$name = $_POST['name'];
													$appointment_date_time = $_POST['appointment_date_time'];
													$code = $_POST['code'];

													$model->updateAppointmentStatus(3, $_POST['delete-id']);


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
													$mail->setFrom("mhoinfanta2022@gmail.com", 'DC Dental Care Clinic');
													$mail->addAddress($_POST['delete-email']);
													$mail->Subject = 'DC Dental Care Clinic - Appointment Declined - Reference Code: '.$code.'';
													$mail->Body = "Hi $name,<br><br>Your request for appointment on $appointment_date_time has been declined by the administrator.<br><a href='http://localhost/dc-dental/book-appointment' target='_blank'>Click Here</a> to request new appointment schedule.";

													if ($mail->send()) {
														echo "<script>window.open('reservations', '_self');</script>";
													} 

													else {
														//echo $mail->ErrorInfo;
														echo "<script>window.open('reservations', '_self');</script>";
													}
												}

											?>
										</tbody>
									</table>
								</div>
								<hr>
								<div align="right">
									<a href="reservations-history" class="btn red radius-xl" style="background-color: <?php echo $primary_color; ?>;"><i class="ti-menu"></i><span>&nbsp;APPOINTMENT HISTORY</span></a>
								</div>

					</div>
				</div>
			</div>
		</main>
		<div class="ttr-overlay"></div>
		<script src="../dashboard/assets/js/jquery.min.js"></script>
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
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>

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
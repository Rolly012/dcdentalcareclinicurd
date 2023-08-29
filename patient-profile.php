<?php
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
							<a href="patient-profile" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-user"></i></span>
								<span class="ttr-label">My Profile</span>
							</a>
						</li>
						<li>
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
					<h4 class="breadcrumb-title">Manage Patients</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-user"></i>Patients Profile</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-6 m-b30">
						<div class="new-user-list">
							<br>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Patient <span>Information</span></h2>
							</div>
							<div class="row">
								<div class="form-group col-md-4 col-sm-4">
									<label class="col-form-label">Firstname</label>
									<input class="form-control" type="text" value="<?php echo $fname; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-4">
									<label class="col-form-label">Middlename</label>
									<input class="form-control" type="text" value="<?php echo $mname; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-4">
									<label class="col-form-label">Lastname</label>
									<input class="form-control" type="text" value="<?php echo $lname; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Nickname</label>
									<input class="form-control" type="text" value="<?php echo $nickname; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Email</label>
									<input class="form-control" type="text" value="<?php echo $email; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Gender</label>
									<input class="form-control" type="text" value="<?php echo $gender; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Birthdate</label>
									<input class="form-control" type="text" value="<?php echo $birthdate; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<?php 
								    $bdt = date('Y', strtotime($birthdate));
                            		$dttt = date("Y");
                            		$age = $dttt - $bdt;
								?>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Age</label>
									<input class="form-control" type="text" value="<?php echo $age; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Religion</label>
									<input class="form-control" type="text" value="<?php echo $religion; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Nationality</label>
									<input class="form-control" type="text" value="<?php echo $nationality; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Occupation</label>
									<input class="form-control" type="text" value="<?php echo $occupation; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-12 col-sm-12">
									<label class="col-form-label">Address</label>
									<input class="form-control" type="text" value="<?php echo $address; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Dental Insurance</label>
									<input class="form-control" type="text" value="<?php echo $dental_insurance; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Effective Date</label>
									<input class="form-control" type="text" value="<?php echo $effective_date; ?>" readonly style="background-color: #FBFBFB;">
								</div>

								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Home No</label>
									<input class="form-control" type="text" value="<?php echo $home_no; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Office No</label>
									<input class="form-control" type="text" value="<?php echo $office_no; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Fax No</label>
									<input class="form-control" type="text" value="<?php echo $fax_no; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Contact No</label>
									<input class="form-control" type="text" value="<?php echo $contact_no; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Date Registered</label>
									<input class="form-control" type="text" value="<?php echo $date_registered; ?>" readonly style="background-color: #FBFBFB;">
								</div>
							</div>
							<br>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Appointment <span>History</span></h2>
							</div>
							<div class="table-responsive">
									<table class="table table-bordered hover" style="width:100%">
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
														$status_ = '<a href="procedure-details?id='.$row['id'].'"><span style="color: green;">PROCESSED</span></a>';
														$modal_button = '<a href="procedure-details?id='.$row['id'].'" class="btn green outline radius-xl">Procedure Details</a>';
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
														}
													}
													else if ($row['status'] == 2) {
														$status_ = '<span style="color: blue;">PENDING</span>';
														$status_2 = '<span>N/A</span>';
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
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
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
																		<input class="form-control" type="text" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Email</label>
																		<input class="form-control" name="aapprove-email" type="text" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;">
																	</div>
																	<div class="form-group col-4">
																		<label class="col-form-label">Date & Time</label>
																		<input class="form-control" type="text" value="<?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?>" readonly style="background-color: white;">
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
																		<input class="form-control" name="approve-email" type="text" value="<?php echo $row['code']; ?>" readonly style="background-color: white;">
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
											?>
										</tbody>
									</table>
								</div>
						</div>
					</div>
					<div class="col-lg-6 m-b30">
						<div class="new-user-list">
							<br>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Medical <span>History</span></h2>
								<span>Physician's Information</span>
							</div>
							<div class="row">
								<div class="form-group col-md-3 col-sm-6">
									<label class="col-form-label">Name</label>
									<input class="form-control" type="text" value="<?php echo $physician; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-3 col-sm-6">
									<label class="col-form-label">Specialty</label>
									<input class="form-control" type="text" value="<?php echo $specialty; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-3 col-sm-6">
									<label class="col-form-label">Address:</label>
									<input class="form-control" type="text" value="<?php echo $office_address; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-3 col-sm-6">
									<label class="col-form-label">Number</label>
									<input class="form-control" type="text" value="<?php echo $office_number; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-12 col-sm-12">
									<p><b>1. Are you in good health?</b> <?php echo $good_health; ?></p>

									<p><b>2. Are you under medical treatment now?</b> <?php echo $medical_treatment; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, what is the condition being treated? <?php echo $condition_treated; ?></p>
									
									<p><b>3. Have you ever had serious illness or surgical operation?</b> <?php echo $surgical_operation; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation? <?php echo $operation; ?></p>
									
									<p><b>4. Have you ever been hospitalized?</b> <?php echo $hospitalized; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, when and why? <?php echo $when_why; ?></p>

									<p><b>5. Are you taking any prescription/non-prescription medication?</b> <?php echo $medication; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, please specify: <?php echo $specify; ?></p>

									<p><b>6. Do you use tobacco products?</b> <?php echo $tobacco; ?></p>

									<p><b>7. Do you use alcohol, cocaine or other dangerous drugs?</b> <?php echo $use_drugs; ?></p>

									<p><b>8. Are you allergic to any of the following:</b> <?php echo $allergic; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $allergies; ?></p>

									<p><b>9, Bleeding Time:</b> <?php echo $bleeding_time; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation? <?php echo $operation; ?></p>

									<p><b>10. For women only:</b><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you pregnant? <?php echo $pregnant; ?></p>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you nursing? <?php echo $nursing; ?></p>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you taking birth control pills? <?php echo $birth_control; ?></p>

									<p><b>11. Blood Type:</b> <?php echo $blood_type; ?></p>

									<p><b>12. Blood Pressure:</b> <?php echo $blood_pressure; ?></p>

									<p><b>13. Do you have or have you had any of the following?</b><br>
 									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $problems; ?></p>

								</div>
								
							</div>
								<div align="right">
									<a href="change-password" class="btn green radius-xl" style=""><i class="ti-lock" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Change Password</span></a>
									&nbsp;&nbsp;
									<a href="update-profile" class="btn blue radius-xl" style=""><i class="ti-marker-alt" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Update Profile</span></a>
								</div>
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
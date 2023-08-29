<?php
	
	use PHPMailer\PHPMailer\PHPMailer;

	ob_start();
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

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
						<li><i class="ti-menu"></i>Appointments History</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
								<br>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Appointments <span>History</span></h2>
								</div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="5">Action</th>
												<th>Fullname</th>
												<th>Email</th>
												<th>Date & Time</th>
												<th>Concern</th>
												<th>Ref. Code</th>
												<th>Status</th>
												<th>HDF</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 2;
												$rows = $model->displayReservationsHistory($status);

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
														$status_2 = '<span><a href="http://localhost/guiban/health-declaration?id='.$row['id'].'" target="_blank" style="color: red;">NO</a></span>';
													}

													if ($row['status'] == 1) {
														$status_ = '<span style="color: green;">APPROVED</span>';
														

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
												<td><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['contact']; ?></td>
												<td><?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></td>
												<td><?php echo $row['concern']; ?></td>
												<td><?php echo $row['code']; ?></td>
												<td><center><b><?php echo $status_; ?></b></center></td>
												<td><center><b><?php echo $status_2; ?></b></center></td>
											</tr>
											<div id="approve-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;View Appointment Details</h4>
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
								<hr>
								<div align="right">
									<a href="reservations" class="btn red radius-xl" style="background-color: <?php echo $primary_color; ?>;"><i class="ti-menu"></i><span>&nbsp;PENDING RESERVATIONS</span></a>
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
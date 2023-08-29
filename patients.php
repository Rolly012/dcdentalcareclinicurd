<?php
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
						<li>
							<a href="reservations" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-menu"></i></span>
								<span class="ttr-label">Reservations (<?php echo $pending_reservations; ?>)</span>
							</a>
						</li>
						<li class="show">
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
					<h4 class="breadcrumb-title">Manage Patients</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-user"></i>Patients Information</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
								<br>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Patients <span>Information</span></h2>
								</div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="5">Action</th>
												<th>Name</th>
												<th>Email</th>
												<th>Nickname</th>
												<th>Contact</th>
												<th>Gender</th>
												<th>Birthdate</th>
												<th>Date Sent</th>
												<th>Account</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 1;
												$rows = $model->displayPatients($status);

												if (!empty($rows)) {
													foreach ($rows as $row) {

											?>
											<tr>
												<td>
													<center>
														<div data-toggle="tooltip" title="View Profile">
															<a href="patient-profile?id=<?php echo $row['email']; ?>" class="btn blue"><i class="ti-search" style="font-size: 12px;"></i></a>
														</div>
													</center>
												</td>
												<td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['nickname']; ?></td>
												<td><?php echo $row['contact_no']; ?></td>
												<td><?php echo $row['gender']; ?></td>
												<td><?php echo $row['birthdate']; ?></td>
												<td style="font-size: 14px;"><?php echo date('M. d, Y g:i A', strtotime($row['date_registered'])); ?></td>
												<td>
													<a href="" data-toggle="modal" data-target="#change-password-<?php echo $row['patient_id']; ?>">
														<b>
															<?php if(empty($row['pword'])) { echo '<span style="color: red;">NO</span>'; } else { echo '<span style="color: green;">YES</span>'; } ?>		
														</b>
													</a>
												</td>
											</tr>
											<div id="change-password-<?php echo $row['patient_id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Update Password</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="change-id" value="<?php echo $row['email']; ?>">
																<div class="row">
																	<div class="form-group col-12">
																		<label class="col-form-label">Password</label>
																		<input class="form-control" type="password" name="password" required>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="update" value="Update">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													}
												}

												if (isset($_POST['update'])) {
													$model->updatePassword($_POST['change-id'], password_hash($_POST['password'], PASSWORD_DEFAULT));

													echo "<script>window.open('patients','_self');</script>";
												}

											?>
										</tbody>
									</table>
								</div>
								<br>

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
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>
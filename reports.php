<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	$depart = "1";
	$status = "1";

	$tomorrow = new DateTime('tomorrow');
	$date_tomorrow = $tomorrow->format('Y-m-d');

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
						<li class="show">
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
					<h4 class="breadcrumb-title">Appointments</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-stats-up"></i>History</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<br>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Appointment <span>History</span></h2>
							</div>
								<form method="POST">
									<div class="row">
										<div class="col-lg-2"></div>
										<div class="col-lg-3">
											<div class="form-group">
												<div class="input-group"> 
													<input type="date" class="form-control" max="<?php echo $date_tomorrow; ?>" name="deyt" id="deyt" value="<?php if (isset($_POST['deyt'])) echo $_POST['deyt']; ?>" required>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
												<div class="input-group"> 
													<input type="date" class="form-control" max="<?php echo $date_tomorrow; ?>" name="deytend" id="deytend" value="<?php if (isset($_POST['deytend'])) echo $_POST['deytend']; ?>" required>
												</div>
											</div>
										</div>
										<div class="col-lg-2">
											<button type="submit" name="searchData" class="btn blue"><i class="ti-search" style="font-size: 12px;"></i></button>
										</div>
										<div class="col-lg-2"></div>
									</div>
								</form>
								<center><h4 style="color: <?php echo $primary_color; ?>"><?php if (!empty($_POST['deyt'])) { echo "".date('F d, Y', strtotime($_POST['deyt']))." 12:00 AM - ".date('F d, Y', strtotime($_POST['deytend']))." 11:59 PM"; } ?></h4></center>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="5">Action</th>
												<th>Date & Time</th>
												<th>Concern</th>
												<th>Ref. Code</th>
												<th>Amt. Charged</th>
												<th>Amt. Paid</th>
												<th>Balance</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$status = 0;
												$rows = $model->displayPatientReports($email, $status);

												if (isset($_POST['searchData'])) {
			    									$deyt = date('Y-m-d', strtotime($_POST['deyt']));
			    									$deyt2 = date('Y-m-d', strtotime($_POST['deytend']));

			    									$rows = $model->displayReportsByDatePatient($email, $status, $deyt, $deyt2);
			    								}

												if (!empty($rows)) {
													foreach ($rows as $row) {
													
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
												<!-- <td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $row['fullname']; ?></a></td>
												<td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $row['contact']; ?></a></td> -->
												<td><?php echo date('M. d Y', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></td>
												<td><?php echo $row['concern']; ?></td>
												<td><?php echo $row['code']; ?></td>
												<td><span class="charged"><?php if ($row['total_charged'] != '') { echo '₱ <a data-toggle="modal" data-target="#paid-info-'.$row['id'].'">'.$row['total_charged'].'</a>'; } else { echo 'N/A'; } ?></span></td>
												<td><span class="paid"><?php if ($row['total_paid'] != '') { echo '₱ <a data-toggle="modal" data-target="#paid-info-'.$row['id'].'">'.$row['total_paid'].'</a>'; } else { echo 'N/A'; } ?></span></td>
												<td><span class="balance"><?php if ($row['total_balance'] != '') { echo '₱ <a data-toggle="modal" data-target="#paid-info-'.$row['id'].'">'.$row['total_balance'].'</a>'; } else { echo '₱ 0'; } ?></span></td>
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
																<a href="procedure-details?id=<?php echo $row['id']; ?>" class="btn green outline radius-xl">Procedure Details</a>
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
								<div align="right">
									<hr>
									<h4 id="total-charged"></h4>
									<h4 id="total-price"></h4>
									<h4 id="total-balance"></h4>
								</div>
								<br>

					</div>
				</div>
			</div>
		</main>
		<div class="ttr-overlay"></div>

		<script src="../dashboard/assets/js/jquery.min.js"></script>
		<script type="text/javascript">
			$('#deyt').change(function() {
				var date = $(this).val();
				$("#deytend").attr("min", date);
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
		<script src="../dashboard/assets/js/jquery.dataTables.min.js"></script>
		<script src="../dashboard/assets/js/dataTables.bootstrap4.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				var charge = 0;
				$(".charged").each(function(){
					if ($(this).text() != "N/A") {
						charge = charge + parseInt($(this).text().slice(2));
					}
				});
				if (isNaN(charge)) {
					charge = 0;
				}
				$('#total-charged').html('Total Charged: ₱' + charge);


				var total = 0;
				$(".paid").each(function(){
					if ($(this).text() != "N/A") {
						total = total + parseInt($(this).text().slice(2));
					}
				});
				if (isNaN(total)) {
					total = 0;
				}
				$('#total-price').html('Total Paid: ₱' + total);

				var balance = 0;
				$(".balance").each(function(){
					if ($(this).text() != "N/A") {
						balance = balance + parseInt($(this).text().slice(2));
					}
				});
				if (isNaN(balance)) {
					balance = 0;
				}
				$('#total-balance').html('Balance: ₱' + balance);

				$('#table').DataTable();
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>
<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}
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
						<li class="show">
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
					<h4 class="breadcrumb-title">Content Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-harddrives"></i>Archived Org. Structure</li>
					</ul>
				</div> 
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">

								<?php

									if (isset($_POST['add_structure'])) {
										$name = $_POST['name'];
										$position = $_POST['position']	;

										$path = '../assets/images/org-structure/';
										$unique = time().uniqid(rand());
										$destination = $path . $unique . '.jpg';
										$base = basename($_FILES["image"]["name"]);
										$image = $_FILES["image"]["tmp_name"];
										move_uploaded_file($image, $destination);

										$model->addStructure($name, $position, $base, $unique, 1);
									}

								?>
								<br>
								<div class="row align-items d-flex">
									<div class="col-lg-3 col-md-12">
										<div class="heading-bx left">
											<h2 class="m-b10 title-head">Doctors</h2>
										</div>
										<?php 
										$rows = $model->content_management();
									    if (!empty($rows)) {
									        foreach ($rows as $row) {
									            $brgy_head = $row['brgy_head'];
									            $brgy_head_pic = $row['brgy_head_pic'];
									        }
									    }
										?>
										<center>
											<a href="../assets/images/org-structure/<?php echo $brgy_head_pic; ?>.jpg" target="_blank">
												<img src="../assets/images/org-structure/<?php echo $brgy_head_pic; ?>.jpg" style="width: 150px;height: 200px; object-fit: cover;">
											</a>
											<h4><?php echo $brgy_head; ?></h4>
											<span>DC Dental Care Clinic</span><hr>
											<a href="" class="btn green radius-xl" data-toggle="modal" data-target="#edit-head" style="background-color: <?php echo $primary_color; ?>;">
												<i class="ti-marker-alt"></i>
												<span>&nbsp;EDIT DETAILS</span>
											</a><br>
										</center>
									</div>
									<div id="edit-head" class="modal fade" role="dialog">
										<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Edit Doctor Information</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="form-group col-4">
																<label class="col-form-label">Image</label>
																<input class="form-control" type="file" name="image-head" accept="image/*" style="border: 0px; padding: 0px;" onchange="readURL(this, 'head')">
																<center><a href="../assets/images/org-structure/<?php echo $brgy_head_pic; ?>.jpg" target="_blank"><img id="display-img-head" src="../assets/images/org-structure/<?php echo $brgy_head_pic; ?>.jpg" style="width: 160px;height:210px; object-fit: cover;"></a></center>
															</div>
															<div class="form-group col-8">
																<label class="col-form-label">Name</label>
																<input class="form-control" name="name-head" type="text" value="<?php echo $brgy_head; ?>" required>
																<hr>
																<center><h3>DC Dental Care Clinic</h3></center>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<input type="submit" class="btn green radius-xl outline" name="edit-head" value="Save Changes">
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<?php

										if (isset($_POST['edit-head'])) {
											$model->editHead($_POST['name-head'], $brgy_head_id);

											if (!isset($_FILES['image-head']) || $_FILES['image-head']['error'] == UPLOAD_ERR_NO_FILE) {}

											else {
												$path = '../assets/images/org-structure/';
												$unique = time().uniqid(rand());
												$destination = $path . $unique . '.jpg';
												$base = basename($_FILES["image-head"]["name"]);
												$image = $_FILES["image-head"]["tmp_name"];
												move_uploaded_file($image, $destination);

												$model->editHeadImage($unique, $brgy_head_id);
											}

											echo "<script>window.open('org-structure', '_self');</script>";
										}

									?>
									<div class="col-lg-9 col-md-12">
										<div class="table-responsive">
											<table id="table" class="table table-bordered hover" style="width:100%">
												<thead>
													<tr>
														<th width="100">Image</th>
														<th>Name</th>
														<th>Position</th>
														<th width="100">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$status = 0;
														$rows = $model->fetchOrgStructure($status);

														if (!empty($rows)) {
															foreach ($rows as $row) {

															if ($row['position'] == 5) {
																$position = "Barangay Kagawad";
															}
															else if ($row['position'] == 10) {
																$position = "SK Chairman";
															}
															else if ($row['position'] == 15) {
																$position = "Barangay Recordkeeper";
															}
															else {
																$position = "N/A";
															}

													?>
													<tr>
														<td><center><a href="../assets/images/org-structure/<?php echo $row['image_unique']; ?>.jpg" target="_blank"><img src="../assets/images/org-structure/<?php echo $row['image_unique']; ?>.jpg" style="width: 100px;height: 80px; object-fit: cover;"></a></center></td>
														<td><?php echo $row['name']; ?></td>
														<td><?php echo $position; ?></td>
														<td>
															<center>
																<!-- <a href="" class="btn blue" style="width: 50px; height: 37px;" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt" style="font-size: 12px;"></i></a>&nbsp; -->
																<button data-toggle="modal" data-target="#delete-<?php echo $row['id']; ?>" class="btn green" style="width: 50px; height: 37px;">
																	<div data-toggle="tooltip" title="Restore">
																		<i class="ti-archive" style="font-size: 12px;"></i>
																	</div>
																</button>
															</center>
														</td>
													</tr>
													<div id="delete-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
														<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Restore Brgy. Member</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<div class="modal-body">
																		<input type="hidden" name="delete-id" value="<?php echo $row['id']; ?>">
																		<div class="row">
																			<div class="form-group col-4">
																				<center><a href="../assets/images/org-structure/<?php echo $row['image_unique']; ?>.jpg" target="_blank"><img src="../assets/images/org-structure/<?php echo $row['image_unique']; ?>.jpg" style="width: 160px;height:210px; object-fit: cover;"></a></center>
																			</div>
																			<div class="form-group col-8">
																				<label class="col-form-label">Name</label>
																				<input class="form-control" type="text" value="<?php echo $row['name']; ?>" readonly>

																				<label class="col-form-label">Position</label>
																				<input class="form-control" type="text" value="<?php echo $position; ?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<input type="submit" class="btn green radius-xl outline" name="archive" value="Restore">
																		<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<?php
															}
														}

														if (isset($_POST['archive'])) {
															$status = 1;
															$model->archiveOrgStructure($status, $_POST['delete-id']);
															echo "<script>window.open('archived-org-structure', '_self');</script>";
														}

														// if (isset($_POST['archive'])) {
														// 	$model->deleteOrgStructure($_POST['delete-id']);
														// 	echo "<script>window.open('org-structure', '_self');</script>";
														// }

													?>
												</tbody>
											</table>
										</div>
										<hr>
										<div align="right">
									<a href="org-structure" class="btn green radius-xl" style="float: right; background-color: <?php echo $primary_color; ?>;"><i class="ti-harddrives"></i><span>&nbsp;DOCTOR INFORMATION</span></a><br>
								</div>
								<div id="add-announcement" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Add Brgy. Member</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label">Name</label>
															<input class="form-control" type="text" name="name" required>
														</div>
														<div class="form-group col-12">
															<label class="col-form-label">Position</label>
															<select class="form-control" name="position" required="">
																<option value="5">Barangay Kagawad</option>
																<option value="10">SK Chairman</option>
																<option value="15">Barangay Recordkeeper</option>
															</select>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Image</label>
															<input class="form-control" type="file" name="image" accept="image/*" required>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="add_structure" value="Add">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>
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
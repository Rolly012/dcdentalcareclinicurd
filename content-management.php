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
						<li class="show" >
							<a href="#" class="ttr-material-button">
								<span class="ttr-icon"><i class="ti-harddrives"></i></span>
								<span class="ttr-label">Content Management</span>
								<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li>
									<a href="content-management" class="ttr-material-button"><span class="ttr-label" style="color: <?php echo $primary_color; ?>">Story, Logo, Gallery, Feedbacks</span></a>
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
						<li><i class="ti-harddrives"></i>Story, Logo, Gallery, Feedbacks</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>

				<div class="row">
					<div class="col-lg-12 m-b30">
						<br>
						<div class="row align-items d-flex">
							<div class="col-lg-6 col-md-12">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Story</h2>
								</div>
								<p style="text-align: justify; "><?php echo $story; ?></p>
								<a href="edit-content?id=3" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>					
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Logo</h2>
									<center><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 200px; height: 200px; border-radius: 50%;"></center>
									<a href="edit-content?id=4" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;EDIT DETAILS</span></a>
								</div>				
							</div>
						</div>
						<br><hr><br>
						<div class="row align-items d-flex">
							<div class="col-lg-6 col-md-12">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Gallery</h2>
								</div>
								<div class="table-responsive">
									<table id="table" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="100">Image</th>
												<th>Name</th>
												<th width="100">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$status = 1;
												$rows = $model->fetchGallery($status);

												if (!empty($rows)) {
													foreach ($rows as $row) {

											?>
											<tr>
												<td><center><a href="../assets/images/gallery/<?php echo $row['image_unique']; ?>.jpg" target="_blank"><img src="../assets/images/gallery/<?php echo $row['image_unique']; ?>.jpg" style="width: 100px;height: 80px; object-fit: cover;"></a></center></td>
												<td><?php echo $row['details']; ?></td>
												<td>
													<center>
														<button data-toggle="modal" data-target="#delete-gallery-<?php echo $row['id']; ?>" class="btn red" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Archive">
																<i class="ti-archive" style="font-size: 12px;"></i>
															</div>
														</button>
													</center>
												</td>
											</tr>
											<div id="delete-gallery-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Delete Gallery</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<input class="form-control" type="hidden" name="gallery_id" value="<?php echo $row['id']; ?>">
																	<div class="form-group col-12">
																		<label class="col-form-label">Details</label>
																		<input class="form-control" type="text" value="<?php echo $row['details']; ?>" readonly>
																	</div>
																	<div class="form-group col-12">
																		<center>
																			<img src="../assets/images/gallery/<?php echo $row['image_unique']; ?>.jpg" style="width: 500px; height: 300px; object-fit: cover;">
																		</center>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="delete_gallery" value="Delete">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													}
												}

												if (isset($_POST['delete_gallery'])) {
													$model->deleteGallery($_POST['gallery_id']);

													echo "<script>window.open('content-management','_self');</script>";
												}

											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Feedbacks</h2>
								</div>
								<div class="table-responsive">
									<table id="feedbacks" class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th width="100">Image</th>
												<th>Name</th>
												<th width="100">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$status = 1;
												$rows = $model->fetchFeedbacks($status);

												if (!empty($rows)) {
													foreach ($rows as $row) {

											?>
											<tr>
												<td><center><a href="../assets/images/feedbacks/<?php echo $row['image_unique']; ?>.jpg" target="_blank"><img src="../assets/images/feedbacks/<?php echo $row['image_unique']; ?>.jpg" style="width: 100px;height: 80px; object-fit: cover;"></a></center></td>
												<td><?php echo $row['feedback']; ?></td>
												<td>
													<center>
														<button data-toggle="modal" data-target="#delete-feedback-<?php echo $row['id']; ?>" class="btn red" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Archive">
																<i class="ti-archive" style="font-size: 12px;"></i>
															</div>
														</button>
													</center>
												</td>
											</tr>
											<div id="delete-feedback-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Delete Feedback</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<input class="form-control" type="hidden" name="feedback_id" value="<?php echo $row['id']; ?>">
																	<div class="form-group col-12">
																		<label class="col-form-label">Details</label>
																		<input class="form-control" type="text" value="<?php echo $row['feedback']; ?>" readonly>
																	</div>
																	<div class="form-group col-12">
																		<center>
																			<img src="../assets/images/feedbacks/<?php echo $row['image_unique']; ?>.jpg" style="width: 500px; height: 300px; object-fit: cover;">
																		</center>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn red radius-xl outline" name="delete_feedback" value="Delete">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<?php

													}
												}

												if (isset($_POST['delete_feedback'])) {
													$model->deleteFeedback($_POST['feedback_id']);

													echo "<script>window.open('content-management','_self');</script>";
												}

											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row align-items d-flex">
							<div class="col-lg-6 col-md-12">
								<a href="" data-toggle="modal" data-target="#add-gallery" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;ADD TO GALLERY</span></a>
								<div id="add-gallery" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Add To Gallery</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-12">
															<label class="col-form-label">Details</label>
															<input class="form-control" type="text" name="details" required>
														</div>
														<div class="form-group col-6">
															<label class="col-form-label">Image</label>
															<input class="form-control" type="file" name="image" accept="image/*" onchange="readURL(this)" style="border: 0px; padding: 0px;" required>
														</div>
														<div class="form-group col-12">
															<center>
																<img id="display-img" style="width: 500px; height: 300px; object-fit: cover; display: none;">
															</center>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="add_gallery" value="Add">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php

									if (isset($_POST['add_gallery'])) {
										$details = $_POST['details'];

										$path = '../assets/images/gallery/';
										$unique = time().uniqid(rand());
										$destination = $path . $unique . '.jpg';
										$base = basename($_FILES["image"]["name"]);
										$image = $_FILES["image"]["tmp_name"];
										move_uploaded_file($image, $destination);

										$model->addToGallery($details, $base, $unique);

										echo "<script>window.open('content-management','_self');</script>";
									}

								?>
							</div>
							<div class="col-lg-6 col-md-12">
								<a href="" data-toggle="modal" data-target="#add-feedback" class="btn blue radius-xl" style="float: left;background-color: <?php echo $primary_color; ?>"><i class="ti-marker-alt"></i><span>&nbsp;&nbsp;ADD FEEDBACK</span></a>
								<div id="add-feedback" class="modal fade" role="dialog">
									<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Add Feedback</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="form-group col-6">
															<label class="col-form-label">Image</label>
															<input class="form-control" type="file" name="image" accept="image/*" onchange="readURL(this)" style="border: 0px; padding: 0px;" required>
														</div>
														<div class="form-group col-12">
															<center>
																<img id="display-img" style="width: 500px; height: 300px; object-fit: cover; display: none;">
															</center>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<input type="submit" class="btn green radius-xl outline" name="add_feedback" value="Add">
													<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php

									if (isset($_POST['add_feedback'])) {
										$details = "Patients' Feedback";

										$path = '../assets/images/feedbacks/';
										$unique = time().uniqid(rand());
										$destination = $path . $unique . '.jpg';
										$base = basename($_FILES["image"]["name"]);
										$image = $_FILES["image"]["tmp_name"];
										move_uploaded_file($image, $destination);

										$model->addFeedback($details, $base, $unique);

										echo "<script>window.open('content-management','_self');</script>";
									}

								?>
							</div>
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
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#display-img').css('display', 'block');
						$('#display-img').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function() {
				$('#table').DataTable();
			});

			$(document).ready(function() {
				$('#feedbacks').DataTable();
			});
		</script>
	</body>

</html>
<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	if (empty($_GET['id'])) {
		echo "<script>window.open('index', '_self');</script>";
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
			.btn.dropdown-toggle.btn-default {
				background-color: #FBFBFB!important;
			}
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

			li > span.text {
				margin-left: 10px;
			}

			.child-column {
			  	float: left;
			  	width: 20%;
			}
			
			@media screen and (min-width: 1px) {
    			.col-20 {
    			    float: left;
    			  	width: 100%;
    			  	padding-left: 15px;
    			  	padding-right: 15px;
    			}
			}
			
			@media screen and (min-width: 1000px) {
    			.col-20 {
    			    float: left;
    			  	width: 20%;
    			  	padding-left: 15px;
    			  	padding-right: 15px;
    			}
			}
			
			ul.dropdown-menu > li {
			    margin: 0px!important;
			    display: block!important;
			    border: 0px!important;
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
					<h4 class="breadcrumb-title">Appointment Today</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-help"></i>Procedure</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>
		
				<form method="POST">
					<div class="row">
						<div class="col-lg-12 m-b30" style="margin-bottom: 0px;">
							<br><div class="heading-bx left">
							<h2 class="m-b10 title-head">Appointments <span>Details</span></h2>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered hover" style="width:100%">
								<thead>
									<tr>
										<th>Fullname</th>
										<th>Email</th>
										<th>Address</th>
										<th>Concern</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<?php

										$deyt_today = date("Y-m-d");
										$status = 1;
										$rows = $model->displayReservationDetails($_GET['id']);

										if (!empty($rows)) {
											foreach ($rows as $row) {

											$rowss = $model->trackHealthDeclaration($row['id']);

											if (!empty($rowss)) {
												foreach ($rowss as $rows) {
													$status_2 = '<span><a href="" data-toggle="modal" data-target="#hdf-'.$rows['id'].'" style="color: green;">YES</a></span>';
													
													        $hdq = ['hd1', 'hd2', 'hd3', 'hd4', 'hd5', 'hd6'];

															foreach ($hdq as $hd) {
																if ($rows[$hd] == 'Yes') {
																	echo "<script>window.open('covid.php', '_self');</script>";
																}
															}
															
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

									?>
									<tr>
										<td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $row['fullname']; ?></a></td>
										<td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $email_t = $row['contact']; ?></a></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['concern']; ?></td>
										<td><?php echo $row['time']; ?></td>
									</tr>
									<div id="approve-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
										<!-- <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data"> -->
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;View Appointment Details</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="form-group col-12">
																<label class="col-form-label">Fullname</label>
																<input class="form-control" type="text" value="<?php echo $row['fullname']; ?>" readonly style="background-color: white;">
															</div>
															<div class="form-group col-6">
																<label class="col-form-label">Email</label>
																<input class="form-control" name="aapprove-email" type="text" value="<?php echo $row['contact']; ?>" readonly style="background-color: white;">
															</div>
															<div class="form-group col-6">
																<label class="col-form-label">Date & Time</label>
																<input class="form-control" type="text" value="<?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?>" readonly style="background-color: white;">
															</div>
															<div class="form-group col-12">
																<label class="col-form-label">Concern</label>
																<input class="form-control" name="approve-email" type="text" value="<?php echo $row['concern']; ?>" readonly style="background-color: white;">
															</div>
															<div class="form-group col-12">
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
														<a href="procedure?id=<?php echo $row['id']; ?>" class="btn yellow outline radius-xl">Procedure</a>
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										<!-- </form> -->
									</div>
									<div id="hdf-<?php echo $rows['id']; ?>" class="modal fade" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Health Declaration</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label>1. In the past 14 days, have you or any member of your household, traveled to any areas with known cases of COVID-19?</label><br>
																<p><?php echo $rows['hd1']; ?></p>
															</div>
															<div class="form-group">
																<label>If YES please state the exact location </label>
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
													<div class="modal-footer">
														<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php

											}
										}

									?>
								</tbody>
							</table>
						</div>
						
						<?php

										$rows = $model->getLatestTransaction($email_t);
										if (!empty($rows)) {
											foreach ($rows as $row) {
			            ?>
                			            <!-- <div class="row">
                    						<div class="col-lg-12" align="right">
                    						    
                    							<a href="procedure-details?id=19" class="btn green radius-xl" target="_blank"><i class="ti-search" style="font-size: 15px;"></i> View Recent Transaction</a>
                    						</div><hr>
					                    </div> -->
			            <?php
											}
										}
										else {
						?>
										<div class="row">
                    						<div class="col-lg-12" align="right">
                    						    
                    						<H4>NO PREVIOUS TRANSACTION</H4>
                    						</div><hr>
					                    </div>
				        <?php
										}
						?>
						
						
						
						<br>
						<div class="heading-bx left">
							<h2 class="m-b10 title-head">Dental <span>Chart</span></h2>
						</div>
							<?php

								$view = $model->fetchDentalChart($_GET['id']);

								if (!empty($view)) {
									$view_status = 0;
									foreach ($view as $v) {
										$view_type = $v['type'];
									}
								}

								else {
									$view_status = 1;
									$view_type = 'N/A';
								}

							?>
							<input type="hidden" name="view_status" id="view_status" value="<?php echo $view_status; ?>">
							<?php

								if ($view_type == "N/A") {

							?>
							<div class="form-group">
								<input type="radio" id="radio_adult" name="type" value="adult" checked>
								<label for="radio_adult">Adult</label>&nbsp;&nbsp;&nbsp;
								<input type="radio" id="radio_child" name="type" value="child">
								<label for="radio_child">Child</label>
							</div>
							<?php

								}

							?>
							<div id="adult-container" <?php if ($view_type == "child") { echo 'style="display: none;"'; } ?>>
								<div class="row" id="yellow-top-adult"></div>
								<div class="row" id="top-adult"></div>
								<div class="row" id="bottom-adult"></div>
								<div class="row" id="yellow-bottom-adult"></div>
							</div>
							<div id="child-container" <?php if ($view_type == "N/A") { echo 'style="display: none;"'; } elseif ($view_type == "adult") { echo 'style="display: none;"'; } ?>>
								<div class="row" id="yellow-top-child"></div>
								<div class="row" id="top-child"></div>
								<div class="row" id="bottom-child"></div>
								<div class="row" id="yellow-bottom-child"></div>
							</div>

							<div id="placeholder"></div>
							
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Legend</h2>
							</div>
							<div class="row">
								<div class="form-group col-md-4 col-sm-4">
									<b>Condition</b><br>
									<b>✓ - </b>Present Teeth<br>
									<b>D - </b>Decayed (Caries indicated for Filling)<br>
									<b>M - </b>Missing due to Caries<br>
									<b>MO - </b>Missing due to Other Causes<br>
									<b>Im - </b>Impacted Tooth<br>
									<b>Sp - </b>Supemumerary Tooth<br>
									<b>Rf - </b>Root Fragment<br>
									<b>Un - </b>Unerupted
								</div>
								<div class="form-group col-md-4 col-sm-4">
									<b>Restorations & Prosthetics</b><br>
									<b>Am - </b>Amalgam Filling<br>
									<b>Co - </b>Composite Filling<br>
									<b>JC - </b>Jacket Crown<br>
									<b>Ab - </b>Abutment<br>
									<b>Att - </b>Attachment<br>
									<b>P - </b>Pontic<br>
									<b>In - </b>Inlay<br>
									<b>Imp - </b>Implant<br>
									<b>S - </b>Sealants<br>
									<b>R - </b>Removable Denture
								</div>
								<div class="form-group col-md-4 col-sm-4">
									<b>Surgery</b><br>
									<b>X - </b>Extraction due to Caries<br>
									<b>XO - </b>Extraction due to Other Causes<br><br>
									<b>Treatment For Whole Teeth</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="whole-treatment_1" name="whole-treatment[]" value="1">
									<label for="whole-treatment_1" style="font-weight: 400;"> <b>Op - </b>Oral Propalaxys</label><br>
									<input type="checkbox" id="whole-treatment_2" name="whole-treatment[]" value="2">
									<label for="whole-treatment_2" style="font-weight: 400;"> <b>Ot - </b>Orthodontic Treatment</label><br>
									<input type="checkbox" id="whole-treatment_3" name="whole-treatment[]" value="3">
									<label for="whole-treatment_3" style="font-weight: 400;"> Others</label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-20">
									<b>Periodontal Screening</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="screening_1" name="screening[]" value="1">
									<label for="screening_1" style="font-weight: 400;"> Gingivitis</label><br>
									<input type="checkbox" id="screening_2" name="screening[]" value="2">
									<label for="screening_2" style="font-weight: 400;"> Early Periodontitis</label><br>
									<input type="checkbox" id="screening_3" name="screening[]" value="3">
									<label for="screening_3" style="font-weight: 400;"> Moderate Periodontitis</label><br>
									<input type="checkbox" id="screening_4" name="screening[]" value="4">
									<label for="screening_4" style="font-weight: 400;"> Advanced Periodontitis</label>
								</div>
								<div class="form-group col-20">
									<b>Occlusion</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="occlusion_1" name="occlusion[]" value="1">
									<label for="occlusion_1" style="font-weight: 400;"> Class (Molar)</label><br>
									<input type="checkbox" id="occlusion_2" name="occlusion[]" value="2">
									<label for="occlusion_2" style="font-weight: 400;"> Overjet</label><br>
									<input type="checkbox" id="occlusion_3" name="occlusion[]" value="3">
									<label for="occlusion_3" style="font-weight: 400;"> Overbite</label><br>
									<input type="checkbox" id="occlusion_4" name="occlusion[]" value="4">
									<label for="occlusion_4" style="font-weight: 400;"> Midline Deviation</label><br>
									<input type="checkbox" id="occlusion_5" name="occlusion[]" value="5">
									<label for="occlusion_5" style="font-weight: 400;"> Crossbite</label>
								</div>
								<div class="form-group col-20">
									<b>Appliances</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="appliance_1" name="appliance[]" value="1">
									<label for="appliance_1" style="font-weight: 400;"> Orthodontic</label><br>
									<input type="checkbox" id="appliance_2" name="appliance[]" value="2">
									<label for="appliance_2" style="font-weight: 400;"> Stayplate</label><br>
									<input type="checkbox" id="appliance_3" name="appliance[]" value="3">
									<label for="appliance_3" style="font-weight: 400;"> Others</label>
								</div>
								<div class="form-group col-20">
								    <b>X-ray Taken</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="x-ray_1" name="x-ray[]" value="1">
									<label for="x-ray_1" style="font-weight: 400;"> Periapical</label><br>
									<input type="checkbox" id="x-ray_2" name="x-ray[]" value="2">
									<label for="x-ray_2" style="font-weight: 400;"> Panoramic</label><br>
									<input type="checkbox" id="x-ray_3" name="x-ray[]" value="3">
									<label for="x-ray_3" style="font-weight: 400;"> Cephalometric</label><br>
									<input type="checkbox" id="x-ray_4" name="x-ray[]" value="4">
									<label for="x-ray_4" style="font-weight: 400;"> Occlusal (Upper/Lower)</label><br>
									<input type="checkbox" id="x-ray_5" name="x-ray[]" value="5">
									<label for="x-ray_5" style="font-weight: 400;"> Others</label>
								</div>
								<div class="form-group col-20">
									<b>TMD</b><br><div style="height: 10px;"></div>
									<input type="checkbox" id="tmd_1" name="tmd[]" value="1">
									<label for="tmd_1" style="font-weight: 400;"> Clenching</label><br>
									<input type="checkbox" id="tmd_2" name="tmd[]" value="2">
									<label for="tmd_2" style="font-weight: 400;"> Clicking</label><br>
									<input type="checkbox" id="tmd_3" name="tmd[]" value="3">
									<label for="tmd_3" style="font-weight: 400;"> Trismus</label><br>
									<input type="checkbox" id="tmd_4" name="tmd[]" value="4">
									<label for="tmd_4" style="font-weight: 400;"> Muscle Spasm</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 m-b30">
							<div class="new-user-list">
								<br><br>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Treatment <span>Record</span></h2>
								</div>
								<div id="record-container-adult" <?php if ($view_type == "child") { echo 'style="display: none;"'; } ?>></div>
								<div id="record-container-child" <?php if ($view_type == "N/A") { echo 'style="display: none;"'; } elseif ($view_type == "adult") { echo 'style="display: none;"'; } ?>></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 m-b30">
							<div class="new-user-list">
								<br><br>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Prescriptions</h2>
								</div>
								<div class="row">
									<div class="form-group col-md-12 col-sm-12">
										<textarea name="prescriptions" placeholder="Enter prescriptions" class="form-control" required></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12" align="right">
							<button type="submit" name="upload_record" class="btn yellow radius-xl" style="width: 220px;height: 45px;display: flex;align-items: center;justify-content: center;"><i class="ti-save" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Transact Procedure</span></button>
						</div>
						<br>
						<br>
						<br>
					</div>
				</form>
				<?php

					if (isset($_POST['upload_record'])) {
						if ($_POST['view_status'] == '1') {
							if ($_POST['type'] == 'adult') {
								for ($i = 1; $i <= 16; $i++) { 
									$ta = "ta_".$i."";
									$$ta = $_POST['condition_ta-'.$i.''];
								}

								for ($i = 1; $i <= 16; $i++) { 
									$ba = "ba_".$i."";
									$$ba = $_POST['condition_ba-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$tc = "tc_".$i."";
									$$tc = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$bc = "bc_".$i."";
									$$bc = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yta = "yta_".$i."";
									$$yta = (isset($_POST['condition_yta-'.$i.''])) ? $_POST['condition_yta-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yba = "yba_".$i."";
									$$yba = (isset($_POST['condition_yba-'.$i.''])) ? $_POST['condition_yba-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ytc = "ytc_".$i."";
									$$ytc = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ybc = "ybc_".$i."";
									$$ybc = "N/A";
								}
							}

							else {
								for ($i = 1; $i <= 16; $i++) { 
									$ta = "ta_".$i."";
									$$ta = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$ba = "ba_".$i."";
									$$ba = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$tc = "tc_".$i."";
									$$tc = $_POST['condition_tc-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$bc = "bc_".$i."";
									$$bc = $_POST['condition_bc-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ytc = "ytc_".$i."";
									$$ytc = (isset($_POST['condition_ytc-'.$i.''])) ? $_POST['condition_ytc-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ybc = "ybc_".$i."";
									$$ybc = (isset($_POST['condition_ybc-'.$i.''])) ? $_POST['condition_ybc-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yta = "yta_".$i."";
									$$yta = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yba = "yba_".$i."";
									$$yba = "N/A";
								}
							}
						}

						else {
							if ($view_type == 'adult') {
								for ($i = 1; $i <= 16; $i++) { 
									$ta = "ta_".$i."";
									$$ta = $_POST['condition_ta-'.$i.''];
								}

								for ($i = 1; $i <= 16; $i++) { 
									$ba = "ba_".$i."";
									$$ba = $_POST['condition_ba-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$tc = "tc_".$i."";
									$$tc = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$bc = "bc_".$i."";
									$$bc = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yta = "yta_".$i."";
									$$yta = (isset($_POST['condition_yta-'.$i.''])) ? $_POST['condition_yta-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yba = "yba_".$i."";
									$$yba = (isset($_POST['condition_yba-'.$i.''])) ? $_POST['condition_yba-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ytc = "ytc_".$i."";
									$$ytc = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ybc = "ybc_".$i."";
									$$ybc = "N/A";
								}
							}

							else {
								for ($i = 1; $i <= 16; $i++) { 
									$ta = "ta_".$i."";
									$$ta = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$ba = "ba_".$i."";
									$$ba = "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$tc = "tc_".$i."";
									$$tc = $_POST['condition_tc-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$bc = "bc_".$i."";
									$$bc = $_POST['condition_bc-'.$i.''];
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ytc = "ytc_".$i."";
									$$ytc = (isset($_POST['condition_ytc-'.$i.''])) ? $_POST['condition_ytc-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 10; $i++) { 
									$ybc = "ybc_".$i."";
									$$ybc = (isset($_POST['condition_ybc-'.$i.''])) ? $_POST['condition_ybc-'.$i.''] : "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yta = "yta_".$i."";
									$$yta = "N/A";
								}

								for ($i = 1; $i <= 16; $i++) { 
									$yba = "yba_".$i."";
									$$yba = "N/A";
								}
							}
						}

						if ($_POST['view_status'] == '1') {
							$model->insertDentalChart($_GET['id'], $_POST['type'], $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10);

							$model->insertDentalChart2($_GET['id'], $_POST['type'], $yta_1, $yta_2, $yta_3, $yta_4, $yta_5, $yta_6, $yta_7, $yta_8, $yta_9, $yta_10, $yta_11, $yta_12, $yta_13, $yta_14, $yta_15, $yta_16, $yba_1, $yba_2, $yba_3, $yba_4, $yba_5, $yba_6, $yba_7, $yba_8, $yba_9, $yba_10, $yba_11, $yba_12, $yba_13, $yba_14, $yba_15, $yba_16, $ytc_1, $ytc_2, $ytc_3, $ytc_4, $ytc_5, $ytc_6, $ytc_7, $ytc_8, $ytc_9, $ytc_10, $ybc_1, $ybc_2, $ybc_3, $ybc_4, $ybc_5, $ybc_6, $ybc_7, $ybc_8, $ybc_9, $ybc_10);
						}

						else {
							$model->updateDentalChart($_GET['id'], $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10);

							$model->updateDentalChart2($_GET['id'], $yta_1, $yta_2, $yta_3, $yta_4, $yta_5, $yta_6, $yta_7, $yta_8, $yta_9, $yta_10, $yta_11, $yta_12, $yta_13, $yta_14, $yta_15, $yta_16, $yba_1, $yba_2, $yba_3, $yba_4, $yba_5, $yba_6, $yba_7, $yba_8, $yba_9, $yba_10, $yba_11, $yba_12, $yba_13, $yba_14, $yba_15, $yba_16, $ytc_1, $ytc_2, $ytc_3, $ytc_4, $ytc_5, $ytc_6, $ytc_7, $ytc_8, $ytc_9, $ytc_10, $ybc_1, $ybc_2, $ybc_3, $ybc_4, $ybc_5, $ybc_6, $ybc_7, $ybc_8, $ybc_9, $ybc_10);
						}
						
						$whole_treatment = '';
						$w = 0;
						if(!empty($_POST['whole-treatment'])) {
							foreach ($_POST['whole-treatment'] as $wt) {
								$whole_treatment .= $_POST['whole-treatment'][$w].',';

								$w++;
							}
						}
						else {
							$whole_treatment .= 'N/A.';
						}
						$whole_treatment = substr($whole_treatment, 0, -1);

						$x_ray = '';
						$x = 0;
						if(!empty($_POST['x-ray'])) {
							foreach ($_POST['x-ray'] as $xray) {
								$x_ray .= $_POST['x-ray'][$x].',';

								$x++;
							}
						}
						else {
							$x_ray .= 'N/A.';
						}
						$x_ray = substr($x_ray, 0, -1);

						$screening = '';
						$s = 0;
						if(!empty($_POST['screening'])) {
							foreach ($_POST['screening'] as $scr) {
								$screening .= $_POST['screening'][$s].',';

								$s++;
							}
						}
						else {
							$screening .= 'N/A.';
						}
						$screening = substr($screening, 0, -1);

						$occlusion = '';
						$o = 0;
						if(!empty($_POST['occlusion'])) {
							foreach ($_POST['occlusion'] as $occ) {
								$occlusion .= $_POST['occlusion'][$o].',';

								$o++;
							}
						}
						else {
							$occlusion .= 'N/A.';
						}
						$occlusion = substr($occlusion, 0, -1);

						$appliance = '';
						$a = 0;
						if(!empty($_POST['appliance'])) {
							foreach ($_POST['appliance'] as $app) {
								$appliance .= $_POST['appliance'][$a].',';

								$a++;
							}
						}
						else {
							$appliance .= 'N/A.';
						}
						$appliance = substr($appliance, 0, -1);

						$tmd = '';
						$t = 0;
						if(!empty($_POST['tmd'])) {
							foreach ($_POST['tmd'] as $tm) {
								$tmd .= $_POST['tmd'][$t].',';

								$t++;
							}
						}
						else {
							$tmd .= 'N/A.';
						}
						$tmd = substr($tmd, 0, -1);

						$model->insertAppointmentProcedure($_GET['id'], $whole_treatment, $x_ray, $screening, $occlusion, $appliance, $tmd);

						$i = 0;

						if(!empty($_POST['procedure'])) {
							foreach ($_POST['procedure'] as $pr) {
								$model->insertTreatmentRecord($_GET['id'], date("Y-m-d"), $_POST['tooth-no'][$i], $_POST['procedure'][$i], $_POST['dentist'][$i], $_POST['charged'][$i], $_POST['paid'][$i], $_POST['paid'][$i] - $_POST['charged'][$i]);

								$i++;
							}
						}

						$model->updateAppointmentStatus(0, $_GET['id']);

						$model->updatePrescription($_POST['prescriptions'], $_GET['id']);

						echo "<script>alert('Transaction has been processed!');window.open('procedure-details?id=".$_GET['id']."', '_self')</script>";
					}

				?>
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
			function isNumber(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}

			$(document).ready(function() {
				$('input[type=radio][name=type]').change( function() {
					switch ($(this).val()) {
						case 'adult':
							$('#adult-container').css('display', 'block');
							$('#child-container').css('display', 'none');
							$('#record-container-adult').css('display', 'block');
							$('#record-container-child').css('display', 'none');
	  						break;
						case 'child':
	  						$('#adult-container').css('display', 'none');
							$('#child-container').css('display', 'block');
							$('#record-container-adult').css('display', 'none');
							$('#record-container-child').css('display', 'block');
	  						break;
  					}
				});

				function generateModal(type, id) {
					if (type == 0) {
						var options = '<option selected disabled hidden>-- Please select an item --</option><optgroup label="Restorations & Prosthetics"><option value="Am">Am - Amalgam Filling</option><option value="Co">Co - Composite Filling</option><option value="JC">JC - Jacket Crown</option><option value="Ab">Ab - Abutment</option><option value="Att">Att - Attachment</option><option value="P">P - Pontic</option><option value="In">In - Inlay</option><option value="Imp">Imp - Implant</option><option value="S">S - Sealants</option><option value="R">R - Removable Denture</option></optgroup><optgroup label="Surgery"><option value="X">X - Extraction due to Caries</option><option value="XO">XO - Extraction due to Other Causes</option></optgroup>';
					}

					else {
						var options = '<optgroup label="Condition"><option value="✓">✓ - Present Teeth</option><option value="D">D - Decayed (Caries indicated for Filling)</option><option value="M">M - Missing due to Caries</option><option value="MO">MO - Missing due to Other Causes</option><option value="Im">Im - Impacted Tooth</option><option value="Sp">Sp - Supemumerary Tooth</option><option value="Rf">Rf - Root Fragment</option><option value="Un">Un - Unerupted</option></optgroup>';
					}

					$('#placeholder').after('<div id="legend-'+id+'" class="modal fade" role="dialog"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h4 class="modal-title"><img src="../assets/images/<?php echo $web_icon; ?>.png" style="width: 30px; height: 30px;">&nbsp;Tooth Condition</h4><button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-body"><div class="row"><div class="form-group col-12"><select class="form-control condition-select" name="condition_'+id+'" id="condition-'+id+'" required>'+options+'</select></div></div><div class="modal-footer"><button type="button" class="btn green outline radius-xl condition-confirm" id="confirm-'+id+'" data-dismiss="modal">Confirm</button><button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button></div></div></div></div></div>');
				}


				for (let i = 1; i < 5; i++) {
					$('#yellow-top-adult').append('<div class="form-group col-3"><div class="row" id="yellow-top-adult-'+i+'"></div></div>');
				}

				for (let i = 1; i < 5; i++) {
					$('#top-adult').append('<div class="form-group col-3"><div class="row" id="top-adult-'+i+'"></div></div>');
				}

				for (let i = 1; i < 5; i++) {
					$('#bottom-adult').append('<div class="form-group col-3"><div class="row" id="bottom-adult-'+i+'"></div></div>');
				}

				for (let i = 1; i < 5; i++) {
					$('#yellow-bottom-adult').append('<div class="form-group col-3"><div class="row" id="yellow-bottom-adult-'+i+'"></div></div>');
				}

				for (let i = 1; i < 3; i++) {
					$('#yellow-top-child').append('<div class="form-group col-6"><div class="row" id="yellow-top-child-'+i+'"></div></div>');
				}

				for (let i = 1; i < 3; i++) {
					$('#top-child').append('<div class="form-group col-6"><div class="row" id="top-child-'+i+'"></div></div>');
				}

				for (let i = 1; i < 3; i++) {
					$('#bottom-child').append('<div class="form-group col-6"><div class="row" id="bottom-child-'+i+'"></div></div>');
				}

				for (let i = 1; i < 3; i++) {
					$('#yellow-bottom-child').append('<div class="form-group col-6"><div class="row" id="yellow-bottom-child-'+i+'"></div></div>');
				}

				var yta_id = 0;
				var ta_id = 0;
				var ta_number_first = 19;
				var ta_number_second = 20;
				var ba_id = 0;
				var ba_number_first = 49;
				var ba_number_second = 30;
				var yba_id = 0;
				var ytc_id = 0;
				var tc_id = 0;
				var tc_number_first = 56;
				var tc_number_second = 60;
				var bc_id = 0;
				var bc_number_first = 86;
				var bc_number_second = 70;
				var ybc_id = 0;

				if ($('#view_status').val() == '1') {
					// YELLOW TOP ADULT

					$("div[id^='yellow-top-adult-']").each( function() {
						yta_id++;

						$(document).find('#yellow-top-adult-1').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yta-'+yta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+yta_id+'"></span></center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						yta_id++;

						$(document).find('#yellow-top-adult-2').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yta-'+yta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+yta_id+'"></span></center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						yta_id++;

						$(document).find('#yellow-top-adult-3').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yta-'+yta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+yta_id+'"></span></center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						yta_id++;

						$(document).find('#yellow-top-adult-4').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yta-'+yta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+yta_id+'"></span></center></div>');
					});

					// TOP ADULT

					$("div[id^='top-adult-']").each( function() {
						ta_id++;
						ta_number_first--;

						$(document).find('#top-adult-1').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-ta-'+ta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+ta_id+'"></span></button><br><span>'+ta_number_first+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						ta_id++;
						ta_number_first--;

						$(document).find('#top-adult-2').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-ta-'+ta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+ta_id+'"></span></button><br><span>'+ta_number_first+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						ta_id++;
						ta_number_second++;

						$(document).find('#top-adult-3').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-ta-'+ta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+ta_id+'"></span></button><br><span>'+ta_number_second+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						ta_id++;
						ta_number_second++;

						$(document).find('#top-adult-4').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-ta-'+ta_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+ta_id+'"></span></button><br><span>'+ta_number_second+'</span></center></div>');
					});

					// BOTTOM ADULT

					$("div[id^='bottom-adult-']").each( function() {
						ba_id++;
						ba_number_first--;

						$(document).find('#bottom-adult-1').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_first+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth"><i class="ti-plus" id="icon-ba-'+ba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+ba_id+'"></span></button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						ba_id++;
						ba_number_first--;

						$(document).find('#bottom-adult-2').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_first+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth"><i class="ti-plus" id="icon-ba-'+ba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+ba_id+'"></span></button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						ba_id++;
						ba_number_second++;

						$(document).find('#bottom-adult-3').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_second+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth"><i class="ti-plus" id="icon-ba-'+ba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+ba_id+'"></span></button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						ba_id++;
						ba_number_second++;

						$(document).find('#bottom-adult-4').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_second+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth"><i class="ti-plus" id="icon-ba-'+ba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+ba_id+'"></span></button></center></div>');
					});

					// YELLOW BOTTOM ADULT

					$("div[id^='yellow-bottom-adult-']").each( function() {
						yba_id++;

						$(document).find('#yellow-bottom-adult-1').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yba-'+yba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+yba_id+'"></span></center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						yba_id++;

						$(document).find('#yellow-bottom-adult-2').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yba-'+yba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+yba_id+'"></span></center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						yba_id++;

						$(document).find('#yellow-bottom-adult-3').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yba-'+yba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+yba_id+'"></span></center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						yba_id++;

						$(document).find('#yellow-bottom-adult-4').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-yba-'+yba_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+yba_id+'"></span></center></div>');
					});

					// YELLOW TOP CHILD

					$("input[id^='x-ray_']").each( function() {
						ytc_id++;

						$(document).find('#yellow-top-child-1').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><button type="button" id="ytc-'+ytc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-ytc-'+ytc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ytc-'+ytc_id+'"></span></button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						ytc_id++;

						$(document).find('#yellow-top-child-2').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><button type="button" id="ytc-'+ytc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-ytc-'+ytc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ytc-'+ytc_id+'"></span></button></center></div>');
					});

					// TOP CHILD

					$("input[id^='x-ray_']").each( function() {
						tc_id++;
						tc_number_first--;

						$(document).find('#top-child-1').append('<div class="form-group child-column"><center><button type="button" id="tc-'+tc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-tc-'+tc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-tc-'+tc_id+'"></span></button><br><span>'+tc_number_first+'</span></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						tc_id++;
						tc_number_second++;

						$(document).find('#top-child-2').append('<div class="form-group child-column"><center><button type="button" id="tc-'+tc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-tc-'+tc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-tc-'+tc_id+'"></span></button><br><span>'+tc_number_second+'</span></center></div>');
					});

					// BOTTOM CHILD

					$("input[id^='x-ray_']").each( function() {
						bc_id++;
						bc_number_first--;

						$(document).find('#bottom-child-1').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><span>'+bc_number_first+'</span><br><button type="button" id="bc-'+bc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-bc-'+bc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-bc-'+bc_id+'"></span></button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						bc_id++;
						bc_number_second++;

						$(document).find('#bottom-child-2').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><span>'+bc_number_second+'</span><br><button type="button" id="bc-'+bc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;"><i class="ti-plus" id="icon-bc-'+bc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-bc-'+bc_id+'"></span></button></center></div>');
					});

					// YELLOW BOTTOM CHILD

					$("input[id^='x-ray_']").each( function() {
						ybc_id++;

						$(document).find('#yellow-bottom-child-1').append('<div class="form-group child-column"><center><button type="button" id="ybc-'+ybc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-ybc-'+ybc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ybc-'+ybc_id+'"></span></button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						ybc_id++;

						$(document).find('#yellow-bottom-child-2').append('<div class="form-group child-column"><center><button type="button" id="ybc-'+ybc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;"><i class="ti-plus" id="icon-ybc-'+ybc_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ybc-'+ybc_id+'"></span></button></center></div>');
					});
				}

				else {
					var yta_values = [<?php 

						$chart_2 = $model->fetchDentalChart2($_GET['id']);

						if (!empty($chart_2)) {
							foreach ($chart_2 as $ch2) {
								for ($i = 1; $i <= 16; $i++) {
									if ($i != 16) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$yta_num = "yta_".$i;
									$$yta_num = $ch2['ta_'.$i];
									echo '"'.$$yta_num.''.$ch;
								}
							}
						}

					?>];

					var ta_values = [<?php 

						$chart_1 = $model->fetchDentalChart($_GET['id']);

						if (!empty($chart_1)) {
							foreach ($chart_1 as $ch1) {
								for ($i = 1; $i <= 16; $i++) {
									if ($i != 16) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$ta_num = "ta_".$i;
									$$ta_num = $ch1['ta_'.$i];
									echo '"'.$$ta_num.''.$ch;
								}
							}
						}

					?>];

					var ba_values = [<?php 

						$chart_1 = $model->fetchDentalChart($_GET['id']);

						if (!empty($chart_1)) {
							foreach ($chart_1 as $ch1) {
								for ($i = 1; $i <= 16; $i++) {
									if ($i != 16) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$ba_num = "ba_".$i;
									$$ba_num = $ch1['ba_'.$i];
									echo '"'.$$ba_num.''.$ch;
								}
							}
						}

					?>];

					var yba_values = [<?php 

						$chart_2 = $model->fetchDentalChart2($_GET['id']);

						if (!empty($chart_2)) {
							foreach ($chart_2 as $ch2) {
								for ($i = 1; $i <= 16; $i++) {
									if ($i != 16) { 
										$ch = '",'; 
									}

									else { 
										$ch = '"'; 
									} 

									$yba_num = "yba_".$i;
									$$yba_num = $ch2['ba_'.$i];
									echo '"'.$$yba_num.''.$ch;
								}
							}
						}

					?>];

					var ytc_values = [<?php 

						$chart_2 = $model->fetchDentalChart2($_GET['id']);

						if (!empty($chart_2)) {
							foreach ($chart_2 as $ch2) {
								for ($i = 1; $i <= 10; $i++) {
									if ($i != 10) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$ytc_num = "ytc_".$i;
									$$ytc_num = $ch2['tc_'.$i];
									echo '"'.$$ytc_num.''.$ch;
								}
							}
						}

					?>];

					var tc_values = [<?php 

						$chart_1 = $model->fetchDentalChart($_GET['id']);

						if (!empty($chart_1)) {
							foreach ($chart_1 as $ch1) {
								for ($i = 1; $i <= 10; $i++) {
									if ($i != 10) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$tc_num = "tc_".$i;
									$$tc_num = $ch1['tc_'.$i];
									echo '"'.$$tc_num.''.$ch;
								}
							}
						}

					?>];

					var bc_values = [<?php 

						$chart_1 = $model->fetchDentalChart($_GET['id']);

						if (!empty($chart_1)) {
							foreach ($chart_1 as $ch1) {
								for ($i = 1; $i <= 10; $i++) {
									if ($i != 10) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$bc_num = "bc_".$i;
									$$bc_num = $ch1['bc_'.$i];
									echo '"'.$$bc_num.''.$ch;
								}
							}
						}

					?>];

					var ybc_values = [<?php 

						$chart_2 = $model->fetchDentalChart2($_GET['id']);

						if (!empty($chart_2)) {
							foreach ($chart_2 as $ch2) {
								for ($i = 1; $i <= 10; $i++) {
									if ($i != 10) { 
										$ch = '",'; 
									} 

									else { 
										$ch = '"'; 
									} 

									$ybc_num = "ybc_".$i;
									$$ybc_num = $ch2['bc_'.$i];
									echo '"'.$$ybc_num.''.$ch;
								}
							}
						}

					?>];

					// YELLOW TOP ADULT

					$("div[id^='yellow-top-adult-']").each( function() {
						if (yta_values[yta_id] == 'N/A') {
							var temp_id = yta_id + 1;
							var yta_value = '<i class="ti-plus" id="icon-yta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yta_id + 1;
							var yta_value = '<span style="font-size: 15px;" id="text-yta-'+temp_id+'">'+yta_values[yta_id]+'</span>';
						}
						yta_id++;

						$(document).find('#yellow-top-adult-1').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yta_value+'</center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						if (yta_values[yta_id] == 'N/A') {
							var temp_id = yta_id + 1;
							var yta_value = '<i class="ti-plus" id="icon-yta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yta_id + 1;
							var yta_value = '<span style="font-size: 15px;" id="text-yta-'+temp_id+'">'+yta_values[yta_id]+'</span>';
						}
						yta_id++;

						$(document).find('#yellow-top-adult-2').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yta_value+'</center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						if (yta_values[yta_id] == 'N/A') {
							var temp_id = yta_id + 1;
							var yta_value = '<i class="ti-plus" id="icon-yta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yta_id + 1;
							var yta_value = '<span style="font-size: 15px;" id="text-yta-'+temp_id+'">'+yta_values[yta_id]+'</span>';
						}
						yta_id++;

						$(document).find('#yellow-top-adult-3').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yta_value+'</center></div>');
					});

					$("div[id^='yellow-top-adult-']").each( function() {
						if (yta_values[yta_id] == 'N/A') {
							var temp_id = yta_id + 1;
							var yta_value = '<i class="ti-plus" id="icon-yta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yta_id + 1;
							var yta_value = '<span style="font-size: 15px;" id="text-yta-'+temp_id+'">'+yta_values[yta_id]+'</span>';
						}
						yta_id++;

						$(document).find('#yellow-top-adult-4').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><button type="button" id="yta-'+yta_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yta_value+'</center></div>');
					});

					// TOP ADULT

					$("div[id^='top-adult-']").each( function() {
						if (ta_values[ta_id] == 'N/A') {
							var temp_id = ta_id + 1;
							var ta_value = '<i class="ti-plus" id="icon-ta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ta_id + 1;
							var ta_value = '<span style="font-size: 15px;" id="text-ta-'+temp_id+'">'+ta_values[ta_id]+'</span>';
						}
						ta_id++;
						ta_number_first--;

						$(document).find('#top-adult-1').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+ta_value+'</button><br><span>'+ta_number_first+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						if (ta_values[ta_id] == 'N/A') {
							var temp_id = ta_id + 1;
							var ta_value = '<i class="ti-plus" id="icon-ta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ta_id + 1;
							var ta_value = '<span style="font-size: 15px;" id="text-ta-'+temp_id+'">'+ta_values[ta_id]+'</span>';
						}
						ta_id++;
						ta_number_first--;

						$(document).find('#top-adult-2').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+ta_value+'</button><br><span>'+ta_number_first+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						if (ta_values[ta_id] == 'N/A') {
							var temp_id = ta_id + 1;
							var ta_value = '<i class="ti-plus" id="icon-ta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ta_id + 1;
							var ta_value = '<span style="font-size: 15px;" id="text-ta-'+temp_id+'">'+ta_values[ta_id]+'</span>';
						}
						ta_id++;
						ta_number_second++;

						$(document).find('#top-adult-3').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+ta_value+'</button><br><span>'+ta_number_second+'</span></center></div>');
					});

					$("div[id^='top-adult-']").each( function() {
						if (ta_values[ta_id] == 'N/A') {
							var temp_id = ta_id + 1;
							var ta_value = '<i class="ti-plus" id="icon-ta-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ta-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ta_id + 1;
							var ta_value = '<span style="font-size: 15px;" id="text-ta-'+temp_id+'">'+ta_values[ta_id]+'</span>';
						}
						ta_id++;
						ta_number_second++;

						$(document).find('#top-adult-4').append('<div class="form-group col-3"><center><button type="button" id="ta-'+ta_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+ta_value+'</button><br><span>'+ta_number_second+'</span></center></div>');
					});

					// BOTTOM ADULT

					$("div[id^='bottom-adult-']").each( function() {
						if (ba_values[ba_id] == 'N/A') {
							var temp_id = ba_id + 1;
							var ba_value = '<i class="ti-plus" id="icon-ba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ba_id + 1;
							var ba_value = '<span style="font-size: 15px;" id="text-ba-'+temp_id+'">'+ba_values[ba_id]+'</span>';
						}
						ba_id++;
						ba_number_first--;

						$(document).find('#bottom-adult-1').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_first+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth">'+ba_value+'</button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						if (ba_values[ba_id] == 'N/A') {
							var temp_id = ba_id + 1;
							var ba_value = '<i class="ti-plus" id="icon-ba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ba_id + 1;
							var ba_value = '<span style="font-size: 15px;" id="text-ba-'+temp_id+'">'+ba_values[ba_id]+'</span>';
						}
						ba_id++;
						ba_number_first--;

						$(document).find('#bottom-adult-2').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_first+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth">'+ba_value+'</button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						if (ba_values[ba_id] == 'N/A') {
							var temp_id = ba_id + 1;
							var ba_value = '<i class="ti-plus" id="icon-ba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ba_id + 1;
							var ba_value = '<span style="font-size: 15px;" id="text-ba-'+temp_id+'">'+ba_values[ba_id]+'</span>';
						}
						ba_id++;
						ba_number_second++;

						$(document).find('#bottom-adult-3').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_second+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth">'+ba_value+'</button></center></div>');
					});

					$("div[id^='bottom-adult-']").each( function() {
						if (ba_values[ba_id] == 'N/A') {
							var temp_id = ba_id + 1;
							var ba_value = '<i class="ti-plus" id="icon-ba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ba_id + 1;
							var ba_value = '<span style="font-size: 15px;" id="text-ba-'+temp_id+'">'+ba_values[ba_id]+'</span>';
						}
						ba_id++;
						ba_number_second++;

						$(document).find('#bottom-adult-4').append('<div class="form-group col-3" style="margin-bottom: 0px!important;"><center><span>'+ba_number_second+'</span><br><button type="button" id="ba-'+ba_id+'" style="background-color: green!important;" class="btn primary radius-xl tooth">'+ba_value+'</button></center></div>');
					});

					// YELLOW BOTTOM ADULT

					$("div[id^='yellow-bottom-adult-']").each( function() {
						if (yba_values[yba_id] == 'N/A') {
							var temp_id = yba_id + 1;
							var yba_value = '<i class="ti-plus" id="icon-yba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yba_id + 1;
							var yba_value = '<span style="font-size: 15px;" id="text-yba-'+temp_id+'">'+yba_values[yba_id]+'</span>';
						}
						yba_id++;

						$(document).find('#yellow-bottom-adult-1').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yba_value+'</center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						if (yba_values[yba_id] == 'N/A') {
							var temp_id = yba_id + 1;
							var yba_value = '<i class="ti-plus" id="icon-yba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yba_id + 1;
							var yba_value = '<span style="font-size: 15px;" id="text-yba-'+temp_id+'">'+yba_values[yba_id]+'</span>';
						}
						yba_id++;

						$(document).find('#yellow-bottom-adult-2').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yba_value+'</center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						if (yba_values[yba_id] == 'N/A') {
							var temp_id = yba_id + 1;
							var yba_value = '<i class="ti-plus" id="icon-yba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yba_id + 1;
							var yba_value = '<span style="font-size: 15px;" id="text-yba-'+temp_id+'">'+yba_values[yba_id]+'</span>';
						}
						yba_id++;

						$(document).find('#yellow-bottom-adult-3').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yba_value+'</center></div>');
					});

					$("div[id^='yellow-bottom-adult-']").each( function() {
						if (yba_values[yba_id] == 'N/A') {
							var temp_id = yba_id + 1;
							var yba_value = '<i class="ti-plus" id="icon-yba-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-yba-'+temp_id+'"></span>';
						}

						else {
							var temp_id = yba_id + 1;
							var yba_value = '<span style="font-size: 15px;" id="text-yba-'+temp_id+'">'+yba_values[yba_id]+'</span>';
						}
						yba_id++;

						$(document).find('#yellow-bottom-adult-4').append('<div class="form-group col-3"><center><button type="button" id="yba-'+yba_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+yba_value+'</center></div>');
					});

					// YELLOW TOP CHILD

					$("input[id^='x-ray_']").each( function() {
						if (ytc_values[ytc_id] == 'N/A') {
							var temp_id = ytc_id + 1;
							var ytc_value = '<i class="ti-plus" id="icon-ytc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ytc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ytc_id + 1;
							var ytc_value = '<span style="font-size: 15px;" id="text-ytc-'+temp_id+'">'+ytc_values[ytc_id]+'</span>';
						}
						ytc_id++;

						$(document).find('#yellow-top-child-1').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><button type="button" id="ytc-'+ytc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+ytc_value+'</button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						if (ytc_values[ytc_id] == 'N/A') {
							var temp_id = ytc_id + 1;
							var ytc_value = '<i class="ti-plus" id="icon-ytc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ytc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ytc_id + 1;
							var ytc_value = '<span style="font-size: 15px;" id="text-ytc-'+temp_id+'">'+ytc_values[ytc_id]+'</span>';
						}
						ytc_id++;

						$(document).find('#yellow-top-child-2').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><button type="button" id="ytc-'+ytc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+ytc_value+'</button></center></div>');
					});

					// TOP CHILD

					$("input[id^='x-ray_']").each( function() {
						if (tc_values[tc_id] == 'N/A') {
							var temp_id = tc_id + 1;
							var tc_value = '<i class="ti-plus" id="icon-tc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-tc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = tc_id + 1;
							var tc_value = '<span style="font-size: 15px;" id="text-tc-'+temp_id+'">'+tc_values[tc_id]+'</span>';
						}
						tc_id++;
						tc_number_first--;

						$(document).find('#top-child-1').append('<div class="form-group child-column"><center><button type="button" id="tc-'+tc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+tc_value+'</button><br><span>'+tc_number_first+'</span></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						if (tc_values[tc_id] == 'N/A') {
							var temp_id = tc_id + 1;
							var tc_value = '<i class="ti-plus" id="icon-tc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-tc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = tc_id + 1;
							var tc_value = '<span style="font-size: 15px;" id="text-tc-'+temp_id+'">'+tc_values[tc_id]+'</span>';
						}
						tc_id++;
						tc_number_second++;

						$(document).find('#top-child-2').append('<div class="form-group child-column"><center><button type="button" id="tc-'+tc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+tc_value+'</button><br><span>'+tc_number_second+'</span></center></div>');
					});

					// BOTTOM CHILD

					$("input[id^='x-ray_']").each( function() {
						if (bc_values[bc_id] == 'N/A') {
							var temp_id = bc_id + 1;
							var bc_value = '<i class="ti-plus" id="icon-bc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-bc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = bc_id + 1;
							var bc_value = '<span style="font-size: 15px;" id="text-bc-'+temp_id+'">'+bc_values[bc_id]+'</span>';
						}
						bc_id++;
						bc_number_first--;

						$(document).find('#bottom-child-1').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><span>'+bc_number_first+'</span><br><button type="button" id="bc-'+bc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+bc_value+'</button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						if (bc_values[bc_id] == 'N/A') {
							var temp_id = bc_id + 1;
							var bc_value = '<i class="ti-plus" id="icon-bc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-bc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = bc_id + 1;
							var bc_value = '<span style="font-size: 15px;" id="text-bc-'+temp_id+'">'+bc_values[bc_id]+'</span>';
						}
						bc_id++;
						bc_number_second++;

						$(document).find('#bottom-child-2').append('<div class="form-group child-column" style="margin-bottom: 0px!important;"><center><span>'+bc_number_second+'</span><br><button type="button" id="bc-'+bc_id+'" class="btn primary radius-xl tooth" style="background-color: green!important;">'+bc_value+'</button></center></div>');
					});

					// YELLOW BOTTOM CHILD

					$("input[id^='x-ray_']").each( function() {
						if (ybc_values[ybc_id] == 'N/A') {
							var temp_id = ybc_id + 1;
							var ybc_value = '<i class="ti-plus" id="icon-ybc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ybc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ybc_id + 1;
							var ybc_value = '<span style="font-size: 15px;" id="text-ybc-'+temp_id+'">'+ybc_values[ybc_id]+'</span>';
						}
						ybc_id++;

						$(document).find('#yellow-bottom-child-1').append('<div class="form-group child-column"><center><button type="button" id="ybc-'+ybc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+ybc_value+'</button></center></div>');
					});

					$("input[id^='x-ray_']").each( function() {
						if (ybc_values[ybc_id] == 'N/A') {
							var temp_id = ybc_id + 1;
							var ybc_value = '<i class="ti-plus" id="icon-ybc-'+temp_id+'" style="font-size: 15px;"></i><span style="font-size: 15px;" id="text-ybc-'+temp_id+'"></span>';
						}

						else {
							var temp_id = ybc_id + 1;
							var ybc_value = '<span style="font-size: 15px;" id="text-ybc-'+temp_id+'">'+ybc_values[ybc_id]+'</span>';
						}
						ybc_id++;

						$(document).find('#yellow-bottom-child-2').append('<div class="form-group child-column"><center><button type="button" id="ybc-'+ybc_id+'" class="btn primary radius-xl tooth" style="background-color: #fcd12a!important;">'+ybc_value+'</button></center></div>');
					});
				}

				$("button[id^='yta-']").each( function() {
					var yta_id = $(this).attr("id");

					generateModal(0, yta_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(yta_id.substring(4, yta_id.length)) - 1;
						var select_id = $('#legend-'+yta_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+yta_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='ta-']").each( function() {
					var ta_id = $(this).attr("id");

					generateModal(1, ta_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(ta_id.substring(3, ta_id.length)) - 1;
						var select_id = $('#legend-'+ta_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+ta_values[id]+'"]').prop('selected', true);
					}
				});			

				$("button[id^='ba-']").each( function() {
					var ba_id = $(this).attr("id");

					generateModal(1, ba_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(ba_id.substring(3, ba_id.length)) - 1;
						var select_id = $('#legend-'+ba_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+ba_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='yba-']").each( function() {
					var yba_id = $(this).attr("id");

					generateModal(0, yba_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(yba_id.substring(4, yba_id.length)) - 1;
						var select_id = $('#legend-'+yba_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+yba_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='ytc-']").each( function() {
					var ytc_id = $(this).attr("id");

					generateModal(0, ytc_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(ytc_id.substring(4, ytc_id.length)) - 1;
						var select_id = $('#legend-'+ytc_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+ytc_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='tc-']").each( function() {
					var tc_id = $(this).attr("id");

					generateModal(1, tc_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(tc_id.substring(3, tc_id.length)) - 1;
						var select_id = $('#legend-'+tc_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+tc_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='bc-']").each( function() {
					var bc_id = $(this).attr("id");

					generateModal(1, bc_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(bc_id.substring(3, bc_id.length)) - 1;
						var select_id = $('#legend-'+bc_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+bc_values[id]+'"]').prop('selected', true);
					}
				});

				$("button[id^='ybc-']").each( function() {
					var ybc_id = $(this).attr("id");

					generateModal(0, ybc_id);

					if ($('#view_status').val() == '0') {
						var id = parseInt(ybc_id.substring(4, ybc_id.length)) - 1;
						var select_id = $('#legend-'+ybc_id).find("select").attr('id');
						$('#'+select_id+' option[value="'+ybc_values[id]+'"]').prop('selected', true);
					}
				});

				// FUNCTIONS

				$(document).on('click', '.tooth', function() {
					var id = $(this).attr("id");

					$("#legend-" + id).modal();
				});


				$(document).on('click', '.condition-confirm', function() {
					var confirm_id = $(this).attr("id").slice(8);
					var condition = $("#condition-"+confirm_id+" option").filter(':selected').val();

					if (condition != '-- Please select an item --') {
						$('#icon-' + confirm_id).remove();
						$('#text-' + confirm_id).html(condition);
					}
				});


				$("button[id^='confirm-y']").click(function() {
					var confirm_id = $(this).attr("id").slice(8);
					var id = confirm_id.substring(4, confirm_id.length);
					var type = confirm_id.substr(1, 2);
					if (type.substr(0, 1) == 't') {
						var tooth_no = $('#'+type+'-'+id+'').parent().find("span:eq(1)").text();
					}
					else {
						var tooth_no = $('#'+type+'-'+id+'').parent().find("span:eq(0)").text();
					}
					var condition = $("#condition-"+confirm_id+" option").filter(':selected').val();
					let proc = $("#condition-"+confirm_id+"").find(":selected").text(), proc_w = proc.split(' ');
					proc_w.splice(0, 2);

					var procd = '';

					proc_w.forEach( function(item) {
						item = item + ' ';
						procd += item;
					});

					var procedure = procd.slice(0, -1);
					
					<?php
					
					    $status = 1;
            			$rows = $model->fetchOrgStructure($status);
					
					?>
					if (condition != '-- Please select an item --') {
						if ($('#tooth-'+tooth_no+'').length) {
							$('#procedure-'+tooth_no+'').val(procedure);
						}

						else {
							if (type.charAt(1) == 'a') {
								$('#record-container-adult').append('<div class="row"><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Tooth No./s</label><input class="form-control" type="text" name="tooth-no[]" style="background-color: #FBFBFB;" id="tooth-'+tooth_no+'" value="'+tooth_no+'" readonly></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Procedure</label><input class="form-control" type="text" name="procedure[]" style="background-color: #FBFBFB;" id="procedure-'+tooth_no+'" value="'+procedure+'" readonly></div><div class="form-group col-md-4 col-sm-6"><label class="col-form-label">Dentist/s</label><select class="form-control" name="dentist[]" required><?php if (!empty($rows)) {foreach ($rows as $row) {echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';}}?></select></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Amount Charged</label><input class="form-control" type="text" name="charged[]" style="background-color: #FBFBFB;" required></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Amount Paid</label><input class="form-control" type="text" name="paid[]" style="background-color: #FBFBFB;" required></div>');
							}

							else if (type.charAt(1) == 'c') {
								$('#record-container-child').append('<div class="row"><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Tooth No./s</label><input class="form-control" type="text" name="tooth-no[]" style="background-color: #FBFBFB;" id="tooth-'+tooth_no+'" value="'+tooth_no+'" readonly></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Procedure</label><input class="form-control" type="text" name="procedure[]" style="background-color: #FBFBFB;" id="procedure-'+tooth_no+'" value="'+procedure+'" readonly></div><div class="form-group col-md-4 col-sm-6"><label class="col-form-label">Dentist/s</label><select class="form-control" name="dentist[]" required><?php if (!empty($rows)) {foreach ($rows as $row) {echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';}}?></select></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Amount Charged</label><input class="form-control" type="text" name="charged[]" style="background-color: #FBFBFB;" required></div><div class="form-group col-md-2 col-sm-6"><label class="col-form-label">Amount Paid</label><input class="form-control" type="text" name="paid[]" style="background-color: #FBFBFB;" required></div>');
							}
						}
					}
					
					$('select').selectpicker('refresh');
				});

				$('#table').DataTable();
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>
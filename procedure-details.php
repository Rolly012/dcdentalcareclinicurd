<?php
	use setasign\Fpdi\Fpdi;


	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if(isset($_POST["print_prescription"])) { 
		require_once('fpdf/fpdf.php');
		require_once('vendor/setasign/fpdi/src/autoload.php');
		$pdf = new Fpdi();
		$pdf->AddPage();
		$pdf->setSourceFile('../content/Prescription.pdf');
		$tplIdx = $pdf->importPage(1);
		$pdf->SetTitle("DC DENTAL CARE CLINIC");  
		$pdf->useTemplate($tplIdx, 0, 0, 200, 290);
		$pdf->SetFont('Times');
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetXY(23, 67);
		$pdf->Write(0, $_POST['print_fullname']);
		$pdf->SetXY(26, 74);
		$pdf->Write(0, $_POST['print_address']);
		$pdf->SetXY(130, 66);
		$pdf->Write(0, $_POST['print_age']);
		$pdf->SetXY(155, 66);
		$pdf->Write(0, $_POST['print_date']);
		$pdf->SetXY(26, 95);
		$pdf->Write(5, $_POST['prescription']);
		ob_end_clean();
		$pdf->Output('I', 'Prescriptions.pdf');
	}

	if(isset($_POST["print_treatment"])) { 
		require_once('../tcpdf/tcpdf.php');  
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
		$obj_pdf->SetCreator(PDF_CREATOR);  
		$obj_pdf->SetTitle("DC DENTAL CARE - REPORTS");  
		$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
		$obj_pdf->SetDefaultMonospacedFont('helvetica');  
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
		$obj_pdf->setPrintHeader(false);  
		$obj_pdf->setPrintFooter(false);  
		$obj_pdf->SetAutoPageBreak(TRUE, 10);  
		$obj_pdf->SetFont('helvetica', '', 12);  
		$obj_pdf->AddPage(); 
		//ob_start(); 
		$content = '';  
		$content .= '  
		<div align="center">
			<img src="../assets/images/cover.png" height="100" width="525">
			<h3 style="color: black;">DC DENTAL CARE CLINIC - REPORTS<BR></h3>
		</div>
		<table border="1" cellspacing="0" cellpadding="5">  
			<tr style="font-weight: 800;">
				<th><b>Tooth No</b></th>
				<th><b>Procedure</b></th>
				<th><b>Dentists</b></th>
				<th><b>Charged</b></th>
				<th><b>Paid</b></th>
				<th><b>Balance</b></th>
			</tr>';  
		include '../global/pdf-model.php';
		$model = new Model();
		$content .= $model->displayPaidReportPDF($_GET['id']);
		$content .= '</table>';  
		$content = utf8_encode($content);
		$obj_pdf->writeHTML($content); 
		ob_end_clean();
		$obj_pdf->Output('ProcedureDetails.pdf', 'I');  
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
					<h4 class="breadcrumb-title">Appointment</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-menu"></i>Procedure Details</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; ?>
				<form method="POST" target="_blank">
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
												<th>Ref. Code</th>
												<th>Date & Time</th>
												<!-- <th>HDF</th> -->
											</tr>
										</thead>
										<tbody>
											<?php
												$deyt_today = date("Y-m-d");
												$status = 1;
												$rows = $model->displayReservationDetails($_GET['id']);

												if (!empty($rows)) {
													foreach ($rows as $row) {
														$fullname = $row['fullname'];
														$address = $row['address'];
														$prescription = $row['prescriptions'];
														$age = $row['age'];
														$date = $row['date'];

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

											?>
											<tr>
												<td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $row['fullname']; ?></a></td>
												<td><a href="patient-profile?id=<?php echo $row['contact']; ?>" style="color: black;"><?php echo $row['contact']; ?></a></td>
												<td><?php echo $row['address']; ?></td>
												<td><?php echo $row['concern']; ?></td>
												<td><?php echo $row['code']; ?></td>
												<td><?php echo date('M. d', strtotime($row['date'])); ?> - <?php echo $row['time']; ?></td>
												<!-- <td><center><b><?php echo $status_2; ?></b></center></td> -->
											</tr>
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
							<?php

																	$appointment_procedure = $model->fetchAppointmentProcedure($_GET['id']);

																	if (!empty($appointment_procedure)) {
																		foreach ($appointment_procedure as $procedure) {
																			$x_ray = str_replace(',', '<br>', $procedure['x_ray']);

																			$find = ['1', '2', '3', '4', '5'];
																			$replace = ['Periapical', 'Panoramic', 'Cephalometric', 'Occlusal (Upper/Lower)', 'Others'];

																			for ($i = 0; $i < 5; $i++) { 
																				$x_ray = str_replace($find[$i], $replace[$i], $x_ray);
																			}

																			$screening = str_replace(',', '<br>', $procedure['screening']);

																			$find_screening = ['1', '2', '3', '4'];
																			$replace_screening = ['Gingivitis', 'Early Periodontitis', 'Moderate Periodontitis', 'Advanced Periodontitis'];

																			for ($i = 0; $i < 4; $i++) { 
																				$screening = str_replace($find_screening[$i], $replace_screening[$i], $screening);
																			}

																			$occlusion = str_replace(',', '<br>', $procedure['occlusion']);

																			$find_occlusion = ['1', '2', '3', '4', '5'];
																			$replace_occlusion = ['Class (Molar)', 'Overjet', 'Overbite', 'Midline Deviation', 'Crossbite'];

																			for ($i = 0; $i < 5; $i++) { 
																				$occlusion = str_replace($find_occlusion[$i], $replace_occlusion[$i], $occlusion);
																			}

																			$appliances = str_replace(',', '<br>', $procedure['appliances']);

																			$find_appliances = ['1', '2', '3'];
																			$replace_appliances = ['Orthodontic', 'Stayplate', 'Others'];

																			for ($i = 0; $i < 3; $i++) { 
																				$appliances = str_replace($find_appliances[$i], $replace_appliances[$i], $appliances);
																			}

																			$tmd = str_replace(',', '<br>', $procedure['tmd']);

																			$find_tmd = ['1', '2', '3', '4'];
																			$replace_tmd = ['Clenching', 'Clicking', 'Trismus', 'Muscle Spasm'];

																			for ($i = 0; $i < 4; $i++) { 
																				$tmd = str_replace($find_tmd[$i], $replace_tmd[$i], $tmd);
																			}
																		}
																	}

							?><br><div style="padding: 5px;"></div>
							<div class="heading-bx left">
								<h2 class="m-b10 title-head">Dental <span>Chart</span></h2>
							</div>
							<?php

								$rows = $model->fetchDentalChart($_GET['id']);
								$rows2 = $model->fetchDentalChart2($_GET['id']);

								if (!empty($rows2)) {
									foreach ($rows2 as $row2) {
										if ($row2['type'] == 'adult') {

							?>
							<div class="row">
								<?php

									$yta_num = 1;

									for ($i = 0; $i <= 3; $i++) { 

								?>
								<div class="form-group col-3" style="margin-bottom: 0px;">
									<div class="row">
										<?php

											for ($k = 0; $k <= 3; $k++) { 
												$ind = $yta_num + $k;
										?>
										<div class="form-group col-3">
											<center>
												<button type="button" class="btn primary radius-xl" style="background-color: #fcd12a;">
													<span style="font-size: 15px;">
														<?php 

															echo $row2['ta_'.$ind];

														?></span>
												</button>
											</center>
										</div>
										<?php

											}

										?>
									</div>
								</div>
								<?php

										$yta_num = $yta_num + 4;
									}

								?>
							</div>
							<?php
										}

										elseif ($row2['type'] == 'child') {
							
							?>
							<div class="row">
								<?php

									$ta_num = 0;

									for ($i = 0; $i <= 1; $i++) { 
										$ta_num++;

								?>
								<div class="form-group col-6" style="margin-bottom: 0px;">
									<div class="row">
										<?php

											for ($k = 0; $k <= 4; $k++) { 
												$ind = $ta_num + $k;
										?>
										<div class="form-group child-column">
											<center>
												<button type="button" class="btn primary radius-xl" style="background-color: #fcd12a;">
													<span style="font-size: 15px;">
														<?php 
													
															echo $row2['tc_'.$ind];

														?></span>
												</button>
											</center>
										</div>
										<?php

											}

										?>
									</div>
								</div>
								<?php

										$ta_num = $ta_num + 4;
									}

								?>
							</div>
							<?php
						
										}
									}
								}

								if (!empty($rows)) {
									foreach ($rows as $row) {
										if ($row['type'] == 'adult') {
											for ($tb = 0; $tb <= 1; $tb++) { 

							?>
							<div class="row">
								<?php

									$ta_num = 1;

									for ($i = 0; $i <= 3; $i++) { 

								?>
								<div class="form-group col-3" style="margin-bottom: 0px;">
									<div class="row">
										<?php

											$chart_id = [[18, 14, 21, 25], [48, 44, 31, 35]];

											for ($k = 0; $k <= 3; $k++) { 
												$ind = $ta_num + $k;
										?>
										<div class="form-group col-3">
											<center>
												<?php

													if ($tb == 1) {

												?>
												<span><?php echo $chart_id[$tb][$i]; ?></span>
												<br>
												<?php

													}

												?>
												<button type="button" class="btn primary radius-xl" style="background-color: green;">
													<span style="font-size: 15px;">
														<?php 

															if ($tb == 0) {
																echo $row['ta_'.$ind];
															}

															else {
																echo $row['ba_'.$ind];
															}

														?></span>
												</button>
												<?php

													if ($tb == 0) {

												?>
												<br>
												<span><?php echo $chart_id[$tb][$i]; ?></span>
												<?php

													}

												?>
											</center>
										</div>
										<?php
												if ($i >= 2) {
													$chart_id[$tb][$i]++;
												}

												else {
													$chart_id[$tb][$i]--;
												}
											}

										?>
									</div>
								</div>
								<?php

										$ta_num = $ta_num + 4;
									}

								?>
							</div>
							<?php
											}
											if (!empty($rows2)) {
									foreach ($rows2 as $row2) {
										if ($row2['type'] == 'adult') {

							?>
							<div class="row">
								<?php

									$yba_num = 1;

									for ($i = 0; $i <= 3; $i++) { 

								?>
								<div class="form-group col-3" style="margin-bottom: 0px;">
									<div class="row">
										<?php

											for ($k = 0; $k <= 3; $k++) { 
												$ind = $yba_num + $k;
										?>
										<div class="form-group col-3">
											<center>
												<button type="button" class="btn primary radius-xl" style="background-color: #fcd12a;">
													<span style="font-size: 15px;">
														<?php 

															echo $row2['ba_'.$ind];

														?></span>
												</button>
											</center>
										</div>
										<?php

											}

										?>
									</div>
								</div>
								<?php

										$yba_num = $yba_num + 4;
									}

								?>
							</div>
							<?php
										}

										
									}
								}
										}

										elseif ($row['type'] == 'child') {
											for ($tb = 0; $tb <= 1; $tb++) { 
							?>
							<div class="row">
								<?php

									$ta_num = 0;

									for ($i = 0; $i <= 1; $i++) { 
										$ta_num++;

								?>
								<div class="form-group col-6" style="margin-bottom: 0px;">
									<div class="row">
										<?php

											$chart_id = [[55, 61], [85, 71]];

											for ($k = 0; $k <= 4; $k++) { 
												$ind = $ta_num + $k;
										?>
										<div class="form-group child-column">
											<center>
												<?php

													if ($tb == 1) {

												?>
												<span><?php echo $chart_id[$tb][$i]; ?></span>
												<br>
												<?php

													}

												?>
												<button type="button" class="btn primary radius-xl" style="background-color: green;">
													<span style="font-size: 15px;">
														<?php 

															if ($tb == 0) {
																echo $row['tc_'.$ind];
															}

															else {
																echo $row['bc_'.$ind];
															}

														?></span>
												</button>
												<?php

													if ($tb == 0) {

												?>
												<br>
												<span><?php echo $chart_id[$tb][$i]; ?></span>
												<?php

													}

												?>
											</center>
										</div>
										<?php
												if ($i == 1) {
													$chart_id[$tb][$i]++;
												}

												else {
													$chart_id[$tb][$i]--;
												}
											}

										?>
									</div>
								</div>
								<?php

										$ta_num = $ta_num + 4;
									}

								?>
							</div>
							
							<?php
											}	
							?>
							<div class="row">
								<?php

									$ta_num = 0;

									for ($i = 0; $i <= 1; $i++) { 
										$ta_num++;

								?>
								<div class="form-group col-6">
									<div class="row">
										<?php

											for ($k = 0; $k <= 4; $k++) { 
												$ind = $ta_num + $k;
										?>
										<div class="form-group child-column">
											<center>
												<button type="button" class="btn primary radius-xl" style="background-color: #fcd12a;">
													<span style="font-size: 15px;">
														<?php 
													
															echo $row2['bc_'.$ind];

														?></span>
												</button>
											</center>
										</div>
										<?php

											}

										?>
									</div>
								</div>
								<?php

										$ta_num = $ta_num + 4;
									}

								?>
							</div>
							<?php
										}
									}
								}

							?>
							<br>
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
									<b>X-ray Taken</b><br><div style="height: 10px;"></div>
									<?php echo $x_ray; ?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-3 col-sm-3">
									<b>Periodontal Screening</b><br><div style="height: 10px;"></div>
									<?php echo $screening; ?>
								</div>
								<div class="form-group col-md-3 col-sm-3">
									<b>Occlusion</b><br><div style="height: 10px;"></div>
									<?php echo $occlusion; ?>
								</div>
								<div class="form-group col-md-3 col-sm-3">
									<b>Appliances</b><br><div style="height: 10px;"></div>
									<?php echo $appliances; ?>
								</div>
								<div class="form-group col-md-3 col-sm-3">
									<b>TMD</b><br><div style="height: 10px;"></div>
									<?php echo $tmd; ?>
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
								<div class="table-responsive">
									<table class="table table-bordered hover" style="width:100%">
										<thead>
											<tr>
												<th>Tooth No</th>
												<th>Procedure</th>
												<th>Dentists</th>
												<th>Charged</th>
												<th>Paid</th>
												<th>Balance</th>
											</tr>
										</thead>
										<tbody>
										<?php
										
										$paid_details = $model->displayPaidReport($_GET['id']);
										if (!empty($paid_details)) {
											foreach ($paid_details as $key => $paid_detail) {
												$paid_detail_charged = $paid_detail['amount_charged'];
												$paid_detail_paid = $paid_detail['amount_paid'];
												$paid_detail_balance = $paid_detail['balance'];
										?>
											<tr>
												<td><?php echo $paid_detail['tooth_no']; ?></td>
												<td><?php echo $paid_detail['treatment_procedure']; ?></td>
												<td><?php echo $paid_detail['dentists']; ?></td>
												<td><span class="charged">₱ <?php echo $paid_detail['amount_charged']; ?></span></td>
												<td><span class="paid">₱ <?php echo $paid_detail['amount_paid']; ?></span></td>
												<td><span class="balance">₱ <?php echo $paid_detail['balance']; ?></span></td>
											</tr>
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
									<button type="submit" name="print_treatment" class="btn primary radius-xl">PRINT</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 m-b30">
							<div class="new-user-list">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Prescriptions</h2>
								</div>
								<?php echo $prescription; ?>
								<br>
								<br>
								<input type="hidden" name="prescription" value="<?php echo $prescription; ?>">
								<input type="hidden" name="print_fullname" value="<?php echo $fullname; ?>">
								<input type="hidden" name="print_address" value="<?php echo $address; ?>">
								<input type="hidden" name="print_age" value="<?php echo $age; ?>">
								<input type="hidden" name="print_date" value="<?php echo $date; ?>">
								<button type="submit" name="print_prescription" class="btn primary radius-xl">PRINT</button>
							</div>
						</div>
					</div>
				</form>
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
		<script type="text/javascript">
			function isNumber(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}
		</script>
	</body>

</html>
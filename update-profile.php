<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	//$email = isset($_GET['id']) ? $_GET['id'] : '';
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
						<li><i class="ti-user"></i>Update Patients Profile</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; 
					$rows = $model->displayPatientProfile($email);

					if (!empty($rows)) { 
						foreach ($rows as $row) {
							$patient_id = $row['patient_id'];
							$email = $row['email'];
							$fname = $row['fname'];
							$mname = $row['mname'];
							$lname = $row['lname'];
							$gender = $row['gender'];
							$nickname = $row['nickname'];
							$birthdate = $row['birthdate'];
							$religion = $row['religion'];
							$nationality = $row['nationality'];
							$address = $row['address'];
							$occupation = $row['occupation'];
							$dental_insurance = $row['dental_insurance'];
							$effective_date = $row['effective_date'];
							$guardian_name = $row['guardian_name'];
							$guardian_occupation = $row['guardian_occupation'];
							$refer = $row['refer'];
							$dental_consultation = $row['dental_consultation'];
							$home_no = $row['home_no'];
							$office_no = $row['office_no'];
							$fax_no = $row['fax_no'];
							$contact_no = $row['contact_no'];
							$status = $row['status'];
							$date_registered = $row['date_registered'];

							$physician = $row['physician'];
							$specialty = $row['specialty'];
							$office_address = $row['office_address'];
							$office_number = $row['office_number'];
							$good_health = $row['good_health'];
							$medical_treatment = $row['medical_treatment'];
							$condition_treated = $row['condition_treated'];
							$surgical_operation = $row['surgical_operation'];
							$operation = $row['operation'];
							$hospitalized = $row['hospitalized'];
							$when_why = $row['when_why'];
							$medication = $row['medication'];
							$specify = $row['specify'];
							$tobacco = $row['tobacco'];
							$use_drugs = $row['use_drugs'];
							$allergic = $row['allergic'];
							$allergies = explode(',', $row['allergies']);
							$bleeding_time = $row['bleeding_time'];
							$pregnant = $row['pregnant'];
							$nursing = $row['nursing'];
							$birth_control = $row['birth_control'];
							$blood_type = $row['blood_type'];
							$blood_pressure = $row['blood_pressure'];
							$problems = explode(',', $row['problems']);
						} 
					}
				?>
				<form method="POST">
					<div class="row">
						<div class="col-lg-6 m-b30">
						<!-- <div class="new-user-list"> -->
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
								<input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Nickname</label>
									<input class="form-control" name="nickname" type="text" value="<?php echo $nickname; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Email</label>
									<input class="form-control" type="text" value="<?php echo $email; ?>" readonly style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Gender</label>
									<div>
										<select class="form-control" name="gender" required >
											<option value="Male" <?php if ($gender == 'Male') { echo 'selected'; } ?>>Male</option>
											<option value="Female" <?php if ($gender == 'Female') { echo 'selected'; } ?>>Female</option>
										</select>
									</div>
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Birthdate</label>
									<input class="form-control" name="birthdate" type="date" value="<?php echo $birthdate; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Religion</label>
									<input class="form-control" name="religion" type="text" value="<?php echo $religion; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Nationality</label>
									<input class="form-control" name="nationality" type="text" value="<?php echo $nationality; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-8 col-sm-6">
									<label class="col-form-label">Address</label>
									<input class="form-control" name="address" type="text" value="<?php echo $address; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Occupation</label>
									<input class="form-control" name="occupation" type="text" value="<?php echo $occupation; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Dental Insurance</label>
									<input class="form-control" name="dental_insurance" type="text" value="<?php echo $dental_insurance; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Effective Date</label>
									<input class="form-control" name="effective_date" type="text" value="<?php echo $effective_date; ?>" required style="background-color: #FBFBFB;">
								</div>

								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Home No</label>
									<input class="form-control" name="home_no" type="text" value="<?php echo $home_no; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Office No</label>
									<input class="form-control" name="office_no" type="text" value="<?php echo $office_no; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-4 col-sm-6">
									<label class="col-form-label">Fax No</label>
									<input class="form-control" name="fax_no" type="text" value="<?php echo $fax_no; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Contact No</label>
									<input class="form-control" name="contact_no" type="text" value="<?php echo $contact_no; ?>" required style="background-color: #FBFBFB;">
								</div>
								<div class="form-group col-md-6 col-sm-6">
									<label class="col-form-label">Date Registered</label>
									<input class="form-control" type="text" value="<?php echo $date_registered; ?>" readonly style="background-color: #FBFBFB;">
								</div>
							</div>
								<!-- <div class="row">
									<div class="col-lg-12" align="right">
										<button type="submit" name="update_profile" class="btn blue radius-xl" style="width: 180px;height: 45px;display: flex;align-items: center;justify-content: center;"><i class="ti-marker-alt" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Update Profile</span></button>
									</div>
								</div> -->
						<!-- </div> -->
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
								<div class="form-group col-md-6 col-sm-6" id="question_1">
										1. Are you in good health?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_1" name="good_health" value="1" <?php if ($good_health == 1) { echo 'checked'; } ?> required>
										<label for="yes_1">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_1" name="good_health" value="0" <?php if ($good_health == 0) { echo 'checked'; } ?>>
										<label for="no_1">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_2">
										2. Are you under medical treatment now?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_2" name="medical_treatment" value="1" <?php if ($medical_treatment == 1) { echo 'checked'; } ?> required>
										<label for="yes_2">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_2" name="medical_treatment" value="0" <?php if ($medical_treatment == 0) { echo 'checked'; } ?>>
										<label for="no_2">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_2_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, what is the condition being treated?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_2_2" style="display: none;">
										<input class="form-control" name="condition" value="<?php echo $condition_treated; ?>" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_2_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_3">
										3. Have you ever had serious illness or surgical operation?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_3" name="surgical_operation" <?php if ($surgical_operation == 1) { echo 'checked'; } ?> value="1" required>
										<label for="yes_3">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_3" name="surgical_operation" <?php if ($surgical_operation == 0) { echo 'checked'; } ?> value="0">
										<label for="no_3">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_3_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_3_2" style="display: none;">
										<input class="form-control" name="operation" value="<?php echo $operation; ?>" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_3_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_4">
										4. Have you ever been hospitalized?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_4" name="hospitalized" value="1" <?php if ($hospitalized == 1) { echo 'checked'; } ?> required>
										<label for="yes_4">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_4" name="hospitalized" value="0" <?php if ($hospitalized == 0) { echo 'checked'; } ?>>
										<label for="no_4">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_4_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, when and why?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_4_2" style="display: none;">
										<input class="form-control" name="when_why" value="<?php echo $when_why; ?>" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_4_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_5">
										5. Are you taking any prescription/non-prescription medication?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_5" name="medication" value="1" <?php if ($medication == 1) { echo 'checked'; } ?> required>
										<label for="yes_5">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_5" name="medication" value="0" <?php if ($medication == 0) { echo 'checked'; } ?>>
										<label for="no_5">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_5_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, please specify
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_5_2" style="display: none;">
										<input class="form-control" name="specify" value="<?php echo $specify; ?>" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_5_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_6">
										6. Do you use tobacco products?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_6" name="tobacco" value="1" <?php if ($tobacco == 1) { echo 'checked'; } ?> required>
										<label for="yes_6">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_6" name="tobacco" value="0" <?php if ($tobacco == 0) { echo 'checked'; } ?>>
										<label for="no_6">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_7">
										7. Do you use alcohol, cocaine or other dangerous drugs?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_7" name="use_drugs" value="1" <?php if ($use_drugs == 1) { echo 'checked'; } ?> required>
										<label for="yes_7">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_7" name="use_drugs" value="0" <?php if ($use_drugs == 0) { echo 'checked'; } ?>>
										<label for="no_7">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_8">
										8. Are you allergic to any of the following:<br>
										<input type="checkbox" id="allergy_1" name="allergy[]" value="1" <?php if (in_array('1', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_1"> Local Anesthetic (ex. Lidocaine)</label><br>
										<input type="checkbox" id="allergy_2" name="allergy[]" value="2" <?php if (in_array('2', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_2"> Penicillin, Antibiotics</label><br>
										<input type="checkbox" id="allergy_3" name="allergy[]" value="3" <?php if (in_array('3', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_3"> Sulfa drugs</label>&nbsp;&nbsp;&nbsp;
										<input type="checkbox" id="allergy_4" name="allergy[]" value="4" <?php if (in_array('4', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_4"> Aspirin</label><br>
										<input type="checkbox" id="allergy_5" name="allergy[]" value="5" <?php if (in_array('5', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_5"> Latex</label>&nbsp;&nbsp;&nbsp;
										<input type="checkbox" id="allergy_6" name="allergy[]" value="6" <?php if (in_array('6', $allergies)) { echo 'checked'; } ?>>
										<label for="allergy_6"> Others</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_8" name="allergic" value="1" <?php if ($allergic == 1) { echo 'checked'; } ?> required>
										<label for="yes_8">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_8" name="allergic" value="0" <?php if ($allergic == 0) { echo 'checked'; } ?>>
										<label for="no_8">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_9">
										9. Bleeding Time
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="bleeding_time" type="text" value="<?php echo $bleeding_time; ?>" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_10">
										10. For women only:
									</div>
									<div class="form-group col-md-4 col-sm-4"></div>
									<div class="form-group col-md-6 col-sm-6" style="margin-bottom: 0px;">
										Are you pregnant?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_10_1" name="pregnant" value="1" <?php if ($pregnant == 1) { echo 'checked'; } ?>>
										<label for="yes_10_1">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_10_1" name="pregnant" value="0" <?php if ($pregnant == 0) { echo 'checked'; } ?>>
										<label for="no_10_1">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" style="margin-bottom: 0px;">
										Are you nursing?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_10_2" name="nursing" value="1" <?php if ($nursing == 1) { echo 'checked'; } ?>>
										<label for="yes_10_2">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_10_2" name="nursing" value="0" <?php if ($nursing == 0) { echo 'checked'; } ?>>
										<label for="no_10_2">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										Are you taking birth control pills?
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<input type="radio" id="yes_10_3" name="birth_control" value="1" <?php if ($birth_control == 1) { echo 'checked'; } ?>>
										<label for="yes_10_3">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<input type="radio" id="no_10_3" name="birth_control" value="0" <?php if ($birth_control == 0) { echo 'checked'; } ?>>
										<label for="no_10_3">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_11">
										11. Blood Type
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="blood_type" type="text" value="<?php echo $blood_type; ?>" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_12">
										12. Blood Pressure
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="blood_pressure" type="text" value="<?php echo $blood_pressure; ?>" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-12 col-sm-12" id="question_13">
										13. Do you have or have you had any of the following? Check which apply<br>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_13_1">
										<input type="checkbox" id="problem_1" name="problem[]" value="1" <?php if (in_array('1', $problems)) { echo 'checked'; } ?>>
										<label for="problem_1"> High Blood Pressure</label><br>
										<input type="checkbox" id="problem_2" name="problem[]" value="2" <?php if (in_array('2', $problems)) { echo 'checked'; } ?>>
										<label for="problem_2"> Low Blood Pressure</label><br>
										<input type="checkbox" id="problem_3" name="problem[]" value="3" <?php if (in_array('3', $problems)) { echo 'checked'; } ?>>
										<label for="problem_3"> Epilepsy / Convulsions</label><br>
										<input type="checkbox" id="problem_4" name="problem[]" value="4" <?php if (in_array('4', $problems)) { echo 'checked'; } ?>>
										<label for="problem_4"> AIDS or HIV infection</label><br>
										<input type="checkbox" id="problem_5" name="problem[]" value="5" <?php if (in_array('5', $problems)) { echo 'checked'; } ?>>
										<label for="problem_5"> Sexually Transmitted disease</label><br>
										<input type="checkbox" id="problem_6" name="problem[]" value="6" <?php if (in_array('6', $problems)) { echo 'checked'; } ?>>
										<label for="problem_6"> Stomach Troubles / Ulcers</label><br>
										<input type="checkbox" id="problem_7" name="problem[]" value="7" <?php if (in_array('7', $problems)) { echo 'checked'; } ?>>
										<label for="problem_7"> Fainting Seizure</label><br>
										<input type="checkbox" id="problem_8" name="problem[]" value="8" <?php if (in_array('8', $problems)) { echo 'checked'; } ?>>
										<label for="problem_8"> Rapid Weight Loss</label><br>
										<input type="checkbox" id="problem_9" name="problem[]" value="9" <?php if (in_array('9', $problems)) { echo 'checked'; } ?>>
										<label for="problem_9"> Radiation Therapy</label><br>
										<input type="checkbox" id="problem_10" name="problem[]" value="10" <?php if (in_array('10', $problems)) { echo 'checked'; } ?>>
										<label for="problem_10"> Joint Replacement / Implant</label><br>
										<input type="checkbox" id="problem_11" name="problem[]" value="11" <?php if (in_array('11', $problems)) { echo 'checked'; } ?>>
										<label for="problem_11"> Heart Surgery</label><br>
										<input type="checkbox" id="problem_12" name="problem[]" value="12" <?php if (in_array('12', $problems)) { echo 'checked'; } ?>>
										<label for="problem_12"> Heart Attack</label><br>
										<input type="checkbox" id="problem_13" name="problem[]" value="13" <?php if (in_array('13', $problems)) { echo 'checked'; } ?>>
										<label for="problem_13"> Thyroid Problem</label><br>
										<input type="checkbox" id="problem_14" name="problem[]" value="14" <?php if (in_array('14', $problems)) { echo 'checked'; } ?>>
										<label for="problem_14"> Heart Disease</label><br>
										<input type="checkbox" id="problem_15" name="problem[]" value="15" <?php if (in_array('15', $problems)) { echo 'checked'; } ?>>
										<label for="problem_15"> Heart Murmur</label><br>
										<input type="checkbox" id="problem_16" name="problem[]" value="16" <?php if (in_array('16', $problems)) { echo 'checked'; } ?>>
										<label for="problem_16"> Hepatitis / Liver Disease</label><br>
										<input type="checkbox" id="problem_17" name="problem[]" value="17" <?php if (in_array('17', $problems)) { echo 'checked'; } ?>>
										<label for="problem_17"> Rheumatic Fever</label><br>
										<input type="checkbox" id="problem_18" name="problem[]" value="18" <?php if (in_array('18', $problems)) { echo 'checked'; } ?>>
										<label for="problem_18"> Hay Fever / Allergies</label><br>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_13_2">
										<input type="checkbox" id="problem_19" name="problem[]" value="19" <?php if (in_array('19', $problems)) { echo 'checked'; } ?>>
										<label for="problem_19"> Respiratory Problems</label><br>
										<input type="checkbox" id="problem_20" name="problem[]" value="20" <?php if (in_array('20', $problems)) { echo 'checked'; } ?>>
										<label for="problem_20"> Hepatitis / Jaundice</label><br>
										<input type="checkbox" id="problem_21" name="problem[]" value="21" <?php if (in_array('21', $problems)) { echo 'checked'; } ?>>
										<label for="problem_21"> Tuberculosis</label><br>
										<input type="checkbox" id="problem_22" name="problem[]" value="22" <?php if (in_array('22', $problems)) { echo 'checked'; } ?>>
										<label for="problem_22"> Swollen ankles</label><br>
										<input type="checkbox" id="problem_23" name="problem[]" value="23" <?php if (in_array('23', $problems)) { echo 'checked'; } ?>>
										<label for="problem_23"> Kidney disease</label><br>
										<input type="checkbox" id="problem_24" name="problem[]" value="24" <?php if (in_array('24', $problems)) { echo 'checked'; } ?>>
										<label for="problem_24"> Diabetes</label><br>
										<input type="checkbox" id="problem_25" name="problem[]" value="25" <?php if (in_array('25', $problems)) { echo 'checked'; } ?>>
										<label for="problem_25"> Chest pain</label><br>
										<input type="checkbox" id="problem_26" name="problem[]" value="26" <?php if (in_array('26', $problems)) { echo 'checked'; } ?>>
										<label for="problem_26"> Stroke</label><br>
										<input type="checkbox" id="problem_27" name="problem[]" value="27" <?php if (in_array('27', $problems)) { echo 'checked'; } ?>>
										<label for="problem_27"> Cancer / Tumors</label><br>
										<input type="checkbox" id="problem_28" name="problem[]" value="28" <?php if (in_array('28', $problems)) { echo 'checked'; } ?>>
										<label for="problem_28"> Anemia</label><br>
										<input type="checkbox" id="problem_29" name="problem[]" value="29" <?php if (in_array('29', $problems)) { echo 'checked'; } ?>>
										<label for="problem_29"> Angina</label><br>
										<input type="checkbox" id="problem_30" name="problem[]" value="30" <?php if (in_array('30', $problems)) { echo 'checked'; } ?>>
										<label for="problem_30"> Asthma</label><br>
										<input type="checkbox" id="problem_31" name="problem[]" value="31" <?php if (in_array('31', $problems)) { echo 'checked'; } ?>>
										<label for="problem_31"> Emphysema</label><br>
										<input type="checkbox" id="problem_32" name="problem[]" value="32" <?php if (in_array('32', $problems)) { echo 'checked'; } ?>>
										<label for="problem_32"> Bleeding Problems</label><br>
										<input type="checkbox" id="problem_33" name="problem[]" value="33" <?php if (in_array('33', $problems)) { echo 'checked'; } ?>>
										<label for="problem_33"> Blood Diseases</label><br>
										<input type="checkbox" id="problem_34" name="problem[]" value="34" <?php if (in_array('34', $problems)) { echo 'checked'; } ?>>
										<label for="problem_34"> Head Injuries</label><br>
										<input type="checkbox" id="problem_35" name="problem[]" value="35" <?php if (in_array('35', $problems)) { echo 'checked'; } ?>>
										<label for="problem_35"> Arthritis / Rheumatism</label><br>
										<input type="checkbox" id="problem_36" name="problem[]" value="36" <?php if (in_array('36', $problems)) { echo 'checked'; } ?>>
										<label for="problem_36"> Other</label><br>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12" align="right">
									<button type="submit" name="update_profile" class="btn blue radius-xl" style=""><i class="ti-marker-alt" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Save Changes</span></button>
									<a href="patient-profile" class="btn-secondry radius-xl"><i class="ti-arrow-left"></i> Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
				<?php

							if (isset($_POST['update_profile'])) {
								$nickname = $_POST['nickname'];
								$gender = $_POST['gender'];
								$birthdate = $_POST['birthdate'];
								$religion = $_POST['religion'];
								$nationality = $_POST['nationality'];
								$address = $_POST['address'];
								$occupation = $_POST['occupation'];
								$dental_insurance = $_POST['dental_insurance'];
								$effective_date = $_POST['effective_date'];
								$home_no = $_POST['home_no'];
								$office_no = $_POST['office_no'];
								$fax_no = $_POST['fax_no'];
								$contact_no = $_POST['contact_no'];

								$model->updatePatient($nickname, $gender, $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $home_no, $office_no, $fax_no, $contact_no, $email);

								$good_health = $_POST['good_health'];

										$medical_treatment = $_POST['medical_treatment'];
										$condition = $medical_treatment == 1 ? $_POST['condition'] : 'N/A';

										$surgical_operation = $_POST['surgical_operation'];
										$operation = $surgical_operation == 1 ? $_POST['operation'] : 'N/A';

										$hospitalized = $_POST['hospitalized'];
										$when_why = $hospitalized == 1 ? $_POST['when_why'] : 'N/A';

										$medication = $_POST['medication'];
										$specify = $medication == 1 ? $_POST['specify'] : 'N/A';

										$tobacco = $_POST['tobacco'];
										$use_drugs = $_POST['use_drugs'];

										$allergic = $_POST['allergic'];
										$allergies = '';

										$i = 0;

										if(!empty($_POST['allergy'])) {
											foreach ($_POST['allergy'] as $allergy) {
												$allergies .= $allergy[$i].',';
											}
										}

										else {
											$allergies .= 'N/A.';
										}

										$allergies_list = substr($allergies, 0, -1);

										$bleeding_time = $_POST['bleeding_time'];

										$pregnant = isset($_POST['pregnant']) ? $_POST['pregnant'] : '0';
										$nursing = isset($_POST['nursing']) ? $_POST['nursing'] : '0';
										$birth_control = isset($_POST['birth_control']) ? $_POST['birth_control'] : '0';

										$blood_type = $_POST['blood_type'];
										$blood_pressure = $_POST['blood_pressure'];

										$problems = '';

										$p = 0;

										if(!empty($_POST['problem'])) {
											foreach ($_POST['problem'] as $problem) {
												$problems .= $_POST['problem'][$p].',';

												$p++;
											}
										}

										else {
											$problems .= 'N/A.';
										}

										$problems_list = substr($problems, 0, -1);

								$model->updateMedicalHistory($good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems_list, $_POST['patient_id']);

								echo "<script>window.open('patient-profile','_self');</script>";
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

			$(document).ready(function() {
				if ($('input[type="radio"][name="medical_treatment"]:checked').val() == 1) {
					$('#content_2_1').css('display', 'block');
					$('#content_2_2').css('display', 'block').find('input').prop('required', true);
					$('#content_2_3').css('display', 'block');
					$('#question_2').css('margin-bottom', '0px');
				}

				else {
					$('#content_2_1').css('display', 'none');
					$('#content_2_2').css('display', 'none').find('input').removeAttr('required');
					$('#content_2_3').css('display', 'none');
					$('#question_2').removeAttr('style');
				}

				if ($('input[type="radio"][name="surgical_operation"]:checked').val() == 1) {
					$('#content_3_1').css('display', 'block');
					$('#content_3_2').css('display', 'block').find('input').prop('required', true);
					$('#content_3_3').css('display', 'block');
					$('#question_3').css('margin-bottom', '0px');
				}

				else {
					$('#content_3_1').css('display', 'none');
					$('#content_3_2').css('display', 'none').find('input').removeAttr('required');
					$('#content_3_3').css('display', 'none');
					$('#question_3').removeAttr('style');
				}

				if ($('input[type="radio"][name="hospitalized"]:checked').val() == 1) {
					$('#content_4_1').css('display', 'block');
					$('#content_4_2').css('display', 'block').find('input').prop('required', true);
					$('#content_4_3').css('display', 'block');
					$('#question_4').css('margin-bottom', '0px');
				}

				else {
					$('#content_4_1').css('display', 'none');
					$('#content_4_2').css('display', 'none').find('input').removeAttr('required');
					$('#content_4_3').css('display', 'none');
					$('#question_4').removeAttr('style');
				}

				if ($('input[type="radio"][name="medication"]:checked').val() == 1) {
					$('#content_5_1').css('display', 'block');
					$('#content_5_2').css('display', 'block').find('input').prop('required', true);
					$('#content_5_3').css('display', 'block');
					$('#question_5').css('margin-bottom', '0px');
				}

				else {
					$('#content_5_1').css('display', 'none');
					$('#content_5_2').css('display', 'none').find('input').removeAttr('required');
					$('#content_5_3').css('display', 'none');
					$('#question_5').removeAttr('style');
				}

				$('#table').DataTable();
				$('[data-toggle="tooltip"]').tooltip();
			});
		</script>
	</body>

</html>
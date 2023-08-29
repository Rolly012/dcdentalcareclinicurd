<?php
	ob_start(); 
	session_start(); 
	include('../global/model.php');
	$model = new Model();
	include('department.php');

	if (empty($_SESSION['sess'])) {
		echo "<script>window.open('../','_self');</script>";
	}

	$email = isset($_GET['id']) ? $_GET['id'] : '';
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
					<h4 class="breadcrumb-title">Inquiries Management</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="ti-help"></i>Inquiries</li>
					</ul>
				</div>  
				
				<?php include 'widget.php'; 

				?>
				<form method="POST">
					<br>
					<center><h4 style="color: red;">PATIENTS HAS NO RECORD YET<br>PLEASE FILL OUT THE FORM</h4></center>
					<hr>
					<div class="row">
						<div class="col-lg-6 m-b30">
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Patient <span>Information</span></h2>
								</div>
								<div class="row">
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">First Name</label>
										<input class="form-control" name="first_name" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Middle Name</label>
										<input class="form-control" name="middle_name" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Last Name</label>
										<input class="form-control" name="last_name" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-6">
										<label class="col-form-label">Nickname</label>
										<input class="form-control" name="nickname" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-4 col-sm-6">
										<label class="col-form-label">Email</label>
										<input class="form-control" name="email" type="email" value="<?php echo $email; ?>" readonly style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-6">
										<label class="col-form-label">Sex</label>
										<div>
											<select class="form-control" name="gender" required>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>
									<div class="form-group col-md-3 col-sm-6">
										<label class="col-form-label">Birthdate</label>
										<input class="form-control" name="birthdate" id="birthdate" type="date" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-6">
										<label class="col-form-label">Religion</label>
										<input class="form-control" name="religion" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-4 col-sm-6">
										<label class="col-form-label">Nationality</label>
										<input class="form-control" name="nationality" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-8 col-sm-12">
										<label class="col-form-label">Address</label>
										<input class="form-control" name="address" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<label class="col-form-label">Occupation</label>
										<input class="form-control" name="occupation" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<label class="col-form-label">Effective Date</label>
										<input class="form-control" name="effective_date" type="date" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-12 col-sm-12">
										<label class="col-form-label">Dental Insurance</label>
										<input class="form-control" name="dental_insurance" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<label class="col-form-label">Guardian Name</label>
										<input class="form-control" name="guardian_name" id="guardian_name" type="text" style="background-color: #FBFBFB;" disabled>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										<label class="col-form-label">Guardian Occupation</label>
										<input class="form-control" name="guardian_occupation" id="guardian_occupation" type="text" style="background-color: #FBFBFB;" disabled>
									</div>
									<div class="form-group col-md-5 col-sm-6">
										<label class="col-form-label">Refer</label>
										<input class="form-control" name="refer" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-7 col-sm-6">
										<label class="col-form-label">Dental Consultation</label>
										<input class="form-control" name="dental_consultation" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<label class="col-form-label">Home No</label>
										<input class="form-control" name="home_no" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<label class="col-form-label">Office No</label>
										<input class="form-control" name="office_no" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<label class="col-form-label">Fax No</label>
										<input class="form-control" name="fax_no" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-12 col-sm-12">
										<label class="col-form-label">Contact No</label>
										<input class="form-control" name="contact_no" type="text" required style="background-color: #FBFBFB;">
									</div>
								</div>
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Infomed <span>Consent</span></h2>
								</div>
								<div class="row">
									<div class="form-group col-md-12 col-sm-12" style="text-align: justify;">
										<span><b><u>TREATMENT TO BE DONE:</u></b> I understand and consent to have any treatment done by the dentist after the procedure, the risks & benefits & cost have been fully explained. These treatments include, but are not limited to cleanings, periodontal treatments, filling, crowns, bridges, all types of extraction, root canals. &/or dentures local anesthetics & surgical cases.
										<br>
										<b><u>DRUGS & MEDICATIONS:</u></b> I understand that antibiotics, analgesics & other medications can cause allergic reactions like redness & swelling of tissues, pain, itching, vomiting, &/or anaphylactic shock.
										<br>					
										<b><u>CHANGES IN TREATMENT PLAN:</u></b> I understand that during treatment it may be necessary to change/add procedures because of conditions found while working on the teeth was not discovered during examination for example, root canal therapy may be needed following restorative procedures. I give my permission to the dentist is make any/all changes and additions as necessary w/ my responsibility to pay all the costs agreed.
										<br>
										<b><u>RADIOGRAPH:</u></b> I understand that an x-ray shot or a radiograph maybe necessary as part of diagnostic aid to come up with tentative diagnosis of my Dental problem and to make a good treatment plan, but, this will not give 100% assurance for the accuracy of the since all dental treatments are subject to unpredictable complications that later on may lead to sudden change of treatment plan and subject to new charges.			
										<br>
										<b><u>REMOVAL OF TEETH:</u></b> I understand that alternatives to tooth removal (root canal therapy, crowns & periodontal surgery, etc.) & I completely understand the alternatives, including their risk & benefits prior to authorizing the dentist to remove teeth & any other structures necessary for reasons above. I understand that removing teeth does not always remove all the infections, it present, & it may be necessary to have further treatment. I understand the risk involved in having teeth removed, such as pain, swelling, spread of infection, dry socket fractured jaw, loss of feeling on the teeth, lips, tongue & surrounding tissue that can last for an indefinite period of time. I understand that may need further treatment under specialist complications arise during or following treatment.				
										<br>
										<b><u>CROWNS (CAPS) & BRIDGES:</u></b> Preparing a tooth may irritate the nerves tissue in the center of the tooth, leaving the tooth extra sensitive to heat, cold and pressure. Treating such irritation may involve using special toothpastes, mouth rinses or root canal therapy. I understand that something it is not possible to match the color of natural teeth exactly with artificial teeth. I further understand that I may be wearing temporary crowns 
										, which may come off easily & that I must be careful to ensure that they are kept on until the permanent crowns are delivered. It is my responsibility to return for permanent cementation within 20 days form tooth preparation, as excessive days delay may allow for tooth movement. Which may necessitate a remake of the crown, bridge/ cap. I understand there will be additional charges for remakes due to my delaying of permanent cementation. & I realize that final opportunity to make changes in my new crown, bridges or cap (including shape, fit, size, & color) will be before permanent cementation.
										<br>	
										<b><u>ENDODONTICS (ROOT CANAL):</u></b> I understand that there is no guarantee that a root canal treatment will save a tooth & that complications can occur from
										the treatment & that occasionally root canal filling materials may extend through the tooth which does not necessarily effect the success of the treatment.
										I understand that endodontic files & drills are very fine instruments & stresses vented in their manufacture & calcifications present in teeth can cause them to break during use. I understand that referral to the endodontist for additional treatments may be necessary following any root canal treatment & I agree that I am responsible for any additional cost for treatment performed by the endodontist. I understand that a tooth may require removal in spite of all efforts.
										<br>
										<b><u>PERIODONTAL DISEASE:</u></b> I understand that periodontal disease is a serious condition causing gum & bone inflammation & for loss & that can lead eventually to the loss of my teeth. I understand the alternative treatment plans to correct periodontal disease, including gum surgery tooth extractions with or without replacement, I understand that undertaking any dental procedures may have future adverse effect on my periodontal.
										<br>
										<b><u>FILLINGS:</u></b> understand that care must be exercised in chewing on fillings, especially during the first 24 hours to avoid breakage. I understand that a more
										extensive filling or a crown may be required, as additional decay or fracture may become evident after initial excavation. I understand that significant sensitivity is a common, but usually temporary, after-effect of a newly placed filling. I further understand that filling tooth may irritate the nerve tissue creating sensitivity & treating such sensitivity could require root canal therapy or extractions.
										<br>
										<b><u>DENTURES:</u></b> I understand that wearing of dentures can be difficult. Sore spots, altered speech & difficulty in eating are common problems. Immediate dentures (placement of denture immediately after extractions) may be painful. Immediate dentures may require considerable adjusting & several refines. I understand that it is my responsibility to return for delivery of dentures. I understand that failure to keep my delivery appointment may result in poorly fitted dentures. If a remake is required due to my delays of more than 30 days, there will be additional charges. A permanent reline will be needed later, which is not included in the initial fee. I understand that all adjustment or alterations of any kind after the initial period is subject to charge.</span>
										<br>
									</div>
								</div>
							<!-- </div> -->
						</div>
						<div class="col-lg-6 m-b30">
							<!-- <div class="new-user-list"> -->
								<div class="heading-bx left">
									<h2 class="m-b10 title-head">Medicall <span>History</span></h2>
									<span>Physician's Information</span>
								</div>
								<div class="row">
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Name</label>
										<input class="form-control" name="physician" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Specialty</label>
										<input class="form-control" name="specialty" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Address</label>
										<input class="form-control" name="address" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-3 col-sm-12">
										<label class="col-form-label">Number</label>
										<input class="form-control" name="number" type="text" required style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_1">
										1. Are you in good health?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_1" name="good_health" value="1" required>
										<label for="yes_1">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_1" name="good_health" value="0">
										<label for="no_1">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_2">
										2. Are you under medical treatment now?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_2" name="medical_treatment" value="1" required>
										<label for="yes_2">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_2" name="medical_treatment" value="0">
										<label for="no_2">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_2_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, what is the condition being treated?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_2_2" style="display: none;">
										<input class="form-control" name="condition" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_2_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_3">
										3. Have you ever had serious illness or surgical operation?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_3" name="surgical_operation" value="1" required>
										<label for="yes_3">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_3" name="surgical_operation" value="0">
										<label for="no_3">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_3_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, what illness or operation?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_3_2" style="display: none;">
										<input class="form-control" name="operation" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_3_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_4">
										4. Have you ever been hospitalized?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_4" name="hospitalized" value="1" required>
										<label for="yes_4">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_4" name="hospitalized" value="0">
										<label for="no_4">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_4_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, when and why?
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_4_2" style="display: none;">
										<input class="form-control" name="when_why" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_4_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_5">
										5. Are you taking any prescription/non-prescription medication?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_5" name="medication" value="1" required>
										<label for="yes_5">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_5" name="medication" value="0">
										<label for="no_5">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="content_5_1" style="display: none;">
										&nbsp;&nbsp;&nbsp;&nbsp;If so, please specify
									</div>
									<div class="form-group col-md-4 col-sm-4" id="content_5_2" style="display: none;">
										<input class="form-control" name="specify" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-2 col-sm-2" id="content_5_3" style="display: none;"></div>
									<div class="form-group col-md-6 col-sm-6" id="question_6">
										6. Do you use tobacco products?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_6" name="tobacco" value="1" required>
										<label for="yes_6">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_6" name="tobacco" value="0">
										<label for="no_6">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_7">
										7. Do you use alcohol, cocaine or other dangerous drugs?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_7" name="use_drugs" value="1" required>
										<label for="yes_7">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_7" name="use_drugs" value="0">
										<label for="no_7">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_8">
										8. Are you allergic to any of the following:<br>
										<input type="checkbox" id="allergy_1" name="allergy[]" value="1">
										<label for="allergy_1"> Local Anesthetic (ex. Lidocaine)</label><br>
										<input type="checkbox" id="allergy_2" name="allergy[]" value="2">
										<label for="allergy_2"> Penicillin, Antibiotics</label><br>
										<input type="checkbox" id="allergy_3" name="allergy[]" value="3">
										<label for="allergy_3"> Sulfa drugs</label>&nbsp;&nbsp;&nbsp;
										<input type="checkbox" id="allergy_4" name="allergy[]" value="4">
										<label for="allergy_4"> Aspirin</label><br>
										<input type="checkbox" id="allergy_5" name="allergy[]" value="5">
										<label for="allergy_5"> Latex</label>&nbsp;&nbsp;&nbsp;
										<input type="checkbox" id="allergy_6" name="allergy[]" value="6">
										<label for="allergy_6"> Others</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_8" name="allergic" value="1" required>
										<label for="yes_8">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_8" name="allergic" value="0">
										<label for="no_8">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_9">
										9. Bleeding Time
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="bleeding_time" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_10">
										10. For women only:
									</div>
									<div class="form-group col-md-4 col-sm-4"></div>
									<div class="form-group col-md-6 col-sm-6" style="margin-bottom: 0px;">
										Are you pregnant?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_10_1" name="pregnant" value="1">
										<label for="yes_10_1">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_10_1" name="pregnant" value="0">
										<label for="no_10_1">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" style="margin-bottom: 0px;">
										Are you nursing?
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="yes_10_2" name="nursing" value="1">
										<label for="yes_10_2">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3" style="margin-bottom: 0px;">
										<input type="radio" id="no_10_2" name="nursing" value="0">
										<label for="no_10_2">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6">
										Are you taking birth control pills?
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<input type="radio" id="yes_10_3" name="birth_control" value="1">
										<label for="yes_10_3">Yes</label>
									</div>
									<div class="form-group col-md-3 col-sm-3">
										<input type="radio" id="no_10_3" name="birth_control" value="0">
										<label for="no_10_3">No</label>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_11">
										11. Blood Type
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="blood_type" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_12">
										12. Blood Pressure
									</div>
									<div class="form-group col-md-4 col-sm-4">
										<input class="form-control" name="blood_pressure" type="text" style="background-color: #FBFBFB;">
									</div>
									<div class="form-group col-md-12 col-sm-12" id="question_13">
										13. Do you have or have you had any of the following? Check which apply<br>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_13_1">
										<input type="checkbox" id="problem_1" name="problem[]" value="1">
										<label for="problem_1"> High Blood Pressure</label><br>
										<input type="checkbox" id="problem_2" name="problem[]" value="2">
										<label for="problem_2"> Low Blood Pressure</label><br>
										<input type="checkbox" id="problem_3" name="problem[]" value="3">
										<label for="problem_3"> Epilepsy / Convulsions</label><br>
										<input type="checkbox" id="problem_4" name="problem[]" value="4">
										<label for="problem_4"> AIDS or HIV infection</label><br>
										<input type="checkbox" id="problem_5" name="problem[]" value="5">
										<label for="problem_5"> Sexually Transmitted disease</label><br>
										<input type="checkbox" id="problem_6" name="problem[]" value="6">
										<label for="problem_6"> Stomach Troubles / Ulcers</label><br>
										<input type="checkbox" id="problem_7" name="problem[]" value="7">
										<label for="problem_7"> Fainting Seizure</label><br>
										<input type="checkbox" id="problem_8" name="problem[]" value="8">
										<label for="problem_8"> Rapid Weight Loss</label><br>
										<input type="checkbox" id="problem_9" name="problem[]" value="9">
										<label for="problem_9"> Radiation Therapy</label><br>
										<input type="checkbox" id="problem_10" name="problem[]" value="10">
										<label for="problem_10"> Joint Replacement / Implant</label><br>
										<input type="checkbox" id="problem_11" name="problem[]" value="11">
										<label for="problem_11"> Heart Surgery</label><br>
										<input type="checkbox" id="problem_12" name="problem[]" value="12">
										<label for="problem_12"> Heart Attack</label><br>
										<input type="checkbox" id="problem_13" name="problem[]" value="13">
										<label for="problem_13"> Thyroid Problem</label><br>
										<input type="checkbox" id="problem_14" name="problem[]" value="14">
										<label for="problem_14"> Heart Disease</label><br>
										<input type="checkbox" id="problem_15" name="problem[]" value="15">
										<label for="problem_15"> Heart Murmur</label><br>
										<input type="checkbox" id="problem_16" name="problem[]" value="16">
										<label for="problem_16"> Hepatitis / Liver Disease</label><br>
										<input type="checkbox" id="problem_17" name="problem[]" value="17">
										<label for="problem_17"> Rheumatic Fever</label><br>
										<input type="checkbox" id="problem_18" name="problem[]" value="18">
										<label for="problem_18"> Hay Fever / Allergies</label><br>
									</div>
									<div class="form-group col-md-6 col-sm-6" id="question_13_2">
										<input type="checkbox" id="problem_19" name="problem[]" value="19">
										<label for="problem_19"> Respiratory Problems</label><br>
										<input type="checkbox" id="problem_20" name="problem[]" value="20">
										<label for="problem_20"> Hepatitis / Jaundice</label><br>
										<input type="checkbox" id="problem_21" name="problem[]" value="21">
										<label for="problem_21"> Tuberculosis</label><br>
										<input type="checkbox" id="problem_22" name="problem[]" value="22">
										<label for="problem_22"> Swollen ankles</label><br>
										<input type="checkbox" id="problem_23" name="problem[]" value="23">
										<label for="problem_23"> Kidney disease</label><br>
										<input type="checkbox" id="problem_24" name="problem[]" value="24">
										<label for="problem_24"> Diabetes</label><br>
										<input type="checkbox" id="problem_25" name="problem[]" value="25">
										<label for="problem_25"> Chest pain</label><br>
										<input type="checkbox" id="problem_26" name="problem[]" value="26">
										<label for="problem_26"> Stroke</label><br>
										<input type="checkbox" id="problem_27" name="problem[]" value="27">
										<label for="problem_27"> Cancer / Tumors</label><br>
										<input type="checkbox" id="problem_28" name="problem[]" value="28">
										<label for="problem_28"> Anemia</label><br>
										<input type="checkbox" id="problem_29" name="problem[]" value="29">
										<label for="problem_29"> Angina</label><br>
										<input type="checkbox" id="problem_30" name="problem[]" value="30">
										<label for="problem_30"> Asthma</label><br>
										<input type="checkbox" id="problem_31" name="problem[]" value="31">
										<label for="problem_31"> Emphysema</label><br>
										<input type="checkbox" id="problem_32" name="problem[]" value="32">
										<label for="problem_32"> Bleeding Problems</label><br>
										<input type="checkbox" id="problem_33" name="problem[]" value="33">
										<label for="problem_33"> Blood Diseases</label><br>
										<input type="checkbox" id="problem_34" name="problem[]" value="34">
										<label for="problem_34"> Head Injuries</label><br>
										<input type="checkbox" id="problem_35" name="problem[]" value="35">
										<label for="problem_35"> Arthritis / Rheumatism</label><br>
										<input type="checkbox" id="problem_36" name="problem[]" value="36">
										<label for="problem_36"> Other</label><br>
									</div>
								</div>
								<div class="row">
									<div class="form-group form-forget">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="confirm_terms" required>
											<label class="custom-control-label" for="confirm_terms" style="font-size: 13px;text-align: justify;">I understand that dentistry is not an exact science and that no dentist can property guarantee accurate results all the time. I hereby authorize any of the doctors/dental auxiliaries to proceed with perform the dental restorations & treatments an explained to me. I understand that these are subject to modification depending on undiagnosable circumstances that may arise during the course of treatment. I understand that regardless of any dental insurance coverage I may have, I am responsible for payment of dental fees. I agree to pay any attorney's fees, collection fee, or court costs that may be incurred to satisfy any obligation to this office. All treatment were properly explained to me & my untoward circumstances that may arise during the procedure, the attending dentist will not be held liable since it is my free will, with full trust & confidence in him/her, to undergo dental treatment under his/her care</label>
										</div>
									</div>
									<hr>
									
									<div class="col-lg-12" align="right">
										<button type="submit" name="insert_profile" class="btn blue radius-xl" style="width: 230px;height: 45px;display: flex;align-items: center;justify-content: center;"><i class="ti-marker-alt" style="font-size: 15px;"></i><span style="font-size: 15px;">&nbsp;&nbsp;Add Profile Information</span></button>
										
									</div>
									<div class="col-lg-12">
									<hr>
									<center><i>Default account password is set to "12345".</i></center>
									</div>
								</div>
							<?php

								if (isset($_POST['insert_profile'])) {
									$email = $_POST['email'];
									$first_name = $_POST['first_name'];
									$middle_name = $_POST['middle_name'];
									$last_name = $_POST['last_name'];
									$nickname = $_POST['nickname'];
									$gender = $_POST['gender'];
									$birthdate = $_POST['birthdate'];
									$religion = $_POST['religion'];
									$nationality = $_POST['nationality'];
									$address = $_POST['address'];
									$occupation = $_POST['occupation'];
									$dental_insurance = $_POST['dental_insurance'];
									$effective_date = $_POST['effective_date'];
									$guardian_name = $_POST['guardian_name'];
									$guardian_occupation = $_POST['guardian_occupation'];
									$refer = $_POST['refer'];
									$dental_consultation = $_POST['dental_consultation'];
									$home_no = $_POST['home_no'];
									$office_no = $_POST['office_no'];
									$fax_no = $_POST['fax_no'];
									$contact_no = $_POST['contact_no'];
									$pword = "12345";
									$pword = password_hash($pword, PASSWORD_DEFAULT);

									$last_id = $model->insertPatient($first_name, $middle_name, $last_name, $nickname, $gender, $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $guardian_name, $guardian_occupation, $refer, $dental_consultation, $home_no, $office_no, $fax_no, $contact_no, $email, $pword);

									if ($last_id != 'N/A') {
										$physician = $_POST['physician'];
										$specialty = $_POST['specialty'];
										$address = $_POST['address'];
										$number = $_POST['number'];

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

										$model->insertMedicalHistory($last_id, $physician, $specialty, $address, $number, $good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems_list);

										echo "<script>window.open('patient-profile?id=".$email."','_self');</script>";
									}

									else {
										echo "Email already registered.";
									}
								}

							?>
							<!-- </div> -->
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
			    $('#birthdate').change(function() {
			        var birthdate = new Date($(this).val());
			        var diff = Date.now() - birthdate.getTime();
			        var dt = new Date(diff);
			        var year = dt.getUTCFullYear();
			        var age = Math.abs(year - 1970);
			        
			        if (age < 18) {
			            $('#guardian_name').prop("disabled", false);
			            $('#guardian_occupation').prop("disabled", false);
			            $('#guardian_name').prop("required", true);
			            $('#guardian_occupation').prop("required", true);
			        }
			        
			        else {
			            $('#guardian_name').prop("required", false);
			            $('#guardian_occupation').prop("required", false);
			            $('#guardian_name').prop("disabled", true);
			            $('#guardian_occupation').prop("disabled", true);
			        }
			    });
			    
				const question_id = [2, 3, 4, 5]; 

				question_id.forEach(function(id) {
					$('#yes_' + id).click(function() {
						$('#content_' + id + '_1').css('display', 'block');
						$('#content_' + id + '_2').css('display', 'block').find('input').prop('required', true);
						$('#content_' + id + '_3').css('display', 'block');
						$('#question_' + id).css('margin-bottom', '0px');
					});

					$('#no_' + id).click(function() {
						$('#content_' + id + '_1').css('display', 'none');
						$('#content_' + id + '_2').css('display', 'none').find('input').removeAttr('required');
						$('#content_' + id + '_3').css('display', 'none');
						$('#question_' + id).removeAttr('style');
					});
				});
			});
		</script>
	</body>

</html>
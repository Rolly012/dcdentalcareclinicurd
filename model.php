<?php

	date_default_timezone_set('Asia/Manila');
	Class Model {
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "dc_dental";
		
// 		private $username = "root";
// 		private $password = "";
// 		private $dbname = "guiban";
		
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			}
		}

		public function signIn($uname, $pword) {
			$query = "SELECT id, pword FROM admin WHERE uname = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('admin/index','_self');</script>";
							exit();
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['lattempt'])) {
								$_SESSION['lattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['lattempt']) {
									case 1:
										$_SESSION['lattempt']++;
										break;
									case 2:
										$_SESSION['lattempt']++;
										break;
									case 3:
										$_SESSION['lattempt']++;
										break;
									default:
										unset($_SESSION['lattempt']);
										setcookie('rlimited', '5', time() + (60), "/");
										setcookie('expiration_date_admin', time() + (60), time() + (60), "/");
										echo "<script>alert('reached limit!')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function patientSignIn($uname, $pword) {
			$query = "SELECT patient_id, pword, status FROM patient WHERE email = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass, $status);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (!empty($hashed_pass)) {
							if ($status == 1) {
								if (password_verify($pword, $hashed_pass)) {
									$_SESSION['patient_sess'] = $uname;
									echo "<script>window.open('patient/index','_self');</script>";
									exit();
								}

								else {
									echo "<center><br><h5 style='color: red;'>Incorrect Password</h5></center>";
									if (empty($_SESSION['pattempt'])) {
										$_SESSION['pattempt'] = 1;
									}
									
									else {
										switch ($_SESSION['pattempt']) {
											case 1:
												$_SESSION['pattempt']++;
												break;
											case 2:
												$_SESSION['pattempt']++;
												break;
											case 3:
												$_SESSION['pattempt']++;
												break;
											default:
												unset($_SESSION['pattempt']);
												echo "<script>window.open('patient.php','_self');</script>";
										}
									}
								}
							}

							else {
								echo "<script>alert('Account deactivated!');</script>";
							}
						}

						else {
							echo "<script>alert('Account not registered!');</script>";
						}
					}
				}

				else {
					echo "<script>alert('Email not found in database!');</script>";
				}

				$stmt->close();
			}

			$this->conn->close();
		}

		//ADMIN - CHANGE PASSWORD
		public function changePassword($id, $pword, $newpword) {
			$query = "SELECT id, pword FROM admin WHERE id = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE admin SET pword = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('index','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password!');window.open('change-password','_self');</script>";
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		//PATIENT - CHANGE PASSWORD
		public function changePatientPassword($id, $pword, $newpword) {
			$query = "SELECT patient_id, pword FROM patient WHERE patient_id = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE patient SET pword = ? WHERE patient_id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('patient-profile','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password!');window.open('change-password','_self');</script>";
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function website_details(){
			$data = null;
			$query = "SELECT * FROM web_details ORDER BY web_id DESC LIMIT 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function content_management(){
			$data = null;
			$query = "SELECT * FROM content_management WHERE id = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function editContent($column, $content) {
			$query = "UPDATE content_management SET ".$column." = ? WHERE id = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $content);
				$stmt->execute();
				$stmt->close();
				
			}
		}
		
		public function visits(){
			$data = null;
			$query = "SELECT COUNT(*) as total FROM visit";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function add_visit($date) {
			$query = "INSERT INTO visit (visit_date) VALUES (?)";
			if ($stmt = $this->conn->prepare($query)) {
			    $stmt->bind_param('s', $date);
			    $stmt->execute();
			    $stmt->close();
				return true;
			}
			else {
				return false;
			}
		}

		public function post_message($name, $email, $subject, $message, $date) {
			$query = "INSERT INTO inquiries (name, email, subject, message, date_sent) VALUES (?, ?, ?, ?, ?)";
			if ($stmt = $this->conn->prepare($query)) {
			    $stmt->bind_param('sssss', $name, $email, $subject, $message, $date);
			    $stmt->execute();
			    $stmt->close();
				return true;
			}
			else {
				return false;
			}
		}

		public function displayDepartment() {
			$data = null;

			$query = "SELECT * FROM admin WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayPatients($status) {
			$data = null;
			$query = "SELECT * FROM patient WHERE status = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayPatientProfile($email) {
			$data = null;
			$query = "SELECT a.*, b.* FROM patient AS a INNER JOIN medical_history AS b ON a.patient_id = b.patient_id WHERE a.email = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function insertAppointmentProcedure($appointment_id, $whole_treatment, $x_ray, $screening, $occlusion, $appliances, $tmd) {
			$query = "INSERT INTO appointment_procedure (appointment_id, whole_teeth, x_ray, screening, occlusion, appliances, tmd) VALUES (?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('issssss', $appointment_id, $whole_treatment, $x_ray, $screening, $occlusion, $appliances, $tmd);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function insertTreatmentRecord($appointment_id, $date, $tooth_no, $treatment_procedure, $dentists, $amount_charged, $amount_paid, $balance) {
			$query = "INSERT INTO treatment_record (appointment_id, date, tooth_no, treatment_procedure, dentists, amount_charged, amount_paid, balance) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('isssssss', $appointment_id, $date, $tooth_no, $treatment_procedure, $dentists, $amount_charged, $amount_paid, $balance);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function displayReservations($status) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE status = ? OR status = 0 ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function displayReservationsPending($status) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE status = ? ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReservationsXX($status) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE status = ? ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayMyReservations($email) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE status = 1 AND contact = ? OR status = 0 AND contact = ? ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $email, $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReservationsToday($deyt_today) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE DATE_FORMAT(date, "%Y-%m-%d") = ? AND status = 1 OR status = 0 AND DATE_FORMAT(date, "%Y-%m-%d") = ? ORDER BY FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $deyt_today, $deyt_today);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayMyReservationsToday($deyt_today, $email) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE status = 1 AND DATE_FORMAT(date, "%Y-%m-%d") = ? AND contact = ? OR status = 0 AND DATE_FORMAT(date, "%Y-%m-%d") = ? AND contact = ? ORDER BY FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssss', $deyt_today, $email, $deyt_today, $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReservationDetails($id) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE id =?';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReservationsHistory($status) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE NOT status = ? ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReservationsHistoryByEmail($status, $email) {
			$data = null;
			$query = 'SELECT * FROM appointments WHERE contact = ? AND NOT status = ? ORDER BY date DESC, FIELD(time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $email, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReports($status) {
			$data = null;
			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.status = ? ORDER BY date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayPatientReports($email, $status) {
			$data = null;
			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.contact = ? AND a.status = ? ORDER BY date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $email, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayReportsByDate($status, $date, $date_end) {
			$data = null;

			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.status = ? AND DATE_FORMAT(a.date, "%Y-%m-%d") >= ? AND DATE_FORMAT(a.date, "%Y-%m-%d") <= ? ORDER BY a.date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iss', $status, $date, $date_end);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}

			return $data;
		}

		public function displayReportsByDatePatient($email, $status, $date, $date_end) {
			$data = null;

			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.contact = ? AND a.status = ? AND DATE_FORMAT(a.date, "%Y-%m-%d") >= ? AND DATE_FORMAT(a.date, "%Y-%m-%d") <= ? ORDER BY a.date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('siss', $email, $status, $date, $date_end);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}

			return $data;
		}

		public function displayPaidReport($id) {
			$data = null;
			$query = "SELECT * FROM treatment_record WHERE appointment_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayPaidReportPDF($id) {
			$output = '';
			$total_charged = 0;
			$total_paid = 0;
			$balance = 0;
	  	
		  	$query = "SELECT * FROM treatment_record WHERE appointment_id = ?";

		  	if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
					$output .= '<tr>
						<td>'.$row['tooth_no'].'</td>
						<td>'.$row['treatment_procedure'].'</td>
						<td>'.$row['dentists'].'</td>
						<td>P'.$row['amount_charged'].'</td>
						<td>P'.$row['amount_paid'].'</td>
						<td>P'.$row['balance'].'</td>
					</tr>';

					$total_charged = $total_charged + $row['amount_charged'];
					$total_paid = $total_paid + $row['amount_paid'];
					$balance = $balance + $row['balance'];
				}

				$output .= '<div align="right">
								<h4>Total Charged: P'.$total_charged.'</h4>
								<h4>Total Paid: P'.$total_paid.'</h4>
								<h4>Balance: P'.$balance.'</h4>
							</div>';

				$stmt->close();
			}

			return $output;
		}

		public function displayReportsPDF($status) {
			$output = '';
			$total_charged = 0;
			$total_paid = 0;
			$total_balance = 0;

			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.status = ? ORDER BY date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$amount_charged = ($row['total_charged'] != '') ? $row['total_charged'] : "N/A";
					$amount_paid = ($row['total_paid'] != '') ? $row['total_paid'] : "N/A";
					$balance = ($row['total_balance'] != '') ? $row['total_balance'] : "N/A";

					$output .= '<tr>
						<td>'.$row['fullname'].'</td>
						<td>'.date('M. d Y', strtotime($row['date'])).' - '.$row['time'].'</td>
						<td>'.$row['concern'].'</td>
						<td>'.$row['code'].'</td>
						<td>P'.$amount_charged.'</td>
						<td>P'.$amount_paid.'</td>
						<td>P'.$balance.'</td>
					</tr>';

					$total_charged = $total_charged + $row['total_charged'];
					$total_paid = $total_paid + $row['total_paid'];
					$total_balance = $total_balance + $row['total_balance'];
				}

				$output .= '<div align="right">
								<h4>Total Charged: P'.$total_charged.'</h4>
								<h4>Total Paid: P'.$total_paid.'</h4>
								<h4>Balance: P'.$total_balance.'</h4>
							</div>';
				$stmt->close();
			}
			return $output;
		}

		public function displayPaidReportClearance($id) {
			$output = '';
	  	
		  	$query = "SELECT * FROM treatment_record WHERE appointment_id = ?";

		  	if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();

				$i = 1;

				while ($row = $result->fetch_assoc()) {
					$output .= ''.$i.') '.$row['treatment_procedure'].'';

					$i++;
				}


				$stmt->close();
			}

			return $output;
		}

		public function displayReportsByDatePDF($status, $date, $date_end) {
			$output = '';
			$total_charged = 0;
			$total_paid = 0;
			$total_balance = 0;

			$query = 'SELECT *, (SELECT SUM(b.amount_paid) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_paid, (SELECT SUM(b.amount_charged) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_charged, (SELECT SUM(b.balance) FROM treatment_record AS b WHERE appointment_id = a.id) AS total_balance FROM appointments AS a WHERE a.status = ? AND DATE_FORMAT(a.date, "%Y-%m-%d") >= ? AND DATE_FORMAT(a.date, "%Y-%m-%d") <= ? ORDER BY a.date DESC, FIELD(a.time, "9-10 AM", "10-11 AM", "11-12 PM", "12-1 PM", "1-2 PM", "2-3 PM", "3-4 PM", "4-5 PM") ASC';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iss', $status, $date, $date_end);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$amount_charged = ($row['total_charged'] != '') ? $row['total_charged'] : "N/A";
					$amount_paid = ($row['total_paid'] != '') ? $row['total_paid'] : "N/A";
					$balance = ($row['total_balance'] != '') ? $row['total_balance'] : "N/A";

					$output .= '<tr>
						<td>'.$row['fullname'].'</td>
						<td>'.date('M. d Y', strtotime($row['date'])).' - '.$row['time'].'</td>
						<td>'.$row['concern'].'</td>
						<td>'.$row['code'].'</td>
						<td>'.$amount_charged.'</td>
						<td>'.$amount_paid.'</td>
						<td>'.$balance.'</td>
					</tr>';

					$total_charged = $total_charged + $row['total_charged'];
					$total_paid = $total_paid + $row['total_paid'];
					$total_balance = $total_balance + $row['total_balance'];
				}

				$output .= '<div align="right">
								<h4>Total Charged: '.$total_charged.'</h4>
								<h4>Total Paid: '.$total_paid.'</h4>
								<h4>Balance: '.$total_balance.'</h4>
							</div>';
				$stmt->close();
			}

			return $output;
		}

		public function fetchInquiries() {
			$data = null;
			$query = "SELECT * FROM inquiries ORDER BY id DESC";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function readInquiries() {
			$query = "UPDATE inquiries SET read_unread = 1 WHERE read_unread = 0";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteInquiry($id) {
			$query = "DELETE FROM inquiries WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('inquiries', '_self');</script>";
			}
		}

		public function updateAppointmentStatus($status, $id) {
			$query = "UPDATE appointments SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function count_Inquries(){
			$data = null;
			$query = "SELECT SUM(IF(read_unread = '0',1,0)) as unread, SUM(IF(read_unread = '1',1,0)) as read_already FROM inquiries";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_pendingReservations(){
			$data = null;
			$query = "SELECT SUM(IF(status = '2',1,0)) as pending_reservations FROM appointments";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_Patients(){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as patients FROM patient";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_RevenueToday() {
			$data = null; $deyt = date("Y-m-d");
			$query = "SELECT SUM(amount_paid) as amount_paid FROM treatment_record WHERE DATE_FORMAT(date, '%Y-%m-%d') = '$deyt'";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_OrgStructure(){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as org_structure FROM org_structure";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_feedbacks(){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as feedbacks FROM feedbacks";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function deleteOrgStructure($id) {
			$query = "DELETE FROM org_structure WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function archiveOrgStructure($status, $id) {
			$query = "UPDATE org_structure SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function editAnnouncement($title, $details, $date, $id) {
			$query = "UPDATE announcements SET title = ?, details = ?, date = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssi', $title, $details, $date, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function editImageAnnouncement($image, $image_unique, $id) {
			$query = "UPDATE announcements SET image = ?, image_unique = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $image, $image_unique, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function archiveAnnouncement($status, $id) {
			$query = "UPDATE announcements SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addAnnouncement($title, $details, $base, $unique, $date, $category) {
			$query = "INSERT INTO announcements (title, details, image, image_unique, date, status, category) VALUES (?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;

				$stmt->bind_param('sssssii', $title, $details, $base, $unique, $date, $status, $category);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addStructure($name, $position, $base, $unique, $status) {
			$query = "INSERT INTO org_structure (name, position, image, image_unique, status) VALUES (?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssi', $name, $position, $base, $unique, $status);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('org-structure', '_self');</script>";
			}
		}

		public function editStructure($name, $position, $id) {
			$query = "UPDATE org_structure SET name = ?, position = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $name, $position, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editStructureImage($image, $unique, $id) {
			$query = "UPDATE org_structure SET image = ?, image_unique = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $image, $unique, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function displayAllAnnouncements($status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE status = ? ORDER BY date DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAnnouncements($category, $status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? ORDER BY date DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $category, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayRecentAnnouncements($category, $status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? ORDER BY date DESC LIMIT 3";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $category, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAnnouncementDetails($category, $status, $id) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? AND id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $category, $status, $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchOrgStructure($status) {
			$data = null;
			$query = "SELECT * FROM org_structure WHERE status = ? ORDER BY position ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function editHead($name, $id) {
			$query = "UPDATE content_management SET brgy_head = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $name, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editHeadImage($name, $id) {
			$query = "UPDATE content_management SET brgy_head_pic = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $name, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editLogo($name, $prev) {
			$query = "UPDATE web_details SET web_icon = ? WHERE web_icon = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $name, $prev);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function addRequest($resident_id, $request_type, $purpose) {
			$query = "INSERT INTO request (resident_id, request_type, purpose, date_issued, status) VALUES (?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$status = 2;

				$stmt->bind_param('iissi', $resident_id, $request_type, $purpose, $date, $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function addToGallery($details, $image, $unique) {
			$query = "INSERT INTO gallery (details, image, image_unique, status) VALUES (?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;

				$stmt->bind_param('sssi', $details, $image, $unique, $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function addFeedback($details, $image, $unique) {
			$query = "INSERT INTO feedbacks (feedback, image, image_unique, status) VALUES (?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;

				$stmt->bind_param('sssi', $details, $image, $unique, $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchGallery($status) {
			$data = null;
			$query = "SELECT * FROM gallery WHERE status = ? ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchFeedbacks($status) {
			$data = null;
			$query = "SELECT * FROM feedbacks WHERE status = ? ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function deleteGallery($id) {
			$query = "DELETE FROM gallery WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteFeedback($id) {
			$query = "DELETE FROM feedbacks WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function requestAppointment($name, $age, $contact, $address, $appointment_date, $appointment_time, $procedure, $code, $status, $date) {
			$query = "INSERT INTO appointments (fullname, age, contact, address, date, time, concern, code, status, date_sent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {

				$stmt->bind_param('ssssssssis', $name, $age, $contact, $address, $appointment_date, $appointment_time, $procedure, $code, $status, $date);
				if ($stmt->execute()) {
					$last_id = $stmt->insert_id;
				}

				else {
					$last_id = 'N/A';
				}
				$stmt->close();
			}

			return $last_id;

				// $stmt->execute();
				// $stmt->close();
		}

		public function trackAppointment($ref_code) {
			$data = null;

			$query = "SELECT * FROM appointments WHERE code = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $ref_code);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function trackHealthDeclaration($appointment_id) {
			$data = null;
			$query = "SELECT a.*, b.code, b.date, b.time FROM health_declaration AS a INNER JOIN appointments AS b ON a.appointment_id = b.id WHERE a.appointment_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $appointment_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function addHealthDeclaration($id, $hd1, $hd1a, $hd2, $hd3, $hd4, $hd5, $hd6, $date_sent) {
			$query = "INSERT INTO health_declaration (appointment_id, hd1, hd1a, hd2, hd3, hd4, hd5, hd6, date_sent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('issssssss', $id, $hd1, $hd1a, $hd2, $hd3, $hd4, $hd5, $hd6, $date_sent);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updatePatient($nickname, $gender, $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $home_no, $office_no, $fax_no, $contact_no, $email) {
			$query = "UPDATE patient SET birthdate = ?, religion = ?, nationality = ?, address = ?, occupation = ?, dental_insurance = ?, effective_date = ?, gender = ?, nickname = ?, home_no = ?, office_no = ?, fax_no = ?, contact_no = ? WHERE email = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssssss', $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $gender, $nickname, $home_no, $office_no, $fax_no, $contact_no, $email);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateMedicalHistory($good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems, $patient_id) {
			$query = "UPDATE medical_history SET good_health = ?, medical_treatment = ?, condition_treated = ?, surgical_operation = ?, operation = ?, hospitalized = ?, when_why = ?, medication = ?, specify = ?, tobacco = ?, use_drugs = ?, allergic = ?, allergies = ?, bleeding_time = ?, pregnant = ?, nursing = ?, birth_control = ?, blood_type = ?, blood_pressure = ?, problems = ? WHERE patient_id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iisisisisiiissiiisssi', $good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems, $patient_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function insertPatient($first_name, $middle_name, $last_name, $nickname, $gender, $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $guardian_name, $guardian_occupation, $refer, $dental_consultation, $home_no, $office_no, $fax_no, $contact_no, $email, $pword) {
			$query = "INSERT INTO patient (email, fname, mname, lname, birthdate, religion, nationality, address, occupation, dental_insurance, effective_date, guardian_name, guardian_occupation, refer, dental_consultation, gender, nickname, home_no, office_no, fax_no, contact_no, status, date_registered, pword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param('sssssssssssssssssssssiss', $email, $first_name, $middle_name, $last_name, $birthdate, $religion, $nationality, $address, $occupation, $dental_insurance, $effective_date, $guardian_name, $guardian_occupation, $refer, $dental_consultation, $gender, $nickname, $home_no, $office_no, $fax_no, $contact_no, $status, $date, $pword);
				if ($stmt->execute()) {
					$last_id = $stmt->insert_id;
				}

				else {
					$last_id = 'N/A';
				}
				$stmt->close();
			}

			return $last_id;
		}

		public function insertMedicalHistory($last_id, $physician, $specialty, $address, $number, $good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems) {
			$query = "INSERT INTO medical_history (patient_id, physician, specialty, office_address, office_number, good_health, medical_treatment, condition_treated, surgical_operation, operation, hospitalized, when_why, medication, specify, tobacco, use_drugs, allergic, allergies, bleeding_time, pregnant, nursing, birth_control, blood_type, blood_pressure, problems) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('issssiisisisisiiissiiisss', $last_id, $physician, $specialty, $address, $number, $good_health, $medical_treatment, $condition, $surgical_operation, $operation, $hospitalized, $when_why, $medication, $specify, $tobacco, $use_drugs, $allergic, $allergies_list, $bleeding_time, $pregnant, $nursing, $birth_control, $blood_type, $blood_pressure, $problems);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchAppointmentTime($date) {
			$data = null;

			$query = "SELECT time FROM appointments WHERE date = ? AND status = 1";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $date);
				$stmt->execute();
				$result = $stmt->get_result();
				if($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$data[] = $row;
					}
				}

				else {
					$data[] = 'No result';
				}

				$stmt->close();
			}
			
			return $data;
		}

		public function fetchAppointmentProcedure($id) {
			$data = null;

			$query = "SELECT * FROM appointment_procedure WHERE appointment_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updatePassword($email, $password) {
			$query = "UPDATE patient SET pword = ? WHERE email = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $password, $email);
				$stmt->execute();
				$stmt->close();
			}
		}

		//FORGET PASSWORD - VERIFICATION NG EMAIL IF EXISTING OR HINDI
		public function fetchEmailID($email) {
			$query = "SELECT email FROM patient WHERE email = ? LIMIT 1";
			
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$stmt->bind_result($id);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $id;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		//FORGOT PASSWORD - CHANGE PW
		public function verifiedChangePassword($id, $password) {
			$query = "UPDATE patient SET pword = ? WHERE email = ?";
			
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $password, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function insertDentalChart($appointment_id, $type, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10) {
			$query = "INSERT INTO dental_chart (appointment_id, type, ta_1, ta_2, ta_3, ta_4, ta_5, ta_6, ta_7, ta_8, ta_9, ta_10, ta_11, ta_12, ta_13, ta_14, ta_15, ta_16, ba_1, ba_2, ba_3, ba_4, ba_5, ba_6, ba_7, ba_8, ba_9, ba_10, ba_11, ba_12, ba_13, ba_14, ba_15, ba_16, tc_1, tc_2, tc_3, tc_4, tc_5, tc_6, tc_7, tc_8, tc_9, tc_10, bc_1, bc_2, bc_3, bc_4, bc_5, bc_6, bc_7, bc_8, bc_9, bc_10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('isssssssssssssssssssssssssssssssssssssssssssssssssssss', $appointment_id, $type, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function insertDentalChart2($appointment_id, $type, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10) {
			$query = "INSERT INTO dental_chart2 (appointment_id, type, ta_1, ta_2, ta_3, ta_4, ta_5, ta_6, ta_7, ta_8, ta_9, ta_10, ta_11, ta_12, ta_13, ta_14, ta_15, ta_16, ba_1, ba_2, ba_3, ba_4, ba_5, ba_6, ba_7, ba_8, ba_9, ba_10, ba_11, ba_12, ba_13, ba_14, ba_15, ba_16, tc_1, tc_2, tc_3, tc_4, tc_5, tc_6, tc_7, tc_8, tc_9, tc_10, bc_1, bc_2, bc_3, bc_4, bc_5, bc_6, bc_7, bc_8, bc_9, bc_10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('isssssssssssssssssssssssssssssssssssssssssssssssssssss', $appointment_id, $type, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchDentalChart($appointment_id) {
			$data = null;

			$query = "SELECT * FROM dental_chart WHERE appointment_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $appointment_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchDentalChart2($appointment_id) {
			$data = null;

			$query = "SELECT * FROM dental_chart2 WHERE appointment_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $appointment_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updatePrescription($prescription, $id) {
			$query = "UPDATE appointments SET prescriptions = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $prescription, $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function updateDentalChart($appointment_id, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10) {
			$query = "UPDATE dental_chart SET ta_1 = ?, ta_2 = ?, ta_3 = ?, ta_4 = ?, ta_5 = ?, ta_6 = ?, ta_7 = ?, ta_8 = ?, ta_9 = ?, ta_10 = ?, ta_11 = ?, ta_12 = ?, ta_13 = ?, ta_14 = ?, ta_15 = ?, ta_16 = ?, ba_1 = ?, ba_2 = ?, ba_3 = ?, ba_4 = ?, ba_5 = ?, ba_6 = ?, ba_7 = ?, ba_8 = ?, ba_9 = ?, ba_10 = ?, ba_11 = ?, ba_12 = ?, ba_13 = ?, ba_14 = ?, ba_15 = ?, ba_16 = ?, tc_1 = ?, tc_2 = ?, tc_3 = ?, tc_4 = ?, tc_5 = ?, tc_6 = ?, tc_7 = ?, tc_8 = ?, tc_9 = ?, tc_10 = ?, bc_1 = ?, bc_2 = ?, bc_3 = ?, bc_4 = ?, bc_5 = ?, bc_6 = ?, bc_7 = ?, bc_8 = ?, bc_9 = ?, bc_10 = ? WHERE appointment_id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssi', $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10, $appointment_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateDentalChart2($appointment_id, $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10) {
			$query = "UPDATE dental_chart2 SET ta_1 = ?, ta_2 = ?, ta_3 = ?, ta_4 = ?, ta_5 = ?, ta_6 = ?, ta_7 = ?, ta_8 = ?, ta_9 = ?, ta_10 = ?, ta_11 = ?, ta_12 = ?, ta_13 = ?, ta_14 = ?, ta_15 = ?, ta_16 = ?, ba_1 = ?, ba_2 = ?, ba_3 = ?, ba_4 = ?, ba_5 = ?, ba_6 = ?, ba_7 = ?, ba_8 = ?, ba_9 = ?, ba_10 = ?, ba_11 = ?, ba_12 = ?, ba_13 = ?, ba_14 = ?, ba_15 = ?, ba_16 = ?, tc_1 = ?, tc_2 = ?, tc_3 = ?, tc_4 = ?, tc_5 = ?, tc_6 = ?, tc_7 = ?, tc_8 = ?, tc_9 = ?, tc_10 = ?, bc_1 = ?, bc_2 = ?, bc_3 = ?, bc_4 = ?, bc_5 = ?, bc_6 = ?, bc_7 = ?, bc_8 = ?, bc_9 = ?, bc_10 = ? WHERE appointment_id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssi', $ta_1, $ta_2, $ta_3, $ta_4, $ta_5, $ta_6, $ta_7, $ta_8, $ta_9, $ta_10, $ta_11, $ta_12, $ta_13, $ta_14, $ta_15, $ta_16, $ba_1, $ba_2, $ba_3, $ba_4, $ba_5, $ba_6, $ba_7, $ba_8, $ba_9, $ba_10, $ba_11, $ba_12, $ba_13, $ba_14, $ba_15, $ba_16, $tc_1, $tc_2, $tc_3, $tc_4, $tc_5, $tc_6, $tc_7, $tc_8, $tc_9, $tc_10, $bc_1, $bc_2, $bc_3, $bc_4, $bc_5, $bc_6, $bc_7, $bc_8, $bc_9, $bc_10, $appointment_id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function getLatestTransaction($id) {
			$data = null;
			$query = 'SELECT max(id) FROM `appointments` WHERE status = 0 AND contact = ?';
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
	}
?>
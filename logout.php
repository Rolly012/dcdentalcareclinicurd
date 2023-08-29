<?php

	session_start();
	unset($_SESSION['patient_sess']);
	echo "<script>window.open('../patient.php', '_self');</script>";

?>
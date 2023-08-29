				<?php
				
				$rows = $model->count_Inquries();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$unread = $row['unread'];
						$read = $row['read_already'];
						$total_inq = $unread + $read;
					}
			  	}

			  	$rows = $model->count_pendingReservations();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$pending_reservations = $row['pending_reservations'];
					}
			  	}
			  	
			  	$rows = $model->count_Patients();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$patients = $row['patients'];
					}
			  	}

			  	$rows = $model->count_RevenueToday();
				if (!empty($rows)) {
					foreach ($rows as $row) {
						$amount_paid = $row['amount_paid'];
					}
			  	}


			  	?>


				<div class="ttr-sidebar-logo" style="background-image: url('../assets/images/background.png');background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
					<div class="ttr-sidebar-toggle-button">
						<i class="ti-arrow-left"></i>
					</div>
					<div style="padding-left: 12px; padding-top: 12px;">
						<div class="image">
							<img src="../assets/images/<?php echo  $web_icon; ?>.png" style="width: 48px; height: 48px; border-radius: 50%;" alt="User">
						</div>
						<div style="height: 8px;">
						</div>
						<div class="info-container">
							<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?php echo $fname; ?> <?php echo $lname; ?></b></div>
							<div class="email" style="color: white; font-size: 12px;"><?php echo $email; ?></div>
						</div>
					</div>
				</div>
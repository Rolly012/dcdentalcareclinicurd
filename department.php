<?php
    
    if (empty($_SESSION['patient_sess'])) {
        echo "<script>window.open('../','_self');</script>";
    }
    
                    $email = $_SESSION['patient_sess'];
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
                            $good_health = $row['good_health'] == 1 ? 'Yes' : 'No';
                            $medical_treatment = $row['medical_treatment'] == 1 ? 'Yes' : 'No';
                            $condition_treated = $row['condition_treated'];
                            $surgical_operation = $row['surgical_operation'] == 1 ? 'Yes' : 'No';
                            $operation = $row['operation'];
                            $hospitalized = $row['hospitalized'] == 1 ? 'Yes' : 'No';
                            $when_why = $row['when_why'];
                            $medication = $row['medication'] == 1 ? 'Yes' : 'No';
                            $specify = $row['specify'];
                            $tobacco = $row['tobacco'] == 1 ? 'Yes' : 'No';
                            $use_drugs = $row['use_drugs'] == 1 ? 'Yes' : 'No';
                            $allergic = $row['allergic'] == 1 ? 'Yes' : 'No';

                            $allergies = str_replace(',', ', ', $row['allergies']);

                            $find = ['1', '2', '3', '4', '5', '6'];
                            $replace = ['Local Anesthetic (ex. Lidocaine)', 'Penicillin, Antibiotics', 'Sulfa drugs', 'Aspirin', 'Latex', 'Others'];

                            for ($i = 0; $i < 6; $i++) { 
                                $allergies = str_replace($find[$i], $replace[$i], $allergies);
                            }

                            $bleeding_time = $row['bleeding_time'];
                            $pregnant = $row['pregnant'] == 1 ? 'Yes' : 'No';
                            $nursing = $row['nursing'] == 1 ? 'Yes' : 'No';
                            $birth_control = $row['birth_control'] == 1 ? 'Yes' : 'No';
                            $blood_type = $row['blood_type'];
                            $blood_pressure = $row['blood_pressure'];

                            $find_problem = array_reverse(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36']);
                            $replace_problem = array_reverse(['High Blood Pressure', 'Low Blood Pressure', 'Epilepsy / Convulsions', 'AIDS or HIV infection', 'Sexually Transmitted disease', 'Stomach Troubles / Ulcer', 'Fainting Seizure', 'Rapid Weight Loss', 'Radiation Therapy', 'Joint Replacement / Implant', 'Heart Surgery', 'Heart Attack', 'Thyroid Problem', 'Heart Disease', 'Heart Murmur', 'Hepatitis / Liver Disease', 'Rheumatic Fever', 'Hay Fever / Allergies', 'Respiratory Problems', 'Hepatitis / Jaundice', 'Tuberculosis', 'Swollen ankles', 'Kidney disease', 'Diabetes', 'Chest pain', 'Stroke', 'Cancer / Tumors', 'Anemia', 'Angina', 'Asthma', 'Emphysema', 'Bleeding Problems', 'Blood Diseases', 'Head Injuries', 'Arthritis / Rheumatism', 'Other']);

                            $problems = str_replace(',', ', ', $row['problems']);

                            for ($p = 0; $p < 36; $p++) { 
                                $problems = str_replace($find_problem[$p], $replace_problem[$p], $problems);
                            }
                        } 
                    }

    $rows = $model->website_details();
    if (!empty($rows)) {
        foreach ($rows as $row) {
        	$web_name = $row['web_name'];
        	$web_code = strtoupper($row['web_code']);
            $web_header = $row['web_header'];
            $primary_color = $row['primary_color'];
            $secondary_color = $row['secondary_color'];
            $web_icon = $row['web_icon'];
       	}
    }

    $rows = $model->content_management();
    if (!empty($rows)) {
        foreach ($rows as $row) {
            $story = $row['story'];
            $mission = $row['mission'];
            $vission = $row['vission'];
            $guidelines = $row['guidelines'];
            $brgy_head = $row['brgy_head'];
            $brgy_head_pic = $row['brgy_head_pic'];
        }
    }
		
?> 
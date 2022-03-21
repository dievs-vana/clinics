<?php 
    require '../../config/dbConfig.php';

    
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    $school_year = $_POST['school_year'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $addRess = $_POST['addRess'];
    $mobile_no = $_POST['mobile_no'];
    $year_old = $_POST['year_old'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $nationality = $_POST['nationality'];
    $relihiyon = $_POST['relihiyon'];
    $emergency_guardian = $_POST['emergency_guardian'];
    $relation_ship = $_POST['relation_ship'];
    $emergency_contact = $_POST['emergency_contact'];


    $sql = "INSERT INTO patient (student_id, course, school_year, first_name, middle_name, last_name, birth_date, addRess, mobile_no, year_old, gender, marital_status, nationality, relihiyon, emergency_guardian, relation_ship, emergency_contact) VALUES ('".$student_id."', '".$course."', '".$school_year."', '".$first_name."', '".$middle_name."', '".$last_name."', '".$birth_date."', '".$addRess."', '".$mobile_no."', '".$year_old."', '".$gender."', '".$marital_status."', '".$nationality."', '".$relihiyon."', '".$emergency_guardian."', '".$relation_ship."', '".$emergency_contact."')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
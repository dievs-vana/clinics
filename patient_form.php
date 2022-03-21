<?php
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit']))
      {
    $student_id=$_POST['student_id'];
    $Department=$_POST['Department'];
    $school_year=$_POST['school_year'];
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $birth_date=$_POST['birth_date'];
    $Address=$_POST['Address'];
    $mobile_no=$_POST['mobile_no'];
    $year_old=$_POST['year_old'];
    $Gender=$_POST['Gender'];
    $marital_status=$_POST['marital_status'];
    $Nationality=$_POST['Nationality'];
    $Religion=$_POST['Religion'];
    $emergency_guardian=$_POST['emergency_guardian'];
    $relation_ship=$_POST['relation_ship'];
    $emergency_contact=$_POST['emergency_contact'];
    $Message=$_POST['Message'];
    $status=1;
    $sql="INSERT INTO  patienttbl(student_id,Department,school_year,first_name,middle_name,last_name,birth_date,Address,mobile_no,year_old,Gender,marital_status,Nationality,Religion,emergency_guardian,relation_ship,emergency_contact,Message,status)
    VALUES(:student_id,:Department,:school_year,:first_name,:middle_name,:last_name,:birth_date,:Address,:mobile_no,:year_old,:Gender,:marital_status,:Nationality,:Religion,:emergency_guardian,:relation_ship,:emergency_contact,:Message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':student_id',$student_id,PDO::PARAM_STR);
    $query->bindParam(':Department',$Department,PDO::PARAM_STR);
    $query->bindParam(':school_year',$school_year,PDO::PARAM_STR);
    $query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
    $query->bindParam(':middle_name',$middle_name,PDO::PARAM_STR);
    $query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
    $query->bindParam(':birth_date',$birth_date,PDO::PARAM_STR);
    $query->bindParam(':Address',$Address,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':mobile_no',$mobile_no,PDO::PARAM_STR);
    $query->bindParam(':year_old',$year_old,PDO::PARAM_STR);
    $query->bindParam(':Gender',$Gender,PDO::PARAM_STR);
    $query->bindParam(':marital_status',$marital_status,PDO::PARAM_STR);
    $query->bindParam(':Nationality',$Nationality,PDO::PARAM_STR);
    $query->bindParam(':Religion',$Religion,PDO::PARAM_STR);
    $query->bindParam(':emergency_guardian',$emergency_guardian,PDO::PARAM_STR);
    $query->bindParam(':relation_ship',$relation_ship,PDO::PARAM_STR);
    $query->bindParam(':emergency_contact',$emergency_contact,PDO::PARAM_STR);
    $query->bindParam(':Message',$Message,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    $msg="Your info submitted successfully";
    }
    else 
    {
    $error="Something went wrong. Please try again";
    }
    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Svcc Clinic</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/modern-business.css" rel="stylesheet">
        <style>
            .navbar-toggler {
            z-index: 1;
            }
            @media (max-width: 576px) {
            nav > .container {
            width: 100%;
            }
            }
        </style>
        <style>
            .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body>
        <?php include('includes/header.php');?>
        <!-- Page Content -->
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">Patient <small>Form</small></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">Patient Form</li>
            </ol>
            <?php if($error){?>
            <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
            <?php } 
                else if($msg){?>
            <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
            <?php }?>
            <!-- Content Row -->
            <form name="donar" method="post">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Student ID<span style="color:red">*</span></div>
                        <div><input type="text" name="student_id" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">School Year<span style="color:red">*</span></div>
                        <div><input type="text" name="school_year" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Department Group<span style="color:red">*</span> </div>
                        <div>
                            <select name="Department" class="form-control" required>
                                <option value="">Select</option>
                                <?php $sql = "SELECT * from  departmenttbl ";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {				?>	
                                <option value="<?php echo htmlentities($result->Department);?>"><?php echo htmlentities($result->Department);?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- second row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">First Name<span style="color:red">*</span></div>
                        <div><input type="text" name="first_name" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Middle Name<span style="color:red">*</span></div>
                        <div><input type="text" name="middle_name" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Last Name<span style="color:red">*</span></div>
                        <div><input type="text" name="last_name" class="form-control" required></div>
                    </div>
                </div>
                <!-- thirrd row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Birthday<span style="color:red">*</span></div>
                        <div><input type="date" name="birth_date" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Address<span style="color:red">*</span></div>
                        <div><input type="text" name="Address" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Mobile No.<span style="color:red">*</span></div>
                        <div><input type="text" name="mobile_no" class="form-control" required></div>
                    </div>
                </div>
                <!-- fourth row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Age<span style="color:red">*</span></div>
                        <div><input type="text" name="year_old" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Gender<span style="color:red">*</span></div>
                        <div>
                            <select name="Gender" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Marital Status<span style="color:red">*</span></div>
                        <div>
                            <select name="marital_status" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Marriage">Marriage</option>
                                <option value="Widow">Widow</option>
                                <option value="Seperate">Seperate</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- fifth row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Nationality<span style="color:red">*</span></div>
                        <div><input type="text" name="Nationality" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Religion<span style="color:red">*</span></div>
                        <div><input type="text" name="Religion" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Emergency Guardian<span style="color:red">*</span></div>
                        <div><input type="text" name="emergency_guardian" class="form-control" required></div>
                    </div>
                </div>
                <!-- sixth row -->
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Relationship<span style="color:red">*</span></div>
                        <div><input type="text" name="relation_ship" class="form-control" required></div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="font-italic">Emergency Contact<span style="color:red">*</span></div>
                        <div><input type="text" name="emergency_contact" class="form-control" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="font-italic">Message<span style="color:red">*</span></div>
                        <div><textarea class="form-control" name="Message" required> </textarea></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
                    </div>
                </div>
                <!-- /.row -->
            </form>
            <!-- /.row -->
        </div>
        <?php include('includes/footer.php');?>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/tether/tether.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
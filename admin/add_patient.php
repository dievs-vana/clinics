<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if(strlen($_SESSION['alogin'])==0)
   	{	
   header('location:index.php');
   }
   else{ 
   
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
   $Vaccinated=$_POST['Vaccinated'];
   $Message=$_POST['Message'];
   $status=1;
   $sql="INSERT INTO  patienttbl(student_id,Department,school_year,first_name,middle_name,last_name,birth_date,Address,mobile_no,year_old,Gender,marital_status,Nationality,Religion,emergency_guardian,relation_ship,emergency_contact,Vaccinated,Message,status)
   VALUES(:student_id,:Department,:school_year,:first_name,:middle_name,:last_name,:birth_date,:Address,:mobile_no,:year_old,:Gender,:marital_status,:Nationality,:Religion,:emergency_guardian,:relation_ship,:emergency_contact,:Vaccinated,:Message,:status)";
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
   $query->bindParam(':Vaccinated',$Vaccinated,PDO::PARAM_STR);
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
<!doctype html>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="theme-color" content="#3e454c">
      <title>SVCC| Admin Add Patient</title>
      <!-- Font awesome -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!-- Sandstone Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Bootstrap Datatables -->
      <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
      <!-- Bootstrap social button library -->
      <link rel="stylesheet" href="css/bootstrap-social.css">
      <!-- Bootstrap select -->
      <link rel="stylesheet" href="css/bootstrap-select.css">
      <!-- Bootstrap file input -->
      <link rel="stylesheet" href="css/fileinput.min.css">
      <!-- Awesome Bootstrap checkbox -->
      <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
      <!-- Admin Stye -->
      <link rel="stylesheet" href="css/style.css">
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
      <script language="javascript">
         function isNumberKey(evt)
               {
                  
                 var charCode = (evt.which) ? evt.which : event.keyCode
                         
                 if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
                    return false;
         
                  return true;
               }
               
      </script>
   </head>
   <body>
      <?php include('includes/header.php');?>
      <div class="ts-main-content">
         <?php include('includes/leftbar.php');?>
         <div class="content-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <h2 class="page-title">Add Patient</h2>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">Basic Info</div>
                              <?php if($error){?>
                              <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                              <?php } 
                                 else if($msg){?>
                              <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                              <?php }?>
                              <div class="panel-body">
                                 <form method="post" class="form-horizontal" enctype="multipart/form-data">
									         <!-- first row -->
                                    <div class="form-group">
                                    		<label class="col-sm-2 control-label">Student ID<span style="color:red">*</span></label>
                                       <div class="col-sm-2">
                                          <input type="text" name="student_id" class="form-control" required>
                                       </div>
                                    		<label class="col-sm-2 control-label">School Year<span style="color:red">*</span></label>
                                       <div class="col-sm-2">
                                          <input type="text" name="school_year" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
                                       </div>
											<label class="col-sm-2 control-label">Department Group<span style="color:red">*</span></label>
										<div class="col-sm-2">
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
									<div class="form-group">
											<label class="col-sm-2 control-label">First Name<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="first_name" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Middle Name<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="middle_name" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Last Name<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="last_name" class="form-control" required>
										</div>
									</div>
									<br><br><br>
										<!-- third row -->
									<div class="form-group">
											<label class="col-sm-2 control-label">Birthday<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="date" name="birth_date" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Address<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="Address" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Mobile No.<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" name="mobile_no" class="form-control" required>
										</div>
									</div>
									<br><br><br>
										<!-- fourth row -->
									<div class="form-group">
											<label class="col-sm-2 control-label">Age<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" name="year_old" class="form-control" required>
										</div>
                                       		<label class="col-sm-2 control-label">Gender <span style="color:red">*</span></label>
                                       	<div class="col-sm-2">
											<select name="Gender" class="form-control" required>
												<option value="">Select</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
                                       		</select>
                                       	</div>
										   <label class="col-sm-2 control-label">Marital Status<span style="color:red">*</span></label>
                                       	<div class="col-sm-2">
											<select name="marital_status" class="form-control" required>
												<option value="">Select</option>
												<option value="Single">Single</option>
												<option value="Marriage">Marriage</option>
												<option value="Widow">Widow</option>
												<option value="Seperate">Seperate</option>
                                       		</select>
                                       	</div>
									</div>
									<br><br><br>
										<!-- fifth row -->
									<div class="form-group">
											<label class="col-sm-2 control-label">Nationality<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="Nationality" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Religion<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="Religion" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Emergency Guardian<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="emergency_guardian" class="form-control" required>
										</div>
									</div>
									<br><br><br>
										<!-- sixth row -->
									<div class="form-group">
											<label class="col-sm-2 control-label">Relationship<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="text" name="relation_ship" class="form-control" required>
										</div>
											<label class="col-sm-2 control-label">Emergency Contact<span style="color:red">*</span></label>
										<div class="col-sm-2">
											<input type="number" name="emergency_contact" class="form-control" required>
										</div>
                                 <label class="col-sm-2 control-label">Vaccinated<span style="color:red">*</span></label>
                              <div class="col-sm-2">
											<select name="Vaccinated" class="form-control" required>
												<option value="">Select</option>
												<option value="1st Dose">1st Dose</option>
												<option value="2nd Dose">2nd Dose</option>
												<option value="Booster">Booster</option>
                                 </select>
                              </div>
									</div>

									<div class="hr-dashed"></div>
										<div class="form-group">
												<label class="col-sm-2 control-label">Message<span style="color:red">*</span></label>
											<div class="col-sm-8">
												<textarea class="form-control" name="Message" required> </textarea>
											</div>
									</div>
									
                              <div class="form-group">
                              <div class="col-sm-8 col-sm-offset-2">
                              <button class="btn btn-default" type="reset">Cancel</button>
                              <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                              </div>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- Loading Scripts -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap.min.js"></script>
      <script src="js/Chart.min.js"></script>
      <script src="js/fileinput.js"></script>
      <script src="js/chartData.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>
<?php } ?>
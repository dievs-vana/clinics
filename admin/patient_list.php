<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$did=intval($_GET['del']);
$sql = "delete from patienttbl WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="Record deleted Successfully ";
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
	
	<title>SVCC | Patient List  </title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
	<link rel="stylesheet" href="../admin/css/style.css">
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
	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Patients List</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Patients Info</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="container">
					<button class="btn btn-primary my-5"><a href="add_patient.php" class="text-light">Add Patient</a></button>
				</div>	
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Vaccinated</th>
											<th>Last Name</th>
											<th>Middle Name</th>
											<th>First Name</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Department</th>
											<th>Address</th>
											<th>Message </th>
											<th>action </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Vaccinated</th>
											<th>Last Name</th>
											<th>Middle Name</th>
											<th>First Name</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Department</th>
											<th>Address</th>
											<th>Message </th>
											<th>action </th>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * from  patienttbl ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->Vaccinated);?></td>
											<td><?php echo htmlentities($result->last_name);?></td>
											<td><?php echo htmlentities($result->middle_name);?></td>
											<td><?php echo htmlentities($result->first_name);?></td>
											<td><?php echo htmlentities($result->year_old);?></td>
											<td><?php echo htmlentities($result->Gender);?></td>
											<td><?php echo htmlentities($result->Department);?></td>
											<td><?php echo htmlentities($result->Address);?></td>
											<td><?php echo htmlentities($result->Message);?></td>
										
										
										<td>
<?php if($result->status==1)
{?>
<button class="btn btn-primary"><a href="update_patient.php?updateid='.$id.'<?php echo htmlentities($result->id);?>" >Update</a> </button>

<?php } ?>
<button class="btn btn-danger"><a href="patient_list.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete this record')"> Delete</a></button>
</td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						
								<a href="download-records.php" style="color:red; font-size:16px;">Download Patients List</a>
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

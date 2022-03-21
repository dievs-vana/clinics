<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Blood Group</th>
											<th>address</th>
											<th>Message </th>
											<th>posting date </th>
										</tr>
									</thead>

<?php 
$filename="Patient list";
$sql = "SELECT * from  patienttbl ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$last_name= $result->last_name.'</td> 
<td>'.	$middle_name= $result->middle_name.'</td> 
<td>'.$first_name= $result->first_name.'</td> 
<td>'.$year_old= $result->year_old.'</td> 
<td>'.$Gender= $result->Gender.'</td> 
 <td>'.$Department=$result->Department.'</td>	
  <td>'.$Address=$result->Address.'</td>	 
   <td>'.$Message=$result->Message.'</td>	
  <td>'.$BloodGroup=$result->PostingDate.'</td>	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>
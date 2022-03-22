<?php
   session_start();
   include('includes/config.php');
   if(isset($_POST['login']))
   {
   $email=$_POST['username'];
   $password=md5($_POST['password']);
   $sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
   $query= $dbh -> prepare($sql);
   $query-> bindParam(':email', $email, PDO::PARAM_STR);
   $query-> bindParam(':password', $password, PDO::PARAM_STR);
   $query-> execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   if($query->rowCount() > 0)
   {
   $_SESSION['alogin']=$_POST['username'];
   echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
   } else{
     
     echo "<script>alert('Invalid Details');</script>";
   
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
      <title>St Vincent College of Cabuyao | Admin Log-in </title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <?php include_once("includes/headers.php");?>
      <br><br><br><br><br><br>
      <div class="container">
         <div class="card mx-auto" style="width: 22rem;">
            <img src="img/svcc_log2.png" style="width: 40%" class="card-img-top mx-auto" alt="...">
            <div class="card-body">
               <?php if(isset($loginUser)){ ?>
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <?php echo $loginUser; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <?php }?>                     
               <form action="" method="post" autocomplete="off">
                  <div class="form-group">
                     <label for="">Your Username</label>
                     <input type="text" class="form-control" name="username"  placeholder="Enter username">
                     <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Password" required="">
                  </div>
                  <button type="submit" name="login" class="btn btn-primary" style="background-color: rgb(99, 17, 25);"><i class="fa fa-lock">&nbsp;</i>Login</button>
               </form>
            </div>
            <div class="card-footer">
               <a href="#">Forget Password?</a>
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
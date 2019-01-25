<?php 

require_once 'config/config.php';
if(isset($_POST['reg_submit'])){

	$fullname = trim($_POST['fullname']);
	$empid = trim($_POST['empid']);
	$desgn = trim($_POST['designation']);
	$dept = trim($_POST['dept']);
	$uname = trim($_POST['username']);
	$pwd = trim($_POST['password']);
	if($uname =="") {
		$error[] = "provide username !"; 
	 }
	 else if($fullname =="") {
		$error[] = "provide full name !"; 
	 }
	 else if($desgn == "") {
		$error[] = 'Please enter your desgn';
	 }
	 else if($dept == "") {
		$error[] = 'Please enter your dept';
	 }
	 else if($empid == "") {
		$error[] = 'Please enter your empid';
	 }

	 else if($pwd =="") {
		$error[] = "provide password !";
	 }
	 else if(strlen($pwd) < 6){
		$error[] = "Password must be atleast 6 characters"; 
	 }
	 else
	 {
		 try{

			$stmt = $DB_con -> prepare("SELECT * from registration WHERE username = :usname");
			$stmt -> execute(array(':usname' => $uname));
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			if($row['username'] == $uname){
				$error[] = "Choose other username"; 	
			}
			else
				if($row['empid'] == $empid){
					$error[] = "Empid is already exist"; 	
				}
			
			else{

				if($reg -> register($fullname,$empid,$desgn,$dept,$uname,$pwd)){

					$reg -> redirect("registration.php?success");

				}

			}
			
		 }
		 catch(PDOException $e)
			{
			   echo $e->getMessage();
			}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Employee Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form name="reg_form" class="form-login" method="post" action="">
				<h2 class="form-login-heading">Register now</h2>
				<?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['success']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php } ?>
		        <div class="login-wrap">
				<div class="form-group">
					<input type="text" class="form-control" name="fullname" placeholder="Full Name" autofocus>
		            </div>
					<div class="form-group">
					<input type="text" class="form-control" name="empid" placeholder="Employee ID" autofocus>
		            </div>
					<div class="form-group">
					<input type="text" class="form-control" name="designation" placeholder="Designation" autofocus>
		            </div>
					<div class="form-group">
					<input type="text" class="form-control" name="dept" placeholder="Department" autofocus>
		            </div>
					<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="User Name" autofocus>
		            </div>
					<div class="form-group">
		            <input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
		            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
					</div>
		            <!-- <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label> -->
		            <button class="btn btn-theme btn-block" name="reg_submit" type="submit">	 Register</button>
		            
		            
		
		          <!-- Modal -->
		          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> -->
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>

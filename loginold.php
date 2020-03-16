 <?php
    include_once("classes/User.php");   
    include_once("classes/Functions.php");
    if(isset($_POST['submit'])){ //agr submit click hua toh pura data extrct krega & ProcessLogin method ko call krte tym parameters pass krega
        session_start();            //jo user ne dale hai form me
        extract($_POST);               
        $obj = new User();            // extract automatically username and password jo form me teeno attribute k naam h uska variabl banayga
        
        if($obj->processLogin($username , $password)){
            Functions::redirect('index.html'); 
        }else{
            echo "Username/Password Did not match.";
        }
    }    
?>



<!DOCTYPE html>
<html lang="en">  
<head>
<title>Study Link Admin | Login</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <div class="col-md-6 col-md-offset-3 ">
    
<form action="" method="POST" role="form" class="well">
     
     <h1 class="text-center"><img src="images/icon.png"></h1>   
    <legend>Login</legend>
    
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" id="username" placeholder="Username" name="username">
	</div>
		<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="password" name="password">
	</div>

	<button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
</form>
        </div>

            

        </div>
        <!-- /.row -->

      <hr> 

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>





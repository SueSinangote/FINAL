<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
	require('../config/config.php');
	require('../config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);

		$query = "INSERT INTO final_web.useraccount (uid, username, email, password, address) VALUES ('$uid', '$username', '$email', '$password', '$address')";

        if(mysqli_query($conn, $query)){
            header('Location: index.php');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Sign Up Form</title>
</head>
<body>

<div class="container text-center text-center">
<form method="POST" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <center>  <h2>Registration Form</h2>  </center>
			    
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Id number</label>
                    <div class="col-sm-4">
                        <input type="text" id="uid" name="uid" class="form-control placeholder="Enter Id" required="" autofocus="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="ID Number" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-4">
                        <<input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ID Number" class="col-sm-3 control-label">email</label>
                    <div class="col-sm-4">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="" autofocus="">
                       
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                </div>
             
				<div class="form-group">
                    <label for="Address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-4">
                    <input type="text" id="address" name="address" class="form-control" placeholder="Address" required="" autofocus="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-info" onclick="loginFunc()" name="submit" value="Submit">Register</button>
                        <button type="submit" class="btn btn-info"><a href="index.php">LOGIN</a></button>
           </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
		
	
		
		</body>
		</html>
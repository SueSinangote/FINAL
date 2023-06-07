<?php
  require('../config/config.php');
  require('../config/db.php');

  if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from useraccount where username='".$uname."' 
        and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: ../webpage.html');
        }
        else{
          $_SESSION['message'] = "Invalid <b>username</b> or <b>password</b>!";
        }
    }
    
    else
    {
       $_SESSION['message'] = "Please input <b>username</b> or <b>password</b>!";
    }
  }
?>

<!DOCTYPE html>
<html><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lets talk!</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
   
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<div class="sidenav">
<div class="login-main-text">
<h2>Application<br> Login Page</h2>
<p>Login or register from here to access.</p>
</div>
</div>
<div class="main">
<div class="col-md-6 col-sm-12">
<div class="login-form">
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
<div class="form-group">
<label>User Name</label>
<input type="text" id="username" class="form-control" name="username" placeholder="Username"autofocus="">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" id="password" class="form-control" name="password" placeholder="Password">
</div>
<button type="submit" class="btn btn-black" onclick="loginFunc()" name="submit" value="Submit">LOGIN</button>
<button type="submit" class="btn btn-secondary"><a href="Registration.php">Register</a></button>
</form>
<script>
        function loginFunc() {
            var user = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (user.trim() === '') {
                alert("Please enter username!");
            } else if (password.trim() === '') {
                alert("Please enter password!");
            } else {
                alert("Login successfully!");
            }
        }
    </script>
</div>
</div>
</div>

</body></html>
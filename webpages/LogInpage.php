<?php
  require('config/config.php');
  require('config/db.php');

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
            header('Location: index.php');
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

<html>
<head>

    <title>log in!</title>

    <link rel="stylesheet" type="text/css" href="logInpage.css">

</head>

<body>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

        <h2>LOGIN</h2>

        <label>User Name</label>

        <input type="text" id="username" name="username" placeholder="Username"autofocus="">

        <label>Password</label>

        <input type="password" id="password" name="password" placeholder="Password">

        <button type="submit" class="btn" onclick="loginFunc()" name="submit" value="Submit">LOGIN</button>

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

</body>

</html>
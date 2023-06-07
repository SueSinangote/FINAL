<?php 
session_start();
include "db_conn.php";

if(isset($_POST['Uname']) && isset($_POST['Password'])) {
    function valid($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
   
    }
}
$Uname = validate($_POST['Uname']);
$Pass = validate($_POST['Password']);

if(empty($Uname)){
    header("Location: index.php?error=User Name is Required");
    exit();
}
else if(empty($Pass)){
    header("Location:  index.php?error=User Name is Required")
}
$sql = "SE;ECT * FROM users WHERE user_name='$Uname' AND Password='$Pass'";

$result = mysqli_query($conn,$sql);
if(mysql_num_rows($result) == 1){
    $row = mysql_fetch_assoc($result);
    if($row['User_name'] === $Uname && $row['Password'] === $Pass){
        echo "Logged In!"
        $_SESSION['User_name'] = $row['User_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: index.php?error=Incorrect User Name  or Password");
        Exit();
    }
    
}
else{
    header("Location:index.php");
    Exit();
}
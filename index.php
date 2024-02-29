<?php
include ('db_conn.php')
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>school</title>
</head>
<body>    
    <h1><b>LOGIN<b></h1>
    <form method="post" action="">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="login" >
</form>
<a href="register.php">register</a>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$username = $_POST['username'];
$password = $_POST['password'];
$chk = $conn->query("select * from tbl_profile where username='$username' and password='$password'");
if($chk->num_rows>0){
    session_start();
    $_SESSION['username'] = $username;
    //echo "success";
    header('Location: profile.php');
}
else{
    echo "invalid username";
}

}
?>

</body>
</html>
<?php
include('db_conn.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body><h1>register</h1>
<form method="post" action="">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" name="register" >
</form> 
<a href="index.php">login</a>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $ins = $conn->query("insert into tbl_profile (name,username,password)values('$name','$username','$password')");
    // echo $name." ".$username." ".$password;
}

?>
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: index.php');  
}
$uname = $_SESSION['username'];
include('db_conn.php');


$qry = $conn->query("select * from tbl_profile where username = '$uname'");
$row = $qry->fetch_assoc();
$id=$row['id'];

$qry2 = $conn->query("select * from tbl_mark where  id= $id");
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
   <h1>Hello <?php echo $row['name'];?></h1>  
   <a href="logout.php">Logout</a>
   <br>
   <table><tr>
    <th>id</th>
    <th>java</th>
    <th>python</th>
</tr>
<tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
</tr>
<?php while($row2 = $qry2->fetch_assoc()){
    echo '<tr>
    <td>';echo $row2["markid"];echo'</td>
    <td>';echo $row2["java"];echo'</td>
    <td>';echo $row2["python"];echo'</td>
    </tr>';
    }    
    ?>
</body>
</html>
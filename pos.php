<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<?php require 'page1.php'; ?>
<?php

session_start();

$empno = $_SESSION['empno'];

//connect database
require_once 'db.php';

$sql = "SELECT * FROM emp WHERE EMPNO = ? ";
$statement = $connection->prepare($sql);
$statement->execute([$empno]);
$emp = $statement->fetch(PDO::FETCH_OBJ);
$empno = $emp->EMPNO;
$ename = $emp->ENAME;
$job = $emp->JOB;
$mgr = $emp->MGR;
$hiredate = $emp->HIREDATE;
$sal = $emp->SAL;
$comm = $emp->COMM;
$deptno = $emp->DEPTNO;

session_unset();
?>

<div class="container">
<br>
<br>
<th>
<p align = "center">
<?php print "<h1>\n$ename</h1>"; ?>
</p>
 </th>     
 <br> 
 <!-- <p align = "right">
 <td>
              <a href="edit.php?EMPNO=<?= $person->EMPNO ?>" <button class="btn"><i class="fa fa-pencil"></i></button> </a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?EMPNO=<?= $person->EMPNO ?>"  <button class="btn"><i class="fa fa-trash"></i></button> </a>
            </td> 
</p> -->

  <table class="table">
    <tbody>
      <tr>
        <td><th>รหัสพนักงาน</th></td>
        <td><?php echo $empno ?> </td>
      </tr>
      <tr>
      <td><th>อาชีพ</th></td>
        <td><?php echo $job ?> </td>
      </tr>
      <tr>
      <td><th>หัวหน้า</th></td>
        <td><?php echo $mgr ?> </td>
      </tr>
      <tr>
      <td><th>วันที่เข้างาน</th></td>
        <td><?php echo date("d/m/Y",strtotime($hiredate)) ?> </td>
      </tr>
      <tr>
      <td><th>เงินเดือน</th></td>
        <td><?php echo $sal ?> </td>
      </tr>
      <tr>
      <td><th>คอมมิชชั่น</th></td>
        <td><?php echo $comm ?> </td>
      </tr>
      <tr>
      <td><th>แผนก</th></td>
        <td><?php echo $deptno ?> </td>
      </tr>
      
    </tbody>
  </table>
</div>


</body>
</html>



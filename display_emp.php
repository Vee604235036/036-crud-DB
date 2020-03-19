<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.bg-1 {
  background:#AFEEEE;
  
}
.bg-1 h3 {color: #fff;}
.bg-1 p {font-style: italic;}
</style>

<div class="bg-1">
  <div class="container">
    
    <?php
    
require 'db.php';
//$sql = 'SELECT * FROM emp';
$sql = "SELECT  e.EMPNO,e.ENAME,e.JOB,m.ENAME as MGRNAME,e.HIREDATE,e.SAL,e.COMM,d.DNAME
FROM emp e
INNER JOIN dept d
ON d.DEPTNO = e.DEPTNO
LEFT OUTER JOIN emp m
ON e.MGR = m.EMPNO";
$statement = $connection->prepare($sql);
$statement->execute();
$emp = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
 <div  class="offset-sm-5 col-sm-5">
 <br>
 <font color="red"><h1>All people</h1></font>
</div>
  <div class="card mt-4">
    <div class="card-header"> 
    </div>
    <div class="card-body">
      <table class="table table-bordered"> 
        <tr>
          <th>รหัสพนักงาน</th>
          <th>ชื่อ</th>
          <th>อาชีพ</th>
          <th>หัวหน้า</th>
          <th>วันที่เข้าทำงาน</th>
          <th>เงินเดือน</th>
          <th>คอมมิชชั่น</th>
          <th>แผนก</th>
          <th>แก้ไข/ลบ</th>
        </tr>
        <?php foreach($emp as $person):?>
          <tr>
            <td><?= $person->EMPNO; ?></td>
            <td><?= $person->ENAME; ?></td>
            <td><?= $person->JOB; ?></td>
            <td><?= $person->MGRNAME; ?></td>
            <td><?= $person->HIREDATE; ?></td>
            <td><?= $person->SAL; ?></td>
            <td><?= $person->COMM; ?></td>
            <td><?= $person->DNAME;?></td>
            <td>
              <a href="edit.php?EMPNO=<?= $person->EMPNO ?>" <button class="btn"><i class="fa fa-pencil"></i></button> </a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?EMPNO=<?= $person->EMPNO ?>"  <button class="btn"><i class="fa fa-trash"></i></button> </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>    
  </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/"> <span class="sr-only">(current)</span></a>
      </li>   
    </ul>







  
    
  
  
    
     
        
     


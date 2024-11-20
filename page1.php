<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>หลักสูตร</title>
</head>
<body>
  <?php include "nav.php" ?> 
  <div class="mt-3"><center><h1>หลักสูตร</h1></center></div>  
  <div class="row mt-4">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10">
        <button type="submit" class="btn btn-success btn-sm w-30">เพิ่ม</button>
        <button type="submit" class="btn btn-warning btn-sm w-30">แก้ไข</button>
        <button type="submit" class="btn btn-danger btn-sm w-30">ลบ</button>       
        <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">รหัสวิชา</th>
      <th scope="col">รายชื่อวิชา</th>
      <th scope="col">หน่วยกิจ</th>
      <th scope="col">ภาษาที่ใช้สอน</th>
      <th scope="col">ปีการศึกษา</th>
      <th scope="col">เทอม</th>
      <th scope="col">ปีหลักสูตร</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">030523605</th>
      <td>ปฏิบัติการความมั่นคงปลอดภัยด้านไซเบอร์</td>
      <td>2</td>
      <td>ไทย</td>
      <td>2</td>
      <td>1</td>
      <td>2565</td>
    </tr>
    <tr>
      <th scope="row">030923102</th>
      <td>วิทยศาสตร์ในชีวิทประจำวัน</td>
      <td>3</td>
      <td>ไทย</td>
      <td>2</td>
      <td>1</td>
      <td>2565</td>
    </tr>
    <tr>
      <th scope="row">030523503</th>
      <td>การแบบแอฟพริเคชั่นด้วยภาษา dart</td>
      <td>2</td>
      <td>ไทย</td>
      <td>2</td>
      <td>1</td>
      <td>2565</td>
    </tr>
  </tbody>
    </table>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
    
</body>
</html>
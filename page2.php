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
    <title>อาจารย์</title>
</head>
<body>
  <?php include "nav.php" ?> 
  <div class="mt-3"><center> <h1>อาจารย์</h1></center></div>
 
  <div class="row mt-4">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10">
        <button type="submit" class="btn btn-success btn-sm w-30">เพิ่ม</button>
        <button type="submit" class="btn btn-warning btn-sm w-30">แก้ไข</button>
        <button type="submit" class="btn btn-danger btn-sm w-30">ลบ</button>
        <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">คำนำหน้าชื่อ</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">Email</th>
      <th scope="col">line</th>
      <th scope="col">เบอร์โทร</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>นาย</td>
      <td>วนาดอน คชสิทธิ์</td>
      <td>wanadorn@gmail.com</td>
      <td>wanadorn</td>
      <td>0951085106</td>
    </tr>
  </tbody>
    </table>
        </div>
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div>
    
</body>
</html>
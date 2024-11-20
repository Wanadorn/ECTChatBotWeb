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
    <title>รายงาน</title>
</head>
<body>
  <?php include "nav.php" ?> 
  <div class="mt-3"><center><h1>รายงาน</h1></center></div>
  
  <div class="row mt-4">
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="col-lg-6 col-md-8 col-sm-10">
        <button type="submit" class="btn btn-success btn-sm w-30">เพิ่ม</button>
        <button type="submit" class="btn btn-warning btn-sm w-30">แก้ไข</button>
        <button type="submit" class="btn btn-danger btn-sm w-30">ลบ</button>
        <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ข้อความ</th>
      <th scope="col">วัน-เวลา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>มันไม่สามารถตอบฉันได้ว่านายพงศกรมีช่องทางติดต่ออะไรบ้าง</td>
      <td>2024-11-1 14:30:17</td>
    </tr>
  </tbody>
    </table>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>
</body>
</html>
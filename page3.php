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
    <title>ค่าเทอม</title>
</head>
<body>
  <?php include "nav.php" ?> 
  <div class="mt-3"><center><h1>ค่าเทอม</h1></center></div>
  
  <div class="row mt-4">
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10">
        <button type="submit" class="btn btn-success btn-sm w-30">เพิ่ม</button>
        <button type="submit" class="btn btn-warning btn-sm w-30">แก้ไข</button>
        <button type="submit" class="btn btn-danger btn-sm w-30">ลบ</button>
        <table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">ราคา</th>
      <th scope="col">ปี</th>
      <th scope="col">เทอม</th>
      <th scope="col">รายละเอียด</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>28050</td>
      <td>1</td>
      <td>1</td>
      <td>ค่าบำรุง-ค่าธรรมเนียม-เงินอุดหนุนการศึกษา 25,000 บาท \ ค่าขึ้นทะเบียนนักศึกษาใหม่ 1,000 บาท \ ค่าประกันทรัพย์สิน 1,000 บาท \ ค่าประกันอุบัติเหตุ 350 บาท \ ค่าบัตรนักศึกษา 200 บาท \ ค่าอบรมจริยธรรม 500 บาท</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>25000</td>
      <td>1</td>
      <td>2</td>
      <td>ค่าบำรุง-ค่าธรรมเนียม-เงินอุดหนุนการศึกษา 25,000 บาท</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>25350</td>
      <td>2</td>
      <td>1</td>
      <td>ค่าบำรุง-ค่าธรรมเนียม-เงินอุดหนุนการศึกษา 25,000 บาท \ ค่าประกันอุบัติเหตุ 350 บาท</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>25000</td>
      <td>2</td>
      <td>2</td>
      <td>ค่าบำรุง-ค่าธรรมเนียม-เงินอุดหนุนการศึกษา 25,000 บาท</td>
    </tr>
  </tbody>
    </table>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1"></div>
    </div>
     
</body>
</html>
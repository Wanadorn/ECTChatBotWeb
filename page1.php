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
    <h1><center>หลักสูตร</center></h1>    
    <div class="row mt-4">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10">

            <div class="mb-3 row">
                <div class="col-sm-6">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalSingle">เพิ่ม</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAll">เพิ่ม</button>
                    <button type="button" class="btn btn-danger">ลบ</button> 
                    
                </div> 
                <div class="col-sm-6">
                    <div class="input-group">
                        <select name="year" class="form-select">
                            <?php
                                $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
                                $sql="SELECT * FROM course_year ORDER BY year DESC";
                                $result=$conn->query($sql);
                                while($row=$result->fetch()){
                                    echo "<option value=$row[0]>$row[1]</option>";           
                                }                              
                                $conn=null;
                            ?>                                                
                        </select>
                        <form action="page1_addsy.php" method="post">
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#Modal-year"><b>+</b></button>
                            <div class="modal" id="Modal-year">
                                <div class="modal-dialog">                
                                    <div class="modal-content">   
                                        <div class="modal-header"> 
                                            <h1 class="modal-title fs-5" id="ModalLabel">กรุณากรอกปีการศึกษา</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">                                                    
                                                <input type="text" class="form-control" name="course_year" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">      
                                            <button type="submit" class="btn btn-success mx-auto">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                 
                </div>        
            </div>
                      
            <?php  
                $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
                $sql="SELECT subject.id,subject.name,subject.credit,subject.language,education_year.year,education_year.term,course_year.year FROM subject 
                INNER JOIN education_year ON (subject.education_year_id = education_year.id) 
                INNER JOIN course_year ON (subject.course_year_id = course_year.id)
                ORDER BY subject.id ASC limit 0,10";
                $result=$conn->query($sql);
                echo"<table class='table mt-3'>
                        <thead>
                            <tr>
                                <th scope='col'>รหัสวิชา</th>
                                <th scope='col'>รายชื่อวิชา</th>
                                <th scope='col'>หน่วยกิต</th>
                                <th scope='col'>ภาษา</th>
                                <th scope='col'>ปี</th>
                                <th scope='col'>เทอม</th>
                                <th scope='col'>ปีการศึกษา</th>
                            </tr>
                        </thead>
                        <tbody>";
                                                     
                        
                while($row=$result->fetch()){
                    echo "  <tr>
                                <td scope='row'>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                                <td>$row[5]</td>
                                <td>$row[6]</td>
                            </tr>";            
                }
                echo "</tbody>
                </table>";
                include "page1_addsingle.php";
                include "page1_addmulti.php";
            ?>
        </div>
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div>
</body>
</html>
<form action="page1_add.php" method="post">   
    <div class="mb-3">                                                         
        <div class="input-group mb-3">                                  
            <span class="input-group-text">รหัสวิชา</span>
            <input type="text" class="form-control" name="id" required>   
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">รายชื่อวิชา</span>                             
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">หน่วยกิต</span>                                
            <input type="text" class="form-control" name="credit" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">ภาษา</span>                            
            <input type="text" class="form-control" name="language" required>

            <span class="input-group-text">ปี</span>                                 
            <input type="text" class="form-control" name="year" required>                             
        </div>

        <div class="input-group mb-3">                        
            <span class="input-group-text">เทอม</span>                                
            <input type="text" class="form-control" name="term" required>

            <span class="input-group-text">ปีการศึกษา</span> 
            <select name="course_year" class="form-select">
                <?php
                    $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
                    $sql="SELECT * FROM course_year";
                    foreach($conn->query($sql) as $row){
                        echo "<option value=$row[0]>$row[1]</option>";
                    }
                    $conn=null;
                ?>                                                
            </select>
                                                                                                            
        </div>                                                                                                        
    </div>        
                 
    <div class="modal-footer">      
        <button type="submit" class="btn btn-success mx-auto">บันทึก</button>
    </div>
</form>
<form action="page1_addall.php" method="post">   

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
     
                 
    <div class="modal-footer">      
        <button type="submit" class="btn btn-success mx-auto">บันทึก</button>
    </div>
</form>
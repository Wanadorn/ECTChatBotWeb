<form action="page1_addall.php" method="post">   
    <div class="modal" id="ModalAll">
        <div class="modal-dialog modal-lg">                
            <div class="modal-content">   
                <div class="modal-header"> 
                    <h1 class="modal-title fs-5" id="ModalLabel">กรุณาเลือกวิธีการเพิ่มข้อมูล</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <div>
                        <button type="button" class="btn btn-primary align-items-center">PDF</button>
                        <button type="button" class="btn btn-primary">PNG</button>
                    </div>
                    
                    <?php echo"
                        <table id='table-data'>
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
                            <tbody>                           
                                <tr>
                                    <td><input type='text' class='form-control' name='id'></td>
                                    <td><input type='text' class='form-control' name='name'></td>
                                    <td><input type='text' class='form-control' name='credit'></td>
                                    <td><input type='text' class='form-control' name='language'></td>
                                    <td><input type='text' class='form-control' name='year'></td>
                                    <td><input type='text' class='form-control' name='term'></td>
                                    <td><input type='text' class='form-control' name='course_year'></td>
                                </tr> 
                            </tbody>                    
                        </table>
                        "
                    ?>
                   
                </div>
                <div class="modal-footer">      
                    <button type="submit" class="btn btn-success mx-auto">บันทึก</button>
                </div>                                  
            </div>          
        </div>
    </div>            
</form>

<script>
    var data = []
    for(var i = 0; i < data.length; i++){
        var table = document.getElementById("table-data");
    }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>หลักสูตร</title>
</head>
<body>
    <?php include "nav.php" ?> 
    <h1><center>หลักสูตร</center></h1>
    
    <div class="bg-modal" id="bg">      
        <div class="modal-content">
            <h1>กรุณากรอกข้อมูล</h1> 
            <div class="close" onclick="close();">&times;</div>          
            <input type="text" class="" id="" placeholder="id">
            <input type="text" class="" id="" placeholder="name">
            <input type="text" class="" id="" placeholder="credit">
            <input type="text" class="" id="" placeholder="language">
            <input type="text" class="" id="" placeholder="year">
            <input type="text" class="" id="" placeholder="term">
            <input type="text" class="" id="" placeholder="school year">
            <button class="btn btn-success btn-sm" onclick="close();">บันทึก</button>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10">

        <button class="btn btn-success" id="add" onclick="show();">เพิ่ม</button> 

   
        </div>
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div>

    <script>
        document.getElementById("bg").style.display = "none"
        function show() {
            document.getElementById("bg").style.display = "flex"
        }
        function close() {
            document.getElementById("bg").style.display = "none"
        }
        
    </script>
</body>
</html>
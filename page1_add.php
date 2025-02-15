<?php
    session_start();
    $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $credit=$_POST['credit'];
    $language=$_POST['language'];
    $year=$_POST['year'];
    $term=$_POST['term'];
    $course_year=$_POST['course_year'];

    $sum = 0;

    if(($year == 0) && ($term == 0)){
        $sum = 1;
    }else if(($year == 1) && ($term == 1)){
        $sum = 2;
    }else if(($year == 1) && ($term == 2)){
        $sum = 3;
    }else if(($year == 2) && ($term == 1)){
        $sum = 4;
    }else if(($year == 2) && ($term == 2)){
        $sum = 5;
    }else if(($year == 2) && ($term == 3)){
        $sum = 6;
    }

    $sql="INSERT INTO subject(id,name,credit,language,isRequire,education_year_id,course_year_id)
    VALUES ('$id','$name',$credit,'$language',1,'$sum','$course_year')";
    $conn->exec($sql);
    
    $_SESSION['status_login']="success";
    $conn=null;
    header("location:page1.php");
    die();
?>
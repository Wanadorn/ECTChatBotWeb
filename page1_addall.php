<?php
    session_start();
    $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
    
    $id=array($_POST['id']);
    $name=array($_POST['name']);
    $credit=array($_POST['credit']);
    $language=array($_POST['language']);
    $year=array($_POST['year']);
    $term=array($_POST['term']);
    $course_year=array($_POST['course_year']);

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


    foreach($id as $row){
        $sql="INSERT INTO subject(id,name,credit,language,isRequire,education_year_id,course_year_id)
        VALUES ('$id[0]','$course_n',$credit,'$language',1,'$sum','$course_year')";
        $conn->exec($sql);
    }

    $_SESSION['status_login']="success";
    $conn=null;
    header("location:page1.php");
    die();
?>
<?php
    session_start();
    $conn=new PDO("mysql:host=localhost;dbname=ect_chatbot;charset=utf8","root","");
    
    $course_year=$_POST['course_year'];
 

    $sql="INSERT INTO course_year(year)
    VALUES ('$course_year')";
    $conn->exec($sql);
    $_SESSION['status_login']="success";

    $conn=null;
    header("location:page1.php");
    die();
?>
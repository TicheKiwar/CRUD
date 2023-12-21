<?php
include ("conexion.php");
if ( isset($_POST['save_task']) ){ 
    $title  = $_POST['title'];
    $desc  = $_POST ['description'];

    $sql  = "INSERT into task (task,description) values ('$title','$desc')";
    if($conn -> query( $sql )==false){
        echo "No se Guardo" .$sqlInsert.$conn->error;
    }

    $_SESSION ["message"] = "Task Saved Succesfully";
    $_SESSION   ["message_type"] = "success";
    header("Location: index.php");
}
?>
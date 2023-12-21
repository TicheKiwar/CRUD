<?php
include("conexion.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM task WHERE id = $id";
    $result = $conn -> query($sql);
    if(!$result){
        die("Failed");
    }

    $_SESSION ["message"] = "task Delete";
    $_SESSION    ["message_type"] = "danger";
    header("Location: index.php");
}
?>
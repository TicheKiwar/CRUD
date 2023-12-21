<?php
    include("conexion.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $sqlSelect = "SELECT * FROM task WHERE id = $id";
        $result = $conn -> query($sqlSelect);
        if(mysqli_num_rows($result) == 1){
            $resulatado = mysqli_fetch_array($result);
            $title = $resulatado["task"];
            $description = $resulatado['description'];
        }
    }
    if  (isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query = "UPDATE task set task='$title', description='$description' where id=$id";
        $conn -> query($query);
        
            $_SESSION ["message"] = "Task Update Succesfully";
            $_SESSION   ["message_type"] = "success";
            header("Location: index.php");
    }

?>


<?php include ("incluide/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" 
                        placeholder="Update title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description;?></textarea>
                    </div>
                    <input type="submit" name="update" class="btn btn-success btn-block" value="EDITAR">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("incluide/footer.php") ?>
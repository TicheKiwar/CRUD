<?php  include ("conexion.php")?>
<?php include ("./incluide/header.php")?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION ["message"]) ) { ?>
                <div class="alert alert-<?= $_SESSION ["message_type"] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION ["message"] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();}?>
            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-gruop">
                        <input type="text" name="title" id="" class="form-control"
                        placeholder="Task title" autofocus required="true">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="" rows="2" class="form-control"
                        placeholder="Task Description" autofocus required="true"></textarea>

                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save_task" value="Guardar Tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * from task";
                        $result = $conn-> query($sql);
                        while ($row=$result->fetch_array()){ ?>
                           <tr>
                           <td> <?php echo $row['task'] ?> </td>
                           <td> <?php echo $row['description'] ?> </td>
                           <td> <?php echo $row['created_at'] ?> </td>
                           <td> 
                                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a> 
                                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a> 
                            </td>
                           
                    <?php } ?>
                </tbody>    
            </table>
        </div>
    </div>

</div>

<?php include ("./incluide/footer.php")?>
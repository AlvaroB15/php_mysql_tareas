<?php include("db.php")  ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    
    <div class="row">

        <div class="col-md-4">

            <?php if(isset($_SESSION['mensaje'])){ ?>

                <div class="alert alert-<?=$_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['mensaje'] ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

            <?php session_unset();}  ?>


            <div class="card card-body">
                <form action="saveCRUD.php" method="POST">
                    
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo de Tarea">
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de Tarea"></textarea>
                    </div>

                    <!-- <input type="button" value="asd"> -->
                    <input type="submit" class="btn btn-success btn-block" name="save_tarea" value="Guardar Tarea">

                </form>
            </div>

        </div>    


        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Creador</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    <?php 
                    $query = "SELECT * FROM tareas";
                    $resultadoTareas = mysqli_query($conn,$query);

                    while ($row = mysqli_fetch_array($resultadoTareas)) { ?>
                        <tr>
                            <td><?php echo $row['titulo']?></td>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['created_at']?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class = "btn btn-secondary">
                                    <i style='font-size:24px' class='fas'>&#xf044;</i>
                                </a>

                                <a href="deleteCRUD.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i style='font-size:24px' class='fas'>&#xf1f8;</i>
                                </a>
                            </td>
                        </tr>

                        
                    <?php } ?>


                </tbody>
            
            </table>
        </div>    

    
    </div>

</div>

<?php include("includes/footer.php") ?>  


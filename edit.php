<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id=$id";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
            // echo $titulo;
            // echo $descripcion;
        }
    }

?>

<?php include("includes/header.php")?>



<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo;?>"class="form-control" placeholder="Actualizacion de Titulo">
                    </div>
                    
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" placeholder="Actualizacion de Descripcion"><?php echo $descripcion;?></textarea>
                    </div>

                    <button class="btn btn-success" name="Actualizar">
                        Actualizar
                    </button>
                    

                </form>
            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php")?>

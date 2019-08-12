<?php

include("db.php");

if(isset($_POST['save_tarea'])){
    
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')";

    $result = mysqli_query($conn,$query); 

    if(!$result){
        die("No se pudo guardar");
    }

    $_SESSION['mensaje'] = "Tarea guardado correctamente";
    $_SESSION['tipo_mensaje'] = "success";

    header("Location: index.php");
}

?>
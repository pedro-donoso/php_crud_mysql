<?php 

include("db.php");

if (isset($_POST["save_task"])) {   
    // recibo titulo
    $title = $_POST["title"];
    // recibo descripcion
    $description = $_POST["description"];

    // inserta en tabla mysql titulo y descripcion desde formulario
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {

        die("Query Failed");

    } 

    // Almaceno mensaje en session
    $_SESSION["message"] = "¡Tu Producto ha sido agregado!";
    // Color guardado
    $_SESSION["message_type"] = "success";
    
    header("Location: index.php");
    
}


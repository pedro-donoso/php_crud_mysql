<?php 

if (isset($_POST["save_task"])) {   
    // recibo titulo
    $title = $_POST["title"];
    // recibo descripcion
    $description = $_POST["description"];
    
    echo $title;
    echo $description;
}

?>
<?php
// Incluye el archivo de configuración de la base de datos
include("db.php");

// Verifica si se ha enviado un ID mediante GET
if (isset($_GET["id"])) {
    // Almacena el ID en una variable
    $id = $_GET["id"];

    // Crea una consulta para eliminar la tarea con el ID especificado
    $query = "DELETE FROM task WHERE id = $id";

    // Ejecuta la consulta
    $result = mysqli_query($conn, $query);

    // Verifica si la consulta se ejecutó correctamente
    if (!$result) {
        // Si no se ejecutó correctamente, muestra un mensaje de error
        die("Query Failed");
    }

    // Establece un mensaje de sesión para notificar que la tarea ha sido eliminada
    $_SESSION["message"] = "Producto eliminado";
    // Establece el tipo de mensaje de sesión (en este caso, "danger" para un mensaje de error)
    $_SESSION["message_type"] = "danger";

    // Redirige al usuario a la página de inicio
    header("Location: index.php");
}
?>
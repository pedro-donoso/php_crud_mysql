<?php
// Incluye el archivo de configuración de la base de datos
include("db.php");

// Verifica si se ha enviado un ID mediante GET
if (isset($_GET["id"])) {
    // Almacena el ID en una variable
    $id = $_GET["id"];

    // Crea una consulta para seleccionar la tarea con el ID especificado
    $query = "SELECT * FROM task WHERE id = $id";

    // Ejecuta la consulta
    $result = mysqli_query($conn, $query);

    // Verifica si la consulta devolvió resultados
    if (mysqli_num_rows($result) == 1) {
        // Almacena los resultados en una variable
        $row = mysqli_fetch_array($result);

        // Almacena el título y la descripción en variables
        $title = $row["title"];
        $description = $row["description"];
    }
}

// Verifica si se ha enviado un formulario de actualización
if (isset($_POST["update"])) {
    // Almacena el ID en una variable
    $id = $_GET["id"];

    // Almacena el título y la descripción en variables
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Crea una consulta para actualizar la tarea con el ID especificado
    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";

    // Ejecuta la consulta
    mysqli_query($conn, $query);

    // Establece un mensaje de sesión para notificar que la tarea ha sido actualizada
    $_SESSION["message"] = "Producto actualizado";
    // Establece el tipo de mensaje de sesión (en este caso, "warning" para un mensaje de advertencia)
    $_SESSION["message_type"] = "warning";

    // Redirige al usuario a la página de inicio
    header("Location: index.php");
}
?>

<?php 
// Incluye el archivo de cabecera
include("includes/header.php") 
?>

<!-- Contenedor principal -->
<div class="container p-4">
        <!-- Fila de la cuadrícula -->
        <div class="row">
            <!-- Columna de la cuadrícula -->
            <div class="col-md-4 mx-auto">
                <!-- Tarjeta con cuerpo -->
                <div class="card card-body">
                    <!-- Formulario de actualización -->
                    <form action="edit_task.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                        <!-- Grupo de formulario para el título -->
                        <div class="form-group mb-3">
                            <!-- Entrada de texto para el título -->
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control"
                                placeholder="Actualiza el producto">
                        </div>
                        <!-- Grupo de formulario para la descripción -->
                        <div class="form-group mb-3">
                            <!-- Entrada de texto para la descripción -->
                            <input type="text" name="description" value="<?php echo $description; ?>"
                                class="form-control" placeholder="Actualiza la descripción">
                        </div>
                        <!-- Botón de actualización -->
                        <div>
                            <button class="btn btn-success" name="update">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
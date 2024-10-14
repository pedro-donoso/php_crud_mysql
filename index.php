<?php include("db.php") ?>

<?php include("./includes/header.php") ?>



<div class="container p-4">

    <div class="row">
        <div class="col-md-4">

        <h5 class="mb-3">Ingresa Producto:</h5>

            <!-- verifico si existe dato guardado en sesion -->
            <?php if (isset($_SESSION["message"])) { ?>

                

                <!-- agrego color guardado -->
                <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">

                    <!-- muestro mensaje -->
                    <?= $_SESSION["message"] ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <!-- limpio datos sesion -->
            <?php session_unset(); } ?>

                

                <div class="card card-body">
    <!-- hacia dónde envío los datos -->
    <form action="./save_task.php" method="POST">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Nombre Producto" autofocus required>
        </div>
        <div class="form-group my-3">
            <textarea name="description" rows="4" class="form-control"
                placeholder="Descripción Producto"></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block" name="save_task">
            <i class="fa-solid fa-basket-shopping"></i> Agregar
        </button>
    </form>
</div>
        </div>
        <div class="col-md-8">
        <h5 class="text-center mb-3">Productos guardados:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Consulta mysql
                                $query = "SELECT * FROM task ORDER BY id DESC";
                                // Todas las tareas
                                $result_tasks = mysqli_query($conn, $query);

                                // Recorre tareas desde la BD
                                while($row = mysqli_fetch_array($result_tasks)) { ?>

                                    <!-- Agrega las tareas  a la tabla -->
                                    <tr>
                                        <td><?php echo $row["title"] ?></td>
                                        <td><?php echo $row["description"] ?></td>
                                        <td><?php echo $row["created_at"] ?></td>
                                        <td>
                                            <a href="./edit_task.php?id=<?php echo $row["id"]?>" class="btn btn-sm btn-primary mx-1">
                                            <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href=".delete_task.php?id=<?php echo $row["id"]?>" class="btn btn-sm btn-danger mx-1">
                                            <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
    </div>
</div>
<?php include("./includes/footer.php") ?>
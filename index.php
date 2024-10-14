<?php include("db.php") ?>

<?php include("./includes/header.php") ?>



<div class="container p-4">

    <div class="row">
        <div class="col-md-4">

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

                <h5>Agregar Tarea:</h5>

            <div class="card card-body">
                <!-- hacia dónde envío los datos -->
                <form action="./save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Título tarea" autofocus>
                    </div>
                    <div class="form-group my-3">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Título descripción"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Creación</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Consulta mysql
                                $query = "SELECT * FROM task";
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
                                            <a href="./edit_task.php?id=<?php echo $row["id"]?>">
                                            <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href=".delete_task.php?id=<?php echo $row["id"]?>">
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
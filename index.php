<?php include("db.php") ?>

<?php include("./includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- verifico si existe dato guardado en sesion -->
            <?php if (isset($_SESSION["message"])) { ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <!-- muestro mensaje -->
                    <?= $_SESSION["message"] ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php } ?>

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
    </div>
</div>
<?php include("./includes/footer.php") ?>
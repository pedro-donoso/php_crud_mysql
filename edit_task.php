<?php

    include("db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row["title"];
        $description = $row["description"];
    }
}

if (isset($_POST["update"])) {
    echo "Actualizando";
}

?>



<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit_task.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="title" value="<?php echo $title; ?>"
                            class="form-control" placeholder="Actualiza el producto">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="3" class="form-control" placeholder="Actualizo descripción">

                                <?php echo $description; ?>

                            </textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
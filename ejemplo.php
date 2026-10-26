<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_FILES["archivo"])) {
            
            
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {

                echo "<p>Ubicación temporal del archivo: {$_FILES["archivo"]["tmp_name"]}</p>";
                if (move_uploaded_file(
                    $_FILES["archivo"]["tmp_name"],
                    "uploads/" . $_FILES["archivo"]["name"]
                )) {
                    echo "Fichero guardado correctamente.";
                } else {
                    echo "No se ha podido guardar el fichero.";
                }
            } else {
                echo "Se ha producido un error al subir el fichero.";
            }
        }
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">

        <label for="archivo">Selecciona un fichero:</label>
        <input type="file" name="archivo[]" id="archivo" multiple>

        <button type="submit">Subir fichero</button>

    </form>
</body>

</html>
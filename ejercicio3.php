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

            // echo "<pre>";
            // print_r($_FILES["archivo"]);
            // echo "</pre>";

            foreach ($_FILES["archivo"]["name"] as $i => $value) {   
                if ($_FILES["archivo"]["error"][$i] === UPLOAD_ERR_OK) {
                    echo "<p>Ubicación temporal del archivo: {$_FILES["archivo"]["tmp_name"][$i]}</p>";
                    if (move_uploaded_file(
                        $_FILES["archivo"]["tmp_name"][$i],
                        "uploads/" . $_FILES["archivo"]["name"][$i]
                    )) {
                        echo "Fichero guardado correctamente: {$_FILES["archivo"]["name"][$i]}";
                    } else {
                        echo "No se ha podido guardar el fichero: {$_FILES["archivo"]["name"][$i]}";
                    }
                } else {
                    echo "Se ha producido un error al subir el fichero: {$_FILES["archivo"]["name"][$i]}";
                }
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
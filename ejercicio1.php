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

            //Para ver la estructura del array
            echo "<pre>";
            print_r($_FILES["archivo"]);
            echo "</pre>";

            for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
                foreach ($_FILES["archivo"] as $clave => $subarray) {

                    echo "<p>Clave: $clave Valor: $subarray[$i]</p>";
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
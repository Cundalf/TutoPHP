<?php
include "controllers/gatos.php";

$error = "";
$catName = "";
$catAge = 0;

if (isset($_POST["name"]) && isset($_POST["age"])) {

    $catName = $_POST["name"];
    $catAge = $_POST["age"];

    if ($catName == "")
        $error = "Debe ingresar el nombre del gato.";

    if (!is_numeric($catAge))
        $error = "Debe ingresar un numero.";

    if ($error == "") {
        $miGato = nuevoGato($catName, $catAge);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de gatos</title>
</head>

<body>
    <?php
    if ($error != "") {
        $errorView = file_get_contents("views/error.php");
        echo str_replace("[ERROR]", $error, $errorView);
    }

    $formView = file_get_contents("views/formGato.php");
    $formView = str_replace("[NAME]", $catName, $formView);
    $formView = str_replace("[AGE]", $catAge, $formView);

    echo $formView;
    ?>
    <hr>

    <?php
    if (isset($miGato)) {
        echo "<h3>" . $miGato->getData() . "</h3>";
        echo '<form method="POST" action="">
            <button type="submit" name="meow" value="meow">Meow</button>
        </form>';
        
        if(isset($_POST["meow"])) {
            echo $miGato->meow();
        }
    }
    ?>

</body>

</html>
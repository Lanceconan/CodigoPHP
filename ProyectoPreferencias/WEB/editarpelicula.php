<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Género Cinematográfico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <ul>
        <li><a href="index.php"> Responder Encuesta</a></li>
        <li><a href="pelicula.php"> Generos Cinematográfico</a></li>
        <li><a href="musica.php"> Estilos Musical</a></li>
    </ul>
    
    <h2> Editar el Registro </h2>

    <form action="controller/controller.php" method="post">
        <fieldset>
            <legend>Editar</legend>
            Editar Género Cinematográfico:
            <input type="text" name="estilo">
            <br><br>
            <button type="submit" name="editar_musica_ok"> Guardar <img src="images/save.png"></button>    
        </fieldset>
    </form>
</body>
</html>
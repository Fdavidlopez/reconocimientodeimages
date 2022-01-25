<?php
ini_set('display_errors',1);
ini_set('display_status_errors',1);
error_reporting(E_ALL);

if (isset($_GET['file']) && isset($_GET['name'])){
    $file = $_GET {'file'};
    $name = $_GET {'name'};
}else {
  header('Location: https://informatica.ieszaidinvergeles.org:10054/PIA/env/reconocimientodeimages');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Face Detector</title>
    <link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
    <script src="https://unpkg.com/jcrop"></script>
</head>
<body>
    <img src="<?= $file  ?> " alt="imagen subida" id="imagen">
    <form action="ejemplo3.php" method="post" id="fblur">
        <input type="hidden" name="file" value="<?= $file ?>"/>
        <input type="hidden" name="name" value="<?= $name ?>"/>
        <input type="submit" value="Procesar filtrado de edad !!"/>
    </form>
    <script src= "service.js"></script>
</body>
</html>
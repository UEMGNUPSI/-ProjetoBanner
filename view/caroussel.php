<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Banner</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/buscaCategoriaBanner.js"></script>
    <link   href="../css/carousel.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body >
<div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  
  <div class="slider">
<?php
 $nome_banner = $_GET['banner'];
 $caminho = '../documentos/' . $nome_banner . '/';
 $img = glob($caminho . '*{jpg,png}', GLOB_BRACE);
 $contador = count($img);

 $loopHorizontal = 5;

 for ($i = 0; $i < $contador; $i++) {
   if ($contador < $loopHorizontal) {
     ?>

    <div class="slide slide-0 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
       <img src="<?php echo $img[$i];?>">
      </div>
    </div>
   

   <?php
     } 
 }
?>


    
  </div>

</div>

<?php include("footer.php"); ?>
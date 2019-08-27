<!DOCTYPE html>
<html lang="en">
<html lang="pt-br">

<head>

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<script>
  function entrarFullScreen(){
	if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) { 
		if (document.documentElement.requestFullscreen) {
			document.documentElement.requestFullscreen();
		} else if (document.documentElement.msRequestFullscreen) {
			document.documentElement.msRequestFullscreen();
		} else if (document.documentElement.mozRequestFullScreen) {
			document.documentElement.mozRequestFullScreen();
		} else if (document.documentElement.webkitRequestFullscreen) {
			document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
		}
	}
}



</script>
<style>
html{
overflow-y:hidden;
overflow-x:hidden;
}
</style>
</head>
<body >



  <!-- <div class="slider"> -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="10000"style="width: 100%;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner carousel" >
    
  
    <?php
      $nome_banner = $_GET['banner'];
      $caminho = '../documentos/' . $nome_banner . '/';
      $img = glob($caminho . '*{jpg,png,gif,bmp}', GLOB_BRACE);
      $contador = count($img);
      $loopHorizontal = 5;
      for ($i = 0; $i < $contador; $i++) {
        if ($contador <= $loopHorizontal) {
          
        $active = $i == 0 ? "active" : "";

        echo " 
        <div class='carousel-item $active'>
          <img class='center-block' src='$img[$i]' alt='Imagem' style=' height: 100%;
          max-width: none;
          left: 50%;
          position: relative;
          transform: translateX(-50%);
          -webkit-transform: translateX(-50%);' >
        </div>
        ";

        }
      }
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

</body>
</html>

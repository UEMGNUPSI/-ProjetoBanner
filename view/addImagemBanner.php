<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Banner</title> 

  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
 

   <script> 
   function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});

function Mudarestado (){

if (document.getElementById('mostrarImagem').style.display === 'none'){
    document.getElementById('mostrarImagem').style.display = 'block';
    event.preventDefault();
  }
}

function impedirReload(){
  event.preventDefault();
}
      
</script>


<link href="../css/teste.css" rel="stylesheet">


</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php";?>
<div onload="impedirReload()">
<form method="post" id="cadProtocolo"  >
<div class="form-row "> 
    <div class="form-group col-sm-10"style="margin: 0 auto">

    <label for="Banner">Banner:</label>
    <select id="Banner" class="form-control" name="Banner">

        <option selected>Selecione...</option>

        <?php 

        $sql = "SELECT * FROM categoria_banner";
        $consulta = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_assoc($consulta)) {

            echo "<option>" . $dados['categoria_banner'] . "</option>";
        }
        ?>

</select>
</div>
</div>
</form>



        

<form action="#" method="POST" enctype="multipart/form-data" class="ml-4 mb-3">
<div class="file-upload" style="">

    <div class="image-upload-wrap">
      <input type="file" name="fileUpload" id="fileUpload" class="file-upload-input"  onchange="readURL(this);" accept="image/*" />
      <div class="drag-text">
        <h3>Arraste ou selecione uma imagem</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-image" src="#" alt="your image" />
      <div class="image-title-wrap">
      
        <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Imagem</span></button>
        <input type="submit" value="Enviar" onclick="Mudarestado()">

      </div>
    
    </div> 
    </div>
</form>
<?php
//Colocar o nome do banner
$ultimo_id = 2;
$_UP['pasta'] = '../documentos/' . $ultimo_id . '/';

if (isset($_FILES['fileUpload'])) :
// verifica a ação no botão
$nome_imagem = $_FILES['fileUpload']['name'];

if (is_dir($_UP['pasta'])) {
//Se a Pasta Existe  
  if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $_UP['pasta'] . $nome_imagem))
     return 0;
  else
     return 1;
} else {
//Se a pasta não existe
//Criar a pasta de foto do produto
  mkdir($_UP['pasta'], 0777);
//Verificar se é possive mover o arquivo para a pasta escolhida
  if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $_UP['pasta'] . $nome_imagem))
    return 0;
  else
    return 1;
}
endif;
?>


<?php
        $ultimo_id = 2;
        $caminho = '../documentos/'.$ultimo_id.'/';
        $img = glob($caminho.'*.jpg');
        $contador = count($img);
        
        $loopHorizontal = 5;
        
    ?>
    <form method="post" id="cadProtocolo"   >
     
      <div class="form-row"style="justify-content:center;margin-top:100px"> 
          
        <?php    
        for($i = 0; $i < $contador; $i++){
            if($contador <= $loopHorizontal){
        ?>

          <div id="mostrarImagem"  class="form-row " style="width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;" > 
            <img src="<?php echo $img[$i]; ?>" style="width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;" />
          </div>
            <?php
            }
            else if($contador = $loopHorizontal){
            ?>  
          <div id="mostrarImagem" style="width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;">      
            <img src="<?php echo $img[$i]; ?>" style="width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;"/>
          </div>                              
                <?php
                
            }
          
        }
        ?> 
      </div>     
    </form>
 </div>

<?php include_once  "footer.php"; ?>
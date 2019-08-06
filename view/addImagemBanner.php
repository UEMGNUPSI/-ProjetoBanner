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
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<<<<<<< HEAD
  <script>
    function Mudarestado(cadastroImagens) {
      if (cadastroImagens && document.getElementById('cadastroImagens').style.display === 'none') {
        document.getElementById('cadastroImagens').style.display = 'block';
      }
    }

    function impedirReload() {
      event.preventDefault();
    }
  </script>
  <style>
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

  </style>
</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php"; ?>

<form method="post" id="cadProtocolo" action="" enctype="multipart/form-data" name="upload">

  <div class="form-group col-sm-10" style="margin: 0 auto">
    <label for="Banner">Banner:</label>
    <select id="Banner" class="form-control" name="banner" onchange="Mudarestado(true);">
      <option selected disabled>Selecione...</option>
      <?php
      $sql = "SELECT * FROM categoria_banner";
      $consulta = mysqli_query($conn, $sql);
      while ($dados = mysqli_fetch_assoc($consulta)) {
        echo "<option>" . $dados['categoria_banner'] . "</option>";
      }
      ?>

    </select>
  </div>
=======
<script>
function Mudarestado (cadastroImagens){

if (cadastroImagens && document.getElementById('cadastroImagens').style.display === 'none'){
  document.getElementById('cadastroImagens').style.display = 'block'; 
}
}

function impedirReload() {
      event.preventDefault();
    }

</script>
</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php";?>

  <form method="post" id="cadProtocolo" action="" enctype="multipart/form-data" name="upload"  >
    
      <div class="form-group col-sm-10"style="margin: 0 auto">
        <label for="Banner">Banner:</label>
        <select id="Banner" class="form-control" name="banner" onchange="Mudarestado(true);">
        <option selected disabled>Selecione...</option>
        <?php 

        $sql = "SELECT * FROM categoria_banner";
        $consulta = mysqli_query($conn, $sql);
>>>>>>> 498f8b8670a0e5dd547505552e68f7a9739985d7


  <div id="cadastroImagens" style="display: none;">
    <?php
    if (isset($_POST['banner'])) {
      $nome_banner = $_POST['banner'];
      $_UP['pasta'] = '../documentos/' . $nome_banner . '/';

      if (isset($_POST['botao'])) {
        $arq = $_FILES['arquivo']['name'];
        $arq = str_replace("", "_", $arq);
        $arq = str_replace("ç", "c", $arq);
        if (file_exists("../documentos/$arq")) {
          $a = 1;
          while (file_exists("../documentos/[$a}$arq")) {
            $a++;
          }
          $arq = "[" . $a . "]" . $arq;
        }
<<<<<<< HEAD
        if (is_dir($_UP['pasta'])) {
          //Se a Pasta Existe  
          if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)) {
            echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>';
          } else {
            echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';
          }
        } else {
          mkdir($_UP['pasta'], 0777);

          if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)) {
            echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>';
          } else {
            echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';
          }
        }
      }
    }
    ?>

    <div class="fileUpload btn btn-primary">
   
      <input type="file" id="nome_arquivo" name="arquivo" >
      <span class="nome_arquivo"></span>
    </div>
    <input type="submit" name="botao" value="Enviar">

</form>


=======
        ?>

        </select>
      </div> 
 

  <div id="cadastroImagens" style="display: none;">
    <?php
    if(isset($_POST['banner'])){
     $nome_banner = $_POST['banner'];
     $_UP['pasta'] = '../documentos/'.$nome_banner.'/';
     
      if(isset($_POST['botao'])){
        $arq = $_FILES['arquivo']['name'];

        $arq = str_replace("","_",$arq);
        $arq = str_replace("ç","c",$arq);
>>>>>>> 498f8b8670a0e5dd547505552e68f7a9739985d7

        if(file_exists("../documentos/$arq")){
          $a = 1;

<<<<<<< HEAD
</div>

=======
            while(file_exists("../documentos/[$a}$arq")){
              $a++;
            }

            $arq = "[".$a."]".$arq;
        }

        if(is_dir($_UP['pasta'])){
          //Se a Pasta Existe  
          if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$arq)){
              echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>'; 
          }else {
              echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>'; 
          }
        }else{         
          mkdir($_UP['pasta'], 0777);        
    
          if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$arq)){
            echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>'; 
          }else {
            echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>'; 
          }
        }           
      }
    }
    ?>

      <div id="nome_arquivo" >
        <span class="nome_arquivo"></span>
        <span><img src="../img/cam.jpg" width="40"> </span>
        <input type="file" name="arquivo">
      </div> 
  
      <input type="submit" name="botao" value="Enviar" >
    
      </form>
      



  </div>
    
>>>>>>> 498f8b8670a0e5dd547505552e68f7a9739985d7


<?php include_once  "footer.php"; ?>
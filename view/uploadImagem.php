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
 <script> 
 $('#bologna-list a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
 </script>
</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php"; ?>

<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#Cadastrar" role="tab" aria-controls="Cadastrar" aria-selected="true">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Editar" role="tab" aria-controls="Editar" aria-selected="false">Editar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Excluir" role="tab" aria-controls="Excluir" aria-selected="false">Excluir</a>
        </li>
        
    </ul>
  </div>

    <div class="tab-content mt-3">
    <div class="tab-pane active" id="Cadastrar" role="tabpanel" aria-labelledby="Cadastrar-tab">
    <form action="#" method="POST" enctype="multipart/form-data" class="ml-4 mb-3">
        <div class="fileUpload btn btn-primary">    
            <input type="file" id="nome_arquivo" name="arquivo" >
            <span class="nome_arquivo"></span>
        </div>
            <input type="submit" name="botao" value="Enviar">           
        <?php
    
      $nome_banner = $_GET['banner'];
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
        if (is_dir($_UP['pasta'])) {
          //Se a Pasta Existe  
          if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)) 
              echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>';                
           else 
            echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';          
        } else {
          mkdir($_UP['pasta'], 0777);

          if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq)) 
            echo '<div class="res">Upload realizado com sucesso! <span> X </span> </div>';       
           else 
            echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';          
        }
      }
    
    ?>
     </form>
 </div>
    <div class="tab-pane" id="Editar" role="tabpanel" aria-labelledby="Editar-tab">
      asuhdas
    </div>
    <div class="tab-pane" id="Excluir" role="tabpanel" aria-labelledby="Excluir-tab">
        jkk          
    </div>
    
</div>


</div>

<?php include_once  "footer.php"; ?>
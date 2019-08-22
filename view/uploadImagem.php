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
      $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
      })


      function funcao1() {
        $('#cadastroModal').modal('hide');
        alert("Cadastro efetuado com sucesso!");

      }

      function disabled() {
        document.getElementById('nome_arquivo').disabled = true;
      }

      function Checkfiles() {
        var fup = document.getElementById('nome_arquivo');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

        if (ext == "jpeg" || ext == "png") {
          return true;
        } else {
          return false;
        }
      }
              function chamarPhpAjax() {
           $.ajax({
              url:'../funcoes/apagarTodasImagens.php',
              complete: function (response) {
                 alert(response.responseText);
              },
              error: function () {
                  alert("Vai tomar no cu");
              }
          });  

          return false;
        }
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
        <form action="#" method="POST" enctype="multipart/form-data" class="ml-4 mb-3" onsubmit="Checkfiles(this)">
          <div class="fileUpload btn btn-primary">
            <input type="file" id="nome_arquivo" name="arquivo" accept="image/png, image/jpeg">
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

              // list($largura, $altura) = getimagesize($arq);

              // if($largura <= 400 && $altura <= 200) {
              //     echo "Imagem válida!";   
              //     echo 'Largura = '.$largura.' | Altura = '.$altura;
              // } else {
              //     echo "Imagem incorreta";  
              //     echo 'Largura = '.$largura.' | Altura = '.$altura;
              // } 

              //Se a Pasta Existe  
              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq))
                echo
                  "<script>alert('Enviado com sucesso!');</script>";
              else
                echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';
            } else {
              mkdir($_UP['pasta'], 0777);

              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq))
                echo "<script>   
                alert('Enviado com sucesso!');
                
                </script>";
              else
                echo '<div class="res">Não possível realizar o upload! <span> X </span> </div>';
            }
          }

          ?>
        </form>
      </div>

      <?php

      $caminho = '../documentos/' . $nome_banner . '/';
      $img = glob($caminho . '*{jpg,png}', GLOB_BRACE);
      $contador = count($img);

      $loopHorizontal = 5;

      ?>
      <form method="post" id="cadProtocolo" class="ml-4">

        <div class="form-row" style="justify-content:left;margin-top:50px;margin-left: 10px;">

          <?php
          for ($i = 0; $i < $contador; $i++) {
            if ($contador < $loopHorizontal) {
              ?>

          <div id="mostrarImagem" class="form-row " style="display: block;border-radius: 5px;margin-right: 2%;">
            <a href="#"> <img src="<?php echo $img[$i]; ?>" style="width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;" /> </a>
          </div>
          <?php
            } else if ($contador = $loopHorizontal) {
              ?>
          <script>
            disabled(this);
          </script>
          <div id="mostrarImagem" class="form-row ml-4" style="width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;">
            <img src="<?php echo $img[$i]; ?>" style="width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;" />

          </div>
          <?php

            }
          }
          ?>
        </div>
        <button type="button" class="btn btn-primary mr-4 mt-3" data-toggle="modal" data-target="#cadastroModal" style="float: right;">Cadastrar</button>
        <button type="button" class="btn btn-danger  mt-3" data-toggle="modal" data-target="#cancelaCadastro" style="float: left;">Cancelar</button>
      </form>
      <div class="tab-pane" id="Editar" role="tabpanel" aria-labelledby="Editar-tab">
        asuhdas
      </div>
      <div class="tab-pane" id="Excluir" role="tabpanel" aria-labelledby="Excluir-tab">
        <form method="POST" action="apagarTodasImagens.php">

       <a href="" onclick="return chamarPhpAjax();">Teste onclick</a>     
       </form>
      </div>

    </div>


  </div>

  <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo cadastrar estas imagens?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="alertCadastro()">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cancelaCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo cancelar o cadastro destas imagens?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger">Cancelar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>


  <?php include_once  "footer.php"; ?>
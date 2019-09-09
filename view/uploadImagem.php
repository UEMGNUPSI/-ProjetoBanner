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

      $(document).ready(function() {

        /// Quando usuário clicar em salvar será feito todos os passo abaixo
        $('#delete').click(function() {

          var dados = $('#excluirTodasImagens').serialize();
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../funcoes/apagarTodasImagens.php',
            async: true,
            data: dados,
            success: function(response) {
              if (response == '1') {
                $('#confirm').modal('hide');
                $('#myModal').modal('show');

              } else {
                $('#myModal2').modal('show');
              }
            }
          });

          return false;
        });
      });
      $(document).ready(function() {

        /// Quando usuário clicar em salvar será feito todos os passo abaixo
        $('#excluirButton').click(function() {

          var dados = $('#ExcluirImg').serialize();
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '../funcoes/apagarImagem.php',
            async: true,
            data: dados,
            success: function(response) {
              if (response == '1') {
                $('#confirmar').modal('hide');
                $('#myModals').modal('show');

              } else {
                $('#myModals2').modal('show');
              }
            }
          });

          return false;
        });
      });
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

    <?php
    $nome_banner = $_GET['banner'];
    $caminho = '../documentos/' . $nome_banner . '/';
    $img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
    $contador = count($img);
    $numImagem = 5;
    if ($contador == $numImagem) {
      $disabled = 'disabled';
    } else {
      $disabled = "";
    }
    ?>

    <div class="tab-content mt-3">
      <div class="tab-pane active" id="Cadastrar" role="tabpanel" aria-labelledby="Cadastrar-tab">
        <form method="POST" enctype="multipart/form-data" class="ml-4 mb-3" onsubmit="Checkfiles(this)">
          <div class="fileUpload btn btn-primary">
            <input type="file" id="nome_arquivo" name="arquivo" <?php echo $disabled; ?> accept="image/png, image/jpeg">
            <span class="nome_arquivo"></span>
          </div>
          <input type="submit" name="botao" value="Enviar" onClick="history.go(0)">
          <?php
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
              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq))
                echo "<script> window.location.href=window.location.href </script>";

              else
                echo "Não possível realizar o upload! ";
            } else {
              mkdir($_UP['pasta'], 0777);

              if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $arq))
                echo "<script> window.location.href=window.location.href </script>";
              else
                echo "Não possível realizar o upload! ";
            }
          }
          ?>
        </form>
      </div>

      <?php

      $caminho = '../documentos/' . $nome_banner . '/';
      $img = glob($caminho . '*{jpg,png,gif}', GLOB_BRACE);
      $contador = count($img);

      $loopHorizontal = 5;

      ?>
      <form  id="ExcluirImg" class="ml-4">
        <div class="form-row" style="justify-content:left;margin-top:50px;margin-left: 10px;">

          <?php
          for ($i = 0; $i < $contador; $i++) {
            if ($contador <= $loopHorizontal) {

              echo "
          <div id='mostrarImagem' class='form-row ' style='display: block;border-radius: 5px;margin-right: 2%;'>
          <a data-toggle='modal' data-target='#confirmar' href='../funcoes/apagarImagem.php?imagem=" . $img[$i] . "&banner=" . $nome_banner . "'> <img  src='$img[$i]' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;' /> </a>
          </div>
         ";
            } else if ($contador = $loopHorizontal) {
              echo "       
            <div id='mostrarImagem' class='form-row ml-4' style='width: 150px; height: 150px;display: block;border-radius: 5px;align-items: center;margin-right: 2%;'>
            <a  data-toggle='modal' data-target='#confirmar' href='../funcoes/apagarImagem.php?imagem=" . $img[$i] . "&banner=" . $nome_banner . "'> <img  src='$img[$i]' style='width:150px;height: 150px;border-width: 6px;border-style: dashed;border-color: #428bca;' /> </a>

          </div>
          ";
            }
          }
          ?>
        </div>
      </form>

      <div class="tab-pane" id="Editar" role="tabpanel" aria-labelledby="Editar-tab">
        asuhdas
      </div>

      <div class="tab-pane" id="Excluir" role="tabpanel" aria-labelledby="Excluir-tab">
        <form method="POST" id="excluirTodasImagens">
          <input type="hidden" name="banner" value="<?php echo $caminho; ?>">
          <input type="hidden" name="nomebanner" value="<?php echo $nome_banner; ?>">
          <input class="btn btn-primary" type="button" value="Excluir tudo" data-toggle="modal" data-target="#confirm" style="float: right;" />
        </form>
      </div>

      <!-- Excluir - Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Imagens excluidas com sucesso!</h4>
            </div>
            <div class="modal-footer">
              <button class="text-white btn btn-info" type="button" onclick="history.go(0)">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="confirm" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-body">
              <p> DESEJA REALMENTE EXCLUIR TODAS AS IMAGENS?</p>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-primary mr-auto">Cancelar</button>
              <button type="button" class="btn btn-danger" id="delete">Excluir</button>
            </div>
          </div>
        </div>
      </div> 

      <!-- Erro ao excluir - Modal -->
      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Erro ao excluir as Imagens</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="confirmar" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-body">
                <p> DESEJA REALMENTE EXCLUIR A IMAGEM?</p>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary mr-auto">Cancelar</button>
                <button type="button" class="btn btn-danger" id="excluirButton">Excluir</button>
              </div>
            </div>
          </div>
        </div> 
         <!-- Excluir 1 imagem - Modal -->
      <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Imagens excluidas com sucesso!</h4>
            </div>
            <div class="modal-footer">
              <button class="text-white btn btn-info" type="button" onclick="history.go(0)">Voltar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Erro ao excluir - Modal -->
      <div class="modal fade" id="myModals2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Erro ao excluir as Imagens</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once  "footer.php"; ?>
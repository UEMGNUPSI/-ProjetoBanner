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

</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php";?>

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

  <div id="cadastroImagens">

  </div>



        


<?php include_once  "footer.php"; ?>
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
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
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
</script>


<link href="../css/teste.css" rel="stylesheet">


</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php";?>
<form method="post" id="cadProtocolo"  >
<div class="form-row "> 
    <div class="form-group col-sm-10"style="margin: 0 auto">

    <label for="curso">Banner:</label>
    <select id="curso" class="form-control" name="curso">

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

<div class="form-row ml-5 mt-3" style="justify-content: center;position: relative;" > 
<div style="border-width: 6px;
  border-style: dashed;
  border-color: #428bca;width:  150px;height: 150px; margin-right: 5%;">
</div>
<div style="border-width: 6px;
  border-style: dashed;
  border-color: #428bca;width:  150px;height:  150px; margin-right: 5%;">
</div>
<div style="border-width: 6px;
  border-style: dashed;
  border-color: #428bca;width:  150px;height:  150px; margin-right: 5%;">
</div>
<div style="border-width: 6px;
  border-style: dashed;
  border-color: #428bca;width:  150px;height:  150px; margin-right: 5%;">
</div>
<div style="border-width: 6px;
  border-style: dashed;
  border-color: #428bca;width:  150px;height:  150px; margin-right: 5%;">
</div>


</div>


</form>

<div class="file-upload" style="">

  <div class="image-upload-wrap">
    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
    <div class="drag-text">
      <h3>Arraste ou selecione uma imagem</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Imagem</span></button>
    </div>
  </div>



<?php include_once  "footer.php"; ?>
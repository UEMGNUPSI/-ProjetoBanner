
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projeto Banner - Em branco</title>

  

  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 

 
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php include_once "sidebar.php"; ?>

  <script type="text/javascript" language="javascript">
        $(document).ready(function() {
           
            /// Quando usuário clicar em salvar será feito todos os passo abaixo
            $('#salvar').click(function() {
                var dados = $('#cadCatBanner').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../funcoes/cadastraCategoriaBanner.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                        if (response == '1') {
                            $('#myModal').modal('show');
                        } else {
                            $('#myModal2').modal('show');
                        }
                    }
                });
                return false;
            });
        });
    </script>

    <div class="">
     <form method="post" id="cadCatBanner">

                    <div class="form-row ml-5">

                        <div class="form-group col-sm-6 ">
                            <label for="Banner">Banner:</label>
                            <input type="text" class="form-control" maxlength="50" minlength="5" name="categoriaBanner" id="banner" placeholder="Digite o nome do banner" required="">
                        </div>

                    </div>	

                    <div class="form-row ml-5 mb-3">
                        <div class="col-sm-6">
                            <input  class = "btn btn-primary"type="button" value="Cadastrar" id="salvar" style="float: right;" />
                            <a class="btn btn-danger text-white" id="voltar" data-toggle="modal" data-target="#Cancelar">Cancelar</a> 
                        </div>

                    </div>
                </form>
</div>
                  <!-- Cadastro Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Banner cadastrado com Sucesso!</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>
                        <a  class="text-white"href="inicio.php"><button type="button" class="btn btn-info">Listar Banners</a>
                    </div>
               </div>
            </div>
        </div>
        <!-- Modal já Cadastrado -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Banner já cadastrado!</h4>
						</div>
						<div class="modal-footer">
							<a href="addCategoriaBanner.php"><button type="button" class="btn btn-danger">Voltar</button></a>
						</div>
					</div>
				</div>
			</div>	
<?php include_once  "footer.php"; ?>

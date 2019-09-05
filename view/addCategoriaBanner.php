
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

</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php"; ?>

  <script type="text/javascript" language="javascript">
        $(document).ready(function() {
           
            /// Quando usuário clicar em salvar será feito todos os passo abaixo
            $('#salvar').click(function() {
                var dados = $('#banner').serialize();

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../funcoes/cadastraCategoriaBanner.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                        if (response == '1') {
                            $('#myModal').modal('show');
                        } else if(response == '2') {
                            $('#myModal2').modal('show');
                        }else{
                            $('#myModal3').modal('show');
                        }
                    }
                });
                return false;
            });
        });

        function excluirModal() {
            $('#excluirModal').modal('show');
            event.preventDefault();
        }
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
<div class="table-responsive" style="width: 90%; padding:1%; margin:auto">  
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <th class="text-center"> Banners</th>
        <th class="text-center"> Ações</th>

        <?php        
            $sql = "SELECT * FROM categoria_banner ORDER BY categoria_banner ASC";
            $consulta = mysqli_query($conn, $sql);

            while ($dados = mysqli_fetch_assoc($consulta)) {
                echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $dados['categoria_banner'] . "</td>";
                echo "<td>";

                
                ?>
                <form>
                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <button type="submit" style="cursor: pointer;" class=" mr-4" formaction="#"><i class="fas fa-pen-square text-primary" title="Editar" aria-hidden="true"></i></button>

                    <button type="submit" style="cursor: pointer;" data-toggle="modal" data-target="#excluirModal<?php echo $dados['id']; ?>" onclick="excluirModal()" ><i class="fa fa-trash text-primary" title="Excluir" aria-hidden="true"></i></button>
                </form>
                </td>
            </tr>
        </tbody>
        
<div class="modal fade" id="excluirModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir este curso?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <form>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../funcoes/excluirCategoria.php?id=<?php echo $dados['id']; ?>">Excluir</a>
                </form>
            </div>
        </div>
    </div>
</div>


        <?php } ?>
    </table>
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
         <!-- Modal caso campo esteja vazio -->
         <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Complete corretamente o campo de cadastro!</h4>
						</div>
						<div class="modal-footer">
							<a href="addCategoriaBanner.php"><button type="button" class="btn btn-danger">Voltar</button></a>
						</div>
					</div>
				</div>
			</div>	
<?php include_once  "footer.php"; ?>

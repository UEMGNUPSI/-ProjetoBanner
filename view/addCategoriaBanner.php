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
                        } else if (response == '2') {
                            $('#myModal2').modal('show');
                        } else {
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

        function editarModal() {
            $('#editarModal').modal('show');
            event.preventDefault();
        }

        function vincularImagens() {
            $('#vincularImagens').modal('show');
            event.preventDefault();
        }
    </script>

</head>

<?php include_once "sidebar.php"; ?>
<?php include_once "../funcoes/conexao.php"; ?>

<form method="post" id="cadCatBanner">
    <div class="form-row" style="width: 90%; padding:1%; margin:auto">
        <div class="form-group col-sm-6 ">
            <label for="Banner">Banner:</label>
            <input type="text" class="form-control" maxlength="50" minlength="5" name="categoriaBanner" id="banner" placeholder="Digite o nome do banner" required="">
        </div>
    </div>

    <div class="form-row" style="width: 90%;padding:1%;  margin:auto">
        <div class="col-sm-6">
            <input id='salvar' class="btn btn-primary" type="button" value="Cadastrar" />
        </div>
    </div>
</form>

<div class="table-responsive" style="width: 90%; padding:1%; margin:20px auto">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead">
        <th class="text-center  text-light"style="background-color:#292b2c"> Banners</th>
        <th class="text-center  text-light"style="background-color:#292b2c"> Ações</th>
        </thead>

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
                <button type="submit" style="cursor: pointer;" data-toggle="modal" data-target="#editarModal<?php echo $dados['id']; ?>" onclick="editarModal()" class=" mr-4" formaction="#"><i class="fas fa-pen-square text-primary" title="Editar" aria-hidden="true"></i></button>
                <button type="submit" style="cursor: pointer;" data-toggle="modal" data-target="#excluirModal<?php echo $dados['id']; ?>" onclick="excluirModal()"><i class="fa fa-trash text-primary" title="Excluir" aria-hidden="true"></i></button>
                <button type="submit" style="cursor:pointer; margin-left:23px" data-toggle="modal" data-target="#vincularModal<?php echo $dados['id'] ?>" onclick="vincularImagens()"><i class="fas fa-image text-primary" aria-hidden="true" title="Vincular"></i></button>
            </form>
            </td>
            </tr>
            </tbody>

            <div class="modal fade" id="excluirModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir este Banner</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <form>
                                <a class="btn btn-danger mr-auto" href="../funcoes/excluirCategoria.php?id=<?php echo $dados['id']; ?>">Sim, eu quero!</a>
                                <button class="btn btn-primary" type="button" data-dismiss="modal">Ops! Não quero!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="vincularModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja vincular imagens a este Banner?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <form>
                                <button class="btn btn-secondary mr-auto" type="button" data-dismiss="modal">Ops! Não quero!</button>
                                <a class="btn btn-primary" href="../view/uploadImagem.php?banner=<?php echo $dados['categoria_banner']; ?>">Sim, eu quero!</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editarModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alterar Nome do Banner</h5>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="../funcoes/editarCategoria.php">
                                <?php
                                    $Id = $dados['id'];
                                    $sql2 = "SELECT * FROM curso WHERE id='$Id'";
                                    $consulta2 = mysqli_query($conn, $sql2);
                                    ?>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Alterar:</label>
                                    <input type="text" class="form-control" id="nome_banner" name="nome_banner" placeholder="<?php echo $dados['categoria_banner']; ?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <input type="hidden" name="categoria_banner" value="<?php echo $dados['categoria_banner']; ?>">
                            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>
                        </form>
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
                <a class="text-white" href="" onClick="history.go(0)"><button type="button" class="btn btn-info">Voltar</a>
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
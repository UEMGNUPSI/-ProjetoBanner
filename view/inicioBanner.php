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
    <script type="text/javascript" src="../js/buscaCategoriaBanner.js"></script>
    <style>
        body {
            background-image: url('../img/uemg.jpg');
            background-repeat: no-repeat;
            background-size: 1920px 1020px;
            opacity: 1;
            filter: alpha(opacity=100);
        }
    </style>
</head>

<?php include_once "../funcoes/conexao.php"; ?>

<div class="container">
    <div class="col-12 text-center my-5">

        <h1 style="font-weight: 330;color: white;"><i class="fa fa-paper-plane text-white" aria-hidden="true"></i> Banner</h1>


        <div class="row">

            <div class="col-12">

                <form class="form-inline mb-3 ">
                    <input class="form-control mt-4" type="search" placeholder="Buscar..." id="buscanome" onkeyup="buscarCategoriaBanner(this.value)">
                </form>

                <div class="row" id="resultado">

                    <?php


                    $sql = "SELECT * FROM categoria_banner ORDER BY categoria_banner";
                    $consulta = mysqli_query($conn, $sql);

                    while ($dados = mysqli_fetch_assoc($consulta)) {
                        ?>
                        <form action="post" class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <input type="hidden" name="banner" value="<?php echo $dados['categoria_banner']; ?>">
                            <button type="submit" class="btn btn-primary  mb-3" formaction="caroussel.php" style="width: 100%;"><?php echo $dados['categoria_banner']; ?></button>
                        </form>
                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
</div>

</div>
<?php include_once  "footer.php"; ?>
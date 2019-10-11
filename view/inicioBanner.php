<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Banner</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">    
    <!-- <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

    <!-- FONTES -->
    <script type="text/javascript" src="../js/buscaCategoriaBanner.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative:300" rel="stylesheet">
    
    <style>
        body {
            background-image:linear-gradient(rgba(254, 254, 254, 0.4),rgba(254, 254, 254,0.4)),url('../img/uemgfrutal2.svg');
            background-repeat: no-repeat;
            background-size: cover;
            opacity:1;
            filter: alpha(opacity=100);
        }
        
    </style>
</head>

<?php include_once "../funcoes/conexao.php"; ?>
<form class="modal fade" id="janela" method="post" action="../funcoes/verificaLogin.php">
      <div class="modal-dialog" id='teste'>

        <div class="modal-content">
          
          <div id="Logar" class="tab">

            <div class="modal-header" style="background-color: rgba(60, 110, 143, 0.96);">
              <button class="close" data-dismiss="modal"><span>&times;</span></button>
              <h4 class="modal-title" style="color: white"><span id="icon-login" class="glyphicon glyphicon-user" style="padding-right: 8px;color: white;"></span>Efetuar Login</h4>


            </div>

            <div class="modal-body div-login">
                <div id="div-info" class="col-md-6">
                    
                    <p>Realize login para cadastrar banners</p>
                   
                </div>
                <div class="col-md-6" style="margin-bottom: 5px;">
                    <div class="form-group">
                        <label for="email"><span id="icon-email-pass" class="glyphicon glyphicon-user"></span>Usuário</label>
                        <input id='email' type="text" class="form-login" id="campo_usuario" name="user"/>

                    </div>

                      <div class="form-group">
                        <label for="senha"><span id="icon-email-pass" class="glyphicon glyphicon-lock"></span> Senha</label>
                        <input id='senha' type="password" class="form-login red" id="campo_senha" name="pass" maxlength="20"/>

                      </div>
                   
                </div>
              

              
            </div>
              
          </div>

          <!-- rodape -->
          <div class="modal-footer">
              <div class="col-md-12">
                <button class="btn-custom btn-logar" type="submit">Logar</button>
                <button class="btn-custom btn-cancelar" data-dismiss="modal">Cancelar</button>
              </div>
            
          </div>

        </div>
      </div>
    </form>

<div class="container no">
    <div class="col-12">
        
    <nav class="navbar navbar-inverse navbar-custom  navbar-fixed-top nav-color">
  <div class="container">

  <!-- header -->

        <div class="navbar-header">
        <a href="index.php" class="navbar-brand">
            <span class="img-logo">UEMG Eventos</span>
        </a>

        </div>
    
    <div class="collapse navbar-collapse" id="barra-navegacao">
      <ul class="nav navbar-nav navbar-right">
      <li>
        <form class="form-inline">
          <div id="barra-pesquisa" class="input-group input-group-sm ">
            <span class="input-group-addon" id="sizing-addon3"><button class="btn btn-pesquisa" type="submit"><span id="icon-pesquisa" class="glyphicon glyphicon-search"></span></button></span></span>
            <input type="text" class="form-control" placeholder="Pesquise aqui..." aria-describedby="basic-addon1" id="buscanome" onkeyup="buscarCategoriaBanner(this.value)">
            
          </div>
        </form>
      </li>
      <li><a href="#" data-toggle="modal" data-target="#janela">ENTRAR</a></li>
      </ul>
    </div>
  </div>
</nav>  
    <div class="row" style="margin-top:50px;" id="resultado">
    <div class="col-12"> 
        <?php
            $sql = "SELECT * FROM categoria_banner ORDER BY categoria_banner";
            $consulta = mysqli_query($conn, $sql);

            while ($dados = mysqli_fetch_assoc($consulta)) {
                ?>
                <form action="post" class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 ">
                    <input type="hidden" name="banner" class="" value="<?php echo $dados['categoria_banner']; ?>">
                    <button type="submit" class="btn btn-primary mb-3" formaction="caroussel.php" style="width: 100%; margin-bottom:15px;"><?php echo $dados['categoria_banner']; ?></button>
                </form>
            <?php } ?>

    </div>
    </div>    

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

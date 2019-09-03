<?php 

    $imagem = $_GET['imagem'];
    $nome_banner = $_GET['banner'];
    unlink($imagem);
    header('Location: ../view/uploadImagem.php?banner='.$nome_banner.'') 



?>
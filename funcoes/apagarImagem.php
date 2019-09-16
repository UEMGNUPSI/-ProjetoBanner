<?php 

    $imagem = $_GET['imagem'];
    $banner = $_GET['banner'];
    if (file_exists($imagem)) 
    {
        unlink($imagem);
        header("Location: ../view/uploadImagem.php?banner=$banner");

    }
    else
    {
        header("Location: ../view/uploadImagem.php?banner=$banner"); 
    }
    
    
?>
<?php 

    $imagem = $_GET['imagem'];
    if (file_exists($imagem)) 
    {
    	unlink($imagem);
    	echo 1;
    }
    else
    {
    	echo 2;
    }
    
    
?>
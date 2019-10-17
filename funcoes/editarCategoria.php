<?php 
    include_once '../funcoes/conexao.php';
    $categoriaBanner = $_POST['categoria_banner'];
    $banner = $_POST['nome_banner'];
    $position = $_POST['inputTv'];
    $id=$_POST['id'];   
    $caminhoBase = "../documentos/";   

    $sql = "UPDATE categoria_banner SET categoria_banner='$banner', position='$position' WHERE id='$id'";
    $update = mysqli_query($conn, $sql);
    rename( $caminhoBase.$categoriaBanner,$caminhoBase.$banner);

    if ($update) {
           header('Location: ../view/addCategoriaBanner.php');
    }else{
           header('Location: ../view/addCategoriaBanner.php');
    }



?>
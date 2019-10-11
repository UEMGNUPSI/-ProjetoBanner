<?php 
	
	include_once "conexao.php";
	$categoriaBanner = $_POST['categoriaBanner'];
	$position = $_POST['inputTv'];
	


	$sql = $conn->query("SELECT * FROM categoria_banner WHERE categoria_banner='$categoriaBanner'");
		if($categoriaBanner=="" || $position == ""){
			echo '3';
		}else if(mysqli_num_rows($sql) > 0){
			echo '2';	
		}else {
			if(!$conn->query("INSERT INTO categoria_banner(categoria_banner,position) VALUES ('$categoriaBanner','$position')")) die ('Os dados não foram inseridos');
				echo '1'; 	
			}
			
?>
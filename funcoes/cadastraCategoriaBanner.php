<?php 
	
	include_once "conexao.php";
	$categoriaBanner = $_POST['categoriaBanner'];
	$sql = $conn->query("SELECT * FROM banner WHERE category_banner='$categoriaBanner'");
			
		if(mysqli_num_rows($sql) > 0){
			echo '2';	
			//echo "<script>alert('Este curso já está cadastrado');</script>";
				//echo"<script language='javascript' type='text/javascript'>window.location.href='/protocolos/addcurso.php?o=Este curso já está cadastrado';</script>";		
		} else {
			 if(!$conn->query("INSERT INTO banner(category_banner) VALUES ('$categoriaBanner')")) die ('Os dados não foram inseridos');
			 	echo '1'; 
			 //header('Location: /protocolos/addcurso.php');
		}
 ?>
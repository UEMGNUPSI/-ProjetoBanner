<?php include_once "conexao.php"; 

// Recebe o valor enviado
$valor = $_GET['valor'];

// Procura titulos no banco relacionados ao valor
$sql ="SELECT * FROM categoria_banner WHERE categoria_banner LIKE '%".$valor."%'";
$consulta = mysqli_query($conn,$sql); 
// Exibe todos os valores encontrados

while ($noticias = mysqli_fetch_assoc($consulta)) {
	
	$id = $noticias['id'];
	$nome = $noticias['categoria_banner'];

	echo  "       
	        <form method='get' action='uploadImagem.php' class='col-5'>  
            	<input type='hidden' name='banner' value='$nome' />                      
                <button type='submit' class='btn btn-primary ml-5 mb-3' formaction='uploadImagem.php' style='width: 100%;'>$nome</button>    
            </form>
           
	        ";
}
 
// Acentuação
header("Content-Type: text/html; charset=ISO-8859-1",true);

?>
<?php
session_start();
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "codebetter";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
	
  }
$username = $_SESSION['username'];
$projectname = $_SESSION['projectname'];
$query2 = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
$row2 = mysqli_fetch_assoc($query2);
if($_SERVER['REQUEST_METHOD'] === "POST"){
    
if(isset($_POST['privatesave']) && $row2['membership'] > 4 ) { 

$htmldata = $_POST['htmldata'];
$cssdata = $_POST['cssdata'];
$jsdata = $_POST['jsdata'];
$query = mysqli_query($conn, "DELETE FROM community WHERE projectname='$projectname'");
$row = mysqli_num_rows($query);
//echo json_encode(array('returned_val' => $htmldata)); 


$fileOpen = fopen("html.txt", "w"); //ABRE O FICHEIRO
$fileOpen2 = fopen("css.txt", "w"); //ABRE O FICHEIRO
$fileOpen3 = fopen("js.txt", "w"); //ABRE O FICHEIRO

$toWrite = html_entity_decode($htmldata); //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
$toWrite2 = html_entity_decode($cssdata); //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
$toWrite3 = $jsdata; //PEGA O VALOR DA SUA TEXTAREA E PASSA AI

fwrite($fileOpen, $toWrite); //SALVA O CONTEUDO NO FICHEIRO ABERTO
fwrite($fileOpen2, $toWrite2); //SALVA O CONTEUDO NO FICHEIRO ABERTO
fwrite($fileOpen3, $toWrite3); //SALVA O CONTEUDO NO FICHEIRO ABERTO

fclose($fileOpen); //FECHA O FICHEIRO
fclose($fileOpen2); //FECHA O FICHEIRO
fclose($fileOpen3); //FECHA O FICHEIRO


} elseif(isset($_POST['privatesave']) && $row2['membership'] == 4 ) { //CASO CLIQUE NO BOTAO E NAO TEM PERMISSAO [FREEPLAN]
    echo json_encode('You cant save. Try upgrade your plan'); 

} 
else { //SE FOR PUBLICO ISTO GRAVA E REDIRECIONA PARA O PUBLIC SAVE ONDE ENTRARÁ NA CRIAÇAO DA BASE DE DADOS

    $htmldata = htmlspecialchars($_POST['html']);
    $cssdata = htmlspecialchars($_POST['css']);
    $jsdata = htmlspecialchars($_POST['js']);
    
    
    $fileOpen = fopen("html.txt", "w"); //ABRE O FICHEIRO
    $fileOpen2 = fopen("css.txt", "w"); //ABRE O FICHEIRO
    $fileOpen3 = fopen("js.txt", "w"); //ABRE O FICHEIRO
    
    $toWrite = html_entity_decode($htmldata); //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
    $toWrite2 = html_entity_decode($cssdata); //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
    $toWrite3 = $jsdata; //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
    
    fwrite($fileOpen, $toWrite); //SALVA O CONTEUDO NO FICHEIRO ABERTO
    fwrite($fileOpen2, $toWrite2); //SALVA O CONTEUDO NO FICHEIRO ABERTO
    fwrite($fileOpen3, $toWrite3); //SALVA O CONTEUDO NO FICHEIRO ABERTO
    
    fclose($fileOpen); //FECHA O FICHEIRO
    fclose($fileOpen2); //FECHA O FICHEIRO
    fclose($fileOpen3); //FECHA O FICHEIRO
    


header("location: ../../publicsave.php");
}}

?>
<?php
if(isset($_GET['project']))
{
session_start();
require_once("includes/db.php");
require_once("includes/init.php");

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

$project = $_GET['project'];
$username = $_SESSION['username'];
$dir = "projects/".$username."/".$project;
var_dump($project);

$query = mysqli_query($conn, "SELECT * FROM community WHERE projectname = '$project'"); 
$row = mysqli_num_rows($query);

if($row >= 1) {
    $insertUser = $odb -> prepare("DELETE FROM  `community` WHERE projectname = :projectname");
    $insertUser->bindParam(":projectname", $project);
    $insertUser->execute(); 
    //delete folder
    array_map('unlink', glob("$dir/*.*"));
    rmdir($dir);

    header("location: projects.php");
} else {
    var_dump(2);

    //delete folder
    array_map('unlink', glob("$dir/*.*"));
    rmdir($dir);


    header("location: projects.php");


}
}


?>
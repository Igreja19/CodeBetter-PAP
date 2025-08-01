<?php
require_once('../includes/db.php');
require_once('../includes/functions.php');
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
$query = mysqli_query($conn, "SELECT * FROM community WHERE projectname = '$projectname'"); 
$row = mysqli_num_rows($query);
//falta imagem working
$imagem = 'iframe/default.png';

$path    = @$_SESSION['username'];
$files = scandir($path);
$files = array_diff($files, array('.', '..'));


//var_dump($row);
//var_dump($projectname);
     if($row >= 1) {
            echo "<script>alert('Successfully Saved')</script><meta http-equiv='refresh' content='0;url=$username/$projectname'>";
            //var_dump(1);
        } else {
            //var_dump(2);
            $insertUser = $odb -> prepare("INSERT INTO `community` VALUES(NULL, :username, :projectname, 'iframe/default.png')");
            $insertUser -> execute(array(':username' => $username,':projectname' => $projectname));
            echo "<script>alert('Successfully Saved')</script><meta http-equiv='refresh' content='0;url=$username/$projectname'>";
            header("location:$username/$projectname");

        }
      
		



?>

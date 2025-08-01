<?php
session_start();
ob_start();
require_once '../includes/db.php';
require_once '../includes/init.php';
if (!($user -> LoggedIn()))
{
	header('location: login.php');
	die();
}

if (!($user -> notBanned($odb)))
{
	header('location: login.php');
	die();
}

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
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='".@$_SESSION['username']."'");
$row = mysqli_fetch_assoc($query);
$wallpaper1 = 'wallpapers/default.jpg';
$wallpaper2 = 'wallpapers/default2.jpg';
$wallpaper3 = 'wallpapers/default3.jpg';
$wallpaper4 = 'wallpapers/default4.jpg';
$username = $_SESSION['username'];

mysqli_query($conn,"UPDATE users SET wallpaper='$wallpaper1' WHERE username='$username'");
header("Location: ../settings.php")
?>
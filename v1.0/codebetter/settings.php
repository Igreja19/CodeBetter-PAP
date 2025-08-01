<?php
session_start();
ob_start();
require_once 'includes/db.php';
require_once 'includes/init.php';
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
$username = $_SESSION['username'];
$wallpaper1 = 'wallpapers/default1.jpg';
$wallpaper2 = 'wallpapers/default2.jpg';
$wallpaper3 = 'wallpapers/default3.jpg';
$wallpaper4 = 'wallpapers/default4.jpg';

?>
<html lang="en">

<head>
  <title>Settings - CodeBetter</title>
  <!-- Required meta Colors -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="css/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <style>
      .logout {

  height: 34px;
  left: 20%;
  bottom: 20px;
  color: #fff;
  cursor: pointer;
  background: purple;
  border: none;
  border-radius: 1px;
}

header
{
	font-family: 'Lobster', cursive;
	text-align: center;
	font-size: 25px;	
}

#info
{
	font-size: 18px;
	color: #555;
	text-align: center;
	margin-bottom: 25px;
}

a{
	color: #074E8C;
}

.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 65px;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 25px;
}

.force-overflow
{
	min-height: 450px;
}

#wrapper
{
	text-align: center;
	width: 500px;
	margin: auto;
}

/*
 *  STYLE 2
 */

#style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #D62929;
}

.nav-item.active .nav-link{
    background-color:<?php echo $row['color']; ?> !important;
}


</style>
</head>

<body>


  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item  ">
            <a class="nav-link" href="profile.php">
              <i class="material-icons">account_circle</i>
              <p>Profile</p>
            </a>
          </li>
          <!-- your sidebar here -->
          <li class="nav-item ">
            <a class="nav-link" href="news.php">
              <i class="material-icons">notifications
</i>
              <p>News</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="purchase.php">
              <i class="material-icons">shopping_cart
</i>
              <p>Purchase</p>
            </a>
          </li>
           <!-- your sidebar here -->
           <li class="nav-item active ">
            <a class="nav-link" href="settings.php">
              <i class="material-icons">build</i>
              <p>Settings</p>
            </a>
          </li>
           <!-- your sidebar here -->
           <li class="nav-item  ">
            <a class="nav-link" href="projects.php">
              <i class="material-icons">logout</i>
              <p>Go Back</p>
            </a>
          </li>
  <?php  
  if ($user -> isAdmin($odb))
  { ?>
          <hr>
            <!-- your sidebar here -->
            <li class="nav-item  ">
            <a class="nav-link" href="manageusers.php">
              <i class="material-icons">address-card</i>
              <p>Manage Users</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="managenews.php">
              <i class="material-icons">book</i>
              <p>Manage News</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="manageplans.php">
              <i class="material-icons">add_shopping_cart</i>
              <p>Manage Plans</p>
            </a>
          </li>

  <?php } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Settings</a>
            
          </div>
        
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
   
        <div class="container-fluid">
          <div id="container-inside" style="background-color:white;border-radius:25px;text-align:center;"><br>
          <b>Your Themes:</b> <br><br>
         <center> <table>
              <tr>
                  <td>
                      <a href="upwallpaper/up1.php"><img src='wallpapers/default.jpg' style="width:440px;height:240px;border-radius:15px;cursor:pointer;"></a>
            </td> <td>  
            <a href="upwallpaper/up2.php"><img src='wallpapers/default2.jpg' style="width:440px;height:240px;border-radius:15px;cursor:pointer;"></a>
                  </tr> <tr>
              <td>
              <a href="upwallpaper/up3.php"><img src='wallpapers/default3.jpg' style="width:440px;height:240px;border-radius:15px;cursor:pointer;"></a>
                            </td><td>
                            <a href="upwallpaper/up4.php"><img src='wallpapers/default4.jpg'  style="width:440px;height:240px;border-radius:15px;cursor:pointer;"></a>
                                        </td></tr></table><br>
                                        <form method="POST" action="includes/uploadwallpapers.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
        <label class="file">
        <input type="file" name="image" aria-label="File browser example">
        </label><br>
        <button id="upload" name="upload" class="logout" style="background-color:<?php echo $row['color']; ?> !important; height:40px;width:250px;">Upload Wallpaper</button></form>
          <hr><b>Menu Color:</b> <br><br>   
          <form action="upwallpaper/colorup.php" method="post">
              <input type="color" id="color" name="color" style="height:100px;width:100px;border:none;" value="<?php $SQLGetUserColor = $odb -> query("SELECT * FROM users WHERE username='$username'");
		while ($getInfo = $SQLGetUserColor -> fetch(PDO::FETCH_ASSOC))
		{
		$color = $getInfo['color'];
		echo $color;
		} ?>">
              <br><br>
              <button class="logout" style="background-color:<?php echo $color; ?> !important; height:40px;width:100px;">Apply</button>
        </form><br><br>
        <br>

        
<br>
    </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
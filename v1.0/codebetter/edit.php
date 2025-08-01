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

$id = $_GET['id'];
$SQLGetInfo = $odb -> prepare("SELECT * FROM `users` WHERE `id` = :id LIMIT 1");
$SQLGetInfo -> execute(array(':id' => $_GET['id']));
$userInfo = $SQLGetInfo -> fetch(PDO::FETCH_ASSOC);
$username = $userInfo['username'];
$password = $userInfo['password'];
$email = $userInfo['email'];
$rank = $userInfo['rank'];
$membership = $userInfo['membership'];
$status = $userInfo['status'];
?>
<html lang="en">

<head>
  <title>Manage Users - CodeBetter</title>
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
          .failure {
  padding: 20px;
  background-color: #f44336;
  color: white;
}


.sucess {
  padding: 1px;
  width:250px;
  background-color: #4CAF50;
  color: white;
}

.banned {
  padding: 1px;
  width:250px;
  background-color: #ff9800;
  color: white;
}
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
           <li class="nav-item ">
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
            <li class="nav-item active  ">
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
            <a class="navbar-brand" href="javascript:;">Manage Users</a>
            
          </div>
        
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                </a>
              </li>
            
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
   
        <div class="container-fluid">
          <div id="container-inside" style="background-color:white;border-radius:25px;text-align:center;"><br>

        <!-- Title area -->

    <!-- Main content wrapper -->
       <?php 
	   if (isset($_POST['rBtn']))
	   {
		$sql = $odb -> prepare("DELETE FROM `users` WHERE `id` = :id");
		$sql -> execute(array(':id' => $id));
		echo '<center><div class="sucess"><p><strong>SUCCESS: </strong>User has been removed redirecting in 2...</p></div><meta http-equiv="REFRESH" content="2;url=manageusers.php"><br>';
	   }
	   if (isset($_POST['updateBtn']))
	   {
		$update = false;
		$errors = array();
		if ($username!= $_POST['username'])
		{
			if (ctype_alnum($_POST['username']) && strlen($_POST['username']) >= 4 && strlen($_POST['username']) <= 15)
			{
				$SQL = $odb -> prepare("UPDATE `users` SET `username` = :username WHERE `id` = :id");
				$SQL -> execute(array(':username' => $_POST['username'], ':id' => $id));
				$update = true;
				$username = $_POST['username'];
			}
			else
			{
				$errors[] = 'Username has to be 4-15 characters in length and alphanumeric';
			}
		}
		if (!empty($_POST['password']))
		{
			$SQL = $odb -> prepare("UPDATE `users` SET `password` = :password WHERE `id` = :id");
			$SQL -> execute(array(':password' => SHA1($_POST['password']), ':id' => $id));
			$update = true;
			$password = SHA1($_POST['password']);
		}
		if ($email != $_POST['email'])
		{
			if (filter_var($_POST['email']))
			{
				$SQL = $odb -> prepare("UPDATE `users` SET `email` = :email WHERE `id` = :id");
				$SQL -> execute(array(':email' => $_POST['email'], ':id' => $id));
				$update = true;
				$email = $_POST['email'];
			}
			else
			{
				$errors[] = 'Email is invalid';
			}
		}
		if ($rank != $_POST['rank'])
		{
			$SQL = $odb -> prepare("UPDATE `users` SET `rank` = :rank WHERE `id` = :id");
			$SQL -> execute(array(':rank' => $_POST['rank'], ':id' => $id));
			$update = true;
			$rank = $_POST['rank'];
    }
		if ($membership != $_POST['plan'])
		{
			if ($_POST['plan'] == 0)
			{
				$SQL = $odb -> prepare("UPDATE `users` SET `expire` = '0', `membership` = '0' WHERE `id` = :id");
				$SQL -> execute(array(':id' => $id));
				$update = true;
        $membership = $_POST['plan'];
			}
			else
			{
				$getPlanInfo = $odb -> prepare("SELECT `unit`,`length` FROM `plans` WHERE `id` = :plan");
				$getPlanInfo -> execute(array(':plan' => $_POST['plan']));
				$plan = $getPlanInfo -> fetch(PDO::FETCH_ASSOC);
				$unit = $plan['unit'];
				$length = $plan['length'];
        $newExpire = strtotime("+{$length} {$unit}");
      
        
				$updateSQL = $odb -> prepare("UPDATE `users` SET `expire` = :expire, `membership` = :plan WHERE `id` = :id");
        $updateSQL -> execute(array(':expire' => $newExpire, ':plan' => $_POST['plan'], ':id' => $id)); //ESTE NAO DÁ
				$update = true;
        $membership = $_POST['plan'];

			}
    }

		if ($status != $_POST['status'])
		{
			$SQL = $odb -> prepare("UPDATE `users` SET `status` = :status WHERE `id` = :id");
      $SQL -> execute(array(':status' => $_POST['status'], ':id' => $id));
			$update = true;
			$status = $_POST['status'];
		}
		if ($update == true)
		{
			echo '<center><div class="Sucess"><p><strong>SUCCESS: </strong>Updated</p></div><br>';
		}
		else
		{
			echo '<center><div class="banned"><p><strong>UPDATE: </strong>Nothing updated</p></div><br>';
		}
		if (!empty($errors))
		{
			echo '<div class="nNote nFailure hideit"><p><strong>ERROR:</strong><br />';
			foreach($errors as $error)
			{
				echo '-'.$error.'<br />';
			}
			echo '</div>';
		}
	   }
	   ?>
        <form action="" class="form" method="POST">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="../images/icons/dark/list.png" alt="" class="titleIcon" /><h5>Edit User</h5></div>
                    <div class="formRow">
                        <label>Username</label>
                        <div class="formRight"><input name="username" style="width:200px;height:25px;" type="text" value="<?php echo $username;?>" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label for="labelFor">Password</label>
                        <div class="formRight"><input name="password" style="width:200px;height:25px;" type="text" input type="text" value="" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Email</label>
                        <div class="formRight"><input name="email" style="width:200px;height:25px;" type="text" value="<?php echo htmlentities($email);?>" /></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Rank</label>
                        <div class="formRight">
                            <select name="rank" style="width:200px;height:25px;">
							<?php
							function selectedR($check, $rank)
							{
								if ($check == $rank)
								{
									return 'selected="selected"';
								}
							}
							?>
                                <option value="0" <?php echo selectedR(0, $rank); ?> >User</option>
                                <option value="1" <?php echo selectedR(1, $rank); ?> >Admin</option>
                            </select>           
                        </div>             
                    </div>

                    <div class="formRow">
                        <label>Membership</label>
                        <div class="formRight">
                            <select name="plan" style="width:200px;height:25px;">
							<option value="0">No Membership</option>
							<?php 
								$SQLGetMembership = $odb -> query("SELECT * FROM `plans`");
								while($memberships = $SQLGetMembership -> fetch(PDO::FETCH_ASSOC))
								{
									$mi = $memberships['id'];
                  $mn = $memberships['name'];
									$selectedM = ($mi == $membership) ? 'selected="selected"' : '';
									echo '<option value="'.$mi.'" '.$selectedM.'>'.$mn.'</option>';
                }
         
							?>
                            </select>           
                        </div>             
                    </div>         
                    
                   
                    </div>
                    <div class="formRow">
                        <label>Status</label>
                        <div class="formRight">
                            <select name="status" style="width:200px;height:25px;"">
							<?php
							function selectedS($check, $rank)
							{
								if ($check == $rank)
								{
									return 'selected="selected"';
								}
							}
							?>
                                <option value="0" <?php echo selectedS(0, $status); ?>>Active</option>
                                <option value="1" <?php echo selectedS(1, $status); ?>>Banned</option>
                            </select>           
                        </div>             
                    </div>
					<div class="formRow">
                        <br>
                        <button  name="updateBtn" class="logout" style="background-color:<?php echo $row['color']; ?> !important; height:40px;width:125px;">Update User</button>
<br><br>
						</form>
						<form action="" method="post" class="form">
                       <button name="rBtn" class="logout" style="background-color:<?php echo $row['color']; ?> !important; height:40px;width:125px;">Remove User</button>

                    </div>
                    
                </div>
            </fieldset>
		
    </div>

    
    </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
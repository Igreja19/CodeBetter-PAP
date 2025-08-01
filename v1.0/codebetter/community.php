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

$path    = 'projects/'.@$_SESSION['username'];
$files = scandir($path);
@$search = $_GET['search'];

$query10 = mysqli_query($conn, "SELECT * FROM community WHERE projectname LIKE '$search%' LIMIT 6");
$row10 = mysqli_num_rows($query10);
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Community - CodeBetter</title>
    <link rel="stylesheet" type="text/css" href="./css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="./css/projects.css">
        	    <link rel="stylesheet" type="text/css" href="./css/free-specific.css">
    <link href="./css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="./css/shepherd-theme-default.css">
    <style>
		#createProject input{
			width: 50%;
			border-radius: 0px;
			border: 1px solid #ccc;
			height: 40px;
			font-size: 18px;
			padding-left: 5px;
		}
		#createProject label{
			display: inline-block;
		}
		/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  width:100%;
  left: 0%;
  margin-left: 0%;
  top: -20%;
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  transition: 1s;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  margin-top: 10%;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
  height: 30%;
  transition: 1s;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

body {

	background-image: url("<?= $row['wallpaper']; ?>") !important; 

}

#projectitem:hover {
	background-color:<?php echo $row['color']; ?>;
	padding:5px;
	color:white;
}

.card {
  display: inline-block;
  float: left; /** optional, better alignment for multi-row use cases -> or use flexbox */ 
  background: #fff;
  width: 300px;
  height:275px;
  box-shadow: 0 0 2px 0 rgba(0,0,0,.15), 0 0 4px 0 rgba(0,0,0,.2), 0 12px 12px 0 rgba(0,0,0,.15);
  margin: 0.5rem 1rem;
  transition: box-shadow .2s ease-in-out; 
}

/* Prevent the text contents of draggable elements from being selectable. Also from Elements which are explicit not draggable */


.card:hover {
  box-shadow: 0 0 18px 0 rgba(0,0,0,.1), 0 0 36px 0 rgba(0,0,0,.15), 0 36px 36px 0 rgba(0,0,0,.2);
}

.card > img { padding: 0; margin: 0; }
.card-text { padding: 0.75rem; }
.card-text > h3 { 
  margin: 0 0 0.25rem 0; 
  font-size: 1rem; 
  line-height: 1.5rem;
  font-weight: 600;
  cursor: pointer;
  transition: color .2s ease-in-out;
}
.card-text > h3:hover { color: <?php echo $row['color']; ?>; }
.card-text > span { 
  margin: 0; 
  font-size: 0.8125rem; 
  line-height: 1rem;
  font-weight: 200;
}

.card-placeholder {position: fixed; display: inline-block; background: #ddd; }
.card.moving { box-shadow: 0 0 2px 0 rgba(0,0,0,0), 0 0 4px 0 rgba(0,0,0,0), 0 12px 12px 0 rgba(0,0,0,0); }

.card-head{
  background: #eee;
  padding: 2.5rem 1rem;
  text-align: center;
  font-family: Menlo, "Courier New";
  position: relative;
}
	</style>
</head>

<body>
<section class="projects">
<table>
<form action="search.php" method="GET">
<input type="text" id="search" name="search" placeholder="Search here ..." style="margin-top:10px;margin-left:10px; width: 25%;padding: 12px 20px;
    background: rgba(0, 0, 0, .5);
    color:White;
  box-sizing: border-box;
  border: 0px solid ;
  border-radius: 4px;"></input>
  <input type="submit" value="Search" style=" background-color: <?php echo $row['color']; ?>;
  border: 0px solid;
  box-sizing: border-box;
  color: white;
  padding: 12px 20px;
  border-radius:4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  cursor: pointer;display:inline-block;"> 
  </form>
  <a href="projects.php"><input type="submit" value="Go Back" style=" background-color: grey;
  border: 0px solid;
  display:inline-block;
  box-sizing: border-box;
  color: white;
  padding: 12px 20px;
  border-radius:4px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  cursor: pointer;"> 	</a>
    </div>
		
	
		<div class="profile">
			
		<a href="profile.php"> <div class="panelFrame" style="margin-left:-55px;">
					<button class="config" title="Control Panel">
        								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="24" height="24"viewBox="0 0 172 172"style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M160.01504,77.10416l-5.55904,-1.38976c-0.77056,-5.17032 -2.1156,-10.21336 -4.01448,-15.04312l4.1108,-3.9732c2.22224,-2.14656 2.69696,-5.51776 1.1524,-8.20784l-2.36672,-4.0936c-1.548,-2.6832 -4.70936,-3.94912 -7.68152,-3.10976l-5.56936,1.59272c-3.23704,-4.05576 -6.9144,-7.72968 -10.96672,-10.96672l1.59272,-5.56592c0.84968,-2.97216 -0.42656,-6.13008 -3.10288,-7.67808l-4.10048,-2.36672c-2.6832,-1.548 -6.05784,-1.06984 -8.20096,1.1524l-3.98008,4.1108c-4.83664,-1.89888 -9.87624,-3.24392 -15.03968,-4.01104l-1.3932,-5.57968c-0.75336,-3.00312 -3.44344,-5.09464 -6.53256,-5.09464h-4.73c-3.09256,0 -5.7792,2.09152 -6.52912,5.09464l-1.3932,5.56936c-5.17032,0.77056 -10.20992,2.1156 -15.03968,4.01448l-3.97664,-4.10736c-2.14312,-2.22224 -5.51088,-2.69352 -8.20784,-1.15584l-4.10048,2.36672c-2.67976,1.548 -3.956,4.70592 -3.10288,7.67808l1.59272,5.56248c-4.05232,3.23704 -7.72968,6.9144 -10.96672,10.96672l-5.5728,-1.59272c-2.98248,-0.8428 -6.13352,0.43 -7.67464,3.10632l-2.36672,4.10048c-1.54456,2.67976 -1.06984,6.0544 1.1524,8.20096l4.11424,3.97664c-1.89888,4.82976 -3.24392,9.8728 -4.01448,15.04312l-5.5556,1.38976c-3.01,0.75336 -5.11184,3.44 -5.11184,6.54288v4.73c0,3.09944 2.0984,5.78608 5.09464,6.52568l5.56936,1.3932c0.77056,5.17032 2.1156,10.21336 4.01448,15.04312l-4.1108,3.9732c-2.22224,2.15 -2.69696,5.5212 -1.1524,8.20784l2.36672,4.0936c1.548,2.6832 4.70592,3.95256 7.68152,3.10976l5.56936,-1.59272c3.23704,4.05576 6.9144,7.72968 10.96672,10.96672l-1.59272,5.56592c-0.84968,2.97216 0.42656,6.13008 3.10288,7.67808l4.10048,2.36672c2.69008,1.548 6.06128,1.07672 8.20096,-1.1524l3.98008,-4.1108c4.83664,1.89888 9.87624,3.24392 15.03968,4.01104l1.3932,5.57968c0.75336,3.00312 3.44344,5.09464 6.52912,5.09464h4.73c3.09256,0 5.7792,-2.09496 6.52912,-5.09808l1.3932,-5.56592c5.16344,-0.77056 10.20648,-2.1156 15.04312,-4.01448l3.9732,4.10736c2.14656,2.22568 5.51776,2.69696 8.20784,1.15584l4.10048,-2.36672c2.67976,-1.548 3.956,-4.70592 3.10288,-7.67808l-1.59272,-5.56248c4.05232,-3.23704 7.72968,-6.9144 10.96672,-10.96672l5.5728,1.59272c2.97904,0.8428 6.13352,-0.43 7.67464,-3.10632l2.36672,-4.10048c1.54456,-2.67976 1.06984,-6.0544 -1.1524,-8.20096l-4.11424,-3.97664c1.89888,-4.83664 3.24736,-9.87968 4.01448,-15.04312l5.5556,-1.38976c3.01344,-0.75336 5.11528,-3.44 5.11528,-6.53944v-4.73c0,-3.10288 -2.0984,-5.78608 -5.10496,-6.53256zM44.32096,102.1164c-1.93672,-5.0052 -3.04096,-10.42664 -3.04096,-16.1164c0,-5.68976 1.10424,-11.1112 3.04096,-16.1164l21.3968,12.35304c-0.2236,1.2212 -0.35776,2.4768 -0.35776,3.76336c0,1.28656 0.13416,2.54216 0.35776,3.76336zM79.12,130.1352c-11.24192,-1.74064 -21.09752,-7.62648 -27.92936,-16.09576l21.41056,-12.35992c1.90576,1.63056 4.1108,2.9068 6.5188,3.75992zM79.12,66.56056c-2.41144,0.85312 -4.61648,2.12936 -6.5188,3.75992l-21.41056,-12.35992c6.83184,-8.46928 16.69088,-14.35512 27.92936,-16.09576zM92.88,41.8648c11.24192,1.74064 21.09752,7.62648 27.92936,16.09576l-21.41056,12.35992c-1.90576,-1.63056 -4.1108,-2.9068 -6.5188,-3.75992zM92.88,130.1352v-24.69576c2.41144,-0.85312 4.61648,-2.12936 6.5188,-3.75992l21.41056,12.35992c-6.83184,8.46928 -16.69088,14.35512 -27.92936,16.09576zM127.67904,102.1164l-21.3968,-12.35304c0.2236,-1.2212 0.35776,-2.4768 0.35776,-3.76336c0,-1.28656 -0.13416,-2.54216 -0.35776,-3.76336l21.3968,-12.35304c1.93672,5.0052 3.04096,10.42664 3.04096,16.1164c0,5.68976 -1.10424,11.1112 -3.04096,16.1164z"></path></g></g></svg>					</button>

    			    </button>
				</div></a>

			
			
			<div class="profileFrame">
				<button class="profile-pic" title="Profile">
					<svg style="width:24px;height:24px" viewBox="0 0 24 24">
            			<path fill="#FFF" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path>
            	    </svg>
				</button>
				
				<div class="profile-stuff" style="display: none;">
			        <div class="profile-info">
			            <div class="user-photo" style="background:url(<?= $row['image']; ?>);background-size:100%;"></div> 
			            <p class="username"><?= $row['username']; ?>
</p>
<?php
			$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name` FROM `users`, `plans` WHERE `plans`.`id` = `users`.`membership` AND `users`.`id` = :id");
			$plansql -> execute(array(":id" => $_SESSION['ID']));
			$rowmembership = $plansql -> fetch(); ?>

			            <p class="role"><?php echo $rowmembership['name']; ?></p>
			        </div>
			        
			        <div class="connection-type">
			            Connected By <span>GitHub</span>
			        </div>
			        
			        <a href="logout.php">
    			        <button class="logout" style="background-color:<?php echo $row['color']; ?>">
    			           Leave CodeBetter
    			        </button>
			        </a>
			    </div> 
			</div>
            </table>
	
		</div>
	</header>
<div id="center" style="text-align:center;item-align:center;margin-left:19%;width:1200px;">
<br><br><br><br>

    <?php while($row10=mysqli_fetch_assoc($query10)){
?>
<a href="projects/<?php echo $row10['username'];?>/<?php echo $row10['projectname']; ?>" style="text-decoration:none;color:black;">
 <div class="card" draggable="true">
        <img width="300" height="200" src="<?php echo $row10['image'] ?>" draggable="false"/>
        <div class="card-text">
          <h3><?php echo $row10['projectname']; ?></h3>
          <span>Made By: <?php echo $row10['username']; ?></span>
        </div>
    </div> </a> 

<?php }
?>

    </div>

<script src='https://code.jquery.com/jquery-3.4.1.js' integrity='sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=' crossorigin='anonymous'></script>
<script src="./css/jquery-3.2.0.min.js.transferir" type="text/javascript"></script>
<script src="./css/jquery.easing.js.transferir"></script>
<script>var service = 'GitHub'; var base_url = '';</script>
<script>var modal_profile = '';</script>
<script src="./css/selectize.js.transferir" type="text/javascript"></script>
<script src="./css/jquery-ui.min.js.transferir" type="text/javascript"></script>
<script src="./css/typed.min.js.transferir" type="text/javascript" charset="utf-8"></script>
<!--AQ WORK-->

<script src="./css/projects.js.transferir" type="text/javascript"></script>
<!--AQ N WORK-->

<script src="./css/jquery.easing.js.transferir" type="text/javascript"></script>
<script src="./css/jqueryFileTree.js.transferir" type="text/javascript"></script>
<script type="text/javascript" src="./css/jquery.mask.min.js.transferir"></script>
<script type="text/javascript" src="./css/mask-config.js.transferir"></script>

</body></html>
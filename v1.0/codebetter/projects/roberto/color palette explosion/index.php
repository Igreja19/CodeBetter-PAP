<?php
session_start();
require_once '../../../includes/db.php';
require_once '../../../includes/init.php';
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
  $_SESSION['projectname'] = basename(dirname(__FILE__));
  $projectzname = basename(dirname(__FILE__));
  $projectzname2 = basename(dirname(dirname(__FILE__)));
  $userrname = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='".@$_SESSION['username']."'");
$row = mysqli_fetch_assoc($query);
$query2 = mysqli_query($conn, "SELECT * FROM community WHERE username = '$userrname' AND projectname = '$projectzname'"); 
$row2 = mysqli_num_rows($query2);
$query3 = mysqli_query($conn, "SELECT * FROM community WHERE projectname = '$projectzname'"); 
$row3 = mysqli_fetch_assoc($query3);
$SQLGetCommunity = $odb -> query("SELECT * FROM `community` WHERE projectname ='$projectzname'");
			while ($getInfo = $SQLGetCommunity -> fetch(PDO::FETCH_ASSOC))
			{
				$idcm = $getInfo['id'];
				$usercm = $getInfo['username'];
				@$projectnamecm = $getInfo['projectname'];
        $imagecm = $getInfo['image'];
			}
     // if($_SERVER['REQUEST_METHOD'] === "POST"){
      //  $htmldata = $_POST['html'];
      //  $fileOpen = fopen("html.txt", "w"); //ABRE O FICHEIRO
      //  $toWrite = html_entity_decode($htmldata); //PEGA O VALOR DA SUA TEXTAREA E PASSA AI
      //  fwrite($fileOpen, $toWrite); //SALVA O CONTEUDO NO FICHEIRO ABERTO
      //  fclose($fileOpen); //FECHA O FICHEIRO
    //  }	    
?>
<!doctype html>
<html>

<head>
<meta http-equiv="content-type" 
content="text/html;charset=utf-8" />
  <title>CodeBetter</title>
  <style>
    :root {
      --grey: #343434;
      --yellow: cyan;
    }

    html {
      box-sizing: border-box;
      font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", Tahoma,
        Sans-Serif;
      font-weight: normal;
      /* color: #272727; */
      text-shadow: 0 2px 0 rgba(0, 0, 0, 0.07);
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    body {
      margin: 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: normal;
      margin: 0;
      font-size: 1.5em;
    }

    .codebetter {
      display: grid;
      grid-template-rows: auto 1fr 1fr auto;
      height: 100vh;
    }

    .codebetter>* {
      color: white;
    }

    /* Pen Header - Start */

    .pen {
      display: grid;
      grid-template-columns: 1fr;
      grid-auto-flow: column;
      align-items: center;
      grid-gap: 10px;
      background: black;
      padding: 10px;
      border-bottom: 5px solid var(--grey);
    }

    .pen img {
      border-radius: 50%;
    }

    .pen__details {
      display: grid;
      grid-template-columns: auto 1fr;
      grid-gap: 10px;
    }

    .pen__details .logo {
      width: 40px;
      align-self: center;
    }

    .pen__author {
      font-size: 12px;
    }

    .author__intro {
      text-transform: uppercase;
      color: #a6a6a6;
    }


    .button {
      background: var(--grey);
      border: 0;
      padding: 10px;
      border-radius: 5px;
      font-size: 15px;
      color: white;
      position: relative;
      cursor: pointer;
    }

    .button--dirty::before {
      /* border-top: 2px solid var(--yellow); */
      display: block;
      background: var(--yellow);
      content: '';
      height: 3px;
      width: calc(100% - 4px);
      top: 3px;
      left: 2px;
      position: absolute;
    }

    /* Pen Header - End */

    /* Settings Footer - Start */
    .settings {
      background: var(--grey);
      padding: 10px;
    }

    .button--small {
      background: black;
      padding: 5px 10px;
      font-size: 12px;
    }

    /* Settings Footer - End */

    .preview {
      display: grid;
    }

    .preview>* {
      width: 100%;
      height: 100%;
      /* grid-column: 1 / -1; */
      /* grid-row: 1 / -1; */
    }

    /* Code Editor - Start */
    .code {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      background: #1b2b34;
      border-top: 3px solid #1b2b34;
      text-decoration: none; 
    }

    .editor__header {
      display: grid;
      grid-template-columns: auto 1fr auto;
      align-items: center;
      padding: 5px;
      grid-gap: 5px;
      background: rgba(0, 0, 0, 0.1);
    }

    .editor__settings {
      background: var(--grey);
      padding: 0px;
      width: 25px;
      font-size: 120%;
      text-decoration: none;
    }

    .editor {
      display: grid;
      grid-template-rows: auto 1fr;
      border-left: 20px solid var(--grey);
      border-bottom: 20px solid var(--grey);
      text-decoration: none;
    }

    .editor__code {
      display: grid;
      grid-template-columns: auto 1fr;
      text-decoration: none;
    }

    .editor__gutter {
      margin: 5px;
    }

    .editor__number {
      display: block;
      font-size: 15px;
    }

    .editor__input {
      background: none;
      resize: none;
      border: 0;
      color: grey;
      padding: 5px 10px;
      line-height: 19px;
      font-size: 15px;
      outline: none;
      text-decoration: none;
    }
    .editor_js_function{
      color: rgb(52, 93, 228);
    }
    /* Code Editor - End */
  </style>
</head>

<body>

  <div class="codebetter" id="codebetter">
    <header class="pen" style="background-color: #1A2B33;">
      <div class="pen__details">
        <div class="pen__intro">
        <h1>
        <?php if ($row2 == '1') {?></h1>
          <p class="pen__author"> <span class="author__intro">code made by </span> <?php echo $row['username']; ?></p>
          <?php } else {?>
          <p class="pen__author"> <span class="author__intro">code made by </span> <?php echo $row3['username']; ?></p>
          <?php } ?>
        </div>
      </div>
      <?php 
        if ($row2 >= '1') {      
      ?>
     <button class="button button--dirty" style="background-color:#454857"  onclick="myFunction()">&#x2601 Save</button> 
      <button type="submit" class="button" id="privatesave" style="background-color:#454857" onclick="myFunction2();">&#x2601 Save As Private</button>
      <input type="hidden" name="privatesave" value="true">      
      <button class="button" style="background-color:#454857" id="viewfullscreen" value="viewfullscreen">&#x263C
        View Fullscreen</button>
        <a href='../../'><button class="button" style="background-color:#454857" id="btn-settings">→ Go Back</button></a>
        <?php 
      }
        elseif($row2 == '0' && $projectzname2 == $_SESSION['username']){
      ?>
      <button class="button button--dirty" style="background-color:#454857"  onclick="myFunction()">&#x2601 Save</button> 
      <button type="submit" class="button" id="privatesave" style="background-color:#454857" onclick="myFunction2();">&#x2601 Save As Private</button>
      <input type="hidden" name="privatesave" value="true">      
      <button class="button" style="background-color:#454857" id="viewfullscreen" value="viewfullscreen">&#x263C
        View Fullscreen</button>
        <a href='../../'><button class="button" style="background-color:#454857" id="btn-settings">→ Go Back</button></a>
        
      <?php } else { ?>
      <button class="button" style="background-color:#454857" id="viewfullscreen" value="viewfullscreen">&#x263C
        View Fullscreen</button>
        <a href='../../../community.php'><button class="button" style="background-color:#454857" id="btn-settings">→ Go Back</button></a>
     <?php 
      }
     ?>
  
  <form action="save.php" id="saveform" name="saveform" method="POST">

      <img src="<?php echo '../../../'.$row['image']; ?>"
        height="44" style="height:50px;width:50px;">
    </header>
    <section class="code" id="codeeditorform">
      <div class="editor">
        <header class="editor__header">
          <button class="button button--small editor__settings">&#x2699</button>
          <h3 class="editor__heading">HTML</h3>
        </header>
        <div class="editor__code">
          <div class="editor__gutter">
          </div>

          <textarea id="html" name="html" class="editor__input"
            placeholder="<p>Oh Hey There, Welcome to CodeBetter!</p>"><?php echo file_get_contents("html.txt"); ?></textarea>
        </div>
      </div>
      <div class="editor">
        <header class="editor__header">
          <button class="button button--small editor__settings" >&#x2699</button>
          <h3 class="editor__heading">CSS</h3>
        </header>
        <div class="editor__code">
          <div class="editor__gutter">
          </div>

          <textarea id="css" name="css" class="editor__input" placeholder=" .codebetter {is: cool;}"><?php echo file_get_contents("css.txt"); ?></textarea>
        </div>

      </div>
      <div class="editor">
        <header class="editor__header">
          <button class="button button--small editor__settings">&#x2699</button>
          <h3 class="editor__heading">JS</h3>
        </header>
        <div class="editor__code">
          <div class="editor__gutter">
          </div>
          <textarea id="js" name="js" class="editor__input" placeholder="const raphael = 'nice';"><?php echo file_get_contents("js.txt"); ?></textarea>
        </div>
        <!-- Script do Code Editor -->
        </form>
      </div>
    </section>
    </form>
    <script>
function myFunction() {
  document.getElementById("saveform").submit();
}


function myFunction2() {
  htmldata = document.getElementById('html').value;
  console.log(htmldata);
  cssdata = document.getElementById('css').value;
  console.log(cssdata);
  jsdata = document.getElementById('js').value;
  console.log(jsdata);

  $.ajax({
        url: "save.php",
        type: "post",
        data: {htmldata:htmldata, cssdata:cssdata, jsdata:jsdata,privatesave:true} ,
        success: function (response) {
          if (response == '"You cant save. Try upgrade your plan"') {
          alert(response);
        } else {
          alert('Successfully Saved');
        }
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });

};
</script>
    <section class="preview" id="codepreview">
    <iframe id="code" name="code" src="" frameborder="0" style="height:100%"></iframe>
    </section>
    <script src='https://code.jquery.com/jquery-3.4.1.js' integrity='sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=' crossorigin='anonymous'></script>
    
    <script type="text/javascript" src="app.js"></script>
    <script>


      $("#viewfullscreen").click(() => {
        if($("#viewfullscreen").val() == "viewfullscreen"){
          $("#codeeditorform").css({'display':'none'});
          $("#codebetter").css({'height': '100em'});
          $("body").css({'overflow-y': 'hidden'});  
          $("#viewfullscreen").html("&#x263C  Back to Editor");
          $("#viewfullscreen").val("backtoeditor");
        }else if($("#viewfullscreen").val() == "backtoeditor"){
          $("#codeeditorform").css({'display':'grid'});
          $("#codebetter").css({'height': '100vh'});
          $("body").css({'overflow-y': 'normal'});  
          $("#viewfullscreen").html("&#x263C  View Fullscreen");
          $("#viewfullscreen").val("viewfullscreen");
        }
      })
    /*  let myString = "function";
      setInterval(() => { */
       /*  let string = "a";
      let inputJS = document.getElementById('js').value;
      console.log(inputJS)
      if(inputJS.includes(string)){
        let newValor = inputJS.replace(string, "<span class='editor_js_function'>"+string+"</span>" + inputJS.replace(string, ""));
        inputJS = newValor; */

       /* var cc = document.getElementById("js").value;
      var cc_r = [];
      cc_r.push(cc);

      if(cc_r.includes(cc)){
        console.log("TEM");
        cc_r.forEach(content2 => {
          var new_cc = content2;
        })
        
        var cc_new2 = new_cc.split(" ");
        cc_new2.forEach(content => {
          if(content == "function()"){
            alert("TEM");
          }
        })
      }
      
      }, 100 );
*/
      
       
// })
//         if($("#js").val().includes("function")){
//           $(this).css({"color":"green", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("(")){
//           $(this).css({"color":"red", "text-decoration": "none"});
//         }
//         if($("#js").val().includes(")")){
//           $(this).css({"color":"red", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("let")){
//           $(this).css({"color":"firebrick", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("{")){
//           $(this).css({"color":"pink", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("}")){
//           $(this).css({"color":"pink", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("[")){
//           $(this).css({"color":"white", "text-decoration": "none"});
//         }
//         if($("#js").val().includes("]")){
//           $(this).css({"color":"white", "text-decoration": "none"});
//         }

    </script>

  </div>
</script>
</body>

</html>
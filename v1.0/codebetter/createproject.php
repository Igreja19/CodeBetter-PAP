<?php
session_start();
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$_SESSION['projectname'] = $_POST['projectname'];
$projectname = $_SESSION['projectname'];
$username = $_SESSION['username'];

    if (!file_exists('projects/'.$username)) {    //Se não existir projects/pacifico cria
        $filefound = '0';                         
        } else { //Se existir projects/pacifico então
            if (file_exists('projects/'.$username.'/'.$projectname)) { //Se existir o projeto que o utilizador inseriu
                echo("<script>alert('Project already exist');</script>");
                echo("<script>window.location.href='projects.php'</script>");
            }
                else {
                    if (empty($_POST["projectname"] || is_null($_POST['projectname']))) {
                        echo("<script>alert('Project cant  be created');</script>");
                        echo("<script>window.location.href='projects.php'</script>");

                    }else{
                    if (!preg_match($pattern, $_POST["projectname"]) ) {

                    $dir = "projects/".$username."/".$_SESSION['projectname']."/index.php";
                    $dir2 = "projects/".$username."/".$_SESSION['projectname']."/app.js";
                    $dir3 = "projects/".$username."/".$_SESSION['projectname']."/save.php";
                    $file1 = "projects/".$username."/".$_SESSION['projectname']."/html.txt";
                    $file2 = "projects/".$username."/".$_SESSION['projectname']."/css.txt";
                    $file3 = "projects/".$username."/".$_SESSION['projectname']."/js.txt";
        
                    mkdir("projects/".$username."/".$_SESSION['projectname']);
                    copy('template/index.php', $dir);
                    copy('template/app.js', $dir2);
                    copy('template/save.php', $dir3);
                    copy('template/html.txt', $file1);
                    copy('template/css.txt', $file2);
                    copy('template/js.txt', $file3);
        
                   header("location: $dir");
                } else {
                    echo("<script>alert('Project cant contain special chars');</script>");
                    echo("<script>window.location.href='projects.php'</script>");

                }
            }
                }
           
        

        }
        


?>
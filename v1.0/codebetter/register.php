<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'includes/db.php';
  require 'includes/init.php' ?>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style type="text/css" data-tippy-stylesheet="">
    .tippy-iOS {
      cursor: pointer !important;
      -webkit-tap-highlight-color: transparent
    }

    .tippy-popper {
      transition-timing-function: cubic-bezier(.165, .84, .44, 1);
      max-width: calc(100% - 8px);
      pointer-events: none;
      outline: 0
    }

    .tippy-popper[x-placement^=top] .tippy-backdrop {
      border-radius: 40% 40% 0 0
    }

    .tippy-popper[x-placement^=top] .tippy-roundarrow {
      bottom: -7px;
      bottom: -6.5px;
      -webkit-transform-origin: 50% 0;
      transform-origin: 50% 0;
      margin: 0 3px
    }

    .tippy-popper[x-placement^=top] .tippy-roundarrow svg {
      position: absolute;
      left: 0;
      -webkit-transform: rotate(180deg);
      transform: rotate(180deg)
    }

    .tippy-popper[x-placement^=top] .tippy-arrow {
      border-top: 8px solid #333;
      border-right: 8px solid transparent;
      border-left: 8px solid transparent;
      bottom: -7px;
      margin: 0 3px;
      -webkit-transform-origin: 50% 0;
      transform-origin: 50% 0
    }

    .tippy-popper[x-placement^=top] .tippy-backdrop {
      -webkit-transform-origin: 0 25%;
      transform-origin: 0 25%
    }

    .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=visible] {
      -webkit-transform: scale(1) translate(-50%, -55%);
      transform: scale(1) translate(-50%, -55%)
    }

    .tippy-popper[x-placement^=top] .tippy-backdrop[data-state=hidden] {
      -webkit-transform: scale(.2) translate(-50%, -45%);
      transform: scale(.2) translate(-50%, -45%);
      opacity: 0
    }

    .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=visible] {
      -webkit-transform: translateY(-10px);
      transform: translateY(-10px)
    }

    .tippy-popper[x-placement^=top] [data-animation=shift-toward][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(-20px);
      transform: translateY(-20px)
    }

    .tippy-popper[x-placement^=top] [data-animation=perspective] {
      -webkit-transform-origin: bottom;
      transform-origin: bottom
    }

    .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=visible] {
      -webkit-transform: perspective(700px) translateY(-10px) rotateX(0);
      transform: perspective(700px) translateY(-10px) rotateX(0)
    }

    .tippy-popper[x-placement^=top] [data-animation=perspective][data-state=hidden] {
      opacity: 0;
      -webkit-transform: perspective(700px) translateY(0) rotateX(60deg);
      transform: perspective(700px) translateY(0) rotateX(60deg)
    }

    .tippy-popper[x-placement^=top] [data-animation=fade][data-state=visible] {
      -webkit-transform: translateY(-10px);
      transform: translateY(-10px)
    }

    .tippy-popper[x-placement^=top] [data-animation=fade][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(-10px);
      transform: translateY(-10px)
    }

    .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=visible] {
      -webkit-transform: translateY(-10px);
      transform: translateY(-10px)
    }

    .tippy-popper[x-placement^=top] [data-animation=shift-away][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(0);
      transform: translateY(0)
    }

    .tippy-popper[x-placement^=top] [data-animation=scale] {
      -webkit-transform-origin: bottom;
      transform-origin: bottom
    }

    .tippy-popper[x-placement^=top] [data-animation=scale][data-state=visible] {
      -webkit-transform: translateY(-10px) scale(1);
      transform: translateY(-10px) scale(1)
    }

    .tippy-popper[x-placement^=top] [data-animation=scale][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(-10px) scale(.5);
      transform: translateY(-10px) scale(.5)
    }

    .tippy-popper[x-placement^=bottom] .tippy-backdrop {
      border-radius: 0 0 30% 30%
    }

    .tippy-popper[x-placement^=bottom] .tippy-roundarrow {
      top: -7px;
      -webkit-transform-origin: 50% 100%;
      transform-origin: 50% 100%;
      margin: 0 3px
    }

    .tippy-popper[x-placement^=bottom] .tippy-roundarrow svg {
      position: absolute;
      left: 0;
      -webkit-transform: rotate(0);
      transform: rotate(0)
    }

    .tippy-popper[x-placement^=bottom] .tippy-arrow {
      border-bottom: 8px solid #333;
      border-right: 8px solid transparent;
      border-left: 8px solid transparent;
      top: -7px;
      margin: 0 3px;
      -webkit-transform-origin: 50% 100%;
      transform-origin: 50% 100%
    }

    .tippy-popper[x-placement^=bottom] .tippy-backdrop {
      -webkit-transform-origin: 0 -50%;
      transform-origin: 0 -50%
    }

    .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=visible] {
      -webkit-transform: scale(1) translate(-50%, -45%);
      transform: scale(1) translate(-50%, -45%)
    }

    .tippy-popper[x-placement^=bottom] .tippy-backdrop[data-state=hidden] {
      -webkit-transform: scale(.2) translate(-50%);
      transform: scale(.2) translate(-50%);
      opacity: 0
    }

    .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=visible] {
      -webkit-transform: translateY(10px);
      transform: translateY(10px)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=shift-toward][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(20px);
      transform: translateY(20px)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=perspective] {
      -webkit-transform-origin: top;
      transform-origin: top
    }

    .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=visible] {
      -webkit-transform: perspective(700px) translateY(10px) rotateX(0);
      transform: perspective(700px) translateY(10px) rotateX(0)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=perspective][data-state=hidden] {
      opacity: 0;
      -webkit-transform: perspective(700px) translateY(0) rotateX(-60deg);
      transform: perspective(700px) translateY(0) rotateX(-60deg)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=visible] {
      -webkit-transform: translateY(10px);
      transform: translateY(10px)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=fade][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(10px);
      transform: translateY(10px)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=visible] {
      -webkit-transform: translateY(10px);
      transform: translateY(10px)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=shift-away][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(0);
      transform: translateY(0)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=scale] {
      -webkit-transform-origin: top;
      transform-origin: top
    }

    .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=visible] {
      -webkit-transform: translateY(10px) scale(1);
      transform: translateY(10px) scale(1)
    }

    .tippy-popper[x-placement^=bottom] [data-animation=scale][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateY(10px) scale(.5);
      transform: translateY(10px) scale(.5)
    }

    .tippy-popper[x-placement^=left] .tippy-backdrop {
      border-radius: 50% 0 0 50%
    }

    .tippy-popper[x-placement^=left] .tippy-roundarrow {
      right: -12px;
      -webkit-transform-origin: 33.33333333% 50%;
      transform-origin: 33.33333333% 50%;
      margin: 3px 0
    }

    .tippy-popper[x-placement^=left] .tippy-roundarrow svg {
      position: absolute;
      left: 0;
      -webkit-transform: rotate(90deg);
      transform: rotate(90deg)
    }

    .tippy-popper[x-placement^=left] .tippy-arrow {
      border-left: 8px solid #333;
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
      right: -7px;
      margin: 3px 0;
      -webkit-transform-origin: 0 50%;
      transform-origin: 0 50%
    }

    .tippy-popper[x-placement^=left] .tippy-backdrop {
      -webkit-transform-origin: 50% 0;
      transform-origin: 50% 0
    }

    .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=visible] {
      -webkit-transform: scale(1) translate(-50%, -50%);
      transform: scale(1) translate(-50%, -50%)
    }

    .tippy-popper[x-placement^=left] .tippy-backdrop[data-state=hidden] {
      -webkit-transform: scale(.2) translate(-75%, -50%);
      transform: scale(.2) translate(-75%, -50%);
      opacity: 0
    }

    .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=visible] {
      -webkit-transform: translateX(-10px);
      transform: translateX(-10px)
    }

    .tippy-popper[x-placement^=left] [data-animation=shift-toward][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(-20px);
      transform: translateX(-20px)
    }

    .tippy-popper[x-placement^=left] [data-animation=perspective] {
      -webkit-transform-origin: right;
      transform-origin: right
    }

    .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=visible] {
      -webkit-transform: perspective(700px) translateX(-10px) rotateY(0);
      transform: perspective(700px) translateX(-10px) rotateY(0)
    }

    .tippy-popper[x-placement^=left] [data-animation=perspective][data-state=hidden] {
      opacity: 0;
      -webkit-transform: perspective(700px) translateX(0) rotateY(-60deg);
      transform: perspective(700px) translateX(0) rotateY(-60deg)
    }

    .tippy-popper[x-placement^=left] [data-animation=fade][data-state=visible] {
      -webkit-transform: translateX(-10px);
      transform: translateX(-10px)
    }

    .tippy-popper[x-placement^=left] [data-animation=fade][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(-10px);
      transform: translateX(-10px)
    }

    .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=visible] {
      -webkit-transform: translateX(-10px);
      transform: translateX(-10px)
    }

    .tippy-popper[x-placement^=left] [data-animation=shift-away][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }

    .tippy-popper[x-placement^=left] [data-animation=scale] {
      -webkit-transform-origin: right;
      transform-origin: right
    }

    .tippy-popper[x-placement^=left] [data-animation=scale][data-state=visible] {
      -webkit-transform: translateX(-10px) scale(1);
      transform: translateX(-10px) scale(1)
    }

    .tippy-popper[x-placement^=left] [data-animation=scale][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(-10px) scale(.5);
      transform: translateX(-10px) scale(.5)
    }

    .tippy-popper[x-placement^=right] .tippy-backdrop {
      border-radius: 0 50% 50% 0
    }

    .tippy-popper[x-placement^=right] .tippy-roundarrow {
      left: -12px;
      -webkit-transform-origin: 66.66666666% 50%;
      transform-origin: 66.66666666% 50%;
      margin: 3px 0
    }

    .tippy-popper[x-placement^=right] .tippy-roundarrow svg {
      position: absolute;
      left: 0;
      -webkit-transform: rotate(-90deg);
      transform: rotate(-90deg)
    }

    .tippy-popper[x-placement^=right] .tippy-arrow {
      border-right: 8px solid #333;
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
      left: -7px;
      margin: 3px 0;
      -webkit-transform-origin: 100% 50%;
      transform-origin: 100% 50%
    }

    .tippy-popper[x-placement^=right] .tippy-backdrop {
      -webkit-transform-origin: -50% 0;
      transform-origin: -50% 0
    }

    .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=visible] {
      -webkit-transform: scale(1) translate(-50%, -50%);
      transform: scale(1) translate(-50%, -50%)
    }

    .tippy-popper[x-placement^=right] .tippy-backdrop[data-state=hidden] {
      -webkit-transform: scale(.2) translate(-25%, -50%);
      transform: scale(.2) translate(-25%, -50%);
      opacity: 0
    }

    .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=visible] {
      -webkit-transform: translateX(10px);
      transform: translateX(10px)
    }

    .tippy-popper[x-placement^=right] [data-animation=shift-toward][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(20px);
      transform: translateX(20px)
    }

    .tippy-popper[x-placement^=right] [data-animation=perspective] {
      -webkit-transform-origin: left;
      transform-origin: left
    }

    .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=visible] {
      -webkit-transform: perspective(700px) translateX(10px) rotateY(0);
      transform: perspective(700px) translateX(10px) rotateY(0)
    }

    .tippy-popper[x-placement^=right] [data-animation=perspective][data-state=hidden] {
      opacity: 0;
      -webkit-transform: perspective(700px) translateX(0) rotateY(60deg);
      transform: perspective(700px) translateX(0) rotateY(60deg)
    }

    .tippy-popper[x-placement^=right] [data-animation=fade][data-state=visible] {
      -webkit-transform: translateX(10px);
      transform: translateX(10px)
    }

    .tippy-popper[x-placement^=right] [data-animation=fade][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(10px);
      transform: translateX(10px)
    }

    .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=visible] {
      -webkit-transform: translateX(10px);
      transform: translateX(10px)
    }

    .tippy-popper[x-placement^=right] [data-animation=shift-away][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }

    .tippy-popper[x-placement^=right] [data-animation=scale] {
      -webkit-transform-origin: left;
      transform-origin: left
    }

    .tippy-popper[x-placement^=right] [data-animation=scale][data-state=visible] {
      -webkit-transform: translateX(10px) scale(1);
      transform: translateX(10px) scale(1)
    }

    .tippy-popper[x-placement^=right] [data-animation=scale][data-state=hidden] {
      opacity: 0;
      -webkit-transform: translateX(10px) scale(.5);
      transform: translateX(10px) scale(.5)
    }

    .tippy-tooltip {
      position: relative;
      color: #fff;
      border-radius: .25rem;
      font-size: .875rem;
      padding: .3125rem .5625rem;
      line-height: 1.4;
      text-align: center;
      background-color: #333
    }

    .tippy-tooltip[data-size=small] {
      padding: .1875rem .375rem;
      font-size: .75rem
    }

    .tippy-tooltip[data-size=large] {
      padding: .375rem .75rem;
      font-size: 1rem
    }

    .tippy-tooltip[data-animatefill] {
      overflow: hidden;
      background-color: transparent
    }

    .tippy-tooltip[data-interactive],
    .tippy-tooltip[data-interactive] .tippy-roundarrow path {
      pointer-events: auto
    }

    .tippy-tooltip[data-inertia][data-state=visible] {
      transition-timing-function: cubic-bezier(.54, 1.5, .38, 1.11)
    }

    .tippy-tooltip[data-inertia][data-state=hidden] {
      transition-timing-function: ease
    }

    .tippy-arrow,
    .tippy-roundarrow {
      position: absolute;
      width: 0;
      height: 0
    }

    .tippy-roundarrow {
      width: 18px;
      height: 7px;
      fill: #333;
      pointer-events: none
    }

    .tippy-backdrop {
      position: absolute;
      background-color: #333;
      border-radius: 50%;
      width: calc(110% + 2rem);
      left: 50%;
      top: 50%;
      z-index: -1;
      transition: all cubic-bezier(.46, .1, .52, .98);
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden
    }

    .tippy-backdrop:after {
      content: "";
      float: left;
      padding-top: 100%
    }

    .tippy-backdrop+.tippy-content {
      transition-property: opacity;
      will-change: opacity
    }

    .tippy-backdrop+.tippy-content[data-state=visible] {
      opacity: 1
    }

    .tippy-backdrop+.tippy-content[data-state=hidden] {
      opacity: 0
    }

    .scrollbar {
      margin-left: 30px;
      float: left;
      height: 300px;
      width: 65px;
      background: #F5F5F5;
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow {
      min-height: 450px;
    }


    #style-5::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      background-color: #F5F5F5;
    }

    #style-5::-webkit-scrollbar {
      width: 10px;
      background-color: #F5F5F5;
    }

    #style-5::-webkit-scrollbar-thumb {
      background-color: #0ae;

      background-image: -webkit-gradient(linear, 0 0, 0 100%,
          color-stop(.5, rgba(255, 255, 255, .2)),
          color-stop(.5, transparent), to(transparent));
    }

    .failure {
  padding: 20px;
  background-color: #f44336;
  color: white;
}


.sucess {
  padding: 20px;
  background-color: #4CAF50;
  color: white;
}

.banned {
  padding: 20px;
  background-color: #ff9800;
  color: white;
}
  </style>

  <title>Welcome to CodeBetter | CodeBetter</title>
  <meta name="viewport" content="width=device-width">
  <meta name="theme-color" content="#0e1e25">
  <link rel="apple-touch-icon" sizes="180x180" href="https://www.CodeBetter.com/img/global/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="https://app.CodeBetter.com/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="https://app.CodeBetter.com/favicon-16x16.png" sizes="16x16">
  <link rel="stylesheet" href="./login_files/app.css">
</head>
<body>

  <div class="scrollbar" id="style-5">
    <div class="force-overflow"></div>
  </div>
  <svg style="position:absolute;bottom:0;z-index:-1" aria-hidden="true">
    <defs>
      <radialgradient id="logo-gradient" cx="0%" cy="0%" r="100%" fx="0%" fy="0%">
        <stop offset="0%" stop-color="#20C6B7"></stop>
        <stop offset="100%" stop-color="#4D9ABF"></stop>
      </radialgradient>

      <symbol id="logo" viewBox="0 0 400 400">
        <use xlink:href="#logomark" fill="url(#logo-gradient)"></use>
      </symbol>
      <symbol id="logo-mono" viewBox="0 0 400 400">
        <use xlink:href="#logomark" fill="#0E1E25"></use>
      </symbol>
    </defs>
  </svg>
  <div class="splash-screen">
    <div class="mkt page fixed center inverse">
      <div class="container">
        <svg aria-hidden="" width="50" height="50" class="rotate-loop">
          <use xlink:href="#logo"></use>
        </svg>
      </div>
    </div>
  </div>
  <div id="root" tabindex="-1">
    <div role="status" aria-live="polite" aria-atomic="true" class="visuallyhidden"></div>
    <div class="app">
      <header class="app-header inverse" role="banner">
        <div class="container">
          <div class="navbar">
            <ol class="nav Nav--breadcrumb" aria-label="Breadcrumb">
              <li>
                <svg aria-hidden="true" width="40" height="40">
                  <use xlink:href="#logo"></use>
                </svg>
                <span class="wordmark visuallyhidden">CodeBetter</span></a></li>
              <li></li>
            </ol>
            <ul class="nav">
              <li>
                <a class="active" href="login.php">Sign up</a></li>
              <li><a class="active action-link" href="login.php">Sign in</a></li>
            </ul>
          </div>

          <div class="navigation">
            <div class="navbar">
              <nav aria-label="Secondary navigation">
                <ul class="nav"></ul>
              </nav>
            </div>
          </div>
        </div>
      </header>
      <main id="main" class="app-main" role="main" tabindex="-1">
        <div class="mkt page inverse">
          <canvas class="bg-node-garden" width="1600" height="757"></canvas>
          <div class="container container-login">

            <header class="page-header">
              <svg class="page-logo" aria-hidden="true" width="50" height="50">
                <use xlink:href="#logo"></use>
              </svg>
                <h1 class="page-title">Welcome to CodeBetter</h1>
            </header>
            <div class="grid">
              <div>
                <div class="card">
                <?php
if ($user->LoggedIn()) {
  header('Location: projects.php');
  die();
}

if (isset($_POST['registerBtn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];
  $email = $_POST['email'];

  $errors = array();
  $checkUsername = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `username` = :username");
  $checkUsername -> execute(array(':username' => $username));
  $countUsername = $checkUsername -> fetchColumn(0);
  
  $checkemail = $odb -> prepare("SELECT COUNT(*) FROM `users` WHERE `email` = :email");
  $checkemail -> execute(array(':email' => $email));
  $countemail = $checkemail -> fetchColumn(0);

  if ($countUsername > 0)
  {
    $errors[] = 'Username is already taken';
  }
  if ($countemail > 0)
  {
    $errors[] = 'Email is already taken';
  }
  if (!ctype_alnum($username) || strlen($username) < 4 || strlen($username) > 15)
  {
    $errors[] = 'Username Must Be  Alphanumberic And 4-15 characters in length';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $errors[] = 'Email is invalid';
  }
  if (empty($username) || empty($password) || empty($rpassword) || empty($email))
  {
    $errors[] = 'Please fill in all fields';
  }
  if ($password != $rpassword)
  {
    $errors[] = 'Passwords do not match';
  }
  if (empty($errors))
  {
    $insertUser = $odb -> prepare("INSERT INTO `users` VALUES(NULL, :username, :password, :email, 'imgs/default.png', 'wallpapers/default.jpg', '#0182C3', 4, 0, 0, 0)");
    $insertUser -> execute(array(':username' => $username, ':password' => SHA1($password), ':email' => $email));
    mkdir("projects/".$username);
    echo '<div class="sucess"><p><strong>SUCCESS: </strong>User has been registered.  Redirecting....</p></div><meta http-equiv="refresh" content="3;url=login.php">';
  }
  else
  {
    echo '<div class="failure"><p><strong>ERROR:</strong><br />';
    foreach($errors as $error)
    {
      echo '-'.$error.'<br />';
    }
    echo '</div>';
  }
}
?>

                  <p>Sign up:</p>
                  <form action="register.php" method="POST">

                  <div class="btn-stack">
                    <input type="email" id="email" name="email" placeholder="Email" required></input>
                    <br><br><br>
                    <input type="text" id="username" name="username" placeholder="Username" maxlength="15" required></input>
                    <br><br><br>
                    <input type="password" placeholder="******" id="password" name="password" required></input>
                    <br><br><br>
                    <input type="password" placeholder="******" id="rpassword" name="rpassword" required></input>

                    <button type="submit" class="btn btn btn-provider btn-email" name="registerBtn" id="registerBtn" style="background-color:#1A2B33"><i class="fa fa-email"></i> Sign Up</button> </form>
                  </div>
                </div>
                <p><a class="subdued-link" href="login.php">Sign In</a></p>
              </div>

              <aside class="card card-drawer inverse">
                <div class="blurb">
                  <h2 class="section-label">About CodeBetter</h2>
                  <p class="blurb__title">CodeBetter Is ...</p>
                  <div class="blurb__body">
                    <p>An online code editor, learning environment, and community for front-end web development using HTML, CSS and JavaScript code.</p>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </main>
      <footer class="app-footer inverse" role="contentinfo">
        <div class="container">
          <nav class="navbar">
            <ul class="nav" aria-label="External links">
        </div>




</body>

</html>
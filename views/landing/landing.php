<?php
require("../../Includes/connection.php");
spl_autoload_register(function ($class)
{include"../../controllers/".$class.".php";});
$login = new LoginController();
$messages = new MsgController();
if(LoginController::logged_in()){
    LoginController::redirect_to("feed.php");
}
if(isset($_POST["submit"])){

    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $DBConn = new DBController();
    $userDBResult = $DBConn->runReadQuery("SELECT UserID, UserPassword FROM User WHERE UserID = '{$username}' LIMIT 1");
    $userDBResult = $DBConn->readResults;
         if (count($userDBResult)==1){
           if($login->logMeIn($userDBResult,$password)==1){
               if(isset($_SESSION['user_id'])){
                   LoginController::redirect_to("feed.php");
               }
           }
        }
}
else{
    if(isset($_GET['logout']) && $_GET['logout'] == 1){
        $messages->setMessage("You are now logged out");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/landing.css">

	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap|Heebo|Quicksand|Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">

	<title>ShortCircuit | landing</title>
</head>
<body>
<div id="wrapper"> 
		
		<header>
			<div class="sideBar"></div> 
		<div id="logo"><a href="#">ShortCircuit</a></div>
			<nav>
			<a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
			<ul>
				<li><a href="#"><i class="fas fa-home"></i></a></li>
				<li><a href="#categories"><i class="fas fa-compass"></i></a></li>
				<li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li> 
				<li><a href="#settings"><i class="fas fa-cog"></i></a></li>
			</ul>
			</nav>
			<div class="sideBar"></div> 
		</header> 
<div id="loginFrame">
<?php
if (!empty($messages->getMessage())){
    $msgs = $messages->getMessage();
    foreach ($msgs as $msg){
        echo "<p>". $msg. "</p>";
    }}
?>
<form action = "" method = "post">
                  <label>UserName</label><input type= text name="username" class="textbox"><br/><br/>
                  <label>Password</label><input type= password name="password" class="textbox"><br/><br/>
                  <input type="submit" value="Log in" class="button" class="button"><br/>
               </form>
</div>
</body>
</html>
<?php
require_once "templates/header.php";

if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "404";
}

switch($url){
    case 'inscription':
        require_once "views/signup.php";
        break;
    case 'connexion':
        require_once "views/login.php";
        break;
    case 'dashboard':
        require_once "views/dashboard.php";
        break;
    case 'creer_equipe':  
        require_once "views/creer_equipe.php";
        break;
    case 'constitution_equipe':  
        require_once "views/team_building.php";
        break;
    case "404":
        require_once "views/404.php";
        break;
    default:
        require_once "index.php";
}
require_once "templates/footer.php";
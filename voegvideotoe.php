<?php

require_once 'Business/VideoService.php';
require_once 'Exceptions/TitelBestaatException.php';
require_once 'Exceptions/VideoNrBestaatException.php';
//require_once 'Exceptions/FoutEmailAdresException.php';
use Business\VideoService;
use Exceptions\TitelBestaatException;
use Exceptions\VideoNrBestaatException;
//use Exceptions\FoutEmailAdresException;
//require_once('bootstrap.php');

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    header("location: Presentation/voegvideotoeForm.php"); //hoofdmenu.php");  //
    exit(0);
}
if (isset($_GET["action"]) && $_GET["action"] == "voegtoe") {
    try{
        //echo $_POST['titel'].$_POST['nr'];
        $titel=$_POST['titel'];
        $nr=$_POST['nr'];
        $Svc = new VideoService();
        $Svc->voegVideoToe($titel,$nr);
        header("location: Presentation/voegvideotoeForm.php?video=toegevoegd&nr=$nr"); //hoofdmenu.php");  //
        exit(0);
        
    }
    catch (VideoNrBestaatException $ex){
        header("location: Presentation/voegvideotoeForm.php?error=videonrbestaat"); //hoofdmenu.php");  //
        exit(0);
        
    }
  
}
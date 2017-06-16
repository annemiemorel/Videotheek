<?php

require_once 'Business/VideoService.php';
require_once 'Exceptions/TitelBestaatException.php';
//require_once 'Exceptions/EmailBestaatNietException.php';
//require_once 'Exceptions/FoutEmailAdresException.php';
use Business\VideoService;
use Exceptions\TitelBestaatException;
//use Exceptions\EmailBestaatNietException;
//use Exceptions\FoutEmailAdresException;
//require_once('bootstrap.php');

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    header("location: Presentation/voegtiteltoeForm.php"); //hoofdmenu.php");  //
        exit(0);
}

if (isset($_GET["action"]) && $_GET["action"] == "voegtoe") {
    try {
       
        $gSvc = new VideoService();
        $gSvc->voegTitelToe($_POST['titel']);
        $titel=$_POST['titel'];
        header("location: Presentation/voegtiteltoeForm.php?titel=gemaakt&naam=$titel"); //hoofdmenu.php");  //
        exit(0);
    } 
    catch (TitelBestaatException $ex) {
        header("location: Presentation/voegtiteltoeForm.php?error=titelbestaat");
        exit(0);
    }
} 
else {
  if (isset($_GET["error"])){
      $error = $_GET["error"];echo "erreur=".$error;
  }
}



if ($_GET["action"] == "init"){
    header("location: createuserForm.php?");
        exit(0);
}

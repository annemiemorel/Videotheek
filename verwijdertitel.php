<?php

require_once "Business/VideoService.php";
require_once "Exceptions/TitelBestaatException.php";
use Business\VideoService;
use Exceptions\TitelBestaatException;
session_start();

if (isset($_GET["action"]) && $_GET["action"] == "process"){
    try{
        header("location: Presentation/verwijdertitelForm.php");
        exit(0);
        
    } catch (Exception $ex) {

    }
    }
    
if (isset($_GET["action"]) && $_GET["action"] == "verwijder"){    
    try{
        $titel=$_POST['titel'];
        echo $titel;
        $Svc= new VideoService();
        $Svc->verwijderTitel($titel);
        header("location: doeactie.php?action=init");
        exit(0);
        
    } catch (Exception $ex) {

    }
}
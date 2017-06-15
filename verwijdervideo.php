<?php

require_once "Business/VideoService.php";
require_once "Exceptions/TitelBestaatException.php";
use Business\VideoService;
use Exceptions\TitelBestaatException;
session_start();

if (isset($_GET["action"]) && $_GET["action"] == "process"){
    try{
        header("location: Presentation/verwijdervideoForm.php");
        exit(0);
        
    } catch (Exception $ex) {

    }
    }
    
if (isset($_GET["action"]) && $_GET["action"] == "verwijder"){    
    try{
        $videonr=$_POST['nr'];
        echo $videonr;
        $Svc= new VideoService();
        $Svc->verwijderVideo($videonr);
        header("location: Presentation/verwijdervideoForm.php?nummer=verwijderd&nr=$videonr");
        exit(0);
        
    } catch (Exception $ex) {

    }
}

<?php

require_once 'Business/VideoService.php';
require_once 'Exceptions/TitelBestaatException.php';
require_once 'Exceptions/NummerBestaatNietException.php';
require_once 'Exceptions/NummerIsAlUitgeleendException.php';
require_once 'Exceptions/NummerIsNietUitgeleendException.php';
use Business\VideoService;
use Exceptions\TitelBestaatException;
use Exceptions\NummerBestaatNietException;
use Exceptions\NummerIsAlUitgeleendException;
use Exceptions\NummerIsNietUitgeleendException;
//require_once('bootstrap.php');

if (isset($_GET["action"]) && $_GET["action"] == "process") {
    if(isset($_POST['ontleen']) && $_POST['ontleen']){
        //echo "nr= ".$_POST['nr'];
        $nr=$_POST['nr'];
        try{
            $Svc = new VideoService();
            $Svc->ontleenNummer($nr);
            header("location: doeactie.php?action=init"); //hoofdmenu.php");  //
            exit(0);}
        catch (NummerBestaatNietException $ex){
            header("location: Presentation/hoofdmenuView.php?nummer=bestaatniet"); //hoofdmenu.php");  //
            exit(0);
        }
        catch (NummerIsAlUitgeleendException $ex){
            header("location: Presentation/hoofdmenuView.php?nummer=uitgeleend"); //hoofdmenu.php");  //
            exit(0);
        }
    }
    if(isset($_POST['brengterug']) && $_POST['brengterug']){
        try{
        $Svc = new VideoService();
        $Svc->brengNummer($_POST['nr']);
        header("location: doeactie.php?action=init"); //hoofdmenu.php");  //
        exit(0);}
        catch (NummerBestaatNietException $ex){
            header("location: Presentation/hoofdmenuView.php?nummer=bestaatniet"); //hoofdmenu.php");  //
            exit(0);
        }
        catch (NummerIsNietUitgeleendException $ex){
            header("location: Presentation/hoofdmenuView.php?nummer=noghier"); //hoofdmenu.php");  //
            exit(0);
        }
    }
}

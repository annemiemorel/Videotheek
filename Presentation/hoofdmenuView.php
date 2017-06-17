<?php
session_start();
$nummers = array();
$aanwezig = array();
?> 
<!DOCTYPE html>
<html>
    <head>
        <link href="../styles/main.css" rel="stylesheet" type="text/css">
       
        <title>Videotheek - Hoofdmenu</title>
    </head>
    <body>
        
        <h1>Videotheek</h1>
        <div style="border: 2px #3399CC solid; padding-left: 1em">
        <p>Raadpleeg de catalogus van onze videotheek </p></div>
        <?php 
        
       // $tab = $_SESSION['lijst'];
        //print_r($tab);
        ?> 
        <br><br>
        <article id="main">
                                               
        <!--<form action="" method="POST" action="../kiesfrisdrank.php?action=process">-->
        <table><tbody class="video">
                <!--<tr> <td> </td><td><input type="submit" style="font-size:1em" value="Kies" class="kaderknop"></td><td></td></tr>-->
            <th>Titel</th><th>Nummer(s)</th><th>Exemplaren aanwezig</th>
            
          <?php  $lijst=$_SESSION['lijst'];
                 $videogeg=$_SESSION['videogeg'];
          // echo print_r($videogeg);
            
            //echo "Aantal broodjes = ".count($lijst);
            $aantaltitels=count($lijst);
           // echo "aantal titels = ". $aantaltitels;
        for($x=0;$x<$aantaltitels;$x++) { 
           if(isset($videogeg[$x][0]['aanwezig'])){  //zijn er gegevens voor deze titel?
           $titel[$x]=$lijst[$x]['titel'];
           $aantalgeg=count($videogeg[$x]);
          // echo "aantal geg = ".$aantalgeg;
           
           for($y=0;$y<$aantalgeg;$y++){
               while(!isset($nummers[$x])){
                $nummers[$x] = '';
               $aanwezig[$x] = 0;}
               
                if(isset($videogeg[$x])){ 
                    if($videogeg[$x][$y]['aanwezig']==1 ){
                        $nummers[$x].="<b>".$videogeg[$x][$y]['videonr']."</b> ";
                       // echo "y1=".$y." ";
                    }else{
                        $nummers[$x].=$videogeg[$x][$y]['videonr']." ";
                        //echo "y2=".$y." ";
                    }
                $aanwezig[$x]+=$videogeg[$x][$y]['aanwezig'];
               // echo "y3=".$y." ";
                    }}
           

            ?>
               <tr> <td> <?php print($titel[$x]); ?></td>
                <td><?php print($nummers[$x]);?></td>
                   <td><?php print($aanwezig[$x]);?></td> 
               </tr>
                   
             
                <?php
        }}
            ?>
             
            
            </tbody></table>
        <br><br>
            <a href="../voegtiteltoe.php?action=process" class="kaderknop">Titel toevoegen</a>
            ***<a href="../voegvideotoe.php?action=process" class="kaderknop">Video toevoegen</a><br><br>
            <a href="../verwijdertitel.php?action=process" class="kaderknop">Titel verwijderen</a>
            ***<a href="../verwijdervideo.php?action=process" class="kaderknop">Video verwijderen</a><br><br>
            
        <!--</form>-->
        <?php

        if (isset($_GET["nummer"]) && $_GET["nummer"] == "bestaatniet") {
         ?>
         <p style="color: red">Het gekozen nummer bestaat niet!</p>
         <?php
        }
   
        if (isset($_GET["nummer"]) && $_GET["nummer"] == "noghier") {
         ?>
         <p style="color: red">Dit nummer is nog in de videotheek. Je kan het niet inleveren.</p>
         <?php
        }
         if(isset($_GET["nummer"]) && $_GET["nummer"] == "uitgeleend"){
                    ?>
                <font color="#ff0000">Dit nummer is reeds uitgeleend. </font>

        <?php }      ?>
        
      <form method="post" action="../filmhuren.php?action=process">
            <table >
            <tbody class="login" >
                <tr> <td>Nummer video: </td><td><input type ="text" name="nr" size="20" required></td></tr>
                <tr><td></td><td><input type="submit" name="ontleen" value="Ontleen Nr" class="knop but1" id="knopfit"><input type="submit" name="brengterug" value="Breng Terug" class="knop but1" id="knopfit"></td></tr>
            </tbody>
            </table>    <br>
            
           
        </form>
         </article>
        <aside style="color:red" id="sidebar">  
        
        </aside>
        <br>
         
            
         
           
    
    </body>
</html>
<?php
  session_start();
  ?>
<html>
<head><title>Videotheek - Verwijder titel</title>
<link href="../styles/main.css" rel="stylesheet" type="text/css"> </head>
<body>
<h2>::: Titel verwijderen </h2>
<?php

if (isset($_GET["error"]) && $_GET["error"] == "titelbestaat") {
 ?>
 <p style="color: red">Deze titel bestaat al!</p>
 <?php
}

 if(isset($_GET["titel"]) && $_GET["titel"] == "gemaakt"){
            ?>
        <font color="#ff0000">De titel  "<?php print($_GET['naam']);?>" werd toegevoegd aan de database. </font>
            
<?php }      ?>
        
         <form method="post" action="../verwijdertitel.php?action=verwijder" style="font-size:1.2em ">
         <p>Kies titel:</p>
         <select style="font-size:1em " name="titel">
         <?php $lijst=$_SESSION['lijst'];
                 $videogeg=$_SESSION['videogeg'];
           // echo print_r($videogeg);
            
            //echo "Aantal broodjes = ".count($lijst);
            $aantaltitels=count($lijst);
           // echo "aantal titels = ". $aantaltitels; 
        for($x=0;$x<$aantaltitels;$x++) { 
           
           $titel[$x]=$lijst[$x]['titel']; 
           ?>
       
            <option value="<?php print($titel[$x]); ?>"> <?php print($titel[$x]); ?></option>
        <?php } ?>
            
        </select>   <br>
        <input type="submit" style="font-size:1em" value="Verwijder" class="kaderknop">    
           
        </form>
<tr>
    <td><a href="../hoofdmenu.php" class="kaderknop">Terug naar Hoofdmenu</a></td>
    
</tr>
<?php

if (isset($_GET['error'])) {
        if ($_GET['error'] == "geennummer") { ?>
        <font color="#ff0000">U hebt geen naam ingegeven!</font>
        <?php  }
       else if ($_GET['error'] == "nummerbestaatal") { ?>
        <font color="#ff0000">Deze gast bestaat reeds!</font>
        <?php  }
       }
     exit(0);

 ?>
</body>
</html>
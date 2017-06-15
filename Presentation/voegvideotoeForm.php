<?php
  session_start();
  ?>
<html>
<head><title>Videotheek - Nieuwe video</title></head>
<link href="../styles/main.css" rel="stylesheet" type="text/css"> 
<body>
<h2>::: Video toevoegen </h2>
Kies bestaande titel en geef video een nummer: <br>
<?php

if (isset($_GET["error"]) && $_GET["error"] == "videobestaat") {
 ?>
 <p style="color: red">Deze video bestaat al!</p>
 <?php
}
if (isset($_GET["error"]) && $_GET["error"] == "videonrbestaat") {
 ?>
 <p style="color: red">Er bestaat al een video met dit nummer! Kies een ander nummer.</p>
 <?php
}
 if(isset($_GET["video"]) && $_GET["video"] == "toegevoegd"){
            ?>
        <font color="#ff0000">De video  met nr "<?php print($_GET['nr']);?>" werd toegevoegd aan de database. </font>
            
<?php }      ?>
        <form method="post" action="../verwijdertitel.php?action=verwijder" style="font-size:1.2em ">
         <p>Kies titel:</p>
         
           
        </form>
        <form method="post" action="../voegvideotoe.php?action=voegtoe">
            <select style="font-size:1em " name="titel">
            <?php $lijst=$_SESSION['lijst'];
            $videogeg=$_SESSION['videogeg'];
           // echo print_r($videogeg);
            $aantaltitels=count($lijst);
           // echo "aantal titels = ". $aantaltitels; 
            for($x=0;$x<$aantaltitels;$x++) { 

               $titel[$x]=$lijst[$x]['titel']; 
               ?>
       
            <option value="<?php print($titel[$x]); ?>"> <?php print($titel[$x]); ?></option>
            <?php } ?>

            </select>   <br>
            Geef nummer: <input type ="number" name="nr" required><br>
        <input type="submit" style="font-size:1em" value="Voeg Toe" class="kaderknop">    
            
           
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
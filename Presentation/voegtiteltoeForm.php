<?php
  session_start();
  ?>
<html>
<head><title>Videotheek - Nieuwe titel</title></head>
<link href="../styles/main.css" rel="stylesheet" type="text/css"> 
<body>
<h2>::: Titel toevoegen </h2>
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
        
        <form method="post" action="../voegtiteltoe.php?action=voegtoe">
            <table>
            <tbody >
                <tr> <td>Titel: </td><td><input type ="text" name="titel" size="60" required></td></tr>
                <tr><td></td><td><input type="submit" value="Voeg Toe" class="knop but1" id="knopfit"></td></tr>
            </tbody>
            </table>    <br>
            
           
        </form>
<tr>
    <td><a href="../hoofdmenu.php" class="kaderknop">Terug naar Hoofdmenu</a></td>
    
</tr>
<?php

if (isset($_GET['error'])) {
        if ($_GET['error'] == "geennummer") { ?>
        <font color="#ff0000">U hebt geen nummer ingegeven!</font>
        <?php  }
       else if ($_GET['error'] == "nummerbestaatal") { ?>
        <font color="#ff0000">Dit nummer bestaat reeds!</font>
        <?php  }
       }
     exit(0);

 ?>
</body>
</html>
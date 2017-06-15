<?php
session_start();
unset($_SESSION['lijst']);
header("location: doeactie.php?action=init");  //doeactie.php?action=stuurmail");
exit(0);
?> 


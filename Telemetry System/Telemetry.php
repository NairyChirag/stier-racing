<?php
$MyUserName  = "u306265259_Stier_racing";
$MyPassword = "Stierracing12";
$MyHostname = "localhost";
$dbh = mysql_pconnect($MyHostname,$MyUserName,$MyPassword);
$selected=mysql_select_db("u306265259_Telemetry",$dbh)
?>
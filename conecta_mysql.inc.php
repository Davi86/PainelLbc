<?php
   $host="127.0.0.1";
  $connect=mysql_connect($host,'root','');
 mysql_select_db("dash_laborclinica",$connect) or die(mysql_error());
 mysql_set_charset('utf8', $connect);
?>

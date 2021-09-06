<?php
   /*$host="127.0.0.1";
  $connect=mysql_connect($host,'root','');
 mysql_select_db("dash_laborclinica",$connect) or die(mysql_error());
 mysql_set_charset('utf8', $connect*/
  $hostname = '127.0.0.1:3306';
    $username = 'root';
    $password = '';
    $database = 'dash_laborclinica';
 try {
    $mybd = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>

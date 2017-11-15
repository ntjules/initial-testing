<?php
  $DB_host = "localhost";
  $DB_user = "jules";
  $DB_pass = "pass";
  $DB_name = "simple";
  $dbcon = pg_connect("host=$DB_host dbname=$DB_name user=$DB_user password=$DB_pass")
    or die ("Could not connect to server\n"); 
  
  // $MySQLi_CON = new pg_pconnect($DB_host,$DB_user,$DB_pass,$DB_name);
    
  //    if($MySQLi_CON->connect_errno)
  //    {
  //        die("ERROR : -> ".$MySQLi_CON->connect_error);
  //    }
?>
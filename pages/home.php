<?php
include_once '../include/dbcon.php';


session_start();
if(!isset($_SESSION['user']))
{
 header("Location: ../index.php");
}
$user_id=$_SESSION['user'];

$query = $MySQLi_CON->query("SELECT names FROM users WHERE id='$user_id'" );
 $row=$query->fetch_array();

echo "<h4>welcome :  ";
echo $row['names']."</h4>";
?>
<a href="./logout.php?logout">Sign out</a>
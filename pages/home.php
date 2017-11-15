<?php
include_once '../include/dbcon.php';


session_start();
if(!isset($_SESSION['user']))
{
 header("Location: ../index.php");
}
$user_id=$_SESSION['user'];

$query = pg_query($dbcon,"SELECT names FROM users WHERE id='$user_id'" );
 $row=pg_fetch_array($query);

echo "<h4>welcome :  ";
echo $row['names']."</h4>";
?>
<a href="./logout.php?logout">Sign out</a>
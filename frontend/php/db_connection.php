<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "intern";
$dbpass = "Int3rn@cc";
$dbname = "hospital_db";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>
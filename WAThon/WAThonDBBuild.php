<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

echo "<html><body>";
$sql0 = "DROP DATABASE WalkThon";
$sql1 = "CREATE DATABASE WalkThon";
$sql2 = "DROP TABLE Walker";
$sql3 = "CREATE TABLE Walker (	WkFName varchar(15), 
						WkLName varchar(15), 
						WkEMail varchar(25), 
						WkPassword varchar(25),
						WkPicture varchar(50),
						WkBlurblet varchar (1600),
						WkKey smallint NOT NULL AUTO_INCREMENT,
						WkCreateDate date,
						WkVerify char(1),
						PRIMARY KEY(WkKey))";
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 //Drop Database
if (mysql_query($sql0,$con))
  {
  echo $sql0 . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql0 . ")" . mysql_error() .  "<br>";
  }

 //Create Database
if (mysql_query($sql1,$con))
  {
  echo $sql1 . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql1 . ")" . mysql_error() .  "<br>";
  }
//Select Database
mysql_select_db("WalkThon", $con);
//Drop Table
if (mysql_query($sql2,$con))
  {
  echo $sql2 . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql2 . ")" . mysql_error() .  "<br>";
  }
//Create Table
if (mysql_query($sql3,$con))
  {
  echo $sql3 . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql3 . ")" . mysql_error() . "<br>";
  }

mysql_close($con);
echo "</body></html>";
?>
<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
$sql = "SELECT * FROM Walker";
$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
$rs = mysql_query($sql, $con);

while($row = mysql_fetch_array($rs))
	{
	echo "(" . $row['WkKey'] . ")" . $row['WkFName'] . " " . $row['WkLName'] . "..." . $row['WkEMail'] . "...~" . $row['WkPassword'] . "~<br>";
	echo $row['WkBlurblet'] . "<br>" . $row['WkPicture'] . "<br>" . $row['WkCreateDate'] . " " . $row['WkVerify'] . "<br><br>";
	}
	mysql_close($con);
?>
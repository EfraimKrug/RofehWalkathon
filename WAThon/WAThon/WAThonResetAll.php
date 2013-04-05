<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
$EMail = $_POST["email"];
$FName = $_POST["fname"];
$LName = $_POST["lname"];
$Blurblet = $_POST["blurb"];
$newBlurb = preg_replace("/\"/", "'", $Blurblet);
$sqlUpdate = "UPDATE Walker SET WkFName = '$FName', WkLName = '$LName', WkBlurblet = \"" . $newBlurb . "\" WHERE WkEMail = '" . $EMail . "'"; 

session_start();

$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
//echo $sqlUpdate;
mysql_query($sqlUpdate);
//header('Location: ./html/WAThonInside.html');
echo "<div class=\"post\">
                    <h1 class=\"title\"><font color=blue>Upload a self-portrait!</font></h1>
                    <div class=\"entry\">					
						<p>$blurb</p>
	                	<p>This looks great! Thanks! If you would like to upload a self portrait - you can do it here!</p>
						<form action=\"./WAThonGetPicture.php\" method=\"post\" enctype=\"multipart/form-data\">
						<table>
						<tr><td><label for=\"file\">Filename:</label></td>
						<td><input type=\"file\" name=\"file\" id=\"file\"></td></tr>
						<input type=\"hidden\" name=\"email\" value=\"$EMail\">
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>

<!--
                    <h1 class=\"title\"><font color=blue>The Walk-a-thon!</font></h1>

                    <div class=\"entry\">
						<p>Welcome back, $FName! 
						<form action=\"./WAThonResetAll.php\" method=\"post\">
						<table>
						<tr><td>First Name: </td><td><input  id=\"emk\" type=\"text\" name=\"fname\" value=$FName><br></td></tr>
						<tr><td>Last Name: </td><td><input  id=\"emk\" type=\"text\" name=\"lname\" value=$LName><br></td></tr>
						<tr><td>E-Mail: </td><td><input  id=\"emk\" type=\"text\" name=\"email\" value=$EMail><br></td></tr>
						<tr><td>Blurblet: </td><td><textarea name=\"blurb\" rows=10 cols=40>$Blurblet</textarea></td></tr>
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>
-->
<p></p>
	               	</div><!-- /.entry -->					                    
</body>
</html>";
?>
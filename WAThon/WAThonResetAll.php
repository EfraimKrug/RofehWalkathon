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

$sqlUpdate = "UPDATE Walker SET WkFName = '$FName', WkLName = '$LName', WkBlurblet = \"$Blurblet\" WHERE WkEMail = '" . $EMail . "'"; 

session_start();

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("WalkThon", $con);
mysql_query($sqlUpdate);
header('Location: ./html/WAThonInside.html');
echo "<div class=\"post\">

                    <h1 class=\"title\"><font color=blue>The Walk-a-thon!</font></h1>

                    <div class=\"entry\">
						<p>Welcome back, $FName! 
						<form action=\"../WAThonResetAll.php\" method=\"post\">
						<table>
						<tr><td>First Name: </td><td><input  id=\"emk\" type=\"text\" name=\"fname\" value=$FName><br></td></tr>
						<tr><td>Last Name: </td><td><input  id=\"emk\" type=\"text\" name=\"lname\" value=$LName><br></td></tr>
						<tr><td>E-Mail: </td><td><input  id=\"emk\" type=\"text\" name=\"email\" value=$EMail><br></td></tr>
						<tr><td>Blurblet: </td><td><textarea name=\"blurb\" rows=10 cols=40>$Blurblet</textarea></td></tr>
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>

<p>Your application will be reviewed and a response will be forwarded within 48 hours. If you do not receive a response within 48 hours, please call or email at your convenience.</p>
	               	</div><!-- /.entry -->					                    
</body>
</html>";
?>
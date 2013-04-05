<?php
$blurb = $_POST["blurb"];
$email = $_POST["email"];
//echo "<" . $email . ">";
$newBlurb = preg_replace("/\"/", "'", $blurb);

$sqlUpdateBlurblet = "UPDATE Walker SET WkBlurblet=\"$newBlurb\" WHERE WkEmail='$email'";
$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
mysql_query($sqlUpdateBlurblet, $con);
mysql_close($con);

echo "<html><head></head><body>
<div class=\"post\">
                    <h1 class=\"title\"><font color=blue>The Walk-a-thon!</font></h1>
                    <div class=\"entry\">					
						<p>$blurb</p>
	                	<p>This looks great so far. Would you like to add a picture?</p>
						<form action=\"./WAThonGetPicture.php\" method=\"post\" enctype=\"multipart/form-data\">
						<table>
						<tr><td><label for=\"file\">Filename:</label></td>
						<td><input type=\"file\" name=\"file\" id=\"file\"></td></tr>
						<input type=\"hidden\" name=\"email\" value=\"$email\">
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>
<p>Your application will be reviewed and a response will be forwarded within 48 hours. If you do not receive a response within 48 hours, please call or email at your convenience.</p>
	               	</div><!-- /.entry -->

					                    
                </div><!-- /.post -->
</body>
</html>";
?>
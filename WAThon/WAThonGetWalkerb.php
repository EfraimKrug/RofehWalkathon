<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
$Fname = $_POST["fname"]; 
$Lname = $_POST["lname"]; 
$Email = $_POST["email"];
$Password = $_POST["password"];
$Password2 = $_POST["password2"];
$Type = $_POST["UserType"]; // "return" or "new"

if($Password2 != $Password){
	header('Location: ./html/WAThonPage02.html');
	}
$pwd = $Password;

$sqlCheckEmail = "SELECT * FROM Walker WHERE WkEMail = '" . $Email . "'"; 
$sqlInsertWalker = "INSERT INTO Walker (WkFName, WkLName, WkEMail, WkPassword) VALUES ('$Fname', '$Lname', '$Email', '$Password')";
$sqlUpdateWalker = "UPDATE Walker SET WkFName = '$Fname', WkLName = '$Lname' WHERE WkEMail = '$Email'";

if(validEmail($Email))
{
session_start();

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("WalkThon", $con);
$rs = mysql_query($sqlCheckEmail);
$count = mysql_num_rows($rs);
//echo $rs['WkFName'] . "--" . $rs['WkLName'];
if($count > 0){
	$row = mysql_fetch_array($rs);
	$pwd = $row['WkPassword'];
	}
if($count > 0){
	if($pwd == $Password){
		mysql_query($sqlUpdateWalker);
		}
	else {
		echo "Sorry - your password is way out of wack... ";
		header('Location: ./html/WAThonInside.html');
		}
	}
else {
	mysql_query($sqlInsertWalker);
	}
	
mysql_close($con);
}

/**
This was written up on June 01, 2007  By Douglas Lovell
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}
echo "<html><head></head><body><div class=\"post\">
                    <h1 class=\"title\"><font color=blue>The Walk-a-thon!</font></h1>

                    <div class=\"entry\">
						<p>Hello $Fname - it is great to have you join us!
	                	We would like to build a web page for you</p>
						<p><strong><font color=blue>Enter a bit about yourself?</font></strong></p>
						<form action=\"../WAThonGetBlurbletb.php\" method=\"post\">
						<table>
						<tr><td></td><td>Enter your blurb, that is, blurb it!</td></tr>
						<tr><td> </td><td><textarea name=\"blurb\" rows=10 cols=40></textarea></td></tr>
						<input type=\"hidden\" name=\"email\" value='$Email'>
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>

<p>Your application will be reviewed and a response will be forwarded within 48 hours. If you do not receive a 
response within 48 hours, please call or email at your convenience.</p>
	               	</div><!-- /.entry -->

					                    
                </div><!-- /.post -->
</body>
</html>";
?>
<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
$Email = $_POST["email"];
$Password = $_POST["password"];
$Type = $_POST["type"]; // "return" or "new"

$sqlCheckEmail = "SELECT * FROM Walker WHERE WkEMail = '" . $Email . "'"; 

if(validEmail($Email))
{
session_start();

$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);

$rs = mysql_query($sqlCheckEmail);
$row = mysql_fetch_array($rs);
$pwd = $row['WkPassword'];
if($pwd != $Password){
		//echo ("Sorry, no password here to speak of! <" . $pwd . ">" . $Password . "<");
		header('Location: ./html/WAThonInside.html');
		}
$FName = $row['WkFName'];
$LName = $row['WkLName'];
$EMail = $row['WkEMail'];
$Blurblet = $row['WkBlurblet'];
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
echo "<div class=\"post\">

                    <h1 class=\"title\"><font color=blue>Building your <i>Walker's Page</i>!</font></h1>

                    <div class=\"entry\">
						<p>Hello $FName - it is great to have you join us!
	                	We would like to build a web page for you</p>
						<p><strong><font color=blue>Enter a bit about yourself?</font></strong></p>
						<form action=\"./WAThonResetAll.php\" method=\"post\">
						<table>
						<tr><td>First Name: </td><td><input  id=\"emk\" type=\"text\" name=\"fname\" value=$FName><br></td></tr>
						<tr><td>Last Name: </td><td><input  id=\"emk\" type=\"text\" name=\"lname\" value=$LName><br></td></tr>
						<tr><td>E-Mail: </td><td><input  id=\"emk\" type=\"text\" name=\"email\" value=$EMail><br></td></tr>
						<tr><td>Blurblet: </td><td><textarea name=\"blurb\" rows=10 cols=40>$Blurblet</textarea></td></tr>
						<tr><td></td><td><input type=\"submit\" value=\"Submit\"></td></tr>
						</table>
						</form>
<p></p>
	               	</div><!-- /.entry -->					                    
</body>
</html>";
?>
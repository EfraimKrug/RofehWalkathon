<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 *
 * Insert now with current date... if date is < now - 7 then delete...
 */
$Email = $_POST["email"];

$sqlCheckEmail = "SELECT * FROM Walker WHERE WkEMail = '" . $Email . "'"; 

if(!validEmail($Email)){
		header('Location: ./html/WAThonInside.html');
		exit(0);
}

session_start();
$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
$rs = mysql_query($sqlCheckEmail);
$count = mysql_num_rows($rs);
$Verify = 'N';
if($count > 0){
	$row = mysql_fetch_array($rs);
	$pwd = $row['WkPassword'];
	$Fname = $row['WkFName'];
	$Verify = $row['WkVerify'];
	}
else {
	header('Location: ./html/WAThonInside.html');
	exit(0);
}

if($Verify == 'Y'){
	$to = $Email;
	$subject = "Password Verification from Rofeh Walk-a-thon";
	$message = "<!DOCTYPE html><html><head></head><body>Hello! Thanks so much for joining the Rofeh Walk-a-thon!<br> " .
	"Your password is: $pwd</body></html>";
	$from = "mhirsh@rofehint.org";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From:" . $from;
	mail($to,$subject,$message,$headers);
}
	
mysql_close($con);



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
						<p>Hello $Fname!
	                	For your convenience we have sent your password to your e-mail address.
						Please check there and then come back. See you soon!
	               	</div><!-- /.entry -->

					                    
                </div><!-- /.post -->
</body>
</html>";
?>
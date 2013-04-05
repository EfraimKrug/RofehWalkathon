<?php
/*
 * Original WAThonPPage.php
 * View page - comes in on a link...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
$Email = $_GET["email"];
$sqlCheckEmail = "SELECT * FROM Walker WHERE WkEMail = '" . $Email . "'"; 

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
$row = mysql_fetch_array($rs);
echo "<" . $row['WkFName'] . ">";
mysql_close($con);
print_page($row, $EMail);
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
function print_page($row, $EMail)
{
echo "<style>
img 
{
float:right;
border:1px dotted black;
margin:30px 30px 15px 20px;
}
</style>";
echo "<div class=\"post\">
<h1 class=\"title\"><a href=\"http://rofehint.org/support-rofeh/\" rel=\"bookmark\" title=\"Pledge to ROFEH\" target=\"_parent\">Make a pledge!</a></h1>
<font color=blue>" . $row['WkFName'] . " " . $row['WkLName'] . "</font><br>";
echo "<img src=\"" . "./upload/" . $row['WkPicture'] . "\" width=294>";
echo $row['WkBlurblet'] . "</div><!-- /.entry --></body></html>";
}
?>
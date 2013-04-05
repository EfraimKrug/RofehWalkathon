<?php
$email = $_POST["email"];
error_reporting(0); 

$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo $_FILES["file"]["size"] . " " . $_FILES["file"]["type"];
  echo $extension . "<== extension";
  echo "Invalid file";
  }
  
// Update Database
$sqlUpdatePicture = "UPDATE Walker SET WkPicture=\"" . $_FILES["file"]["name"] . "\" WHERE WkEmail='" . $email . "'";
$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
mysql_query($sqlUpdatePicture, $con);
mysql_close($con);

// print the web page... This is the full page as it should look with all info...
// including: menus, link for donation, name & picture, blurblet....

echo "<html><head></head><body>
<div class=\"post\">
                    <h1 class=\"title\"><font color=blue>You have now created your walker's page!</font></h1>
                    <div class=\"entry\">					
					<a href='WAThonPPageInside.php?email=$email'>Click here to see your page</a><br>
					If you want to change the page, just go back to the 
					<a href='./html/WAThonInside.html'>beginning of the page build process.</a><br>
					If you are satisfied with your page, here is the link if you would like to include it
					in an e-mail to your friends and supporters: <br>(please cut and paste)<br>
					&lt;a href=&quot;http://www.rofehint.org/WAThon/WAThonPPage.php?email=$email &quot;&gt;
					click here to see my walker's page &lt;a &gt;
	               	</div><!-- /.entry -->					                    
                </div><!-- /.post -->
</body>
</html>";
?>
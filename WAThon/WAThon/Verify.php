<?php
/*
 * Second... verify.php
 */
$Email = $_GET["email"];
$sqlCheckEmail = "SELECT * FROM Walker WHERE WkEMail = '" . $Email . "'"; 
$sqlUpdateWalker = "UPDATE Walker SET WkVerify = 'Y' WHERE WkEMail = '$Email'";

if(validEmail($Email))
{
session_start();
$con = mysql_connect("localhost","rofeh_walkathon","winter99");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("rofeh_walkathon", $con);
mysql_query($sqlUpdateWalker);
$aRows = mysql_affected_rows();
if($aRows > 0){
	$resultSet = mysql_query($sqlCheckEmail);
	$row = mysql_fetch_array($resultSet);
	$FName = $row['WkFName'];
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


echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!--
Here there is a form to get name and email... the submit on the form 
moves the whole process into php...
-->
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head profile=\"http://gmpg.org/xfn/11\">

<title>Walk-a-thon at ROFEH | Rofeh International</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />

<link rel=\"stylesheet\" type=\"text/css\" href=\"http://rofehint.org/wp-content/themes/coda/style.css\" media=\"screen\" />
<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://rofehint.org/wp-content/themes/coda/css/effects.css\" />
<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS 2.0\" href=\"http://rofehint.org/feed/\" />
<link rel=\"pingback\" href=\"http://rofehint.org/xmlrpc.php\" />
      

<!-- This site is optimized with the Yoast WordPress SEO plugin v1.3.4.4 - http://yoast.com/wordpress/seo/ -->
<link rel=\"canonical\" href=\"http://rofehint.org/volunteer/\" />
<meta property='og:locale' content='en_US'/>
<meta property='og:title' content='Volunteer at ROFEH - Rofeh International'/>
<meta property='og:url' content='http://rofehint.org/volunteer/'/>
<meta property='og:site_name' content='Rofeh International'/>
<meta property='og:type' content='article'/>
<meta property='og:image' content='http://rofehint.org/wp-content/uploads/2012/06/Mini-Workshop-piks1-300x225.jpg'/>
<!-- / Yoast WordPress SEO plugin. -->


			<script type=\"text/javascript\">//<![CDATA[
			// Google Analytics for WordPress by Yoast v4.2.8 | http://yoast.com/wordpress/google-analytics/
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-35679191-1']);
							_gaq.push(['_trackPageview']);
			(function () {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();
			//]]></script>
			<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Rofeh International &raquo; Volunteer at ROFEH Comments Feed\" href=\"http://rofehint.org/volunteer/feed/\" />
<link rel='stylesheet' id='contact-form-7-css'  href='http://rofehint.org/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.3.3' type='text/css' media='all' />
<script type='text/javascript' src='http://rofehint.org/wp-includes/js/comment-reply.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-includes/js/jquery/jquery.js?ver=1.8.3'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/superfish.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/woo_tabs.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/general.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/jquery.livetwitter.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/jquery.accordion.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/jquery.actions.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/jquery.easing.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/dim.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://rofehint.org/wp-content/themes/coda/includes/js/loopedSlider.js?ver=3.5.1'></script>
<link rel=\"EditURI\" type=\"application/rsd+xml\" title=\"RSD\" href=\"http://rofehint.org/xmlrpc.php?rsd\" />
<link rel=\"wlwmanifest\" type=\"application/wlwmanifest+xml\" href=\"http://rofehint.org/wp-includes/wlwmanifest.xml\" /> 
<meta name=\"generator\" content=\"WordPress 3.5.1\" />

<!-- Theme version -->
<meta name=\"generator\" content=\"Coda 1.0.12\" />
<meta name=\"generator\" content=\"WooFramework 5.5.3\" />

<!-- Alt Stylesheet -->
<link href=\"http://rofehint.org/wp-content/themes/coda/styles/default.css\" rel=\"stylesheet\" type=\"text/css\" />

<!-- Custom Favicon -->
<link rel=\"shortcut icon\" href=\"http://rofehint.org/wp-content/uploads/2012/05/favicon.png\"/>

<!-- Woo Shortcodes CSS -->
<link href=\"http://rofehint.org/wp-content/themes/coda/functions/css/shortcodes.css\" rel=\"stylesheet\" type=\"text/css\" />

<!-- Custom Stylesheet -->
<link href=\"http://rofehint.org/wp-content/themes/coda/custom.css\" rel=\"stylesheet\" type=\"text/css\" />

<!--[if IE 6]>
<script type=\"text/javascript\" src=\"http://rofehint.org/wp-content/themes/coda/includes/js/pngfix.js\"></script>
<script type=\"text/javascript\" src=\"http://rofehint.org/wp-content/themes/coda/includes/js/menu.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://rofehint.org/wp-content/themes/coda/css/ie6.css\" />
<![endif]-->	

<!--[if IE 7]>
<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://rofehint.org/wp-content/themes/coda/css/ie7.css\" />
<![endif]-->

<!--[if IE 8]>
<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"http://rofehint.org/wp-content/themes/coda/css/ie8.css\" />
<![endif]-->

<script type=\"text/javascript\">
jQuery(window).load(function(){
	jQuery(\"#loopedSlider\").loopedSlider({
			autoStart: 7000, 
		slidespeed: 1000, 
		autoHeight: true
	});
});
</script>

<!-- Vipers Video Quicktags v6.4.5 | http://www.viper007bond.com/wordpress-plugins/vipers-video-quicktags/ -->
<style type=\"text/css\">
.vvqbox { display: block; max-width: 100%; visibility: visible !important; margin: 10px auto; } .vvqbox img { max-width: 100%; height: 100%; } .vvqbox object { max-width: 100%; } 
</style>
<script type=\"text/javascript\">
// <![CDATA[
	var vvqflashvars = {};
	var vvqparams = { wmode: \"opaque\", allowfullscreen: \"true\", allowscriptaccess: \"always\" };
	var vvqattributes = {};
	var vvqexpressinstall = \"http://rofehint.org/wp-content/plugins/vipers-video-quicktags/resources/expressinstall.swf\";
// ]]>
</script>
<!-- Woo Custom Styling -->
<style type=\"text/css\">
#top {background-color:#0055a5}
body {background-color:#FFFFFF}
a:link, a:visited {color:#0055a5}
a:hover {color:#0055a5}
.button, .reply a {background-color:#0055a5}

#emk {
	background-color:#fff;
	color:blue;
	}

#content {
		margin-top:10px;
		padding-bottom:10px;
		width: 613px;
		//height:180px;
		//width:713px;
	}

#content div {
		padding:10px;
		border:0px solid #bbb;
		//float:left;
	}

#contentLeft {
		width:248px;
		z-index:5;
		float:left;
		//background-color:black;
	}

#contentRight {
		//margin-left:10px;
		width:248px;
		height:300px;
		float:right;
		//border:4px solid red;
		//background-color:#85a7c3;
		//color:yellow;
	}
	
</style>

</head>

<body class=\"page page-id-15 page-parent page-template-default gecko alt-style-default\">


<div id=\"wrapper\">
	<div id=\"top\">
        <div class=\"col-full\">   
	<div id=\"header\">
 		       
		<div id=\"logo\">
	       
		            <a href=\"http://rofehint.org\" title=\"Reaching Out and Furnishing Emergency Healthcare\">
                <img src=\"http://rofehint.org/wp-content/uploads/2012/11/logo_simple.png\" alt=\"Rofeh International\" />
            </a>
         
        
                    <span class=\"site-title\"><a href=\"http://rofehint.org\">Rofeh International</a></span>
                    <span class=\"site-description\">Reaching Out and Furnishing Emergency Healthcare</span>
	      	
		</div><!-- /#logo -->
       
	</div><!-- /#header -->
    
	<div id=\"navigation\" class=\"col-full\">
		    <ul id=\"main-nav\" class=\"nav fl\"><li id=\"menu-item-512\" class=\"menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-512\"><a href=\"http://rofehint.org/\" >Home</a></li>
<li id=\"menu-item-349\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-349\"><a href=\"http://rofehint.org/about/\" >About Us</a>
<ul class=\"sub-menu\">
	<li id=\"menu-item-347\" class=\"menu-item menu-item-type-taxonomy menu-item-object-category menu-item-347\"><a href=\"http://rofehint.org/category/photos/\" >Photos &#038; Videos</a></li>
</ul>
</li>
<li id=\"menu-item-340\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-340\"><a href=\"http://rofehint.org/program-and-events/\" >Program &#038; Events</a></li>
<li id=\"menu-item-342\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-342\"><a href=\"http://rofehint.org/testimonials/\" >Testimonials</a></li>
<li id=\"menu-item-343\" class=\"menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item menu-item-343\"><a href=\"http://rofehint.org/volunteer/\" >Volunteer</a>
<ul class=\"sub-menu\">
	<li id=\"menu-item-346\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-346\"><a href=\"http://rofehint.org/volunteer/volunteer-application/\" >Volunteer Application</a></li>
</ul>
</li>
<li id=\"menu-item-341\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-341\"><a href=\"http://rofehint.org/support-rofeh/\" >DONATE</a></li>
<li id=\"menu-item-345\" class=\"menu-item menu-item-type-post_type menu-item-object-page menu-item-345\"><a href=\"http://rofehint.org/contact-us/\" >Contact Us</a></li>
</ul>        <!--<ul class=\"rss fr\">
                        <li class=\"sub-rss\"><a href=\"http://rofehint.org/feed/\">Subscribe to RSS feed</a></li>
        </ul>-->
        
	</div><!-- /#navigation -->
       </div>
       </div>       
    <div id=\"content\" class=\"page col-full\">
		<div id=\"main\" class=\"col-left\">";
// begin insert...				
echo "<div class=\"post\">
                    <h1 class=\"title\"><font color=blue>The Walk-a-thon!</font></h1>
					Hi $FName, You have been verified! Thanks! <br>
					<a href='http://www.rofehint.org/WAThon/html/Walkathon.html'>
					Please continue to build your Walker's Page...
					</a>
                    <div class=\"entry\">

	               	</div><!-- /.entry -->";

// end insert
				
// insert actual page code...

echo                "</div><!-- /.post -->
                
                                                                    
			  
        
		</div><!-- /#main -->

        <div id=\"sidebar\" class=\"col-right\">

	               
	
</div><!-- /#sidebar -->
    </div><!-- /#content -->
		
    <div id=\"footer-outer\">
    
		<div id=\"footer\" class=\"col-full\">
		
			<div id=\"copyright\" class=\"col-left\">
            <p>ROFEH International, 1710 Beacon Street, Brookline, MA 02445 * Phone: 617-566-1900 * Fax: 617-739-0163 * <a href=\"mailto:rofeh@rofehint.org\">rofeh@rofehint.org</a></p>			</div>
			
			<div id=\"credit\" class=\"col-right\">
            <p></p>			</div>
			
		</div><!-- /#footer  -->
	
	</div><!-- /#footer-outer  -->

</div><!-- /#wrapper -->
<script type='text/javascript' src='http://rofehint.org/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.25.0-2013.01.18'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {\"loaderUrl\":\"http:\/\/rofehint.org\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif\",\"sending\":\"Sending ...\"};
/* ]]> */
</script>
<script type='text/javascript' src='http://rofehint.org/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.3.3'></script>
</body>
</html>";
?>
<?php
$blurb = $_POST["blurb"];
$lastKey = $_POST["lastKey"];
echo "<" . $lastKey . ">";
$sqlUpdateBlurblet = "UPDATE Walker SET WkBlurblet=\"$blurb\" WHERE WkKey='$lastKey'";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("WalkThon", $con);
mysql_query($sqlUpdateBlurblet, $con);
mysql_close($con);

//========================== check work...
$sql = "SELECT * FROM Walker";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("WalkThon", $con);
$RS = mysql_query($sql, $con);
while($row = mysql_fetch_array($RS)){
	//if($RS['WkKey'] == '$lastKey'){
		$fn = $row['WkFName'];
		$ln = $row['WkLName'];
		$em = $row['WkEMail'];
		$blb = $row['WkBlurblet'];
		echo "$fn $ln ( $em ) ... $blb";
		//}
}
mysql_close($con);

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
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
		<div id=\"main\" class=\"col-left\">
		           
                                                                                                
                <div class=\"post\">

                    <h1 class=\"title\"><a href=\"http://rofehint.org/volunteer/\" rel=\"bookmark\" title=\"Volunteer at ROFEH\">The Walk-a-thon!</a></h1>

                    <div class=\"entry\">					
						<p>Hello $fn $ln ($em):</p>
						<p>$blb</p>
	                	<p>This looks great! Thanks!</p>

<p>Your application will be reviewed and a response will be forwarded within 48 hours. If you do not receive a response within 48 hours, please call or email at your convenience.</p>
	               	</div><!-- /.entry -->

					                    
                </div><!-- /.post -->
                
                                                                    
			  
        
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
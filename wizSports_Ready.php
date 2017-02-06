<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

include '../config_dylan.php';
include 'to12hr.php';

if (empty($_SESSION["wizardTeamName"]) or empty($_SESSION["wizardCoachName"]) or empty($_SESSION["wizardCoachEmail"])) {
	// not following along with the forms, move to first page
	header("location:wizSports1.php");
	session_destroy();
	exit;
}
?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Signup Wizard</title>
<!-- NEW BOOTSTRAP CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Added CSS for design wizard -->
<link rel="stylesheet" href="css/sportsAppWiz.css">
<!-- taken from Loyalty Widget and updated-->
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
<header class="branding">

</header>
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> </div>
</div>

</header>

<section class="col-md-12 sectionW_AR" >

<div class="appReadyContent">
	<div class="congrats"> Congratulations!</div>
	<div class="titleAR">Your App is Ready to Download</div>
	<div class="upperImageHolder">
		<div class="previewBoxAR">
		<div class="previewImageAR">
		<img style="width: 100%; height: 100%; float: margin-left: auto; margin-right: auto;" src="http://www.launchliveapp.com/users-folder/<?php echo $_SESSION["wizardTeamName"];?>/liveapp/qrcode.jpg">
		</div>
		</div>
		<div class="TriLogoBox">
		<img class="TriLogo" src="img/TriLogo.png">
		</div>
	</div>
	<div class="appReadyText">
	 1) To Download: Press the following link from a Blackberry, Android or Apple Smartphone and
	 the app will automatically download:
	</div>
	<div class="appReadyLink">
	Download at:
		<a href="http://www.launchliveapp.com/<?php echo $_SESSION["wizardTeamName"]; ?>">
			LaunchLiveApp.com/<?php echo $_SESSION["wizardTeamName"]; ?>
		</a>
	</div>
	<div class="appReadyText">
	2) To Share: Click on the following Social Media, Email or QR Code Icons and you can share your
	download link with contacts easily:
	</div>
	<div class="appReadyImageHolder">
	<div class="fb-share-button" data-href="http://launchliveapp.com/<?php echo $_SESSION["wizardTeamName"]; ?>" data-layout="box_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Flaunchliveapp.com/<?php echo $_SESSION["wizardTeamName"]; ?>src=sdkpreparse">Share</a></div>
	<!-- <img  class="appReadyImage" src="img/Facebook.png" alt=""/> -->
	<a href="sendqrcode.php" target="_blank"><img  class="appReadyImage" src="img/qrCode.png" alt=""/></a>
	<a href="invite.php?q=<?php echo $_SESSION["wizardTeamName"];?>" target="_blank"><img  class="appReadyImage" src="img/mail.png" alt=""/></a>
	<a target="_blank" href="http://www.twitter.com/share?text=Download our app!&url=http://www.launchliveapp.com/<?php echo $_SESSION["wizardTeamName"]; ?>"><img  class="appReadyImage" src="img/twitter.png" alt=""/></a>
	</div>
	<div class="appReadyText">
	You will also receive your download link, sharing and updating instructions in your email address: <?php echo $_SESSION["wizardCoachEmail"]?>
	</div>

</div>


</section>

<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

<?php
if (!empty($_SESSION["wizardPass"])) {
    $to = $_SESSION["wizardCoachEmail"];
    $subject = "Your App is Ready to Download";
    $message = "
        <html>
        <body>
        <p>
        Congratulations! Your App is Ready to Download.<br>
        App Name: ".$_SESSION["wizardTeamName"]."<br>
        Your Email: ".$_SESSION["wizardCoachEmail"]."<br>
        Password: ".$_SESSION["wizardPass"]."<br>
        Download Link: LaunchLiveApp.com/".$_SESSION["wizardTeamName"]."<br>
        </p>
        </body>
        </html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);
}
session_destroy();
?>

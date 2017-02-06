<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

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
<div class="container">
<header class="branding">

</header>
<header class="row" >
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 6 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="title1" >Would you like your app to link to social media?</div>
<form role="form" class="cmxform outerFormW1" id="frmWizard1" name="frmWizard1" action="processsocialmedialinks.php" method="post">
<div class="row signup-wizard-form formW1" >
<div class="col-md-12 formAreaW6">
<div class="form-group fieldW6">
<label for="wizardCompanyName">Facebook URL</label>
<input type="url" name="wizardFacebookURL" id="wizardFacebookURL" value="" maxlength="100" class="form-control"/>
</div>
<div class="form-group fieldW6">
<label for="wizardCompanyWebsite">Twitter Name or URL</label>
<input type="url" name="wizardtwitterNameURL" id="wizardTwitterNameURL" value="" maxlength="100" class="form-control"/>
</div>
<div class="form-group fieldW6">
<label for="">YouTube URL</label>
<input type="url" name="wizardYouTubeURL" id="wizardYouTubeURL" value="" maxlength="100" class="form-control"/>
</div>
<div class="form-group fieldW6">
<label for="wizardEmail">LinkedIn URL</label>
<input type="url" name="wizardLinkedInURL" id="wizardLinkedInURL" value="" maxlength="100" class="form-control"/>
</div>

</div>
</div> <!-- End form-row -->
<div class="btnW1_holder" >
<input type="submit" name="" id="" value="Next Step" class="btn btnW1" />
</div>
<input type="hidden" id="appIconData" name="appIconData" value=""/>
</form> <!-- End Form -->
</section>
<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

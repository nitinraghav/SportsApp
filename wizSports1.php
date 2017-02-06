<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Sports Wizard</title>
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
<header class="row" >
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Sports Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 1 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="title1" >Enter your team info:</div>    <!--  *************************************Change*********************************************-->
<form role="form" class="cmxform outerFormW1"  method="post" action="wizSports2.php">
<div class="row signup-wizard-form formW1" >
<div class="col-md-12 formAreaW6">

<div class="form-group fieldW6">
<label for="wizardTeamName"><span class="redStar">*</span>Team Name:</label>
<input type="text" name="wizardTeamName" id="wizardTeamName" value="" maxlength="100" required class="form-control"/>
</div>

<div class="form-group fieldW6">
<label for="wizardCoachName"><span class="redStar">*</span>Coache&#8217;s Name:</label>
<input type="text" name="wizardCoachName" id="wizardCoachName" value="" maxlength="100" required class="form-control"/>
</div>

<div class="form-group fieldW6">
<label for="wizardCoachEmail"><span class="redStar">*</span>Coache&#8217;s E-mail</label>
<input type="email" name="wizardCoachEmail" id="wizardCoachEmail" value="" maxlength="100" required class="form-control"/>
</div>

<div class="form-group fieldW6">
<label for="wizardCoachPhone">Coache&#8217;s Phone:</label>
<input type="text" class="input-medium bfh-phone" data-format="+1 (ddd) ddd-dddd" name="wizardCoachPhone" id="wizardCoachPhone" value="" maxlength="100" required class="form-control"/>
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
<script type="text/javascript" src="./scripts/bootstrap-formhelpers-phone.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

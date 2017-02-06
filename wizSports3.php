<?php

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
<title>Sports Wizard</title>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
<script>
$(function() {
    $( "#eventDate1" ).datepicker({ minDate: 0 });
	$( "#eventDate2" ).datepicker({ minDate: 0 });
	$( "#eventDate3" ).datepicker({ minDate: 0 });
  });
function getDate(eventNo){
   if(eventNo == 1){
      var datePicked = $('#eventDate1').val();
   }
   else if(eventNo == 2){
      var datePicked = $('#eventDate2').val();
   }
   else if(eventNo == 3){
      var datePicked = $('#eventDate3').val();
   }
}
</script>
</head>
<body>
<div class="container">
<header class="branding">

</header>
<header class="row" >
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Sports Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 3 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<div class="title1" >Give us your upcoming schedule:</div>
<form role="form" class="cmxform outerFormW1"  method="post" action="setschedule.php">
<div class="row signup-wizard-form formW1" >
<div class="col-md-12 formAreaW3">

<?php
	for ($j = 0; $j < 3; $j++) {
?>

<div class="form-group fieldW3">
<div class="fieldLab_w3" id="fieldLab_w3_1"><?php echo $j + 1 ?>.</div>
       <div class="topRow">
			<input name="gametype<?php echo $j; ?>" type="text" class="scheduleDD" id="eventDes<?php echo $j + 1 ?>" placeholder="Description">
			<!--<select name="gametype<?//php echo $j; ?>" class="scheduleDD">
			  <option value="Game">Game</option>
			  <option value="Practice">Practice</option>
			</select>-->
			<input name="date<?php echo $j; ?>" type="text" class="scheduleDD" id="eventDate<?php echo $j + 1 ?>" placeholder="Date" onChange="getDate(1)" readonly="readonly">
		</div>
		<div class="bottomRow">
			<input name="location<?php echo $j; ?>" type="text" class="scheduleDD" id="eventLoc<?php echo $j + 1 ?>" placeholder="Location">
			<select name="time<?php echo $j; ?>" class="scheduleDD" id="eventTime<?php echo $j + 1 ?>">
			<?php
				for($i=0;$i<24;$i+=0.5) {
					if($i<=12) {
						if($i==0) {
							$time="12".":00 AM";
						}
						else if($i==0.5) {
							$time="12:30"." AM";
						}
						else
							if(floor($i)!=$i) {
								$time=floor($i).":30 AM";
							}
							else
							$time = $i.":00 AM";
					}
					else {
						if(floor($i)!=$i) {
							$time=floor($i-12).":30 PM";
						}
						else
						$time = ($i-12).":00 PM";
					}
					echo "<option value=\"$time\">$time</option>";
					<br />  //************************************************change******************************************************
				}
				?>
			</select>
		</div>
</div>

<?php } ?>

</div>
</div> <!-- End form-row -->
<div class="btnW1_holder" >
<input type="submit" name="" id="" value="Next Step" class="btn btnW1" />
</div>
<input type="hidden" id="appIconData" name="appIconData" value=""/>
</form> <!-- End Form -->
</section>
<!--</div>--><!--End Container  -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

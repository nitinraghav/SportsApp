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

if (empty($_SESSION['websiteName']) and empty($_SESSION['websiteLink']) and empty($_SESSION['websiteImage']))
{
	$_SESSION['websiteName'] = array();
	$_SESSION['websiteLink'] = array();
	$_SESSION['websiteImage'] = array();
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
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<img  class="logoImage" src="img/live_app_logo.png" alt=""/>
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 5 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<form enctype="multipart/form-data" action="addlink.php" method="post">
<div class="title5" >Are there any website links you would like to include in your app?</div>
<?php if (isset($_GET['q'])) { ?>
<div class="title5">
<?php if ($_GET['q'] == 0) { ?>
	Your link has been added! Add another one? 
<?php } else if ($_GET['q'] == 1){ ?>
	Your link wasn't added! Try again? 
<?php }else{?>
	Please add at least one link 
<?php } ?>
</div>
<?php } ?>
<div class="formAreaW5">
     <div class="fieldW5">
		  <label for="wizardWebsiteName">Website Name:</label>
		  <input type="text" name="websiteName" class="wizardWebsite" id="wizardWebsiteName" value="" maxlength="100" required class="form-control"/>
	 </div>
	 <div class="row websiteIconUpload">
	        <label> Website Icon: </label>
	        <div class="btnCFW_box">
			<input type="button" name="" id="" value="Choose File" class="btn btnCFW" onclick="chooseFile()">
			<input type="file" name="image_file" id="image_file" hidden="hidden" />
			</div>
			<div class="previewBoxW">
				<div class="previewImageW" style="position:relative">Icon Preview<img style="position:absolute;top:0;left:0;width: 100%; height: 100%; border-radius: 20px;" id="preview" /></div>
			</div>
			<div style="clear:both"></div>
	 </div>
	 <div class="fieldW5">
		  <label for="wizardWebsiteLink">Website Link:</label>
		  <input type="url" name="websiteLink" class="wizardWebsite" id="wizardWebsiteLink" value="" maxlength="100" required class="form-control"/>
	 </div>
	 <div class=" btnAL_box">
			<input type="submit" id="submitBtn" value="Add Link" class="btn btnAL" />
	 </div>
</div>
<div class="btnW5Skip_holder" >
<input onclick="location.href = 'addlink.php?skip=DeleteAll';" type="button" name="" id="" value="No Thanks, Skip" class="btn btnW5" />
</div>
<div class="btnW5_holder" >
<input onclick="location.href = 'addlink.php?skip=GotoNext';" type="button" name="" id="" value="Next Step" class="btn btnW5" />
</div>
</form>
</section>
<!--</div>--><!--End Container  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
function chooseFile()
{
    $("#image_file").click();
}

$("#image_file").change(function() {
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
    }
}

$("#submitBtn").click(function() {
    $("form").submit();
});

</script>
<script type="text/javascript">if(window.parent==window){var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-59566634-1']);_gaq.push(['_setDomainName','www.liveapp.ca']);_gaq.push(['_setAllowLinker',true]);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src='http://www.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();}</script></body>
</html>

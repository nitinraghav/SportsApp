<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(!isset($_SESSION))
{
	session_start();
}

$wizardTeamName = "";
$wizardCoachName = "";
$wizardCoachEmail = "";
$wizardCoachPhone = "";

if (isset($_POST["wizardTeamName"]) and isset($_POST["wizardCoachName"])
	and isset($_POST["wizardCoachEmail"]) and isset($_POST["wizardCoachPhone"])) {
	$_SESSION["wizardTeamName"] = $_POST["wizardTeamName"];
	$_SESSION["wizardCoachName"] = $_POST["wizardCoachName"];
	$_SESSION["wizardCoachEmail"] = $_POST["wizardCoachEmail"];
	$_SESSION["wizardCoachPhone"] = $_POST["wizardCoachPhone"];
}
else
{
	// not following along with the forms, move to first page
	header("location:wizSports1.php");
	session_destroy();
	exit;
}

?>

<html>
<head><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setSiteSpeedSampleRate',100]);</script>
<title>Signup Wizard</title>
<!-- <title><?php echo $wizardTeamName ?></title> -->
<!-- NEW BOOTSTRAP CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Added CSS for design wizard -->
<link rel="stylesheet" href="css/sportsAppWiz.css">
<!-- taken from Loyalty Widget and updated-->
<script src="scripts/uploadimage.js"></script>
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
<div class="stepNo"> Step 2 of 9</div>
</div>

</header>

<section class="col-md-12 sectionW1" >
<form enctype="multipart/form-data" method="post" action="uploadimage.php?q=app_logo&next=wizSports3.php">
<div class="title1" >Upload your team&#8217;s logo for app icon</div>    <!-- ************************************change******************-->	
<div class="logoUpload_holder">
<div class=" btnCF_box">
<input type="button" name="" id="" value="Choose File" class="btn btnCF" onclick="chooseFile()"/>
</div>
<div class="previewBox">
<div class="previewImage"><img style="width: 100%; height: 100%; border-radius: 20px;" id="preview" /></div>
Preview
</div>
</div>
<input type="file" name="image_file" id="image_file" hidden="hidden" />
<div class="btnW2_holder" >
<input id="submitBtn" type="submit" value="Upload" class="btn btnW1" />
</div>
</form>
</section>

<!--</div>--><!--End Container  -->
<script type="text/javascript">

</script>
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

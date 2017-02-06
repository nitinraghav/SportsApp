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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"/>
<script src="scripts/uploadimage.js"></script>
<!-- <script src="scripts/uploadimage.js"></script> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>

  var divF = 0;
$( document ).ready(function() {

		 $("#fileUpload8").on('change', function () {
            document.getElementById('previewImgC8C').style.display = 'none';
			divF = 1;
			if (typeof (FileReader) != "undefined") {

				var image_holder = $("#image-holder");
				image_holder.empty();

				var reader = new FileReader();
				reader.onload = function (e) {
					$("<img />", {
						"src": e.target.result,
						"class": "previewImage8",
						"id": "previewImgC8F"
					}).appendTo(image_holder);

				}
				image_holder.show();
				reader.readAsDataURL($(this)[0].files[0]);
				alert("height=" + previewImgC8F.naturalHeight);
				alert("width=" + previewImgC8F.naturalWidth);
			} else {
				alert("This browser does not support FileReader.");
			}
		});
});

/*
A hidden (visibility=hidden) file uploader is included with the preview image.  If the user clicks
on the file upload button the hidden file uploader runs and allows an image to be chosen and then displays
the image in the preview div.
*/

function runSetBgImage(){
   // document.getElementById("fileUpload8").click();
}

/*
A hidden (opacity=0) colour picker is included with the choose colour button.  If the user clicks on it when
clicking the choose colour button, setBgColour() runs.  If the user clicks the choose colour button without hitting
the hidden colour picker, the runSetBgColour() runs to make a click of the colour picker occur.
*/

function setBgColour(){
    if(divF == 1){
       document.getElementById('previewImgC8F').style.display = 'none';
	}
	document.getElementById('previewImgC8C').style.display = 'block';
    var colr8 = document.getElementById('hiddenCP8').value;
	document.getElementById('previewImgC8C').style.backgroundColor = colr8;
}

function runSetBgColour(){
    document.getElementById("hiddenCP8").click();
}
</script>
</head>
<body>
<div class="container">
<header class="branding">

</header>
<header class="row">
<!--<div class="welcome-message col-md-12">-->
<div class="col-md-12 designWizardHeader">
<div class="headerText" >LiveApp Team Wizard</div>
<div style="clear:both;"></div>
<div class="stepNo"> Step 8 of 9</div>
</div>

</header>

<form id="imageform" method="post" enctype="multipart/form-data" action="setbg.php">
<section class="col-md-12 sectionW1" >
<div class="title1" >Upload a background image <span class="title8x">or</span> a background colour:</div>
<div class="bgUpload_holder">
    <div class="buttonSide">
		<div class=" btnUBI_box">
		<input type="button" name="" id="uploadBtn" value="Upload Image" class="btn btnUBI" onclick="runSetBgImage()">
		<input type="file" name="image_file" id="image_file" hidden="hidden"/>
		</div>
		<div class="text8y">OR</div>
		<div class=" btnCBC_box">
		<input type="button" name="value" id="" value="Choose Colour" class="btn btnCBC" onClick="runSetBgColour()"/>
		<input type="color" name="color" class="hiddenColPic8" id="hiddenCP8" onChange="setBgColour()"/>
		</div>
	</div>
	<div class="previewSide">
	     <div class="previewBox8" id="previewBox8">
		     <div id="wrapper">
				    <div id="image-holder"></div>
			 </div>
			  <div class="previewImage8" id="previewImgC8C"><img style="width: 100%; height: 100%; border-radius: 20px;" id="preview" /></div>
			  Preview
		 </div>
	</div>
	<div style="clear:both"></div>
</div>

<div class="btnW8_holder" >
<input type="submit" name="" id="submitBtn" value="Next Step" class="btn btnW1"/>
</div>
</section>
</form>

<!--</div>--><!--End Container  -->
<script type="text/javascript">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
$('#uploadBtn').click(function(){
	$( "#image_file" ).click();
});

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

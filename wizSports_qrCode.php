
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
<script>

</script>
</head>
<body class="qrCodePage">
<div class="container">

<input type="button" class="btnQRclose"onClick="closeQR()" value="&#10006;">
<div style="clear:both"></div>
<div class="imageQRholder">
    <img class="imageQR" src="users-folder/<?php echo $_GET["user_name"];?>/liveapp/qrcode.jpg">
</div>




</div><!--End Container  -->


</html>

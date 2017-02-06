<?php 
function to12hr($hours) {
	$num_hours = floatval($hours);
	$num_floored_hours = floor($num_hours);
	if($num_floored_hours<12) {
		if($num_hours==$num_floored_hours) {
			if ($num_hours==0)
			{
				return "12 am";
			}
			return $num_floored_hours." am";
		}
		else {
			if ((int)$num_hours==0)
			{
				return "12:30 am";
			}
			return $num_floored_hours.":30 am";
		}
	}
	elseif($num_floored_hours==12) {
		if($num_hours==$num_floored_hours) {
			return $num_floored_hours." pm";
		}
		else {
			return $num_floored_hours.":30 pm";
		}
	}
	elseif($num_floored_hours<24 and $num_floored_hours>12) {
		if($num_hours==$num_floored_hours) {
			return ($num_floored_hours-12)." pm";
		}
		else {
			return ($num_floored_hours-12).":30 pm";
		}
	}
}

/*
for ($i = 0; $i < 24; $i++)
{
	echo to_12($i)."<br>";
}
echo "<br>";
for ($i = 0; $i < 24; $i+=0.5)
{
	echo to_12($i)."<br>";
}
*/
?>
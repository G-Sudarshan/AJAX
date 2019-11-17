<?php

$data=$_GET['datavalue'];

$a=array('NASHIK','MUMBAI','NAGPUR');

$b=array('Gorakhpur','Lucknow');

$c=array('Patna','Kishanganj');

if($data=="Maharashtra"){
	foreach ($a as $aone) {
		echo "<option>".$aone."</option>";
	}
}

if($data == "UP"){
	foreach ($b as $aone) {
		echo "<option>".$aone."</option>";
	}
}

if($data == "Bihar"){
	foreach ($c as $aone) {
		echo "<option>".$aone."</option>";
	}
}
?>
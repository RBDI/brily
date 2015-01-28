<?
session_start();
include "config.php";
include "functions.php";

$URL_PARTS=get_url();

$slug=$URL_PARTS[0];

$course=get_currency();


if ($slug==''){
	include "template/index.php";
}
elseif ($slug=='step2') {
	include "template/step2.php";
}
elseif ($slug=='step3') {
	include "template/step3.php";
}
elseif ($slug=='step4') {
	include "template/step4.php";
}
?>
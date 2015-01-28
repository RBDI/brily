<?
session_start();
// print isset($_POST['start']);
if (isset($_POST['start'])) $_SESSION['brily']['start']=$_POST['start'];
if (isset($_POST['end'])) $_SESSION['brily']['end']=$_POST['end'];
if ($_POST['lang']) $_SESSION['brily']['lang']=$_POST['lang'];
if ($_POST['cur']) $_SESSION['brily']['cur']=$_POST['cur'];
if ($_POST['class']) $_SESSION['brily']['class']=$_POST['class'];
if ($_POST['cost']) $_SESSION['brily']['cost']=$_POST['cost'];
if ($_POST['distance']) $_SESSION['brily']['distance']=$_POST['distance'];
if ($_POST['time']) $_SESSION['brily']['time']=$_POST['time'];


if ($_POST['info']=='child') $_SESSION['brily']['child']=$_POST['value'];
if ($_POST['info']=='oversize') $_SESSION['brily']['oversize']=$_POST['value'];
if ($_POST['info']=='p_count') $_SESSION['brily']['p_count']=$_POST['value'];

if ($_POST['info']=='r_date') $_SESSION['brily']['route']['date']=$_POST['value'];
if ($_POST['info']=='r_time') $_SESSION['brily']['route']['time']=$_POST['value'];
if ($_POST['info']=='b_date') $_SESSION['brily']['route']['b_date']=$_POST['value'];
if ($_POST['info']=='b_time') $_SESSION['brily']['route']['b_time']=$_POST['value'];
if ($_POST['info']=='check_back_way') $_SESSION['brily']['route']['check_back_way']=$_POST['value'];

if ($_POST['info']=='r_flight') $_SESSION['brily']['route']['flight']=$_POST['value'];
if ($_POST['info']=='r_destination') $_SESSION['brily']['route']['destination']=$_POST['value'];

if ($_POST['info']=='c_name') $_SESSION['brily']['contact']['name']=$_POST['value'];
if ($_POST['info']=='c_email') $_SESSION['brily']['contact']['email']=$_POST['value'];
if ($_POST['info']=='c_phone') $_SESSION['brily']['contact']['phone']=$_POST['value'];
if ($_POST['info']=='c_comment') $_SESSION['brily']['contact']['comment']=$_POST['value'];


?>
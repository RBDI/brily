<?

function send_data()
{
	$class_names[1]='Эконом';
	$class_names[2]='Бизнес';
	$class_names[3]='Первый';
	
	$data=$_SESSION['brily'];
	// print_r($data);

	$email_text.='<h2>'.$data['contact']['name'].'!</h2>
<p>вы заказали такси из <strong>'.$data['start'].'</strong> ('.$data['route']['flight'].') в <strong>'.$data['end'].'</strong>, '.$data['route']['destination'].'</p>
<p>Встреча <strong>'.$data['route']['date'].'</strong> в <strong>'.$data['route']['time'].'</strong><br>
Время в пути: '.$data['time'].'<br>
';
	if ($data['route']['check_back_way']!=1) $email_text.='Обратно: '.$data['route']['b_date'].' '.$data['route']['b_time'];
	
	$email_text.='</p><p>Тариф: '.$class_names[$data['class']].'<br>';
	if ($data['child']) $email_text.='+ детские кресла: '.$child.'<br>';
	if ($data['oversize']) $email_text.='+ негабаритный багаж<br>';

if ($data['contact']['comment']!='') {
	$email_text.='</p><p>Примечание:<br> '.$data['contact']['comment'].'</p>';
}
	$email_text.='<p>Стоимость: '.$data['cost'].'</p>';

	$email_text.='<p>Большое спасибо за ваш заказ!<br> <strong>С вами свяжется менеджер и подтвердит заказ.</strong>';


	$order_info=$data['start'].'; <br>'.$data['end'].'; <br>'.$data['route']['date'].'; <br>'.$data['route']['time'].'; <br>'.$data['distance'].'; <br>'.$data['time'].'; <br>'.$data['route']['destination'].'; <br>'.$data['route']['flight'].'; <br>'.$data['route']['b_date'].'; <br>'.$data['route']['b_time'].'; <br>'.$data['child'].'; <br>'.$data['oversize'].'; <br>'.$data['contact']['name'].'; <br>'.$data['contact']['email'].'; <br>'.$data['contact']['phone'].'; <br>'.$data['contact']['comment'].'; <br>'.$data['cost'].';';

	$email_title='Заказ трансфера на Brily.fr';

	// $title=convert_charset($email_title);
	$title=$email_title;
	$message=convert_charset($email_text);
	
	$adress=$data['contact']['email'];

	$headers  = 'MIME-Version: 1.0
	Content-type: text/html; charset=koi8-r
	From: Brily.fr <mailer@brily.fr>
	';

	require_once('phpgmailer/class.phpgmailer.php');

	$mail = new PHPGMailer();
	$mail->CharSet = "utf-8";
	$mail->Username = 'mail@brily.fr';
	$mail->Password = 'gfhjkm';
	$mail->From = 'mail@brily.fr';
	$mail->FromName = 'Brily Transfer Service';
	$mail->Subject = $title;
	$mail->AddAddress($adress);
	$mail->Body = $message;
	$mail->Send();

	// $ok=mail($adress,$title,$message,$headers);	

	$adress='agrabarnick@gmail.com'; /// write your email adress here	

	$message=convert_charset($order_info);



	$mail = new PHPGMailer();
	$mail->CharSet = "utf-8";
	$mail->Username = 'mail@brily.fr';
	$mail->Password = 'gfhjkm';
	$mail->From = 'mail@brily.fr';
	$mail->FromName = 'Brily Transfer Service';
	$mail->Subject = $title;
	$mail->AddAddress($adress);
	$mail->Body = $message;
	$mail->Send();


	// $ok=mail($adress,$title,$message,$headers);	

}


function convert_charset($item) {
	if ($unserialize = unserialize($item)) {
		foreach ($unserialize as $key => $value) {
			$unserialize[$key] = @iconv('utf-8', 'koi8-r', $value);
		}
		$serialize = serialize($unserialize);
        return $serialize;
	}
	else {
		return @iconv('utf-8', 'koi8-r', $item);
	}
}

function get_currency()
{
	$get_new=0;
	$sql="SELECT * FROM `currency`";
	$result = mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($result)){
		$cur[$row['name']]=$row['value'];
		if ($row['date']!=date('d.m.Y')) $get_new=1;
	}

	if ($get_new==1){
		$url='http://www.cbr.ru/scripts/XML_daily.asp?date_req='.date('d.m.Y');
		$xml=simplexml_load_file($url);
		$usd=str_replace(',', '.', $xml->Valute[9]->Value);
		$eur=str_replace(',', '.', $xml->Valute[10]->Value);

		$date=date('d.m.Y');
		$sql="UPDATE `currency` SET value=$usd, `date`='$date' WHERE ID=1";
		$result = mysql_query($sql) or die(mysql_error());
		$sql="UPDATE `currency` SET value=$eur, `date`='$date' WHERE ID=2";
		$result = mysql_query($sql) or die(mysql_error());

		$cur['USD']=$usd;
		$cur['EUR']=$eur;
	}
	$cur['RUR']=1/$cur['EUR'];
	$cur['USD']=$cur['USD']/$cur['EUR'];
	$cur['EUR']=1;
	return $cur;
}

function in_cur($value, $currency)
{
	global $course;

	return round($value/$course[$currency]);
}

function get_url()
{
	$url = parse_url($_SERVER['REQUEST_URI']);
	$line=$url['path'];	  
	$i=0;
	while ($line) {
		$pos = strpos ($line, "/");
		if ($pos!==false) {
		  if ($pos>0) $URL_PARTS[$i] =  trim(substr ($line, 0, $pos ));
		  $line = substr_replace ($line, "", 0, $pos+1 ) ;
		} else {
		  $URL_PARTS[$i]=$line;
		  $line='';
		}
		if ($pos>0) $i++;
	}
	return $URL_PARTS;
}

?>
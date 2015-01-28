<?
$start=$_SESSION['brily']['start'];
$end=$_SESSION['brily']['end'];
$distance=$_SESSION['brily']['distance'];
$time=$_SESSION['brily']['time'];
$class=$_SESSION['brily']['class'];
$cost=$_SESSION['brily']['cost'];
$cur=$_SESSION['brily']['cur'];

$p_count=$_SESSION['brily']['p_count'];
if ($p_count=='') $p_count=1;

$child=$_SESSION['brily']['child'];
$oversize=$_SESSION['brily']['oversize'];
if ($child=='') $child=0;
if ($oversize=='') $oversize=0;

$route=$_SESSION['brily']['route'];
$contact=$_SESSION['brily']['contact'];

// print_r($_SESSION);

if ($cur=='') {
	$cur='EUR';
	$_SESSION['brily']['cur']='EUR';
}

// print_r ($_SESSION);
// if ($start=='') $start='Аэропорт Шереметьево';
// if ($end=='') $end='Москва, Большая Дмитровка 1';

$class_names[1]='Эконом';
$class_names[2]='Бизнес';
$class_names[3]='Первый';

$cr['EUR']['name']='EUR';
$cr['USD']['name']='USD';
$cr['RUR']['name']='РУБ';
$cr['EUR']['sign']='<i class="fa fa-eur"></i>';
$cr['USD']['sign']='$';
$cr['RUR']['sign']='<i class="fa fa-rub"></i>';

?>
<html>
<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/css/datepicker.css" rel="stylesheet" media="screen">
    <link href="/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="/template/style.css" rel="stylesheet" media="screen">

    <link rel="icon" type="image/png" href="/favicon.png">    
    <link rel="shortcut icon" href="/favicon.png" type="image/png" /> 
   
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,300,400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>	 -->

	<title><? print $title; ?></title>
	
</head>
<body>
<input type="hidden" id="distance_val" value="<? print $distance; ?>">
<div class="top">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<a href="/"><img src="/img/br_logo.png" style="margin-bottom:5px;"></a>
			</div>
			<div class="col-sm-5">
				<ul class="nav nav-tabs index_steps">
					<li role="presentation" class="active"><a href="#">Трансфер</a></li>
					<li role="presentation"><a href="#">Аренда автомобиля</a></li>
					<li role="presentation"><a href="#">Экскурсии</a></li>
				</ul>				
			</div>
			<div class="col-sm-3">
				<div class="top_phone">+33 966 896 434</div>
			</div>
			<div class="col-sm-1">
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    RU
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">EN</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">DE</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">FR</a></li>					    
				  </ul>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
				  	<span id="cur_cur"><? print $cr[$cur]['name'].' '.$cr[$cur]['sign']; ?></span><span class="caret"></span></button>
				  	<input type="hidden" id="current_currency" value="<? print $cur; ?>"></li>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
				  	<?
				  	foreach ($cr as $key => $val) {
				  		print '<li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="currency" id="'.$key.'"><span id="name_'.$key.'">'.$val['name'].'</span> <span id="sign_'.$key.'">'.$val['sign'].'</span></a>
				  		<input type="hidden" id="course_'.$key.'" value="'.$course[$key].'"></li>';
				  	}
				  	?>
				  </ul>
				  
				</div>
			</div>
		</div>
	</div>
</div>
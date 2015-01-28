<?
$title="Brily - Заказ трансфера";
include "header.php"; 
?>
<div class="first_screen">
	<!-- <header>
		<div class="container">
			<div class="row">
				<div class="col-sm-10">
					<a href=""><img src="img/logo.png"></a>
				</div>
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>
	</header> -->
	<div class="container">
		<h1>Онлайн-бронирование трансфера</h1>
		<div class="index_sub_h1">Комфортное такси из аэропорта до отеля</div>
		<div id="warnings_panel"></div>

		
		<div class="well find blueback" name="find">
			<div class="row">
				<div class="col-sm-5">
					
					<strong>Откуда</strong>
					<div class="form-group has-feedback">
						<input type="text" class="form-control input-lg place" value="<? print $start; ?>" id="start" placeholder="Аэропорт, вокзал, город">
						<span class="glyphicon glyphicon-remove-circle form-control-feedback rm_text" id="rm_start" for="start" aria-hidden="true" <? if ($start=='') print 'style="display:none;"'; ?>></span>
					</div>
					<div class="change_city"><i class="fa fa-refresh"></i></div> 
				</div>
				
				<div class="col-sm-5">					
					<strong>Куда</strong>
					<div class="form-group has-feedback">
						<input type="text" class="form-control input-lg place"  value="<? print $end; ?>" id="end" placeholder="Город, вокзал, аэропорт">
						<span class="glyphicon glyphicon-remove-circle form-control-feedback rm_text" id="rm_end" for="end" aria-hidden="true" <? if ($end=='') print 'style="display:none;"'; ?>></span>
					</div>					
		            <!-- <input type="text" name="country" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;"/> -->
		            <!-- <input type="text" name="country" id="autocomplete-ajax-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/> -->
				</div>
				<div class="col-sm-2"><br>
					<button class="btn btn-danger btn-lg" style="width:100%;" id="find"><i class="fa fa-search"></i> Найти</button>
				</div>
			</div>			
		</div>
<!-- 		<ul class="nav nav-tabs index_steps">
		  <li role="presentation" class="active"><a href="#">1. Выбор маршрута</a></li>
		  <li class="arr">&rarr;</li>
		  <li role="presentation"><a href="/step2/">2. Данные пассажира</a></li>
		</ul> -->
	</div>
</div>
<div id="scrl">
	<div id="calculating">
		<i class="fa fa-clock-o"></i> Идет поиск трансфера...
	</div>

	<div id="class_selection" class="collapse">
		<div class="container">
			<div class="row">
				<div class="col-sm-4"><div class="step active"><span class="cir">1</span> Выбор маршрута</div></div>
				<div class="col-sm-4"><div class="step"><span class="cir">2</span> Детали поездки</div></div>
				<div class="col-sm-4"><div class="step"><span class="cir">3</span> Оплата</div></div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h2 id="route_panel">
					</h2>
					<div id="directions_panel">
						Расстояние: <span class="" id="d_distance"></span> Время в пути: <span class="" id="d_time"></span>
					</div>
					<h4>Выберите класс автомобиля</h4>
					<div class="well class">
						<div class="row">
							<div class="col-sm-3" align="center">
								<img src="img/economy.png" class="img-responsive">
							</div>
							<div class="col-sm-6">
								<h3>Эконом</h3>
								<p class="car-descript">VW Golf, Ford Focus, Opel Astra, Audi A3, BMW 3 и т.п.</p>
								<p>Экономичный вариант для компании до 4 человек.</p>
								<i class="fa fa-user"></i> 4 пассажира <i class="fa fa-briefcase"></i> 3 багажных места 
							</div>							 
							<div class="col-sm-3">
								<h3 class="car-price"><span class="e_class_price"></span> <span class="cur_sign"><? print $cr[$cur]['sign']; ?></span></h3>
								<a href="/step2/" onclick="set_class(1);" class="btn btn-success btn-lg">Заказать <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>					
					</div>

					<div class="well class">
						<div class="row">
							<div class="col-sm-3" align="center">
								<img src="img/business.png" class="img-responsive">
							</div>									
							<div class="col-sm-6">
								<h3>Бизнес</h3>
								<p class="car-descript">Mercedes E, VW Passat, Toyota Camry, BMW 5 Series и т.п.</p>
								<p>Для путешествий семьей и длительных поездок.</p>
								<i class="fa fa-user"></i> 4 пассажира <i class="fa fa-briefcase"></i> 3 багажных места 
							</div>
							<div class="col-sm-3">
								<h3 class="car-price"><span class="b_class_price"></span> <span class="cur_sign"><? print $cr[$cur]['sign']; ?></span></h3>
								<a href="/step2/" onclick="set_class(2);" class="btn btn-success btn-lg">Заказать <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>					
					</div>

					<div class="well class">
						<div class="row">
							<div class="col-sm-3" align="center">
								<img src="img/first.png" class="img-responsive">
							</div>
							<div class="col-sm-6">
								<h3>Премиум</h3>
								<p class="car-descript">Mercedes S-class, BMW 7 Series, Audi A7, Lexus GX и т.п.</p>
								<p>Автомобиль высшего класса для вашего комфорта.</p>
								<i class="fa fa-user"></i> 3 пассажира <i class="fa fa-briefcase"></i> 3 багажных места 
							</div>
							<div class="col-sm-3">
								<h3 class="car-price"><span class="f_class_price"></span> <span class="cur_sign"><? print $cr[$cur]['sign']; ?></span></h3>
								<a href="/step2/" onclick="set_class(3);" class="btn btn-success btn-lg">Заказать <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>					
					</div>				 
				</div>
				<div class="col-sm-5" style="display:none;">
					<div id="map_canvas" style="width:100%; height:340px;"></div>				
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="how">
		<div class="container">
			<h2>Как мы работаем?</h2>
			<div class="row">
				<div class="col-sm-4">
					<figure class="thumbnails"><i class="fa fa-money"></i></figure>
					<h3>Фиксированная стоимость</h3>
					Стоимость поездки рассчитывается из километража маршрута. Например, задержка рейса никак не повлияет на стоимость поездки. Водитель дождется Вас в любом случае и отвезет Вас до места назначения.
				</div>
				<div class="col-sm-4">
					<figure class="thumbnails"><i class="fa fa-taxi"></i></figure>
					<h3>Удобная встреча</h3>
					Вас встретят – у выхода из терминал или вагона Вас встретит вежливый водитель с табличкой, поможет с багажом, предоставит всю нужную информацию о поездке. Также в автомобиле Вы сможете бесплатно подключиться к интернету и сообщить Вашим близким, что Вы отлично долетели.
				</div>
				<div class="col-sm-4">
					<figure class="thumbnails"><i class="fa fa-phone"></i></figure>
					<h3>Всесторонняя поддержка</h3>
					Каждый клиент очень важен для нас, поэтому Brily предлагает к Вашим услугам личного ассистента, с которым Вы сможете связаться в любое время и который сможет ответить на все Ваши вопросы – это незаменимый помощник в путешествии за границей.
				</div>				
			</div>
		</div>
	</div>
	<div class="about">
		<div class="container">
			<h2>О компании Brily</h2>
<p>Brily – это международная система поиска и бронирования автомобильных трансферов. Мы выполняем автомобильные трансферы в разных странах мира. Наша цель – помочь Вам подготовить Ваше путешествие, придумать оптимальный способ перемещения во время Вашего путешествия. </p>
<p>Brily встретит Вас в аэропорту и отвезет Вас в Ваш отель. Опытные водители выберут самый оптимальный маршрут и комфортно довезут Вас до места назначения.</p>
<p>Brily может предоставить Вам машину с водителем или без. Больше не нужно стоять в очереди за забронированной машиной, заправленная и подготовленная машина будет ждать Вас там, где Вы этого пожелаете. </p>
<p>Brily также предлагает своим клиентам поддержку в течение всего путешествия. Вы можете в любое время позвонить в наш call-центр, где Вам ответят на все вопросы о выбранном Вами направлении, помогут организовать приезд и отъезд, посоветуют, как можно провести время, куда можно съездить и что посмотреть.</p>
		</div>
	</div>
	<div class="how">
		<div class="container">
			<h2>Популярные направления</h2>
			<div class="row">
				<div class="col-sm-4">Женева, аэропорт – Межев</div>
				<div class="col-sm-4">Женева, аэропорт – Куршавель</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</div>	
<? include "footer.php"; ?>
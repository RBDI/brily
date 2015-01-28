<?
$title="Brily - Данные пассажира";


// $class='Эконом';
// $distance='29,0 км';
// $time='32 мин';
// $cost='2030';

include "header.php";
$class_select[$class]='selected="selected"';
$child_select[$child]='selected="selected"';
$oversize_select[$oversize]='selected="selected"';
?>
	<div class="step2">	
<!-- 	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-10">
					<a href="/"><img src="/img/logo.png"></a>
				</div>
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>
	</header>	 -->	
		<div class="container info">
			<div class="row">
				<div class="col-sm-4"><div class="step"><span class="cir">1</span> Выбор маршрута</div></div>
				<div class="col-sm-4"><div class="step active"><span class="cir">2</span> Детали поездки</div></div>
				<div class="col-sm-4"><div class="step"><span class="cir">3</span> Оплата</div></div>
			</div>
			

			<div class="row" id="user_data">
				<div class="col-md-8">
					<div class="user_data_block">
						<h3>Маршрут</h3>
						<div class="route"><span id="start"><? print $start; ?></span> &rarr; <span class="end"><? print $end; ?></span> <a href="/">Изменить <span class="glyphicon glyphicon-pencil"></span></a></div>
						<div class="route_info desc">Расстояние: <? print round($distance/1000,1); ?> км, Время в пути: ~<? print $time; ?>.</div>					
						<strong>Дата и время*</strong>
						<div class="row">
							<div class="col-sm-6">
								
								<!-- <input type="text" class="form-control" > -->
								<div class="input-group date">
									<input type="text" id="r_date" class="form-control inf required" value="<? print $route['date']; ?>" placeholder="dd.mm.yyyy"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" id="r_time" class="form-control inf required" value="<? print $route['time']; ?>" placeholder="00:00"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
								</div>
							</div>
							<div class="col-sm-6 desc">Дата и время встречи</div>
						</div>
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_back_way" <? if ($route['check_back_way']==1) print 'checked value="1"'; ?> > <span class="glyphicon glyphicon-transfer"></span> Обратный трансфер
						    </label>
						</div>
						<div class="row" id="back_way" <? if ($route['check_back_way']==1) print 'style="display:block;"' ?> >
							<div class="col-sm-6">							
								<div class="input-group date">
									<input type="text" id="b_date" class="form-control inf" value="<? print $route['b_date']; ?>" placeholder="dd.mm.yyyy"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" id="b_time" class="form-control inf" value="<? print $route['b_time']; ?>" placeholder="00:00"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
								</div>
							</div>
							<div class="col-sm-6 desc">Дата и время обратного трансфера*</div>
						</div>					
						<strong>Место назначения*</strong>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control inf required" id="r_destination" value="<? print $route['destination']; ?>" placeholder="Например: Horel Europe">
							</div>
							<div class="col-sm-6 desc">Если не знаете точный адрес, достаточно указать название отеля или район города</div>
						</div>
						Номер авиарейса
						<div class="row">
							<div class="col-sm-6">
								
								<input type="text" class="form-control inf" id="r_flight" value="<? print $route['flight']; ?>" placeholder="Например: FM239889">
							</div>
							<div class="col-sm-6 desc">Указан в информации о билете от авиакомпании или продавца билетов</div>
						</div>
					</div>
					<div class="user_data_block">
						<h3>Тариф</h3>
						<div class="row">
							<div class="col-sm-6">
								<select id="class" class="form-control">
								  <option <? print $class_select[1]; ?> value="1">Эконом</option>
								  <option <? print $class_select[2]; ?> value="2">Бизнес</option>
								  <option <? print $class_select[3]; ?> value="3">Первый</option>							  
								</select>							
							</div>
							<div class="col-sm-6 desc">Для путешествий семьей и длительных поездок.</div>
						</div>
						Количество пассажиров
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon chng" id="cnt_minus"><i class="fa fa-minus"></i></span><input type="text" class="form-control inf" id="p_count" placeholder="1" value="<? print $p_count; ?>"><span class="input-group-addon chng" id="cnt_plus"><i class="fa fa-plus"></i></span>								
								</div>
							</div>
							<div class="col-sm-6 desc"></div>
						</div>
						Детские кресла
						<div class="row">
							<div class="col-sm-6">
								<select id="child" class="form-control inf">
								  <option <? print $child_select[0]; ?> value="0">Нет</option>
								  <option <? print $child_select[1]; ?> value="1">1</option>
								  <option <? print $child_select[2]; ?> value="2">2</option>
								  <option <? print $child_select[3]; ?> value="3">3</option>
								  <option <? print $child_select[4]; ?> value="4">4</option>							  
								</select>
							</div>
							<div class="col-sm-6 desc">
								Дополнительная услуга, стоимость 270 р. / кресло
							</div>
						</div>
						Негабаритный багаж
						<div class="row">
							<div class="col-sm-6">
								<select id="oversize" class="form-control inf">
								  <option <? print $oversize_select[0]; ?> value="0">Нет</option>
								  <option <? print $oversize_select[1]; ?> value="1">Да</option>
								</select>
							</div>
							<div class="col-sm-6 desc">
								Лыжи, сноуборды, оборудование.
							</div>
						</div>						
					</div>

					<h3>Контактная информация</h3>
					<strong>Имя и фамилия*</strong> (латинскими буквами)
					<div class="row">
						<div class="col-sm-6">							
							<input type="text" id="c_name" class="form-control inf required" value="<? print $contact['name']; ?>" placeholder="Например: Fedor Ivanov">
						</div>
						<div class="col-sm-6 desc">Имя и фамилия будут написаны у водителя на табличке при встрече</div>
					</div>
					<strong>Адрес электронной почты*</strong>
					<div class="row">
						<div class="col-sm-6">
							<input type="email" id="c_email" class="form-control inf required" value="<? print $contact['email']; ?>" placeholder="E-mail">
						</div>
						<div class="col-sm-6 desc">На этот адрес мы отправим подтверждение брони с информацией о трансфере</div>
					</div>
					<strong>Номер телефона с кодом страны*</strong>
					<div class="row">
						<div class="col-sm-6">							
							<input type="text" id="c_phone" class="form-control inf required" value="<? print $contact['phone']; ?>" placeholder="+74957778899">
						</div>
						<div class="col-sm-6 desc">Этот телефон должен быть доступен в стране трансфера, чтобы водитель мог связаться с вами</div>
					</div>
					Примечание
					<div class="row">
						<div class="col-sm-12">							
							<textarea class="form-control inf" id="c_comment" rows="3" placeholder="Любая дополнительная информация"><? print $contact['comment']; ?></textarea>
						</div>						
					</div>
					<div class="row">
						<div class="col-sm-6"><a href="/" class="btn btn-default btn-lg">&larr; Назад</a></div>
						<div class="col-sm-6" align="right"><a href="javascript: validate_data();" class="btn btn-success btn-lg">Перейти к оплате &rarr;</a></div>
					</div>					
				</div>
				<div class="col-md-4">
					<div class="right_info border" data-spy="affix" data-offset-top="200" data-offset-bottom="170">
						<h4>Информация о заказе</h4>
						<div class="info_block">
							<div class="desc">Место и время встречи</div>
							<span id="start"><? print $start; ?></span>
							<div id="meet_date_time"><? print $route['date'].' '.$route['time']; ?></div>
							<div id="flight"><? print $route['flight']; ?></div>
						</div>
						<div class="info_block">
							<div class="desc">Место назначения</div>
							<span id="end"><? print $end; ?></span>, <span id="destination"><? print $route['destination']; ?></span>
						</div>
						<div class="info_block" id="w_back" <? if ($route['check_back_way']!=1) print 'style="display:none;"'; ?>>
							<div class="desc">Обратный трансфер</div>
							<div id="back_date_time"><? print $route['b_date'].' '.$route['b_time']; ?></div>
						</div>						
						<div class="info_block">
							<div class="desc">Тариф</div>
							<span id="class"><? print $class_names[$class]; ?></span><span id="child"><? if ($child) print '<br> + детские кресла: '.$child; ?></span> <span id="oversize"><? if ($oversize) print '<br>+ негабаритный багаж'; ?></span>							
						</div>
						<h4>Стоимость трансфера</h4>
						<div class="total_cost">
							<span class="e_class_price" <? if ($class!=1) print 'style="display:none;"' ?>></span>
							<span class="b_class_price" <? if ($class!=2) print 'style="display:none;"' ?>></span>
							<span class="f_class_price" <? if ($class!=3) print 'style="display:none;"' ?>></span>
							<span class="cur_sign"><? print $cr[$cur]['sign']; ?></span>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<? include "footer.php"; ?>
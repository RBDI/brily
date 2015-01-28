<?
$title="Brily - Оплата заказа";


// $class='Эконом';
// $distance='29,0 км';
// $time='32 мин';
// $cost='2030';

include "header.php";
$class_select[$class]='selected="selected"';
$child_select[$child]='selected="selected"';
?>
	<div class="step2">	
	<!-- <header>
		<div class="container">
			<div class="row">
				<div class="col-sm-10">
					<a href="/"><img src="/img/logo.png"></a>
				</div>
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>
	</header>		 -->
		<div class="container info">
			<h2>Оплата заказа</h2>
			<div class="border">
			<div class="row">
				<div class="col-sm-4">
					<h3>Тариф</h3>
					<div class="p_info"><? print $class_names[$class]; ?></div>
					Количество пассажиров
					<div class="p_info"><? print $p_count; ?></div>
					<? if ($child>0) { ?>
					Детские кресла
					<div class="p_info"><? print $child; ?> </div>
					<? } ?>
					<input id="child" type="hidden" value="<? print $child; ?>">
				</div>
				<div class="col-sm-4">
					<h3>Маршрут</h3>
					<div class="route"><span id="start"><? print $start; ?></span> &rarr; <span class="end"><? print $end; ?></span></div>
					<div class="route_info desc">Расстояние: <? print round($distance/1000,1); ?> км, Время в пути: ~<? print $time; ?>.</div>					
					Дата и время
					<div class="p_info"><? print $route['date'].' '.$route['time']; ?></div>
					Номер авиарейса
					<div class="p_info"><? print $route['flight']; ?></div>
					Место назначения
					<div class="p_info"><? print $route['destination']; ?></div>

					<? if ($route['check_back_way']==1) { ?>
						Обратный трансфер
						<div class="p_info"><? print $route['b_date'].' '.$route['b_time']; ?></div>
						<input id="check_back_way" type="hidden" value="1">
					<? } else { ?>
						<input id="check_back_way" type="hidden" value="0">
					<? } ?>

				</div>
				<div class="col-sm-4">
					<h3>Контактная информация</h3>
					Имя и фамилия латинскими буквами
					<div class="p_info"><? print $contact['name']; ?></div>
					Адрес электронной почты
					<div class="p_info"><? print $contact['email']; ?></div>
					Номер телефона с кодом страны
					<div class="p_info"><? print $contact['phone']; ?></div>
					Примечание
					<div class="p_info"><? print $contact['comment']; ?></div>				
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-sm-4">
						<div class="total_cost">
							<span id="e_class_price" <? if ($class!=1) print 'style="display:none;"' ?>></span>
							<span id="b_class_price" <? if ($class!=2) print 'style="display:none;"' ?>></span>
							<span id="f_class_price" <? if ($class!=3) print 'style="display:none;"' ?>></span>
							<span class="cur_sign"><? print $cr[$cur]['sign']; ?></span>
							<div style="display:none;">
								
							</div>
						</div>
				</div>
				<div class="col-sm-4">
					Способ оплаты:<br>
					<input type="radio" name="pay_type" value="1"> Наличными водителю
					<div style="margin-top:15px;">
						<input type="radio" name="pay_type" id="pay_type" value="2" checked>  <label for="pay_type"><img src="/img/paypal.png" width="200"></label>
					</div>
				</div>
				<div class="col-sm-4">
						<div class="row">
						<div class="col-sm-6"><a href="/step2/" class="btn btn-default btn-lg">&larr; Назад</a></div>
						<div class="col-sm-6" align="right">
							<a href="/step4/" class="btn btn-success btn-lg">Оплатить заказ</a>
<!-- <form method="post" action= "https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_xclick">

<input type="hidden" name="business" value="agrabarnick@gmail.com">
<input type="hidden" name="item_name" id="pay_name" value="AAA">
<input type="hidden" name="charset" value="UTF-8">
<input type="hidden" name="lc" value="RU">
<input type="hidden" name="item_number" value="0001">
<input type="hidden" name="amount" id="pay_value" value="100">
<input type="hidden" name="currency_code" value="RUB">
<input type="hidden" name="return" value="http://brily.fr">
<input type="hidden" name="cancel_return" value="http://brily.fr">

<input type="hidden" name="no_shipping" value="1">
<input type="submit" value="Оплатить" class="btn btn-success btn-lg myfont">
<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
</form> -->
						</div>
					</div>	
				</div>
			</div>

		</div>
	</div>
<? include "footer.php"; ?>
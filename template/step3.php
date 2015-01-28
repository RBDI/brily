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
			<div class="row">
				<div class="col-sm-4"><div class="step"><span class="cir">1</span> Выбор маршрута</div></div>
				<div class="col-sm-4"><div class="step"><span class="cir">2</span> Детали поездки</div></div>
				<div class="col-sm-4"><div class="step active"><span class="cir">3</span> Оплата</div></div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div style="font-size:22px;"><? print $contact['name']; ?>,</div>
					<div style="font-size:18px;">
				вы заказали такси из <strong><? print $start; ?></strong><? if ($route['flight']) print ' ('.$route['flight'].')'; ?> в <strong><? print $end; ?></strong> (<? print $route['destination']; ?>), встреча <strong><? print $route['date'].'</strong> в <strong>'.$route['time']; ?>.</strong> 
				Время в пути: ~<? print $time; ?>
					</div>
					<div class="user_data_block">
						<h3>Сумма к оплате</h3>
						<div class="total_cost step3_total_cost">
							<span class="e_class_price" <? if ($class!=1) print 'style="display:none;"' ?>></span>
							<span class="b_class_price" <? if ($class!=2) print 'style="display:none;"' ?>></span>
							<span class="f_class_price" <? if ($class!=3) print 'style="display:none;"' ?>></span>
							<span class="cur_sign"><? print $cr[$cur]['sign']; ?></span>
							<div style="display:none;"></div>
						</div>						
					</div>
					 
						<h3 style="margin-top:0px;">Способ оплаты</h3>
						<div class="row">
							<div class="col-sm-6">
								<div class="border" align="center">
									<div style="margin:19px 0px">
										<input type="radio" name="pay_type" value="1">  Наличными водителю
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="border" align="center">
										<input type="radio" name="pay_type" id="pay_type" value="2" checked>  <label for="pay_type"><img src="/img/paypal.png" width="180" style="margin-top:10px;"></label>									 
								</div>
							</div>
						</div>
					 
			 
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
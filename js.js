// $(function() {
//   $('a[href*=#_]:not([href=#])').click(function() {
//     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//       if (target.length) {
//         $('html,body').animate({
//           scrollTop: target.offset().top
//         }, 300);
//         return false;
//       }
//     }
//   });
// });



var directionsDisplay;
var directionsService;

$('#r_date').datepicker({
  format: "dd.mm.yyyy"  
})
.on('changeDate', function(ev){
   $('#meet_date_time').html($('#r_date').val()+' '+$('#r_time').val());
   set_info('#r_date');
});

$('#r_time').on( "change", function() {
  $('#meet_date_time').html($('#r_date').val()+' '+$('#r_time').val());  
  set_info('#r_time');
});



$('#b_date').datepicker({
  format: "dd.mm.yyyy"  
})
.on('changeDate', function(ev){
   $('#back_date_time').html($('#b_date').val()+' '+$('#b_time').val());
   set_info('#b_date');
});

$('#b_time').on( "change", function() {
  $('#back_date_time').html($('#b_date').val()+' '+$('#b_time').val());
  set_info('#b_time');
});

$('.required').focus(function() {
  $(this).css( "background-color", "#FFF" ); 
});
 

function validate_data () {
  var is = true;
  $('.required').each(function() {
    if ($(this).val()=='') {
      $(this).css( "background-color", "#FFCCCC" );
      is=false;
    }
  });
  if (is) document.location.href = "/step3/";
}


calcPrice();

$('#class').on( "change", function() {
  var myclass = $('#class').val();
  $('.e_class_price').hide();
  $('.b_class_price').hide();
  $('.f_class_price').hide();
  if (myclass==1) $('.e_class_price').show();
  else if(myclass==2) $('.b_class_price').show();
  else if(myclass==3) $('.f_class_price').show();
  
  // $('#total_cost').html(in_cur(total_cost));
  $.post("/post.php", { 'class':myclass}, function(data){}); 
});

$('#child').on( "change", function() {
  calcPrice();  
});

$('#check_back_way').on( "change", function() {
  if ($(this).prop('checked')) {
    $('#back_way').show();
    $('#w_back').show();
    $(this).val('1');
    set_info('#check_back_way');
  }
  else {
    $('#b_date').val('');
    
    set_info('#b_date');
    $('#b_time').val('');
    set_info('#b_time');
    $('#back_way').hide();
    $('#w_back').hide();
    $('#back_date_time').html('');
    $(this).val('0');
    set_info('#check_back_way');
  }
  calcPrice();
});

$('.inf').on( "change", function() {
  set_info(this);
});

function set_info (object) {
  var name = $(object).attr('id');
  var value = $(object).val();
  // alert(name+":"+value);
  $.post("/post.php", {info:name, value:value}, function(data){ }); 
}

$('.rm_text').click(function() {
  var id = $(this).attr('for');
  $('#'+id).val('');
  $(this).hide();
});

$('.place').on( "change", function() {
  var id=$(this).attr('id');
  
  if ($(this).val()!='') $('#rm_'+id).show();
  else $('#rm_'+id).hide();
});



$('.currency').click(function() {
  var id = $(this).attr('id');
  var currency = $('#name_'+id).html()+' '+$('#sign_'+id).html();
  $.post("/post.php", {'cur':id}, function(data){}); 
  $('#cur_cur').html(currency);
  $('.cur_sign').html($('#sign_'+id).html());
  $('#current_currency').val(id);
  calcPrice();
});

$('#cnt_minus').click(function() {
  var p_count=$('#p_count').val();
  if (p_count>1) p_count--;
  $('#p_count').val(p_count);
  set_info('#p_count');
});

$('#cnt_plus').click(function() {
  var p_count=$('#p_count').val();
 p_count++;
  $('#p_count').val(p_count);
  set_info('#p_count');
});

$('.change_city').click(function() {
  var start = $('#start').val();
  $('#start').val($('#end').val());
  $('#end').val(start);
});

function in_cur (val) {
  var cur = $('#current_currency').val();
  var course = $('#course_'+cur).val();
  return Math.round(val/course);
}

function set_class (myclass) {

  if (myclass==1) var total_cost =  $('.e_class_price').html();
  else if(myclass==2) var total_cost =  $('.b_class_price').html();
  else if(myclass==3) var total_cost =  $('.f_class_price').html();

  $.post("/post.php", {'class':myclass, cost:total_cost}, function(data){}); 
}

function initialize() {
	directionsService = new google.maps.DirectionsService();
  var myLatlng = new google.maps.LatLng(-34.397, 150.644);
  var myOptions = {
      zoom: 8,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
  var rendererOptions = {
		map: map
	}
	directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
}

$('#find').click(function(){
	calcRoute();
  if ($('#start').val() && $('#end').val()) {
    $('html,body').animate({ scrollTop: $('#scrl').offset().top }, 300);
  }
});

initialize();
calcRoute();

function calcRoute() {

  var start = $('#start').val();
  var end = $('#end').val();

  $.post("/post.php", {start:start, end:end}, function(data){
    // alert(data);
  });

  if (start!=''&&end!=''){
    $('#calculating').show();
    var request = {
        origin: start,
        destination: end,
        durationInTraffic: false,
        provideRouteAlternatives: true,
        travelMode: google.maps.TravelMode.DRIVING
    };

    // Route the directions and pass the response to a
    // function to create markers for each step.
    

    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        var warnings = document.getElementById('warnings_panel');
        warnings.innerHTML = '<b>' + response.routes[0].warnings + '</b>';
        directionsDisplay.setDirections(response);
        var route = response.routes[0];

        var total_distance=0;
        for (var i = 0; i < route.legs.length; i++) {
          var routeSegment = i + 1;
          total_distance+=route.legs[i].distance.value;
          $('#route_panel').html(start+' &rarr; '+end);
          $('#distance_val').val(total_distance);
          $('#d_distance').html(route.legs[i].distance.text);
          $('#d_time').html('~'+route.legs[i].duration.text);
          $.post("/post.php", {distance:total_distance, time:route.legs[i].duration.text}, function(data){}); 
          
        }
        calcPrice();
        $('#calculating').hide();
        // $('#class_selection').show();
        $('#class_selection').collapse('show');
        return true;
      }
    });
  }
  else {
    // $('#class_selection').hide();

      $('#class_selection').collapse('hide');
      return false;

  }
}

function calcPrice() {
  var total_distance = $('#distance_val').val();

  var b_way = 1;
  if ($('#check_back_way').val()==1) b_way=2;

  var child = 0;
  if ($('#child').val()>0) child=$('#child').val()*270;

  // var e_price=((Math.round(((total_distance/1000)*70)/10))*10+child)*b_way;
  // var b_price=((Math.round(((total_distance/1000)*110)/10))*10+child)*b_way;
  // var f_price=((Math.round(((total_distance/1000)*170)/10))*10+child)*b_way;

  var e_price=((Math.round(((total_distance/1000)*2)))+child)*b_way;
  var b_price=((Math.round(((total_distance/1000)*2.5)))+child)*b_way;
  var f_price=((Math.round(((total_distance/1000)*3)))+child)*b_way;

  $('.e_class_price').html(in_cur(e_price));
  $('.b_class_price').html(in_cur(b_price));
  $('.f_class_price').html(in_cur(f_price));
}


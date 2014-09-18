  jQuery(document).ready(function($) {

    if ($.browser.msie && $.browser.version < 7) return; // Don't execute code if it's IE6 or below cause it doesn't support it.

      $(".fade").fadeTo(1, 1);
      $(".fade").hover(
        function () {
          $(this).fadeTo("fast", 0.6);
        },
        function () {
          $(this).fadeTo("slow", 1);
        }
    );

    $('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });

    /* initialize prettyphoto */
    $("a[rel^='prettyPhoto']").prettyPhoto({
  		theme: 'light_rounded'
    });


	$(".toggle_title").toggle(
		function(){
			$(this).addClass('toggle_active');
			$(this).siblings('.toggle_content').slideDown("fast");
		},
		function(){
			$(this).removeClass('toggle_active');
			$(this).siblings('.toggle_content').slideUp("fast");
		}
	);

	$(".tabs_container").each(function(){
		$("ul.tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$(".mini_tabs_container").each(function(){
		$("ul.mini_tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$.tools.tabs.addEffect("slide", function(i, done) {
		this.getPanes().slideUp();
		this.getPanes().eq(i).slideDown(function()  {
			done.call();
		});
	});
  /*
  	Get The List of locations in district
  */
  $('#district').change(function(){
  					var district=$('#district').val();
  					if(district!=='')
  					{
  						$.ajax(
  							{
  								url: 'http://localhost/details/district/'+district+'/?list=1',
  								type:'get',
  								success: function(result){
  										try
  										{
  											var re=jQuery.parseJSON(result);
  											$.each(re, function(key, value) {
     																$('#location').append($('<option>', { value : key }).text(value));
     													});
     									}
  										catch(err)
  										{
  											$('#location').find('option').remove().end().append('<option value="">None</option>').text('None');
  										}
  									}
  							});
  					}
  					else
  					{
  						$('#location').find('option').remove().end().append('<option value="">None</option>').text('None');
  					}
				});
  /* Contact Form Processing*/
  $('#buttonsend').click( function() {

		var name    = $('#contactname').val();
		var subject = $('#contactsubject').val();
		var email   = $('#contactemail').val();
		var message = $('#contactmessage').val();
		var siteurl = $('#siteurl').val();
		var sendto = $('#sendto').val();

		$('.loading').fadeIn('fast');

		if (name != "" && subject != "" && email != "" && message != "")
			{

				$.ajax(
					{
						url: siteurl+'/sendemail.php',
						type: 'POST',
						data: "name=" + name + "&subject=" + subject + "&email=" + email + "&message=" + message+ "&sendto=" + sendto,
						success: function(result)
						{
							$('.loading').fadeOut('fast');
							if(result == "email_error") {
								$('#contactemail').next('.require').text(' !');
							} else {
								$('#contactname, #contactsubject, #contactemail, #contactmessage').val("");
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });
							}
						}
					}
				);
				return false;

			}
		else
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#contactname').next('.require').text(' !');
				if(subject == "") $('#contactsubject').next('.require').text(' !');
				if(email == "" ) $('#contactemail').next('.require').text(' !');
				if(message == "") $('#contactmessage').next('.require').text(' !');
				return false;
			}
	});

	$('#addImage').click(function() {
		$('#contactForm').attr('target','upload_target');
		document.getElementById("upload_target").onload = uploadDone;
		return false;
	});
	/* Contact Form Processing */
	$('#contactSend').click( function() {
		$('#contactForm').submit();
		return false;
	});

/* Crop Type Form Processing */
$('#cropTypeSend').click( function() {

		var name    = $('#name').val();

		$('.loading').fadeIn('fast');

		if (name != "")
			{
				var data=$('#cropTypeForm').serialize();
				var url='http://localhost/admin/add/croptype/';
			$.ajax({
						url: url,
						type: 'POST',
						data: data,
						success: function(result)
						{
							$('.loading').fadeOut('fast');
							var re=jQuery.parseJSON(result);
							if(result == "add_error") {
								$('#name').next('.require').text(' !');
							} else {
								$('#name,#details').val("");
								$('.success-message').html(re.msg).show().fadeOut(8000, function(){ $(this).remove(); });
							}
						}
					}
				);
				$('.loading').fadeOut('fast');
				return false;

			}
		else
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#name').next('.require').text(' !');
				return false;
			}
	});



/* Crop Form Processing */
$('#cropsend').click( function() {

		var name    = $('#name').val();
		var type= $('#type').val();
		/*
		var name    = $('#name').val();
		var sci_name = $('#sci_name').val();
		var climate   = $('#climate').val();
		var soil = $('#soil').val();
		var variaties = $('#variaties').val();
		var dur = $('#dur').val();
		var diseases=$('#diseases').val();
		var bio_fert=$('#bio_fert').val();
		var market_price=$('#market_price').val();
		var details=$('#details').val();
		var type=$('#type').val();
		*/
		$('.loading').fadeIn('fast');

		if (name != "" && type!="")
			{
				var data=$('#cropForm').serialize();
				data=data+'&action=""';
				var url='http://localhost/admin/add/crop';
				/*
				$.ajax(
					{
						url: 'http://localhost/admin/add/?s=crop',
						type: 'POST',
						data: "name=" + name + "&sci_name=" + sci_name + "&climate=" + climate + "&soil=" + soil+ "&variaties=" + variaties + "&dur=" + dur + "&diseases=" + diseases + "&bio_fert=" + bio_fert + "&market_price=" + market_price + "&details=" + details + "&type=" + type + "&action=''",
						success: function(result)
						{
							$('.loading').fadeOut('fast');
							if(result == "add_error") {
								$('#name').next('.require').text(' !');
							} else {
								$('#name, #sci_name, #climate, #soil, #variaties, #dur, #diseases, #bio_fert, #market_price, #details, #type').val("");
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });
							}
						}
					}
				);
			*/
			$.ajax({
						url: url,
						type: 'POST',
						data: data,
						success: function(result)
						{
							$('.loading').fadeOut('fast');
							var re=jQuery.parseJSON(result);
							if(result == "add_error") {
								$('#name').next('.require').text(' !');
							} else {
								$('#name, #sci_name, #climate, #soil, #variaties, #dur, #diseases, #bio_fert, #market_price, #details, #type').val("");
								$('.success-message').html(re.msg).show().fadeOut(8000, function(){ $(this).remove(); });
							}
						}
					}
				);
				$('.loading').fadeOut('fast');
				return false;

			}
		else
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#name').next('.require').text(' !');
				return false;
			}
	});

/* Crop Update Form Processing
$('#cropsend').click( function() {

		var name    = $('#name').val();
		var sci_name = $('#sci_name').val();
		var climate   = $('#climate').val();
		var soil = $('#soil').val();
		var variaties = $('#variaties').val();
		var dur = $('#dur').val();
		var diseases=$('#diseases').val();
		var bio_fert=$('#bio_fert').val();
		var market_price=$('#market_price').val();
		var details=$('#details').val();
		var type=$('#type').val();

		$('.loading').fadeIn('fast');

		if (name != "")
			{

				$.ajax(
					{
						url: 'http://localhost/admin/add/?s=crop',
						type: 'POST',
						data: "name=" + name + "&sci_name=" + sci_name + "&climate=" + climate + "&soil=" + soil+ "&variaties=" + variaties + "&dur=" + dur + "&diseases=" + diseases + "&bio_fert=" + bio_fert + "&market_price=" + market_price + "&details=" + details + "&type=" + type + "&action=''",
						success: function(result)
						{
							$('.loading').fadeOut('fast');
							if(result == "add_error") {
								$('#name').next('.require').text(' !');
							} else {
								$('#name, #sci_name, #climate, #soil, #variaties, #dur, #diseases, #bio_fert, #market_price, #details, #type').val("");
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });
							}
						}
					}
				);
				return false;

			}
		else
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#name').next('.require').text(' !');
				return false;
			}
	});

*/

		$('#contactname, #contactsubject, #contactemail,#contactmessage').focus(function(){
			$(this).next('.require').text(' *');
		});

	});


function submitForm(data,url)
{

}


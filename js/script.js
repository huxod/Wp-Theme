/* 

Name: File js hlportfolio 
Author: Hubert Langier
*/
$(document).ready(function(){

	/*Canvas skils circle*/
	function startDrawing(wrap){
		var wrapperele = document.getElementById(wrap)
		var ele = wrapperele.getElementsByClassName('myCircle'),
		count = 0,hCan = ele[0].getAttribute("height");
		console.log(hCan);
		/* Draw Circle  */

		function drawCircle(context) {
			var anglex = 2 / 1000,
			angle = (anglex * context.dataset.percent) * 10,
			cColor = context.dataset.color,
			a = 0,
			timeoutID;

			function canva(con, ang) {
				var con = con.getContext('2d');
				con.strokeStyle = cColor;
				con.lineWidth = hCan / 33;
				con.lineCap = "round";
				con.beginPath();
				con.arc(hCan/2, hCan/2, hCan/2.2, 0, (ang * Math.PI), false);
				con.stroke();

				con.beginPath();
				con.strokeStyle = cColor;
				con.shadowBlur = 2;
				con.shadowColor = cColor;
				con.lineWidth = 0.6;
				con.lineCap = "round";
				con.arc(hCan/2, hCan/2, (hCan/2.2)-(hCan / 33), 0, 2 * Math.PI, false);
				con.stroke();
			}
			/* Animation draw Circle */
			var c = 0;

			function counterC() {
				if (context.dataset.percent >= c) {
					context.nextSibling.innerHTML = c;
					c++;
				};
			};

			function startDraw() {
				if (a >= angle) {
					window.clearInterval(timeoutID);
				}

				a = a + (anglex * 10);

				var coni = context.getContext('2d');
				coni.clearRect(0, 0, hCan, hCan);
				canva(context, a);
				counterC();
			}
			timeoutID = window.setInterval(startDraw, 10);
		}
		/* Get all Canvas */

		for (i = 0; ele.length > i; i++) {
			var element = ele[i];
			drawCircle(element);

		}
	}


	/* Fix Navbar*/	
	var position, swichone = 'open',swichtwo = 'open';
	var pos = function(){
		position = $(window).scrollTop();
		if(position >= 70){
			$('.menu-logo-wrapper').addClass('top');
		}else if($('.menu-logo-wrapper').hasClass('top')){
			$('.menu-logo-wrapper').removeClass('top');
		}
	};
	var posi = function(p_name, tr){
		if($('.menu-item').hasClass('active')){
			$('.menu-item').removeClass('active');
		}
		var trn = $(tr).attr('id');
		
		$(p_name).addClass('active');
		var cordY = parseInt(tr.offset().top - 60);
		$(window).scroll(function(){

			if(position == cordY){
				$(this).offsetParent().addClass('active');
			}
		});	
	};
	/* Activate Fix navbar */
	pos();
	$(window).scroll(function(){
		pos();
	});	
	if((swichone === 'open')||(swichtwo === 'open')){
		$(window).scroll(function(){
			if(((parseInt($('#skils').find('.wrapper_canvas').offset().top) - $(window).height()) <= $(window).scrollTop())&&(swichone === 'open')){
				startDrawing('skils');
				swichone ='close';
			};
		});

	};
	var wCanvas = $('.myCircle').width();
	var hCanvas = $('.myCircle').height();
	$('.myCircle').attr('width',wCanvas);
	$('.myCircle').attr('height',hCanvas);
	/*Smoth scroll*/
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top - 60
				}, 1400 ,posi(this,target));
				return false;
			}
		}
	});
	/*Content*/

	/* Portfolio */
	$('img.portfolio').wrap('<div class="wrapper_img"></div>');
	/*Ajax Php*/
	$('#hlp_submit_button').click(function(e){
		if(($('input[name="hlp_contact_name"]').val() ==  '')||($('input[name="hlp_contact_email"]').val() ==  '')||($('input[name="hlp_contact_subject"]').val() ==  '')||($('input[name="hlp_contact_message"]').val() ==  '')){
			console.log('dupa');
			e.preventDefault();
		}else{
			console.log('ok \n'+$('input[name="hlp_contact_name"]').val());
		}
	});
console.log('git');
});
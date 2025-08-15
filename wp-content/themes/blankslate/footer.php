<div class="clear"></div>
</div>
<div id="floatingfootercover"></div>
<footer id="footer" role="contentinfo">
<div class="row animated fadeInUp" data-appear-top-offset="-200" data-animated="fadeInUp">
				
				<div class="col-lg-6 col-md-6 col-sm-6 padbot30 foot_about_block footer_item">
					<h4>about me</h4>
					<p>Anjo Santos is another creative individual who loves the color green and would like to share his visions to the world through making websites, contents, and photos.</p>
					<ul class="social">
						<li><a href="https://www.facebook.com/anjo.santos"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/anjo_santos/"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.youtube.com/channel/UCbiO7PUkcganJUMG7GqW9rw?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
						<li><a href="https://twitter.com/njo_santos"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				
				<div class="respond_clear"></div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 padbot30 footer_item">
					<h4>contact me</h4>
					<?php echo do_shortcode('[ninja_form id=1]') ?>
					<p>You can also reach me through <a class="footerlink" href="mailto:anjosantos92@gmail.com">anjosantos92@gmail.com</a></p>
					<!-- CONTACT FORM -->
					<!--
					<div class="span9 contact_form">
						<div id="note"></div>
						<div id="fields">
							<form id="contact-form-face" class="clearfix" action="#">
								<input type="text" name="name" value="Name" onfocus="if (this.value == 'Name') this.value = '';" onblur="if (this.value == '') this.value = 'Name';">
								<textarea name="message" onfocus="if (this.value == 'Message') this.value = '';" onblur="if (this.value == '') this.value = 'Message';">Message</textarea>
								<input class="contact_btn" type="submit" value="Send message">
							</form>
						</div>
					</div>--><!-- //CONTACT FORM -->
				</div>
			</div>
</footer>
</div>
<?php wp_footer(); ?>

<script type='text/javascript' src='/wp-includes/js/merged-scripts.js'></script>
<script type='text/javascript' src='/wp-includes/js/jQuery-svg-progress-min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jQuery-viewport-checker/1.8.8/jquery.viewportchecker.min.js'></script>


<script>
var $j = jQuery.noConflict();
	$j(document).ready(function() {
		var currentLocation = window.location;
		if(currentLocation == "https://www.anjosantos.com/" || String(currentLocation).startsWith("https://www.anjosantos.com/#")){
			if(currentLocation == "https://www.anjosantos.com/"){
				$j('div#responsive-menu-wrapper li.menu-item a:first').addClass("active");
			}
			
			$j(document).on("scroll", onScroll);

			$j('#listhome > a').on('click', function (e) {
				e.preventDefault();
				$j('html, body').stop().animate({ scrollTop: 0 });
				$j('#menu-main li a').removeClass("active");
				$j('li.menu-item a').removeClass("active");
				$j('#listhome > a').addClass("active");

			});
			$j('#listcontact > a').on('click', function (e) {
				e.preventDefault();
				$j('html, body').stop().animate({ scrollTop: $j(document).height()-$j(window).height() });
				$j('#menu-main li a').removeClass("active");
				$j('li.menu-item a').removeClass("active");
				$j('#listcontact > a').addClass("active");
			});

			//smoothscroll
			$j('a[href^="#"]').on('click', function (e) {
				e.preventDefault();
				$j(document).off("scroll");

				$j('a').each(function () {
					$j(this).removeClass('active');
				})
				$j(this).addClass('active');

				var target = this.hash,
					menu = target;
				$target = $j(target);
				$j('html, body').stop().animate({
					'scrollTop': (($target.offset().top + 2) - $j('#header').height())
				}, 500, 'swing', function () {
					//window.location.hash = target;
					$j(document).on("scroll", onScroll);
				});
			});
			$j('.notclickable').on('click', function (e) {
				e.preventDefault();
				$j('#responsive-menu-button').click();
			});
			
			
			if(String(currentLocation).startsWith("https://www.anjosantos.com/#")){
				$j(document).off("scroll");
				$j('a').each(function () {
					$j(this).removeClass('active');
				})
				var request = String(currentLocation).split("#")[1];
				$j('a[href^="#'+request+'"]').addClass('active');
				
				var requesthash = '#'+request;
				console.log("REQUEST "+requesthash);	
				$target = $j(requesthash);

				if(request != "testimonialsection"){
					
					if(request == "footer"){
						$j('html, body').stop().delay(1000).animate({ scrollTop: $j(document).height()-$j(window).height() });
						$j('#menu-main li a').removeClass("active");
						$j('li.menu-item a').removeClass("active");
						$j('#listcontact > a').addClass("active");
						$j(document).on("scroll", onScroll);
					}else{
						$j('html, body').stop().animate({
						'scrollTop': (($target.offset().top + 2) - $j('#header').height())
						}, 500, 'swing', function () {
							//window.location.hash = target;
							$j(document).on("scroll", onScroll);
						});
					}
					
				}else{
					$j(document).on("scroll", onScroll);
				}
				
			}
			
		}else{
			//If blog, single, category
			$j('li#responsive-menu-item-116 a').addClass("active");
			//smoothscroll
			$j('a[href^="#"]').on('click', function (e) {
				e.preventDefault();
				
				$j(document).off("scroll");

				var target = this.hash,
					menu = target;
				$target = $j(target);
				window.location.href = "https://www.anjosantos.com/"+menu;
				
			});
			$j('#listcontact > a').on('click', function (e) {
				e.preventDefault();
				window.location.href = "https://www.anjosantos.com/#footer";
			});
			
			$j('#homebutton').removeClass('active');
			$j('#menu-item-116 > a').addClass('active');
			$j('#content').css('padding-top','86px');
			
		}
	
		//Animation for glow
		var blinkseconds = 400;
		setInterval(function(){
			$j(".blogheading1footer").toggleClass("greenglow");
		}, blinkseconds);	
		
		setInterval(function(){
			$j(".glowingpipe").toggleClass("glowactive");
			$j(".projectspipe > div").toggleClass("glowactive");
		}, 2000);	
		
		$j("#aboutsection > div").addClass("glowingpipe");

		//Aboutheader lines

		var windowWidth = window.innerWidth;
		var blogheadingheight = $j(".blogheading1").css('height');
		var blogheadingheightwithoutpx = $j(".blogheading1").outerHeight(true);
		var outerheightofimg = $j('.aboutsection-profileimg .fl-photo-img').outerHeight(true);

		$j('.aboutsection-profileimg .fl-photo-img').css({"padding-top": blogheadingheight, "margin-top": "-"+blogheadingheight});
		if (windowWidth > 768){

			$j('.aboutsection-description p').css({"padding-top": blogheadingheight, "margin-top": "-"+blogheadingheight});

		}else{
			blogheadingheight = blogheadingheightwithoutpx + outerheightofimg +'px';
			$j('.aboutsection-description p').css({"padding-top": blogheadingheight, "margin-top": "-"+blogheadingheight});
		}
		var windowheightheight = window.innerHeight;
		var variable = 0;
		if(windowheightheight < 769){
			variable = 16;
		}
		//var projectesectionh1height = $j("#projectsection h1").css('height');
		//var projheight = $j("#projectsection h1").outerHeight(true) + variable;
		//projectesectionh1height = projheight+'px';
		
		//$j('#projectsbg').css({"height": projectesectionh1height});
		
		//projectesectionh1height = projectesectionh1height+'px';
		//$j('#projectsection h1').css({"margin-top": "-"+projectesectionh1height});
		//$j('.projectspipe').css({"height": projectesectionh1height, "padding-top": projectesectionh1height, "margin-top": "-"+projectesectionh1height});
		//
		//
		$j('.svg-progress-demo1').svgprogress({
			figure: "hexagon",
			progressFillGradient: ['#00dfb2','#00df00'],
			progressWidth: 4
		}); 
		
		
		//CATEGORY SECTION
		jQuery("body.category .as-half").mouseenter(function() {
			jQuery(this).find('h2.entry-title a').addClass('active');
		  }).mouseleave(function() {
			jQuery(this).find('h2.entry-title a').removeClass('active');
		  });
		jQuery("body.category .as-half:odd").mouseenter(function() {
			jQuery(this).css('padding','15px 20px');
		  }).mouseleave(function() {
			jQuery(this).css('padding','0px');
		  });
		jQuery("body.category .as-half:even").mouseenter(function() {
			jQuery(this).css('padding','10px 20px');
		  }).mouseleave(function() {
			jQuery(this).css('padding','0px');
		  });
		jQuery("body.category .as-half").click(function(e) {
			jQuery(this).find('.entry-title a')[0].click();
		});
		
	});
	$j(window).on('load', function() {
		var currentLocation = window.location;
		if(String(currentLocation).startsWith("https://www.anjosantos.com/#testimonialsection")){
				
				   $j('html, body').stop().animate({
						'scrollTop': (($target.offset().top + 2) - $j('#header').height())
					}, 500, 'swing', function () {
						//window.location.hash = target;
						$j(document).on("scroll", onScroll);
					});
				
			}
		
	});
	var once = false;
	function onScroll(event){
		var scrollPos = $j(document).scrollTop();
		
		//Animation for header icons
		
		
		$j('.blogheading1icon').viewportChecker({
			classToAdd: 'animated bounce',
			offset: 100
		});
		
		//Animation for menu when scrolling
		//Mobile menu
		$j('div#responsive-menu-wrapper li.menu-item a').each(function () {
			var currLink = $j(this);
			var refElement = $j(currLink).attr("href");
			if(String(refElement).startsWith("#")){
				if($j(window).scrollTop() <= ($j(window).height()- $j('#header').height())){
					$j('div#responsive-menu-wrapper li.menu-item a').removeClass("active");
					$j('div#responsive-menu-wrapper li.menu-item a:first').addClass("active");		   
				}else if($j(window).scrollTop() >= ($j(document).height()-$j(window).height())-1) {
					$j('div#responsive-menu-wrapper li.menu-item a').removeClass("active");
					$j('#listcontact > a').addClass("active");
				}else if(refElement == "#aboutsection"){
					var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
					var heighth = h * 1;
					if (($j(refElement).position().top - $j('#header').height() + heighth) <= scrollPos 
						&& ($j(refElement).position().top - $j('#header').height()) + $j(refElement).height()  + heighth > scrollPos) {
						$j('div#responsive-menu-wrapper li.menu-item a').removeClass("active");
						currLink.addClass("active");
					}
					else{
						currLink.removeClass("active");
					}
				}else if(refElement != "#aboutsection"){
					if(once == false && refElement == "#boxsection"){
						
						$j('.svg-progress-demo1').trigger("redraw");
					   once = true;
					 }
					if (($j(refElement).position().top - $j('#header').height()) <= scrollPos && ($j(refElement).position().top - $j('#header').height()) + $j(refElement).height() > scrollPos) {


						$j('div#responsive-menu-wrapper li.menu-item a').removeClass("active");
						currLink.addClass("active");
					}
					else{
						currLink.removeClass("active");
					}
				}
			}
			
		});
		//ORIGINAL MENU
		$j('.my-static-link a').each(function () {
			console.log(refElement+" "+once);
			var currLink = $j(this);
			var refElement = $j(currLink).attr("href");
			
			if($j(window).scrollTop() <= ($j(window).height()- $j('#header').height())){
			   	$j('#menu-main li a').removeClass("active");
			   	$j('#listhome > a').addClass("active");		   
			}else if($j(window).scrollTop() >= ($j(document).height()-$j(window).height())-1) {
				$j('#menu-main li a').removeClass("active");
			   	$j('#listcontact > a').addClass("active");
		   	}else if(refElement == "#aboutsection"){
				var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
				var heighth = h * 1;
				if (($j(refElement).position().top - $j('#header').height() + heighth) <= scrollPos 
					&& ($j(refElement).position().top - $j('#header').height()) + $j(refElement).height()  + heighth > scrollPos) {

					$j('#menu-main li a').removeClass("active");
					currLink.addClass("active");
				}
				else{
					currLink.removeClass("active");
				}
			}else if(refElement != "#aboutsection"){
				if(once == false && refElement == "#boxsection"){
					$j('.svg-progress-demo1').trigger("redraw");
				   once = true;
				 }
				if (($j(refElement).position().top - $j('#header').height()) <= scrollPos && ($j(refElement).position().top - $j('#header').height()) + $j(refElement).height() > scrollPos) {


					$j('#menu-main li a').removeClass("active");
					currLink.addClass("active");
				}
				else{
					currLink.removeClass("active");
				}
			}
		});
		
	}
	

</script>
</body>
</html>
jQuery(document).ready(function($j){
	//set animation timing
	var animationDelay = 5000,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect 
		revealDuration = 600,
		revealAnimationDelay = 1500;
	
	initHeadline();
	

	function initHeadline() {
		//insert <i> element for each letter of a changing word
		singleLetters($j('.box-headline.letters').find('b'));
		//initialise headline animation
		animateHeadline($j('.box-headline'));
	}

	function singleLetters($jwords) {
		$jwords.each(function(){
			var word = $j(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($jheadlines) {
		var duration = animationDelay;
		$jheadlines.each(function(){
			var headline = $j(this);
			
			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.box-words-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.box-words-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				//assign to .box-words-wrapper the width of its longest word
				var words = headline.find('.box-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $j(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.box-words-wrapper').css('width', width);
			};

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($jword) {
		var nextWord = takeNext($jword);
		
		if($jword.parents('.box-headline').hasClass('type')) {
			var parentSpan = $jword.parent('.box-words-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');	
			setTimeout(function(){ 
				parentSpan.removeClass('selected'); 
				$jword.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
		
		} else if($jword.parents('.box-headline').hasClass('letters')) {
			var bool = ($jword.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($jword.find('i').eq(0), $jword, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($jword.parents('.box-headline').hasClass('clip')) {
			$jword.parents('.box-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($jword, nextWord);
				showWord(nextWord);
			});

		} else if ($jword.parents('.box-headline').hasClass('loading-bar')){
			$jword.parents('.box-words-wrapper').removeClass('is-loading');
			switchWord($jword, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $jword.parents('.box-words-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($jword, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($jword, $jduration) {
		if($jword.parents('.box-headline').hasClass('type')) {
			showLetter($jword.find('i').eq(0), $jword, false, $jduration);
			$jword.addClass('is-visible').removeClass('is-hidden');

		}  else if($jword.parents('.box-headline').hasClass('clip')) {
			$jword.parents('.box-words-wrapper').animate({ 'width' : $jword.width() + 10 }, revealDuration, function(){ 
				setTimeout(function(){ hideWord($jword) }, revealAnimationDelay); 
			});
		}
	}

	function hideLetter($jletter, $jword, $jbool, $jduration) {
		$jletter.removeClass('in').addClass('out');
		
		if(!$jletter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($jletter.next(), $jword, $jbool, $jduration); }, $jduration);  
		} else if($jbool) { 
		 	setTimeout(function(){ hideWord(takeNext($jword)) }, animationDelay);
		}

		if($jletter.is(':last-child') && $j('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($jword);
			switchWord($jword, nextWord);
		} 
	}

	function showLetter($jletter, $jword, $jbool, $jduration) {
		$jletter.addClass('in').removeClass('out');
		
		if(!$jletter.is(':last-child')) { 
			setTimeout(function(){ showLetter($jletter.next(), $jword, $jbool, $jduration); }, $jduration); 
		} else { 
			if($jword.parents('.box-headline').hasClass('type')) { setTimeout(function(){ $jword.parents('.box-words-wrapper').addClass('waiting'); }, 200);}
			if(!$jbool) { setTimeout(function(){ hideWord($jword) }, animationDelay) }
		}
	}

	function takeNext($jword) {
		return (!$jword.is(':last-child')) ? $jword.next() : $jword.parent().children().eq(0);
	}

	function takePrev($jword) {
		return (!$jword.is(':first-child')) ? $jword.prev() : $jword.parent().children().last();
	}

	function switchWord($joldWord, $jnewWord) {
		$joldWord.removeClass('is-visible').addClass('is-hidden');
		$jnewWord.removeClass('is-hidden').addClass('is-visible');
	}
});
/**
 * Particleground demo
 * @author Jonathan Nicol - @mrjnicol
 */
/*
document.addEventListener('DOMContentLoaded', function () {
  particleground(document.getElementById('animatedheader'), {
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  var intro = document.getElementsByClassName('box-intro');
  intro.style.marginTop = - intro.offsetHeight / 2 + 'px';
}, false);


// jQuery plugin example:
$j(document).ready(function() {
  $j('#animatedheader').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  $j('.box-intro').css({
    'margin-top': -($j('.box-intro').height() / 2)
  });
});
*/

// jQuery plugin example:
$j(document).ready(function() {
  $j('#particleheader').particleground({
    dotColor: '#007600',
    lineColor: '#007600'
  });
  //$j('.box-intro').css("margin-top","-65%");
});
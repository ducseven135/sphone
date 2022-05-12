$(document).ready(function() {
            $('#toggle').click(function() {
                $('nav').slideToggle();
            });
        })

$('.search-input').focus(function(){
  $(this).parent().addClass('focus');
}).blur(function(){
  $(this).parent().removeClass('focus');
})
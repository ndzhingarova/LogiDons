$('.live-name').keyup(function(){
  $('.live-preview .titre').text($(this).val());
});
$('.live-price').keyup(function(){
    $('.live-preview .price span').text('$'+$(this).val()+'.00');
});
$('.live-image').blur(function(){
  $('.live-preview .image').attr('src', text($(this).val()));
});
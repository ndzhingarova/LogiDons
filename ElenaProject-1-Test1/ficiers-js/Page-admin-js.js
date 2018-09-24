// cette fonction est utilisee dans PageAdmin.php
// elle sert a cacher ou a montrer les div d'en bas
$('.admin-toggle-info').click(function()
  {
     $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(300);
     if($(this).hasClass('selected'))
       {
          $(this).html('<i class="fa fa-minus fa-lg"></i>');
       }
     else
       {
        $(this).html('<i class="fa fa-plus fa-lg"></i>');
       }
  });
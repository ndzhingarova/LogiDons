$('.admin-toggle-info').click(function()
  {
     $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);
     if($(this).hasClass('selected'))
       {
          $(this).html('<i class="fa fa-minus fa-lg"></i>');
       }
     else
       {
        $(this).html('<i class="fa fa-plus fa-lg"></i>');
       }
  });
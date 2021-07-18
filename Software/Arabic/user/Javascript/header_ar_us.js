$(document).ready(function(){
  $('li.dropdown-submenu').on('click', function(event) {
      event.stopPropagation(); 
      if ($(this).hasClass('open')){
          $(this).removeClass('open');
      }else{
		  $(this).removeClass('open');
          $(this).addClass('open');
     }
  });
});

//



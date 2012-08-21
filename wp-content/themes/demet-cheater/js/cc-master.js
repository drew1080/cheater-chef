//////////////////////////////////////////////////
// Document ready event
//////////////////////////////////////////////////
jQuery(document).ready(function($){ 
  // Check if this is the homepage
  if ( $('.home').length > 0 ) {
    $.each($('.entry img'), function(i,v) {
      if ( $(this).parent()[0].tagName == "DIV" || $(this).parent()[0].tagName == "P" ) {
        $(this).parent().addClass('center-image');
      } else {
        $(this).parent().wrap('<p class="center-image" />');
      }
    });
  }
});
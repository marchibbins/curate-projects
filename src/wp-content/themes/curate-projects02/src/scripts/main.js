jQuery( document ).ready( function( $ ) {

  $('.js-toggle-wrapper').on('click', function(e){

    e.preventDefault();
    $('.Banner, .Banner .Nav--primary').toggleClass('is-open');
  });


  $("li[role='tab']").click(function(e){

    e.preventDefault();

    $("li[role='tab']").attr("aria-selected","false");
    $(this).attr("aria-selected","true");

    var tabpanid= $(this).attr("aria-controls");

    $("div[role='tabpanel']")
      .attr("aria-hidden","true")
      .addClass('u-hidden');

    $("#"+tabpanid)
      .attr("aria-hidden","false")
      .removeClass("u-hidden");

  });

  $(window).resize(autoHeight);
  autoHeight();

  function autoHeight () {
    var breakpoint = $('head').css('fontFamily');
    if (breakpoint === 'md-viewport' || breakpoint === 'lg-viewport') {
      var baseHeight = $('.Wrapper').height() - $('.Header').height(),
          subnavHeight = $('.SubNav').length ? $('.SubNav').outerHeight() : 0,
          tweakHeight = baseHeight-subnavHeight-16;
      $('.Autoheight').css({'height': tweakHeight, 'max-height': tweakHeight});
    } else {
      $('.Autoheight').attr('style', '');
    }
  };

});

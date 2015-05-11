jQuery( document ).ready( function( $ ) {

  $('.js-toggle-wrapper').on('click', function(e){

    e.preventDefault();
    $('.Wrapper-left').toggleClass('is-open');
    $(this).toggleClass('is-open');
  });


  $("li[role='tab']").click(function(e){

    e.preventDefault();
    console.log('prevent');

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

});

jQuery( document ).ready( function( $ ) {

  $('.js-toggle-wrapper').on('click', function(e){

    e.preventDefault();
    $('.Wrapper-left').toggleClass('is-open');
    $(this).toggleClass('is-open');
  });

});

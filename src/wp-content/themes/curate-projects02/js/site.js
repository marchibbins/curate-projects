jQuery( document ).ready( function( $ ) {

  $('.js-toggle').on('click', function(e){

    e.preventDefault();

    var $trg = $($(this).data('toggle-target'));
    if($trg){
      $trg.toggleClass('is-closed');
      $(this).toggleClass('is-closed');
    }
  });

});

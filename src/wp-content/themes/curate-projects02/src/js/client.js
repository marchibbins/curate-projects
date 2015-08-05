(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset:utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvc2NyaXB0cy9tYWluLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0FDQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsImpRdWVyeSggZG9jdW1lbnQgKS5yZWFkeSggZnVuY3Rpb24oICQgKSB7XG5cbiAgJCgnLmpzLXRvZ2dsZS13cmFwcGVyJykub24oJ2NsaWNrJywgZnVuY3Rpb24oZSl7XG5cbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgJCgnLkJhbm5lciwgLkJhbm5lciAuTmF2LS1wcmltYXJ5JykudG9nZ2xlQ2xhc3MoJ2lzLW9wZW4nKTtcbiAgfSk7XG5cblxuICAkKFwibGlbcm9sZT0ndGFiJ11cIikuY2xpY2soZnVuY3Rpb24oZSl7XG5cbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAkKFwibGlbcm9sZT0ndGFiJ11cIikuYXR0cihcImFyaWEtc2VsZWN0ZWRcIixcImZhbHNlXCIpO1xuICAgICQodGhpcykuYXR0cihcImFyaWEtc2VsZWN0ZWRcIixcInRydWVcIik7XG5cbiAgICB2YXIgdGFicGFuaWQ9ICQodGhpcykuYXR0cihcImFyaWEtY29udHJvbHNcIik7XG5cbiAgICAkKFwiZGl2W3JvbGU9J3RhYnBhbmVsJ11cIilcbiAgICAgIC5hdHRyKFwiYXJpYS1oaWRkZW5cIixcInRydWVcIilcbiAgICAgIC5hZGRDbGFzcygndS1oaWRkZW4nKTtcblxuICAgICQoXCIjXCIrdGFicGFuaWQpXG4gICAgICAuYXR0cihcImFyaWEtaGlkZGVuXCIsXCJmYWxzZVwiKVxuICAgICAgLnJlbW92ZUNsYXNzKFwidS1oaWRkZW5cIik7XG5cbiAgfSk7XG5cbiAgJCh3aW5kb3cpLnJlc2l6ZShhdXRvSGVpZ2h0KTtcbiAgYXV0b0hlaWdodCgpO1xuXG4gIGZ1bmN0aW9uIGF1dG9IZWlnaHQgKCkge1xuICAgIHZhciBicmVha3BvaW50ID0gJCgnaGVhZCcpLmNzcygnZm9udEZhbWlseScpO1xuICAgIGlmIChicmVha3BvaW50ID09PSAnbWQtdmlld3BvcnQnIHx8IGJyZWFrcG9pbnQgPT09ICdsZy12aWV3cG9ydCcpIHtcbiAgICAgIHZhciBiYXNlSGVpZ2h0ID0gJCgnLldyYXBwZXInKS5oZWlnaHQoKSAtICQoJy5IZWFkZXInKS5oZWlnaHQoKSxcbiAgICAgICAgICBzdWJuYXZIZWlnaHQgPSAkKCcuU3ViTmF2JykubGVuZ3RoID8gJCgnLlN1Yk5hdicpLm91dGVySGVpZ2h0KCkgOiAwLFxuICAgICAgICAgIHR3ZWFrSGVpZ2h0ID0gYmFzZUhlaWdodC1zdWJuYXZIZWlnaHQtMTY7XG4gICAgICAkKCcuQXV0b2hlaWdodCcpLmNzcyh7J2hlaWdodCc6IHR3ZWFrSGVpZ2h0LCAnbWF4LWhlaWdodCc6IHR3ZWFrSGVpZ2h0fSk7XG4gICAgfSBlbHNlIHtcbiAgICAgICQoJy5BdXRvaGVpZ2h0JykuYXR0cignc3R5bGUnLCAnJyk7XG4gICAgfVxuICB9O1xuXG59KTtcbiJdfQ==

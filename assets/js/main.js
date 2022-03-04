/**
 * Theme's main JS.
 *  
 * @license https://opensource.org/licenses/MIT MIT
 * @author Vee W.
 */


// jQuery on DOM is ready. ------------------------------------------------------------------------------------------------
jQuery(document).ready(function($) {
    // mark no-js class as js because JS is working.
    $('html').removeClass('no-js').addClass('js');

    $('[data-toggle="tab"]').on('shown.bs.tab', function () {
      initialize_owl($('.owl-carousel'));
    });

    function initialize_owl(el) {
      el.owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:3
          },
          1000:{
            items:5
          }
        }
      })
    }

   
});

(function($){
  jQuery(document).ready(function() {


    // function scroll(){
    //   var h = $('#head').height();
    //   console.log(h);
    //   // window.scrollTo(0, $('#blog').offset().top);
    //   window.scrollBy(0, h);
    // };
    // scroll();




    // Relative Dates and Time using Moment.js ===========================================================================
    // http://momentjs.com/docs/#/displaying/format/
    function realTime(el){
      $(el).each(function(){
        var utc = $(this).text();
        var date = moment($(this).attr('title')).format('LLLL');
        moment(utc).format();

        var t = moment(utc).fromNow();
        moment.lang('en', {
          relativeTime : {
            future: "in %s",
            past:   "%s ago",
            s:  "seconds",
            m:  "a minute",
            mm: "%d minutes",
            h:  "1 hour",
            hh: "%d hours",
            d:  "1 day",
            dd: "%d days",
            M:  "1 month",
            MM: "%d months",
            y:  "a year",
            yy: "%d years"
          }
        });
        $(this).html(t);
        $(this).attr('title', date);
      });
    };
    realTime('.entry .rel_time span');



    // interviews-block
    var maxh = '';
    $('.interviews-block .row').each(function () {
      var h = $(this).height();
      if (h > maxh) {
        maxh = h;
      }
    });
    $('.interviews-block .row').each(function () {
      var h = $(this).height(maxh);
    });


    // Twitter Button - - - - - - - - - - - - - - - - - - - - -
    $('.btn-twitter').click(function(e) {
			e.preventDefault();
			var msg = $(this).attr('data-msg');
			var now = new Date().valueOf();
			setTimeout(function () {
			   if (new Date().valueOf() - now > 100) return;
			   var twitterUrl = "https://twitter.com/share?text="+msg;
			   window.open(twitterUrl, '_blank');
			}, 50);
			window.location = "twitter://post?message=" + msg;
    });



    // Scroll To Anchor and Offset logic - - - - - - - - - - - - - - - - - - - - -
    if (window.location.hash){ // Check if there's an anchor in the url
      var id = window.location.hash.substring(1);
    }
    $(window).load(function() {
      if (window.location.hash){
        fromTop = 0;
        $('html, body').animate({scrollTop: $('#'+id).offset().top - fromTop}, 800);
      }
    });

    $(".btn-learn").live("click", function(e) {
      e.preventDefault();
      var source = $(this).attr('data-id');
      $('html, body').animate({scrollTop: $(source).offset().top}, 800);
    });


		// $twt = $('.btn-twitter').hide();
		// if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
		// 	$twt.show();
		// }
		//

    // Infinite Scroll — brought to you by Jet Pack plugin.
    // Adding classes to existing markup to help style the 'load more' button
    var $infinite_handle = $('#infinite-handle');
    var $infinite_handle_label = $infinite_handle.find('span');
    $infinite_handle.addClass('container').wrapInner('<div class="row" />');
    $infinite_handle_label.wrap('<div class="col-sm-6 col-sm-offset-1" />').addClass('btn btn-more').text('show more');

  });

})(jQuery);

/**
 * Background fixing script for ipad and iphone.
 *
 * To use this script, create a div with the following css:
 * position: absolute;
 * z-index: -1;
 * width: 1px;
 * height: 1px;
 * margin: 0;
 * padding: 0;
 * background: url('your-bg-file') bottom center no-repeat;
 *
 * Then give the div a class like "bg-fix" and call:
 * $('.bg-fix').bgfix();
 */

(function ($) {
    var ios = navigator.userAgent.match(/iPad/i) != null ||
        navigator.userAgent.match(/iPhone/i) != null;
    
    var updateBackground = function (elt) {
        if (ios) {
                $(elt).width(0).height(0);
                $(elt).width(Math.max($(window).width(), $(document).width())).height($(window).height()).css('top', $(window).scrollTop());
        }
    };
    
    $.fn.bgfix = function () {
        if (ios) {
            var elt = this;
	    elt.addClass('bgfix');
            updateBackground(elt);
            $(window).scroll(function () { updateBackground(elt); }).resize(function () { updateBackground(elt); });
        }
    };
    
    $.fn.bgfixUpdate = function () {
        if (ios) {
            var elt = this;
            updateBackground(elt);
        }
    }
})(jQuery);

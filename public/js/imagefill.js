/**
 * imagefill.js
 * Author & copyright (c) 2013: John Polacek
 * Updated to npm by @oresh
 * johnpolacek.com
 * https://twitter.com/johnpolacek
 *
 * The jQuery plugin for making images fill their containers (and be centered)
 *
 * EXAMPLE
 * Given this html:
 * <div class="container"><img src="myawesomeimage" /></div>
 * $('.container').imagefill(); // image stretches to fill container
 *
 * REQUIRES:
 * imagesLoaded - https://github.com/desandro/imagesloaded
 *
 */

/* global jQuery */
var imagesLoaded = require('imagesloaded');
(function (factory) {
  "use strict";
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  }
  else if(typeof module !== 'undefined' && module.exports) {
    module.exports = factory(require('jquery'));
  }
  else {
    factory(jQuery);
  }
}(function ($, undefined) {
  "use strict";

  // provide jQuery argument
  imagesLoaded.makeJQueryPlugin($);

  $.fn.imagefill = function(options) {
    var $container = this,
        imageAspect = 1/1,
        containersH = 0,
        containersW = 0,
        defaults = {
          runOnce: false,
          target: 'img',
          throttle : 200  // 5fps
        },
        settings = $.extend({}, defaults, options);

    var $img = $container.find(settings.target).addClass('loading').css({'position':'absolute'});

    // make sure container isn't position:static
    var containerPos = $container.css('position');
    $container.css({'overflow':'hidden','position':(containerPos === 'static') ? 'relative' : containerPos});

    // set containerH, containerW
    for (var i = 0, len = $container.length; i < len; i++) {
      var $this = $container.eq(i);
      containersH += $this.outerHeight();
      containersW += $this.outerWidth();
    }

    // wait for image to load, then fit it inside the container
    $container.imagesLoaded().done(function(img) {
      imageAspect = $img.width() / $img.height();
      $img.removeClass('loading');
      fitImages();
      if (!settings.runOnce) {
        checkSizeChange();
      }
    });

    function fitImages() {
      containersH  = 0;
      containersW = 0;
      for (var i = 0, len = $container.length; i < len; i++) {
        var $this = $container.eq(i);
        imageAspect = $this.find(settings.target).width() / $this.find(settings.target).height();
        var outwrWidth = $this.outerWidth(),
            outerHeight = $this.outerHeight(),
            containerW = outwrWidth,
            containerH = outerHeight,
            containerAspect = containerW / containerH;

        containersH += outerHeight;
        containersW += outerHeight;

        if (containerAspect < imageAspect) {
          // taller
          $this.find(settings.target).css({
              width: 'auto',
              height: containerH,
              top: 0,
              left: -parseInt((containerH * imageAspect - containerW) / 2)
            });
        } else {
          // wider
          $this.find(settings.target).css({
              width: containerW,
              height: 'auto',
              top: -parseInt((containerW / imageAspect - containerH) / 2),
              left: 0
            });
        }
      };
    }

    function checkSizeChange() {
      var checkW = 0,
          checkH = 0;
      for (var i = 0, len = $container.length; i < len; i++) {
        var $this = $container.eq(i);
        checkH += $this.outerHeight();
        checkW += $this.outerWidth();
      };
      if (containersH !== checkH || containersW !== checkW) {
        fitImages();
      }
      setTimeout(checkSizeChange, settings.throttle);
    }

    return this;
  };

}));

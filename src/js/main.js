/* jshint esversion: 6, browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document */

// Import dependencies
import lazySizes from 'lazysizes';
import Masonry from 'masonry-layout';
import marquee from 'jquery.marquee';
import imagesLoaded from 'imagesloaded';

// Import style
import '../styl/site.styl';

class Site {
  constructor() {
    this.mobileThreshold = 601;

    $(window).resize(this.onResize.bind(this));

    $(document).ready(this.onReady.bind(this));

  }

  onResize() {
    this.layoutMasonry();

  }

  onReady() {
    lazySizes.init();

    this.$window = $(window);

    this.windowHeight = this.$window.height();
    this.windowWidth = this.$window.width();
    this.masonryImagesLoaded = false;

    this.$masonryHolder = $('#masonry-holder');

    this.initMasonry();
    this.initMarquee();

  }

  fixWidows() {
    // utility class mainly for use on headines to avoid widows [single words on a new line]
    $('.js-fix-widows').each(function(){
      var string = $(this).html();
      string = string.replace(/ ([^ ]*)$/,'&nbsp;$1');
      $(this).html(string);
    });
  }

  initMasonry() {
    var _this = this;

    if (_this.$masonryHolder.length) {

      _this.masonryInstance = new Masonry( '#masonry-holder', {
        itemSelector: '.masonry-item',
        transitionDuration: 0,
        initLayout: false,
        percentPosition: true
      });

      _this.masonryInstance.layout();
      _this.$masonryHolder.removeClass('hidden');

      imagesLoaded('#masonry-holder').on( 'progress', function(imgLoad, image) {
        _this.masonryInstance.layout();
      });

    }
  }

  layoutMasonry() {
    var _this = this;

    if (_this.$masonryHolder.length) {
      _this.masonryInstance.layout();
    }
  }

  initMarquee() {
    const $marquee = $('#marquee');

    if ($marquee.length) {
      $marquee.marquee({
      	//duration in milliseconds of the marquee
      	duration: 15000,
      	//gap in pixels between the tickers
      	gap: 50,
      	//time in milliseconds before the marquee will start animating
      	delayBeforeStart: 0,
      	//'left' or 'right'
      	direction: 'left',
      	//true or false - should the marquee be duplicated to show an effect of continues flow
      	duplicated: false
      });

      $marquee.addClass('show');
    }
  }
}

new Site();

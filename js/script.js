(function($) {

  // open external links in new window
  Drupal.behaviors.externalLink = function(context) {   
    $("a[href^=http]").each(function () {
      if (this.href.indexOf(location.hostname) == -1) {
        $(this).click(function () {
          window.open(this.href);
          return false;
        });
      }
    });
  }

  // Trigger image load on scroll
  Drupal.behaviors.loadPictures = function(context) {   
    $('#gmap-overlay').scroll(function() {
      var imgs = $(this).find('img');
      var bottom_edge = this.scrollTop + this.offsetHeight;
      var padding = 400; // 100 work fine
      for (var i = 0; i < imgs.length; i++) {
        if (imgs[i].offsetTop - padding < bottom_edge && imgs[i].src == '') {
          var img_path = imgs[i].getAttribute('path');
          var img = new Image();
          img.src = img_path;
          imgs[i].src = img_path;
        }
      }
    });
  }

  // when ajax returns the popup content trigger a function to make sure
  // the links behave correctly
  Drupal.behaviors.openLinkInPopup = function(context) {   
    $('#islandora-solr-gmap-wrap').ajaxSuccess(function() {
      $('#gmap-overlay a').click(function() {
        window.location = this.href;
        return false;
      });
      
      // do the opposite on other link hover
      $('#gmap-overlay a').hover(
        function() {
          $('#gmap-overlay-close').addClass('hovering-reset');
        },
        function() {
          $('#gmap-overlay-close').removeClass('hovering-reset');
        }
      );
      
    });
    // add class on close button when hovering the overlay
    $('#gmap-overlay').hover(
      function() {
        $('#gmap-overlay-close').addClass('hovering');
      },
      function() {
        $('#gmap-overlay-close').removeClass('hovering');
      }
    );
  }
  
}(jQuery));


    $("li").hover(
      function () {
        $(this).append($("<span> ***</span>"));
      }, 
      function () {
        $(this).find("span:last").remove();
      }
    );
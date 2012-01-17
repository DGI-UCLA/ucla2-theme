(function($) {

  Drupal.behaviors.externalLink = function(context) {   

    // open external links in new window
    $("a[href^=http]").each(function () {
      if (this.href.indexOf(location.hostname) == -1) {
        $(this).click(function () {
          window.open(this.href);
          return false;
        });
      }
    });
  }

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
             
}(jQuery));
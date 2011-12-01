$(document).ready(function() {

  // open external links in new window
  $("a[href^=http]").each(function () {
    if (this.href.indexOf(location.hostname) == -1) {
      $(this).click(function () {
        window.open(this.href);
        return false;
      });
    }
  });
});
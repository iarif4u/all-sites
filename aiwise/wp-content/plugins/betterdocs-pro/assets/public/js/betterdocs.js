(()=>{class t{constructor(t){this.config=t,this.initialize(),this.init()}init(){this.mkbTabGrid(),this.liveSearch()}initialize(){var t=jQuery;this.body=t("body")}liveSearch(){jQuery(".search-submit").on("click",(function(t){t.preventDefault()}))}mkbTabGrid(){var t=jQuery;t(".betterdocs-tabs-nav-wrapper a").first().addClass("active"),t(".betterdocs-tabgrid-content-wrapper").first().addClass("active"),t(".tab-content-1").addClass("active"),t(".betterdocs-tabs-nav-wrapper a").click((function(e){e.preventDefault(),t(this).siblings("a").removeClass("active").end().addClass("active");let i=this.getAttribute("data-toggle-target");t(".betterdocs-tabgrid-content-wrapper"+i).addClass("active").siblings().removeClass("active")}))}}!function(e){"use strict";new t(window?.betterdocsConfig)}(jQuery)})();
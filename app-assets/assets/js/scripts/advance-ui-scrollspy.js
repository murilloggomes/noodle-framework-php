/*
 * Advance Ui Scrollspy 
 */

// Floating-Fixed table of contents (Materialize pushpin) - advance-ui-scrollspy.html
if ($("nav").length) {
    $(".toc-wrapper").pushpin({
        top: $("nav").height()
    });
} else if ($("#index-banner").length) {
    $(".toc-wrapper").pushpin({
        top: $("#index-banner").height()
    });
} else {
    $(".toc-wrapper").pushpin({
        top: 0
    });
}
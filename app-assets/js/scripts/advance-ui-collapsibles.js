/* Collapse js*/
$(document).ready(function () {
    $(".collapsible").collapsible();
    // set timeout use for override globally initialize collapse
    setTimeout(function () {
        $(".expandable-collapse").collapsible({
            accordion: false
        });
    }, 100);
});
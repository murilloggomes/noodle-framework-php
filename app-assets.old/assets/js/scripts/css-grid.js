/*
 *  CSS Grid
 */



//Toggle Containers on page
var toggleContainersButton = $("#container-toggle-button");
toggleContainersButton.click(function () {
    $("body .browser-window .container, .had-container").each(function () {
        $(this).toggleClass("had-container");
        $(this).toggleClass("container");
        if ($(this).hasClass("container")) {
            toggleContainersButton.text("Turn off Containers");
        } else {
            toggleContainersButton.text("Turn on Containers");
        }
    });
});
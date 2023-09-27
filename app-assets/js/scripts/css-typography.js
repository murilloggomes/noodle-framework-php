/*
 * CSS - Typhography 
 */

// Toggle Flow Text - css-typography.js
var toggleFlowTextButton = $("#flow-toggle");
toggleFlowTextButton.click(function () {
    $("#flow-text-demo")
        .children("p")
        .each(function () {
            $(this).toggleClass("flow-text");
        });
});

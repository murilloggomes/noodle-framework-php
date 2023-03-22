/*
 * Form Elemets - Form
 */

$(function () {
   $("select").formSelect();

   $(".timepicker").timepicker({
      default: "now", // Set default time
      fromnow: 0, // set default time to * milliseconds from now (using with default = 'now')
      twelvehour: false, // Use AM/PM or 24-hour format
      donetext: "OK", // text for done-button
      cleartext: "Clear", // text for clear-button
      canceltext: "Cancel", // Text for cancel-button
      autoclose: false, // automatic close timepicker
      ampmclickable: true, // make AM PM clickable
      aftershow: function () { } //Function for after opening timepicker
   });

   var slider = document.getElementById("test-slider");
   noUiSlider.create(slider, {
      start: [20, 80],
      connect: true,
      step: 1,
      orientation: "horizontal", // 'horizontal' or 'vertical'
      range: {
         min: 0,
         max: 100
      },
      format: wNumb({
         decimals: 0
      })
   });
   $("input.autocomplete").autocomplete({
      data: {
         Apple: null,
         Microsoft: null,
         Google: "https://placehold.it/250x250"
      },
      limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
      onAutocomplete: function (val) {
         // Callback function when value is autcompleted.
      },
      minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
   });

   $("input#input_text, textarea#textarea1").characterCounter();
});

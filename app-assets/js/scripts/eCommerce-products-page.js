/*
* eCommerce-products-page
*/

// Range Slider

$(document).ready(function () {
  var slider = document.getElementById('price-slider');
  noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    step: 1,
    orientation: 'horizontal',
    range: {
      'min': 0,
      'max': 100
    },
    format: wNumb({
      decimals: 0
    })
  });
});

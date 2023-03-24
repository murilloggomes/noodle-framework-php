/*Extra components ratings */
/*----------------------- */
$(document).ready(function () {
  // default rate init
  $(".rateYo").rateYo({
    rating: 3.6,
    ratedFill: "#ff4081",
    onChange: function (rating, rateYoInstance) {
      $(this).next().text(rating);
    }
  });
  // normalfill rate init
  $(".normalfillrate").rateYo();
  // multicolor rate init
  $(".multi-color-rate").rateYo({
    rating: 1.6,
    multiColor: {
      "startColor": "#3f51b5", //indigo
      "endColor": "#ff4081"  //pink
    }
  });
  // num rate init
  $(".num-rate").rateYo({
    onChange: function (rating, rateYoInstance) {
      // $(this).prev().text(rating);
      $(this).attr("data-tooltip", rating);
    }
  });
  // onset event rate init
  $(".onset-rate").rateYo({
    onSet: function (rating, rateYoInstance) {
      alert("Rating is set to: " + rating);
    }
  });
  // onchange event rate init
  $(".rate-onchange").rateYo({
    onChange: function (rating, rateYoInstance) {
      $(this).next().text(rating);
    }
  });
});
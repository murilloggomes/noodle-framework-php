/*extra components tour */
/*-------------------- */

$(document).ready(function () {
  displayTour();
  // tour initialize
  var tour = new Shepherd.Tour({
    defaultStepOptions: {
      cancelIcon: {
        enabled: true
      },
      classes: 'tour-container',
      scrollTo: { behavior: 'smooth', block: 'center' }
    }
  });
  // step 1
  tour.addStep({
    title: 'Here is page title.',
    text: 'You can omit this section as your requirement.',
    attachTo: {
      element: '.breadcrumbs-title span',
      on: 'right'
    },
    buttons: [
      {
        action: function () {
          return this.cancel();
        },
        classes: 'btn btn-light-indigo',
        text: 'Exit'
      },
      {
        action: function () {
          return this.next();
        },
        classes: 'btn indigo',
        text: 'Next'
      }
    ],
    id: 'welcome'
  });
  // step 2
  tour.addStep({
    title: 'Change Language from here.',
    text: 'We provide four different languages.',
    attachTo: {
      element: '.dropdown-language .translation-button',
      on: 'bottom'
    },
    buttons: [
      {
        action: function () {
          return this.cancel();
        },
        classes: 'btn btn-light-indigo',
        text: 'Exit'
      },
      {
        action: function () {
          return this.back();
        },
        classes: 'btn btn-light-indigo',
        text: 'Back'
      },
      {
        action: function () {
          return this.next();
        },
        classes: 'btn indigo',
        text: 'Next'
      }
    ],
  });
  // step 3
  tour.addStep({
    title: 'Favorite Applications.',
    text: 'You can get quick access to your favorite apps.',
    attachTo: {
      element: '.fixed-action-btn .btn-floating',
      on: 'left'
    },
    buttons: [
      {
        action: function () {
          return this.cancel();
        },
        classes: 'btn btn-light-indigo',
        text: 'Exit'
      },
      {
        action: function () {
          return this.back();
        },
        classes: 'btn btn-light-indigo',
        text: 'Back'
      },
      {
        action: function () {
          return this.next();
        },
        classes: 'btn indigo',
        text: 'Done'
      }
    ],
    modalOverlayOpeningPadding: '10'
  });

  $(window).resize(displayTour)
  // function to remove tour on small screen
  function displayTour() {
    window.resizeEvt;
    if ($(window).width() > 576) {
      $('#tour').on("click", function () {
        clearTimeout(window.resizeEvt);
        tour.start();
      })
    }
    else {
      $('#tour').on("click", function () {
        clearTimeout(window.resizeEvt);
        tour.cancel()
        window.resizeEvt = setTimeout(function () {
          alert("Tour only works for large screens!");
        }, 250);;
      })
    }
  }
});
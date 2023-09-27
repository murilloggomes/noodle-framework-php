$(document).ready(function () {
  /********Invoice List ********/
  /* --------------------------- */
  /* init data table */
  if ($(".invoice-data-table").length) {
    var dataListView = $(".invoice-data-table").DataTable({
      columnDefs: [
        {
          targets: 0,
          className: "control"
        },
        {
          orderable: true,
          targets: 1,
          checkboxes: { selectRow: true }
        },
        {
          targets: [0, 1],
          orderable: false
        },
        { "orderable": false, "targets": 8 },
      ],
      order: [2, 'asc'],
      dom:
        '<"top display-flex  mb-2"<"action-filters"f><"actions action-btns display-flex align-items-center">><"clear">rt<"bottom"p>',
      language: {
        search: "",
        searchPlaceholder: "Search Invoice"
      },
      select: {
        style: "multi",
        selector: "td:first-child>",
        items: "row"
      },
      responsive: {
        details: {
          type: "column",
          target: 0
        }
      }
    });
    // To append actions dropdown inside action-btn div
    var invoiceFilterAction = $(".invoice-filter-action");
    var invoiceCreateBtn = $(".invoice-create-btn");
    var filterButton = $(".filter-btn");
    $(".action-btns").append(invoiceFilterAction, invoiceCreateBtn);
    $(".dataTables_filter label").append(filterButton);
  }

  /* Invoice edit */
  /* ------------*/

  /* form repeater jquery */
  var uniqueId = 1;
  if ($(".invoice-item-repeater").length) {
    $(".invoice-item-repeater").repeater({
      show: function () {
        /* Assign unique id to new dropdown */
        $(this).find(".dropdown-button").attr("data-target", "dropdown-discount" + uniqueId + "");
        $(this).find(".dropdown-content").attr("id", "dropdown-discount" + uniqueId + "");
        uniqueId++;
        /* showing the new repeater */
        $(this).slideDown();
      },
      hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
      }
    });
  }
  /* Onclick of Invoice Apply button Discount value change */
  $(document).on("click", ".invoice-apply-btn", function () {
    var $this = $(this);
    var discount = $this.closest(".dropdown-content").find("#discount").val();
    var tax1 = $this.closest(".dropdown-content").find("#Tax1 option:selected").val();
    var tax2 = $this.closest(".dropdown-content").find("#Tax2 option:selected").val();
    $this.parents().eq(4).find(".discount-value").html(discount + "%");
    $this.parents().eq(4).find(".tax1").html(tax1);
    $this.parents().eq(4).find(".tax2").html(tax2);
    $('.dropdown-button').dropdown("close"); /*dropdown close */
  });
  /* Dropdown close onclick of cancel btn*/
  $(document).on("click", ".invoice-cancel-btn", function () {
    $('.dropdown-button').dropdown("close");
  });
  /* on product change also change product description */
  $(document).on("change", ".invoice-item-select", function (e) {
    var selectOption = this.options[e.target.selectedIndex].text;
    /*switch case for product select change also change product description */
    switch (selectOption) {
      case "Frest Admin Template":
        $(e.target)
          .closest(".invoice-item-filed")
          .find(".invoice-item-desc")
          .val("The most developer friendly & highly customisable HTML5 Admin");
        break;
      case "Stack Admin Template":
        $(e.target)
          .closest(".invoice-item-filed")
          .find(".invoice-item-desc")
          .val("Ultimate Bootstrap 4 Admin Template for Next Generation Applications.");
        break;
      case "Robust Admin Template":
        $(e.target)
          .closest(".invoice-item-filed")
          .find(".invoice-item-desc")
          .val(
            "Robust admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities"
          );
        break;
      case "Apex Admin Template":
        $(e.target)
          .closest(".invoice-item-filed")
          .find(".invoice-item-desc")
          .val("Developer friendly and highly customizable Angular 7+ jQuery Free Bootstrap 4 gradient ui admin template. ");
        break;
      case "Modern Admin Template":
        $(e.target)
          .closest(".invoice-item-filed")
          .find(".invoice-item-desc")
          .val("The most complete & feature packed bootstrap 4 admin template of 2019!");
        break;
    }
  });
  /* Initialize Dropdown */
  $('.dropdown-button').dropdown({
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    closeOnClick: false
  });
  $(document).on("click", ".invoice-repeat-btn", function (e) {
    /* Dynamically added dropdown initialization */
    $('.dropdown-button').dropdown({
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      closeOnClick: false
    });
  })

  if ($(".invoice-print").length > 0) {
    $(".invoice-print").on("click", function () {
      window.print();
    })
  }
})

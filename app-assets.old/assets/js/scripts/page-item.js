/*
 * Masonry container for item page
 */
$(function() {
  var $containerBlog = $("#item-posts");
  $containerBlog.imagesLoaded(function() {
    $containerBlog.masonry({
      itemSelector: ".item",
      columnWidth: ".item-sizer",
    });
  });
});
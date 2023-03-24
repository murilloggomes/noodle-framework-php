/*
 * Form Input Masking
 */
$(function () {
  // Basic
  $('#date-demo1').formatter({
    'pattern': '{{9999}}-{{99}}-{{99}}',
  });
  $('#date-demo2').formatter({
    'pattern': '{{9999}}/{{99}}/{{99}}',
  });
  $('#time-demo').formatter({
    'pattern': '{{99}}:{{99}}',
  });
  $('#time-demo2').formatter({
    'pattern': '{{99}}:{{99}}',
  });
  $('#date-time').formatter({
    'pattern': '{{9999}}/{{99}}/{{99}} {{99}}:{{99}}',
  });
  $('#characters-demo').formatter({
    'pattern': '{{aaaaaaaaaa}}',
  });
  $('#phone-input').formatter({
    'pattern': '({{99}}-{{9999}}-{{9999}})',
    'persistent': true
  });
  // Advanced

  $('#phone-demo').formatter({
    'pattern': '({{999}}) {{999}}-{{9999}}',
    'persistent': true
  });
  $('#phone-code').formatter({
    'pattern': '+91 {{999}}-{{999}}-{{999}}-{{9999}}',
    'persistent': true
  });

  $('#currency-demo').formatter({
    'pattern': '$ {{999}}-{{999}}-{{999}}.{{99}}',
    'persistent': true
  });
  $('#credit-demo').formatter({
    'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
    'persistent': true
  });

  $('#product-key').formatter({
    'pattern': 'm{{*}}-{{999}}-{{999}}-C{{99}}',
    'persistent': true
  });
  $('#purchase-code').formatter({
    'pattern': 'ISBN{{9999}}-{{9999}}-{{9999}}-{{9999}}',
    'persistent': true
  });
});
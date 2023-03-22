/*Treeview js*/
/*-----------*/
$(document).ready(function () {
  // init default jstree example
  $('.jsTreedefault').jstree();

  //custom icons js treee example
  $('.jsondataTree').jstree({
    core: {
      data: [
        {
          text: 'css',
          children: [
            { text: 'app.css', icon: 'jstree-file' },
            { text: 'style.css', icon: 'jstree-file' },
          ],
        },
        {
          text: 'img',
          state: {
            opened: true
          },
          children: [
            { text: 'bg.jpg', icon: 'jstree-file' },
            { text: 'logo.png', icon: 'jstree-file' },
            { text: 'avatar.png', icon: 'jstree-file' },
          ],
        },
        {
          text: 'js',
          state: {
            opened: false
          },
          children: [
            { text: 'jquery.js', icon: 'jstree-file' },
            { text: 'app.js', icon: 'jstree-file' },
          ],
        },
        { text: 'index.html', icon: 'jstree-file' },
        { text: 'page-one.html', icon: 'jstree-file' },
        { text: 'page-two.html', icon: 'jstree-file' }
      ],
      "check_callback": true
    },
    plugins: ['dnd']
  });

  //Draggable js treee example
  $('.draggablejstree').jstree({
    core: {
      "check_callback": true
    },
    plugins: ['dnd'],
  });
  // Init Whole row plugin
  $(".wholerowjstree").jstree({
    "plugins": ["wholerow"]
  });
  // Init contextmenu plugin
  $(".contextmenujstree").jstree({
    "core": { "check_callback": true },
    "plugins": ["contextmenu"]
  });
  // init searchable treeview
  $(".searchablejstree").jstree({
    "plugins": ["search"]
  });
  var to = false;
  $('.searchtree').keyup(function () {
    if (to) { clearTimeout(to); }
    to = setTimeout(function () {
      var v = $('.searchtree').val();
      $('.searchablejstree').jstree(true).search(v);
    }, 250);
  });
});

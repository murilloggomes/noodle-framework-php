  $(document).ready( function () {
          $('#tablelog ').DataTable( {
      "order": [[5, 'DESC']],
			"buttons": true,
			"pageLength": 15,
			"lengthMenu": [ 15, 30, 50, 75, 100],
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
          });
      });
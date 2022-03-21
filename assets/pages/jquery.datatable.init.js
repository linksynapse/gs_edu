/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Datatables Js
 */

 
$(document).ready(function() {

	$.ajax({
		type:"GET",
		url:'/data/API_012.php',
		dataType:'json',
		success:function(data){
			if(data.code == 0){
				$('#datatable').DataTable({
					data:data
				});							
			}
		}
	});

  //Buttons examples
  var table = $('#datatable-buttons').DataTable({
      lengthChange: false,
      buttons: ['copy', 'excel', 'pdf', 'colvis']
  });

  table.buttons().container()
      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );
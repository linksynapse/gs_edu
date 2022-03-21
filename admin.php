<?php
	session_start();
	if(!isset($_SESSION['idx']) || $_SESSION['level'] > 5){
		header("location:/");
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>nsc101sts work education academy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by themesbrand" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="enlarge-menu"  data-keep-enlarged="true">

        <?php
            include 'header.php';
        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Reservations</h4>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
												<th>User</th>
                                                <th>Application Date</th>
												<th>Approve Date</th>
                                                <th>Lecture Title</th>
                                                <th>Lecture Time</th>
												<th>Apply Count</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody id="myedus">
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

						<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Student List</h4>
        
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No</th>
												<th>Name</th>
                                                <th>Nationality</th>
                                                <th>NRIC / FIN No</th>
                                                <th>Contact No</th>
                                                <th>Email</th>
                                                <th>Job Position</th>
                                            </tr>
                                            </thead>
                                            <tbody id="mystudents">
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2019 GS E&C <span class="text-muted d-none d-sm-inline-block float-right">Create</i> by bluzen</span>
                    </footer>
                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
		<script>
			var table1 = $('#datatable').DataTable();
					  
			var table2 = $('#datatable-buttons').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            
            table2.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

			$(document).ready(function (){
				getApplication();
			});

			function getApplication(){
				var text1 = "";
				var text2 = "";
				$.ajax({
					type:"GET",
					url:'/data/API_013.php',
					dataType:'json',
					success:function(data){
						if(data.code == 0){
							table1.clear();
							$.each(data.data, function(key, value){
								
								if(parseInt(value.approve) == 0){
										text1 =	'<td><span class="badge badge-boxed  badge-soft-danger">Stanby</span></td>';
								}else if(parseInt(value.approve) == 1){
									text1 = '<td><span class="badge badge-boxed  badge-soft-success">Accept</span></td>';
								}else{
									text1 = '<td><span class="badge badge-boxed  badge-soft-danger">Reject</span></td>';
								}


								text2 = '<td><div class="dropdown d-inline-block float-right"><a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="fas fa-ellipsis-v font-20 text-muted"></i></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4"><a class="dropdown-item" href="javascript:RejectedEducation('+value.idx+')">REJECT</a><a class="dropdown-item" href="javascript:AllowEducation('+value.idx+')">ACCEPT</a><a class="dropdown-item" href="javascript:getStudent('+value.idx+')">LIST</a><a class="dropdown-item" href="javascript:DeleteEducation('+value.idx+')">DELETE</a></div></div></td></tr>';

								table1.row.add([
									value.userid,
									value.ApplyTime,
									value.AproveTime,
									value.title,
									value.lectureTime,
									value.apply,
									text1,
									text2
								]).draw(false);		
									
							});											
						}else{
						    table1.clear();
						}
					}
				});
			}

			function RejectedEducation(t){
				$.ajax({
					type: "POST",
					url: "/data/API_014.php",
					data: "data="+JSON.stringify({DataType:"JSON",idx:t}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
								getApplication();										
						}
					}
			});
			}

			function AllowEducation(t){
				$.ajax({
					type: "POST",
					url: "/data/API_015.php",
					data: "data="+JSON.stringify({DataType:"JSON",idx:t}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
							getApplication();
						}
					}
			});
			}
			
			function DeleteEducation(t){
			    if(confirm("Are you sure you want to delete it?"))
                {
    				$.ajax({
    					type: "POST",
    					url: "/data/API_022.php",
    					data: "data="+JSON.stringify({DataType:"JSON",ridx:t}),
    					dataType: "JSON",
    					success: function(data, status, xhr){
    						if(data.code == 0){
    							getApplication();
    						}
    					}
    			    });
                }
			}

			function getStudent(t){
				$.ajax({
					type: "POST",
					url: "/data/API_016.php",
					data: "data="+JSON.stringify({DataType:"JSON",ridx:t}),
					dataType: "JSON",
					success: function(data, status, xhr){
					if(data.code == 0){
							table2.clear().draw(false);
							$.each(data.data, function(key, value){
									table2.row.add([
									value.No,
									value.Name,
									value.Nationality,
                                    value["NRIC / FIN No"],
                                    value["Contact No (if any)"],
                                    value["Email (if any)"],
                                    value["Job Position"]
									]).draw(false);	
							});											
						}
					}
			});
			}
			
			
		</script>

    </body>
</html>
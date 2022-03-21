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
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--calendar css-->
        <link href="assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class=" enlarge-menu"  data-keep-enlarged="true">

        <?php
            include 'header.php';
        ?>
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title">Members</h4>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
												<th>UserID</th>
                                                <th>UserName</th>
                                                <th>Email</th>
												<th>Phone</th>
												<th>CreateTime</th>
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

			$(document).ready(function (){
				getApplication();
			});

			function getApplication(){
			    var text1 = "";
				var text2 = "";
				$.ajax({
					type:"GET",
					url:'/data/API_018.php',
					dataType:'json',
					success:function(data){
						if(data.code == 0){
							table1.clear();
							$.each(data.data, function(key, value){
							    if(parseInt(value.used) == 0){
									text1 =	'<td><span class="badge badge-boxed  badge-soft-danger">Stanby</span></td>';
								}else if(parseInt(value.used) == 1){
									text1 = '<td><span class="badge badge-boxed  badge-soft-success">Accept</span></td>';
								}
								text2 = '<td><div class="dropdown d-inline-block float-right"><a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="fas fa-ellipsis-v font-20 text-muted"></i></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4"><a class="dropdown-item" href="javascript:AllowAccount('+value.idx+')">ALLOW</a><a class="dropdown-item" href="javascript:RejectAccount('+value.idx+')">REJECT</a><a class="dropdown-item" href="javascript:DeleteAccount('+value.idx+')">DELETE</a></div></div></td></tr>';

								table1.row.add([
									value.userid,
									value.username,
									value.email,
									value.phone,
									value.createtime,
									text1,
									text2
								]).draw(false);		
									
							});											
						}
					}
				});
			}

			function AllowAccount(t){
				$.ajax({
					type: "POST",
					url: "/data/API_019.php",
					data: "data="+JSON.stringify({DataType:"JSON",user:t,status:1}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
								getApplication();										
						}
					}
			});
			}

			function RejectAccount(t){
				$.ajax({
					type: "POST",
					url: "/data/API_019.php",
					data: "data="+JSON.stringify({DataType:"JSON",user:t,status:0}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
							getApplication();
						}
					}
			});
			}
			
			function DeleteAccount(t){
			    if(confirm("Are you sure you want to delete it?"))
                {
                    $.ajax({
					type: "POST",
					url: "/data/API_021.php",
					data: "data="+JSON.stringify({DataType:"JSON",user:t}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
							getApplication();
						}
					}
			        });
                }
                else
                {
                    
                }
			}
		</script>

    </body>
</html>
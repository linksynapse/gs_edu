<?php
	session_start();
	if(!isset($_SESSION['idx'])){
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
        
        <style>
        .filebox label { display: inline-block; padding: .5em .75em; color: #999; font-size: inherit; line-height: normal; vertical-align: middle; background-color: #fdfdfd; cursor: pointer; border: 1px solid #ebebeb; border-bottom-color: #e2e2e2; border-radius: .25em; } .filebox input[type="file"] { /* 파일 필드 숨기기 */ position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip:rect(0,0,0,0); border: 0; }
        </style>
    </head>

    <body class="enlarge-menu"  data-keep-enlarged="true">

        <?php
            include 'header.php';
        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id='calendar'></div>
                                        <div style='clear:both'></div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!-- End row -->
    
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


		<!-- modal start -->
		<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Modals" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title mt-0">Education Infomation</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="mcontents">
							<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title" id="lectureLabel">NCS Lecture Step 1</h4>
                                        <p class="text-muted mb-4" id="lectureContents">
											this lecture is beginner work safety training.
                                        </p>
        
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <thead>
                                                <tr>
                                                    <th>Total</th>
                                                    <th>Approved</th>
                                                    <th>Pending</th>
                                                    <th>Vacant</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td id="totalLabel">80</td>
                                                    <td id="approvedLabel">80</td>
                                                    <td id="pendingLabel">80</td>
                                                    <td id="possiableLabel">250</td>
                                                    <td id="statusLabel"><span class="badge badge-boxed  badge-soft-success">Afford</span></td>
                                                </tr>
                                                </tbody>
                                            </table><!--end /table-->
                                        </div><!--end /tableresponsive-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->
							</div> <!-- end row -->
							<div class="row">
							<div class="col-6">
                                <div class="card">
                                    <div class="card-body">
										<a class="btn btn-info px-4 align-self-center report-btn" style="width:100%" href="/download/Sample_STS.xlsx"><i class="fa fa-download"></i> Sample Download</a>
									</div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
										<div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" id="excelFile" onchange="excelExport(event)">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
									</div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->
							</div>
							<div class="row d-none" id="prog">
							    <div class="col-12">
							        <div class="card">
                                    <div class="card-body">
										<div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                    </div>
									</div><!--end card-body-->
                                    </div><!--end card-->
							    </div>
							</div>
							
							<div class="row d-none" id="next">
							    <div class="col-12">
							        <div class="card">
                                    <div class="card-body">
										<a class="btn btn-info px-4 align-self-center report-btn" style="width:100%" href="javascript:SubmitExcelData()">Next</a>
									</div><!--end card-body-->
                                    </div><!--end card-->
							    </div>
							</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src='assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src='assets/pages/jquery.calendar.js'></script>

		<script src="assets/pages/jquery.modal-animation.js"></script>
		<script src="assets/plugins/custombox/custombox.min.js"></script>
        <script src="assets/plugins/custombox/custombox.legacy.min.js"></script>

        <!-- App js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
        <script src="assets/js/app.js?v=7"></script>
		<script src="assets/js/app.calendar.js?v=6"></script>

    </body>
</html>
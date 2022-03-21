<?php
	session_start();
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

        <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

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
                                    <div class="card-body new-user order-list">
                                        <h4 class="header-title mt-0 mb-3">
                                            NOTICE
                                            <?php
                                            if(isset($_SESSION['idx'])){
                                                if($_SESSION['level'] < 5){
                                                    echo '<a style="float:right;" href="notice_w.php" onclick="window.open(this.href, \'_blank\', \'width=500px,height=500px,toolbars=no,scrollbars=no\'); return false;">[Write]</a>';
                                                }
                                            }
                                            ?>
                                        </h4>
                                        
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="border-top-0">Date</th>
                                                        <th class="border-top-0">Title</th>
                                                        <th class="border-top-0">Writer</th>
                                                    </tr><!--end tr-->
                                                </thead>
                                                <tbody id="Educations">
                                                    <tr>
														<td colspan='3' style="text-align:center">Not exist.</td>
                                                    </tr><!--end tr-->                                                
                                                </tbody>
                                            </table> <!--end table-->                                               
                                        </div><!--end /div-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
						<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-3">News</h4>
                                        <div class="card-deck-wrapper">
                                            <div class="card-deck">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="https://cna-sg-res.cloudinary.com/image/upload/q_auto,f_auto/image/11902186/16x9/670/377/1fba2f5e8879c917b1cecb7f9c4c4cbf/hX/fatal-incident-at-sunway-worksite.png" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h4 class="card-title mt-0">Hiap Seng Lorry Enterprises owner fined record amount for fatal workplace incident</h4>
                                                        <p class="text-muted">SINGAPORE: The sole proprietor of Hiap Seng Lorry Enterprises (Hiap Seng) has been fined a record amount under the Workplace Safety and Health (WSH) Act for his role in a fatal workplace incident. Ong Chin Chong was fined S$140,000 on Sep 2 after one of his employees died while unloading a bundle of wire mesh from a Hiap Seng lorry, the Ministry of Manpower (MOM) said in a press release on Friday (Sep 13).</p>
                                                        <p class="text-muted">
                                                            <small class="text-muted">Last updated 5 month ago</small>
                                                        </p>
                                                    </div>
                                                </div><!--end card-->
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="https://cna-sg-res.cloudinary.com/image/upload/q_auto,f_auto/image/12283100/16x9/670/377/b3130d679b96182e4141d8d29b2e59f8/LY/mom-workplace-safety.jpg" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h4 class="card-title mt-0">3 workplace deaths since start of new year: Ministry of Manpower</h4>
                                                        <p class="text-muted">SINGAPORE: Three people have died in workplace accidents since the start of the new year, said the Ministry of Manpower (MOM) on Sunday (Jan 19), as it called for companies to ensure a safe working environment."This does not augur well for workplace safety and health," said MOM.</p>
                                                        <p class="text-muted">
                                                            <small class="text-muted">Last updated 17 days ago</small>
                                                        </p>
                                                    </div>
                                                </div><!--end card-->
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="https://cna-sg-res.cloudinary.com/image/upload/q_auto,f_auto/image/10202122/16x9/670/377/e6e12870340fb83fba5d1f7733c26791/xy/zap-piling-1.jpg" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h4 class="card-title mt-0">16 weeks' jail for site supervisor who coerced worker to take blame for fatal workplace accident</h4>
                                                        <p class="text-muted">SINGAPORE: A site supervisor for construction company ZAP Piling was sentenced to a total of 16 week' imprisonment for offences related to a fatal workplace incident on Jun 9, 2016, a press release from the Ministry of Manpower (MOM) said on Saturday (Apr 13).Tay Tong Chuan was sentenced to eight weeks' jail  under the Penal Code for intentionally obstructing the course of justice by asking a worker to take the blame for the fatal incident. He was also given another eight week's jail under the Workplace Safety and Health Act for instructing his worker to carry out lifting operations involving a crawler crane without a permit-to-work and a lifting plan.</p>
                                                        <p class="text-muted">
                                                            <small class="text-muted">Last updated 3 mins ago</small>
                                                        </p>
                                                    </div>
                                                </div><!--end card-->
                                            </div><!--end card-deck-->
                                        </div><!--end card-deck-wrapper-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2019 GS E&C <span class="text-muted d-none d-sm-inline-block float-right">Create</i> by bluzen</span>
                    </footer>
                </div>
                <!-- end page content -->
            </div>
        </div>
        <!-- end page-wrapper -->
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Modals" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title mt-0">Notice</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
        <div class="modal-body" id="mcontents">
							<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title" id="n_title">NCS Lecture Step 1</h4>
                                        
                                        </div><!--end /tableresponsive-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                        Attached File
                                        <p class="text-muted mb-4" id="n_file">
											this lecture is beginner work safety training.
                                        </p>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <pre id="n_context" style="padding:10px;overflow:auto;white-space:pre-wrap;">hello world</pre>
                                        
                                        </div><!--end /tableresponsive-->
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div> <!-- end col -->
                            <?php
                                            if(isset($_SESSION['idx'])){
                                                if($_SESSION['level'] < 5){
                                                        echo '<div class="row">';
                                                        echo '<div class="col-12">';
                                                        echo '<div class="card">';
                                                        echo '<div class="card-body" style="text-align:center">';
                                                        echo '<a class="btn btn-info px-4 align-self-center report-btn" id="n_link" href="#">Delete</a>';
                                                        echo '</div><!--end /tableresponsive-->';
                                                        echo '</div><!--end card-body-->';
                                                        echo '</div><!--end card-->';
                                                        echo '</div> <!-- end col -->';
                                                }
                                            }
                                        ?>
							</div> <!-- end row -->
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
        <!-- jQuery  -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
		<script>
		function ViewNoticeModal(data){
        	$('#Modals').modal('show');
        	getNoticeInfo(data);
        	window.education = data;
        }
        
        function getNoticeInfo(r){
            $.ajax({
					type: "POST",
					url: "/data/API_025.php",
					data: "data="+JSON.stringify({DataType:"JSON",option:r}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data['code'] == 0){
							
							$.each(data.data, function(key, value){
							    $("#n_title").text(value.title);
							    $("#n_file").html("<a href='/ndrive/"+value.name_save+"'>"+value.name_orig+"</a>")
							    $("#n_context").html(value.context)
							    <?php
                                            if(isset($_SESSION['idx'])){
                                                if($_SESSION['level'] < 5){
							    echo '$("#n_link").attr("href", "/data/API_026.php?idx="+value.idx);';
                                                }
                                            }
                                            ?>
							    //$("#Educations").append('<tr><td>'+value.CreateTime+'</td><td><a href="javascript:ViewNoticeModal('+value.idx+')">'+value.title+'</a></td><td>'+value.identify+'</td></tr>');
					});
						setTimeout(getList,10000);
					}else{
						alert(data.data.msg);
					}
					},
				error: function(jqXHR, textStatus, errorThrown){
					alert(textStatus);
				}
			});
        }
		
		function getList(){
				$.ajax({
					type: "POST",
					url: "/data/API_024.php",
					data: "data="+JSON.stringify({DataType:"JSON",option:3,education:NaN}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data['code'] == 0){
							$("#Educations").text("");
							$.each(data.data, function(key, value){
							$("#Educations").append('<tr><td>'+value.CreateTime+'</td><td><a href="javascript:ViewNoticeModal('+value.idx+')">'+value.title+'</a></td><td>'+value.identify+'</td></tr>');
					});
						setTimeout(getList,10000);
					}else{
						//alert(data.data.msg);
					}
					},
				error: function(jqXHR, textStatus, errorThrown){
					alert(textStatus);
				}
			});
		}


		$(document).ready(function () {
			setTimeout(getList,0);
		});
		</script>

    </body>
</html>
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
        
                                        <h4 class="mt-0 header-title">Educations</h4>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
												<th>Maker</th>
                                                <th>StartTime</th>
												<th>EndTime</th>
                                                <th>Lecture Title</th>
												<th>Total</th>
												<th>Apply</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
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
                                        <h4 class="mt-0 header-title">New Education</h4>
                                        <p class="text-muted mb-4">
                                        </p>        
                                        <form method="post" action="javascript:NewEducation()">
										<div class="form-group row">
											<label for="example-datetime-local-input" class="col-sm-3 col-form-label text-right">Start Date and time</label>
                                            <div class="col-sm-9">
												<input class="form-control" type="datetime-local" value="2020-01-01T13:45:00" id="example-datetime-start-input">
                                            </div>
                                        </div>
										<div class="form-group row">
											<label for="example-datetime-local-input" class="col-sm-3 col-form-label text-right">End Date and time</label>
                                            <div class="col-sm-9">
												<input class="form-control" type="datetime-local" value="2020-01-01T13:45:00" id="example-datetime-end-input">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="example-number-input" class="col-sm-3 col-form-label text-right">Total</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" value="40" id="example-number-input">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Title</label>
                                            <div class="col-sm-9">
                                                <select class="custom-select" id="example-text-input">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="Safety Course for Full Packager (8H)">Safety Course for Full Package (8H)</option>
                                                    <option value="Safety Course for Lifting Work (4H)">Safety Course for Lifting Work (4H)</option>
                                                    <option value="Safety Course for Working at Height (4H)">Safety Course for Working at Height (4H)</option>
                                                    <option value="Safety Course for Confined Space (4H)">Safety Course for Confined Space (4H)</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-primary px-5 py-2">Writing</button>
                                        </div>
                                        </form>        
                                    </div><!--end card-body-->
                                </div><!--end card-->
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
		<!--Wysiwig js-->
        <script src="assets/plugins/tinymce/tinymce.min.js"></script>
        <script src="assets/pages/jquery.form-editor.init.js"></script>

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
					url:'/data/API_017.php',
					dataType:'json',
					success:function(data){
						if(data.code == 0){
							table1.clear();
							$.each(data.data, function(key, value){
								
								if(parseInt(value.total) > parseInt(value.apply)){
									text1 = '<td><span class="badge badge-boxed  badge-soft-success">Afford</span></td>';
								}else{
									text1 = '<td><span class="badge badge-boxed  badge-soft-danger">FULL</span></td>';
								}


								text2 = '<td><div class="dropdown d-inline-block float-right"><a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="fas fa-ellipsis-v font-20 text-muted"></i></a><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4"><a class="dropdown-item" href="javascript:DeleteEducation('+value.education+')">Delete</a></div></div></td></tr>';

								table1.row.add([
									value.userid,
									value.starttime,
									value.endtime,
									value.title,
									value.total,
									value.apply,
									text1,
									text2
								]).draw(false);		
									
							});											
						}
					}
				});
			}

			function DeleteEducation(t){
				$.ajax({
					type: "POST",
					url: "/data/API_005.php",
					data: "data="+JSON.stringify({DataType:"JSON",education:t}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
								getApplication();										
						}
					}
				});
			}

			function NewEducation(){
				var stime = $("#example-datetime-start-input").val();
				var etime = $("#example-datetime-end-input").val();
				var total = $("#example-number-input").val();
				var title = $("#example-text-input").val();

                
				var contents = (new Date(stime)).format('yyyy/MM/dd HH:mm') + " ~ " + (new Date(etime)).format('HH:mm');
				$.ajax({
					type: "POST",
					url: "/data/API_004.php",
					data: "data="+JSON.stringify({DataType:"JSON",stime:stime,etime:etime,total:total,title:title,contents:contents}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data.code == 0){
								alert("Write OK!");
								getApplication();										
						}
					}
				});
            }
            
            Date.prototype.format = function (f) {

if (!this.valueOf()) return " ";



var weekKorName = ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"];

var weekKorShortName = ["일", "월", "화", "수", "목", "금", "토"];

var weekEngName = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

var weekEngShortName = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

var d = this;



return f.replace(/(yyyy|yy|MM|dd|KS|KL|ES|EL|HH|hh|mm|ss|a\/p)/gi, function ($1) {

    switch ($1) {

        case "yyyy": return d.getFullYear(); // 년 (4자리)

        case "yy": return (d.getFullYear() % 1000).pad(); // 년 (2자리)

        case "MM": return (d.getMonth() + 1).pad(); // 월 (2자리)

        case "dd": return d.getDate().pad(); // 일 (2자리)

        case "KS": return weekKorShortName[d.getDay()]; // 요일 (짧은 한글)

        case "KL": return weekKorName[d.getDay()]; // 요일 (긴 한글)

        case "ES": return weekEngShortName[d.getDay()]; // 요일 (짧은 영어)

        case "EL": return weekEngName[d.getDay()]; // 요일 (긴 영어)

        case "HH": return d.getHours().pad(); // 시간 (24시간 기준, 2자리)

        case "hh": return ((h = d.getHours() % 12) ? h : 12).pad(); // 시간 (12시간 기준, 2자리)

        case "mm": return d.getMinutes().pad(); // 분 (2자리)

        case "ss": return d.getSeconds().pad(); // 초 (2자리)

        case "a/p": return d.getHours() < 12 ? "오전" : "오후"; // 오전/오후 구분

        default: return $1;

    }

});

};

Number.prototype.pad = function(size) {
    var s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
}
		</script>

    </body>
</html>
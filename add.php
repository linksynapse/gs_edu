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
        <meta content="A premium admin dashboard template by themesbrand" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/plugins/jsgrid/jsgrid.min.css" rel="stylesheet">
        <link href="assets/plugins/jsgrid/jsgrid-theme.min.css" rel="stylesheet">

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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="jsGrid"></div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
						<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a class="btn btn-info px-4 align-self-center report-btn" href="javascript:handleDataJson();">Apply</a>
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
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <script src="assets/plugins/jsgrid/jsgrid.min.js"></script>
        <script src="assets/pages/jquery.jsgrid.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
		<script>
			(function() {
				var data = '<?php echo $_POST['data']?>';
				var db = {
					loadData: function(filter) {
						return $.grep(this.clients, function(client) {
							return (!filter.No || (client.No == filter.No))
								&& (!filter.Name || client.Name.indexOf(filter.Name) > -1)
								&& (!filter.Nationality || client.Nationality.indexOf(filter.Nationality) > -1)
                                && (!filter["NRIC / FIN No"] || client["NRIC / FIN No"].indexOf(filter["NRIC / FIN No"]) > -1)
                                && (!filter["Contact No (if any)"] || client["Contact No (if any)"].indexOf(filter["Contact No (if any)"]) > -1)
                                && (!filter["Email (if any)"] || client["Email (if any)"].indexOf(filter["Email (if any)"]) > -1)
                                && (!filter["Job Position"] || client["Job Position"].indexOf(filter["Job Position"]) > -1)
						});
					},

					insertItem: function(insertingClient) {
						this.clients.push(insertingClient);
					},

					updateItem: function(updatingClient) { },

					deleteItem: function(deletingClient) {
						var clientIndex = $.inArray(deletingClient, this.clients);
						this.clients.splice(clientIndex, 1);
					}
				};

				window.db = db;

				db.clients = JSON.parse(data);
			}());

			function handleDataJson(){
                $.ajax({
                    type: "POST",
                    url: "/data/API_007.php",
                    data: 'data='+JSON.stringify({DataType:'JSON',education:<?php echo $_POST['education']?>,json:JSON.stringify(db.clients)}),
                    dataType: "JSON",
                    success: function(data, status, xhr){
                        if(data['code'] == "0"){
							alert("Course applied successfully, allow us one working day to confirm your booking\nIf any changes or cancel please let us know one day in advance\nFor more information\nSafety Admin Ms Noriza\nTEL : 6434-2008\nEmail : safetyadmin@gsenc.com");
							location.href = "/calendar.php";
                        }else{
							alert("Insert Fail. check data");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert(textStatus);
                    }
                });
            }
		</script>

    </body>
</html>
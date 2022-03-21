<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>nsc101sts work education academy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                        <div class="px-3">
                            <div class="media">
                                <a href="index.php" class="logo logo-admin"><img src="img/group_gsenc_en_b.png" height="55" alt="logo" class="my-3"></a>
                                <div class="media-body ml-3 align-self-center">                                                                                                                       
                                    <h4 class="mt-0 mb-1">Register</h4>
                                </div>
                            </div>                            
                            
                            <form class="form-horizontal my-4" action="javascript:join()">
								
								<div class="form-group">
                                    <label for="username">UserIdentify</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="useridentify" placeholder="Enter User ID">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Email Address</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-email-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="useremail" placeholder="Email Address">
                                    </div>                                    
                                </div>
    
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"><i class="mdi mdi-lock-outline font-16"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter Password">
                                    </div>                                
                                </div>

                                <div class="form-group">
                                    <label for="Mobile-number">Mobile Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon5"><i class="mdi mdi-cellphone-iphone font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="userphone" placeholder="Mobile Number">
                                    </div>                                
                                </div>
    

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>                            
                            </form>

                        </div>
                        
                        <div class="m-3 text-center bg-light p-3 text-primary">
                            <h5 class="">Already have an account ? </h5>
                            <a href="auth-login.php" class="btn btn-primary btn-round waves-effect waves-light px-3">Log in</a>                
                        </div>                        
                    </div>
                </div>
            </div>
			<div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center"> 
                    <div class="account-title text-white text-center">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
		<script>
			function join(){
				var identify = $("#useridentify").val();
                var password = $("#userpassword").val();
                var name = $("#useridentify").val();
                var nric = "THISNOTUSED"
                var email = $("#useremail").val();
                var phone = $("#userphone").val();
				$.ajax({
					type: "POST",
					url: "/data/API_009.php",
					data: "data="+JSON.stringify({DataType:"JSON",identify:identify,name:name,nric:nric,email:email,phone:phone,password:password}),
					dataType: "JSON",
					success: function(data, status, xhr){
						if(data['code'] == 0){
                            alert("ID created successfully, allow us one working day to confirm your application\nFor more information\nSafety Admin Ms Zulaikha\nTEL : 9455-2314\nEmail : zulaikha@gsenc.com");
							location.href = "/auth-login.php";
						}else{
							alert(data.data.msg);
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
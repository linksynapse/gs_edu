/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */


(function ($) {

    'use strict';

    function initSlimscroll() {
        $('.slimscroll').slimscroll({
            height: 'auto',
            position: 'right',
            size: "7px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    }

    function initMetisMenu() {
        //metis menu
        $("#side-nav").metisMenu();
    }

    

    function initLeftMenuCollapse() {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarge-menu");
            initSlimscroll();
        });
    }

    function initEnlarge() {
        if ($(window).width() < 1025) {
            $('body').addClass('enlarge-menu');
        } else {
            if ($('body').data('keep-enlarged') != true)
                $('body').removeClass('enlarge-menu');
        }
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $(".left-sidenav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) { 
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("in"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

	function initAlram(){
		$.ajax({
			type: "POST",
			url: "/data/API_001.php",
			data: "data="+JSON.stringify({DataType:"JSON",read:true}),
			dataType: "JSON",
			success: function(data, status, xhr){
				if(data['code'] == 0){
					$("#notification_title_2").text("Notifications(" + data.data.length + ")");
					$("#notification_title_1").text(data.data.length);
					$("#notification_items").text("");
					$.each(data.data, function(key, value){
						$("#notification_items").append('<a href="javascript:AlramRead('+value.idx+');" class="dropdown-item notify-item active"><div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div><p class="notify-details">Notice<small class="text-muted">'+ value.contents +'</small></p></a>');
					});
					window.setTimeout(initAlram,1000);
				}else{
					$("#notification_title_2").text("Notifications(0)");
					$("#notification_title_1").text("0");
					$("#notification_items").text("");
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				//need login
			}
		});
	}

    function init() {
        initSlimscroll();
        initMetisMenu();
        initLeftMenuCollapse();
        initEnlarge();
        initActiveMenu();
		initAlram();
        Waves.init();
    }

    init();

})(jQuery)

function login(){
	var identify = $("#useridentify").val();
	var password = $("#userpassword").val();

	$.ajax({
		type:"POST",
		url:"/data/API_010.php",
		data:"data="+JSON.stringify({DataType:"JSON",identify:identify,password:password}),
		dataType:"JSON",
		success:function(data,status,xhr){
			if(data['code'] == 0){
				location.href = "/";
			}else{
				alert("Registration failed, Please Contact Safety Admin\nSafety Admin Ms Zulaikha\nTEL : 9455-2314\nEmail : zulaikha@gsenc.com");
			}
		},
		error:function(jqXHR, textStatus, errorThrown){
			alert(textStatus);
		}
	});
}

function excelExport(event){
    $('#prog').toggleClass("d-none");
	excelExportCommon(event, handleExcelDataAll);
}
function excelExportCommon(event, callback){
	var input = event.target;
	var reader = new FileReader();
	reader.onload = function(){
	var fileData = reader.result;
	var wb = XLSX.read(fileData, {type : 'binary'});
	/*wb.SheetNames.forEach(function(item, index, array) {
		EXCEL_JSON = XLSX.utils.sheet_to_json(wb.Sheets[item]);
	})*/
	var firstSheet = wb.SheetNames[0];
	wb.Sheets[firstSheet]["!ref"] = "A4:G44";

	EXCEL_JSON = XLSX.utils.sheet_to_json(wb.Sheets[firstSheet]);
	
	/*EXCEL_JSON[0]["FIN/NRIC"] = EXCEL_JSON.EXCEL_JSON[0]["NRIC / FIN No."];
	EXCEL_JSON[0]["Contact No"] = EXCEL_JSON.EXCEL_JSON[0]["Contact No (if any)"];
	EXCEL_JSON[0]["Email"] = EXCEL_JSON.EXCEL_JSON[0]["Email (if any)"];
    delete EXCEL_JSON[0]["NRIC / FIN No."];
    delete EXCEL_JSON[0]["Contact No (if any)"];
    delete EXCEL_JSON[0]["Email (if any)"];*/
	callback(EXCEL_JSON);      
	};
	reader.readAsBinaryString(input.files[0]);
}

var globalSheet;
function handleExcelDataAll(sheet){
    globalSheet = sheet;
    if(globalSheet.length > Vacant){
        alert("Can't apply, Student's many then Vacant.");
        $('#prog').toggleClass("d-none");
    }else{
        $('#prog').toggleClass("d-none");
        $('#next').toggleClass("d-none");
    }
}

function SubmitExcelData(){
    $('#next').toggleClass("d-none");
    $('#prog').toggleClass("d-none");
    handleExcelDataJson(globalSheet);
}

function handleExcelDataJson(sheet){
	var form = document.createElement('form');
	var objs;
	objs = document.createElement('input');
	objs.setAttribute('type', 'hidden');
	objs.setAttribute('name', 'data');
	objs.setAttribute('value', JSON.stringify(sheet));
	form.appendChild(objs);
	objt = document.createElement('input');
	objt.setAttribute('type', 'hidden');
	objt.setAttribute('name', 'education');
	objt.setAttribute('value', window.education);
	form.appendChild(objt);
	form.setAttribute('method', 'post');
	form.setAttribute('action', "/add.php");
	document.body.appendChild(form);
	form.submit();
}

function AlramRead(data){
	$.ajax({
		type:"POST",
		url:"/data/API_003.php",
		data:"data="+JSON.stringify({DataType:"JSON",idx:data}),
		dataType:"JSON",
		success:function(data,status,xhr){
			if(data['code'] == 0){

			}else{
				alert(data['data'][0].msg);
			}
		},
		error:function(jqXHR, textStatus, errorThrown){
			alert(textStatus);
		}
	});
}
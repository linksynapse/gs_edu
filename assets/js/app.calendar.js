function ViewEducationModal(data){
	$('#Modals').modal('show');
	getEduInfo(data);
	window.education = data;
}

var Vacant = 0;

function getEduInfo(education){
	$.ajax({
		type:"POST",
		url:'/data/API_006.php',
		dataType:'json',
		data:"data="+JSON.stringify({DataType:"JSON",option:2,education:education}),
		success:function(data){
			if(data.code == 0){
				$("#lectureLabel").text(data.data[0].title);
				$("#lectureContents").html(data.data[0].contents);
				$("#totalLabel").text(data.data[0].total);
				$("#approvedLabel").text(data.data[0].apply);
				$("#pendingLabel").text(data.data[0].pending);
				$("#possiableLabel").text(data.data[0].total - data.data[0].pending - data.data[0].apply);
				var Temp = parseInt(data.data[0].pending) + parseInt(data.data[0].apply);
				Vacant = parseInt(data.data[0].total) - parseInt(data.data[0].pending) - parseInt(data.data[0].apply);
				if(parseInt(data.data[0].total) <= Temp){
					$("#statusLabel").html('<span class="badge badge-boxed badge-soft-danger">Full</span>');
				}else{
					$("#statusLabel").html('<span class="badge badge-boxed badge-soft-success">Available</span>');
				}
			}
		}
	});
}

function InfomationRefresh(data){
	
}
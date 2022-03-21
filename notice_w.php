<?php
	session_start();
	if(!isset($_SESSION['idx']) || $_SESSION['level'] > 5){
		header("location:/");
	}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Notice Write</title>
<style>
<!--
td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none; font-family : sans; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { text-decoration : underline; color : black; font-size : 9pt; }

--> 
</style>
<script type="text/javascript">

function formSubmit(f) {

    // 업로드 할 수 있는 파일 확장자를 제한합니다.

	var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','jpg','gif','png','txt','ppt','pptx','');

	var path = document.getElementById("upfile").value;

	var pos = path.indexOf(".");

	if(pos < 0) {

		//alert("");

	}

	

	var ext = path.slice(path.indexOf(".") + 1).toLowerCase();

	var checkExt = false;

	for(var i = 0; i < extArray.length; i++) {

		if(ext == extArray[i]) {

			checkExt = true;

			break;

		}

	}



	if(checkExt == false) {

		alert("Can't upload this extension");

	    return false;

	}

	

	return true;

}

</script>
</head>

<body topmargin=0 leftmargin=0 text=#464646>

<center>
<BR>

<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form enctype="multipart/form-data" name="uploadForm" id="uploadForm" action=data/API_023.php method=post onsubmit="return formSubmit(this);">

<table width=450 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777 style="width:100%;height:100%">
<tr>
<td height=20 align=center bgcolor=#999999>
<font color=white><B>Writing</B></font>
</td>
</tr>

<!-- 입력 부분 -->
<tr>
<td bgcolor=white>&nbsp;
<table style="width:100%;height:100%">
<tr>
<td width=60 align=left >File</td>
<td align=left >
<input name="upfile" id="upfile" type="file">
</tr>
<tr>
<td width=60 align=left >TITLE</td>
<td align=left >
<INPUT type=text style="width:100%" name=title maxlength=35>
</td>
</tr>
<tr>
<td width=60 align=left >CONTEXT</td>
<td align=left >
<TEXTAREA name=context style="width:100%" cols=65 rows=15></TEXTAREA>
</td>
</tr>
<tr>
<td colspan=10 align=center>
<input type=submit value="save">
&nbsp;&nbsp;
<input type=reset value="rewrite"/>
</td>
</tr>
</TABLE>
</td> 
</tr>
<!-- 입력 부분 끝 -->
</table>
</form>
</center>
</body>
</html> 
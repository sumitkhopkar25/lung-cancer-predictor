$(document).ready(function(){
	
	$("#never-smoke").click(function(){
		$("#former-smoke-hide").hide();
		$("#never-smoker-hide").hide();
		$("#cig-stop").val(0);
		$("#cig-years").val(0);
		$("#cigar").prop("checked", true);
		$("#cig-pd").prop("checked", true);
		$("#filtered").prop("checked", true);
		$("#pack-years").val(0);
		$("#pipe").prop("checked", true);
		$("#smoked-f").prop("checked", true);
		$("#smoked-af").val(0);
		$("#smoked-r").prop("checked", true);
		$("#smoked-s").val(0);
	});

	$("#former-smoker").click(function(){
		$("#never-smoker-hide").hide();
		$("#former-smoke-hide").show();
		$("#cig-years").val(0);
		$("#cigar").prop("checked", true);
		$("#cig-pd").prop("checked", true);
		$("#filtered").prop("checked", true);
		$("#pack-years").val(0);
		$("#pipe").prop("checked", true);
		$("#smoked-f").prop("checked", true);
		$("#smoked-af").val(0);
		$("#smoked-r").prop("checked", true);
		$("#smoked-s").val(0);
	});

	$("#curr-smoker").click(function(){
		$("#former-smoke-hide").hide();
		$("#never-smoker-hide").show();
		$("#cig-stop").val(0)
	});
})
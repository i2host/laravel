<script type="text/javascript">
$(":file").filestyle();
$(".uploadnow").on("click",function() {
	targetinput = $(this).parents("form").find("input[name='upload_holder']");
	token = $(this).parents("form").find("input[name='_token']").val();
	$(".uploaded_file").upload(upload_path, { '_token' : token },
	function(respond) {
		if (respond.status) {
			$(".error_place").hide();
			$(".errormessage").not(':first').remove();
			$(".progress-bar").removeClass("progress-bar-info").addClass("progress-bar-success");
			$(".progress-bar").html("Completed");
			$("input[name='upload_holder']").val(respond.url);
		}
		else {
			$(".progress-bar").removeClass("progress-bar-success");
			$(".progress-bar").removeClass("progress-bar-info").addClass("progress-bar-danger");
			$(".errormessage").not(':first').remove();
			$(".progress-bar").html("Upload not completed");
			$(".errormessage").find(".error_reason").html("Reason : "+respond.error_reason);
			$(".errormessage").find(".error_values").html("Value  : "+respond.error_values);
			$(".error_place").show();
		}
		
	},
	
	function(prog,value) {
		$(".progress-bar").css("width",value+"%");
		$(".progress-bar").html(value+"%");
	});
	return false;
});
</script>
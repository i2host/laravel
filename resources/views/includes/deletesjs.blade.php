<script type="text/javascript">
var delform = $('#delformvalid');
delform.parsley()
.on('form:submit', function() {
	var str = delform.serialize();
	id = delform.find("input[name='id']").val();
	deleteformfile = formfile+"/"+id;
	//alert(deleteformfile);
	submitforms(str,"delete",deleteformfile);
	return false; 
});
</script>
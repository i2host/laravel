<script type="text/javascript">
var editform = $('#editformvalid');
editform.parsley()
.on('form:submit', function() {
    var str = editform.serialize();
    id = editform.find("input[name='id']").val();
    editformfile = formfile+"/"+id;
    //alert(editformfile);
	submitforms(str,"edit",editformfile);
	return false; 
});
</script>
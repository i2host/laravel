<script type="text/javascript">
$('#date').datetimepicker({
    format:'YYYY-MM-DD HH:MM:ss',
});
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
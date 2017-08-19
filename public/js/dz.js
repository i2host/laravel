$.ajaxSetup ({
    // Disable caching of AJAX responses
	cache: false,
	headers: {
		'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
	}
});

/* Convert the checkbox style Start */
table.on('draw.dt', function() {
  $('checkbox input').iCheck({
	checkboxClass: 'icheckbox_flat-green'
  });
});
/* Convert the checkbox style End */


/* Submit Forms Add , Edit , Delete Multi Delete Start */

/* add form ajax start
Edit,Copy,Delete,members,teams,details found in folder forms under names , edit.js.php > copy.js.php > delete.js.php > members.js.php > teams.js.php > details.js.php
*/
var formfile = $("input[name='baseurl']").val();
var upload_path = $("input[name='upload_path']").val();
var addform = $('#addformvalid');
addform.parsley().on('field:validated', function() {
})
.on('form:submit', function() {
	var str = addform.serialize();
	submitforms(str,"add",formfile);
	return false;
});
/* add form ajax End */

$('#date').datetimepicker({
    format:'YYYY-MM-DD HH:MM:ss',
});

$('#choice').select2();

function submitforms(str="",type="",formfile="") {
	var statusarr;
	var actiondone;
	$.ajax({
	  type: "POST",
	  url: formfile,
	  data: str,
	  dataType: "html"
	})
	.done(function( msg ) {
		//alert(msg);
	var respond = JSON.parse(msg);

	if (respond.success) {
		if (respond.type == "Add" ) {
			var rows = respond.htmldata;
			var aRow = $("<tr>").attr({"data-pharse":respond.id}).append(rows);
				table.row.add(aRow).draw();
		}
		if (respond.type == "Edit" ) {
			var cellsdata = respond.htmldata;
				$(".editrow td").each(function(i, obj) {
					table.cell(this).data(cellsdata[i]);
				});
				$('#editmodal').modal('hide');
		}	
		if (respond.type == "Delete") {
				table
				.rows( '.deleterow' )
				.remove()
				.draw();
				$('#deletemodal').modal('hide');
		}
		

		new PNotify({
			title: respond.type+" Status",
			type: "success",
			text: " Action Complete Successfully",
			hide: true,
			styling: 'bootstrap3',
			delay:1000
		});
	}
	else {

		var errormsg = '';
		for (var message in respond.messages) {
			// skip loop if the property is from prototype
			if (!respond.messages.hasOwnProperty(message)) continue;

			var obj = respond.messages[message];
			for (var prop in obj) {
				// skip loop if the property is from prototype
				if(!obj.hasOwnProperty(prop)) continue;

				// your code
				errormsg += message +' '+ obj[prop]+'<br>';

			}
		}


		new PNotify({
			title: respond.type+" Status",
			type: "error",
			text: errormsg,
			hide: true,
			styling: 'bootstrap3',
			delay:5000
		});

	}

		

		
	})
	.fail(function( jqXHR, textStatus , msg ) {
		//alert(msg);
		new PNotify({
			title: "Cant reach the server",
			type: "error",
			text: msg,
			hide: true,
			styling: 'bootstrap3',
			delay:5000
		});

	});

}

var str = "";
var cotunter = 0;

function bluk_delete() {
	var datafile = $("div[multiedit-file]").attr('multiedit-file');
	str = "";
	cotunter = 0;
	$(':checkbox:checked').each(function(i){
		str += "ids"+i+"="+$(this).val()+"&";
		cotunter++;
    });
	str += "total="+cotunter;
	$('#multideletemodal').on('show.bs.modal', function (e) {
	var modal = $(this);
	modal.find(".modal-content").load( "forms/"+datafile+"?"+str+"&multidelete" );
	});
	$('#multideletemodal').modal("show");
	//submitforms(str,"multidelete");
}

function bluk_edit() {
	var datafile = $("div[multiedit-file]").attr('multiedit-file');
	str = "";
	cotunter = 0;
	$(':checkbox:checked').each(function(i){
		str += "ids"+i+"="+$(this).val()+"&";
		cotunter++;
    });
	str += "total="+cotunter;
	$('#multieditmodal').on('show.bs.modal', function (e) {
	var modal = $(this);
	modal.find(".modal-content").load( "forms/"+datafile+"?"+str+"&multiedit" );
	});
	$('#multieditmodal').modal("show");
}


/* Submit Forms Add , Edit , Delete Multi Delete End */



function changeselectvalue() {
	
/* release note workfolder active/inactive */

$("select[name='DEPLOYMENT_COMP_ID']").change(function() {
	if ($("option:selected", this).text().toLowerCase() == "informatica") {
		$("select[name='WORKFLOW_FOLDER']").attr("disabled",false);
		$("select[name='WORKFLOW_FOLDER']").find("option:eq(0)").val("");		
	}
	else {
		$("select[name='WORKFLOW_FOLDER']").attr("disabled",true);
		$("select[name='WORKFLOW_FOLDER']").find("option:eq(0)").val("NULL");
		$("select[name='WORKFLOW_FOLDER']").val("NULL");
	}
});
/* end of release note workfolder active/inactive */
	
/* Change select value */
$("select[name='FUNCTIONAL_COMP_ID']").change(function() {
	var thissel = $("select[name='SOFTWARE_COMP_ID']");
	if ($("option:selected", this).text().toLowerCase() != "please select") {
		thissel.attr("readonly",false);
		thissel.find("option:eq(0)").val("");
		
		$.ajax({
		type: "POST",
		url: "ajax_querys/changevalue.php",
		data: "type=software_comp_list&value="+$("option:selected", this).text(),
		dataType: "html"
		})
		.done(function( msg ) {
			$('option', thissel).remove();
			//var options = thissel.attr('options');
			
			msg = $.parseJSON(msg);
			
			for (i = 0;i < msg.data.length; i++) {
				thissel.append(msg.data[i]);
			}
			
		})
		.fail(function( jqXHR, textStatus , msg ) {
			alert(msg);
	
		});

		
	}
	else {
		thissel.attr("readonly",true);
		thissel.find("option:eq(0)").val("NULL");
		thissel.val("NULL");
	}
});
/* Change select value */
}
changeselectvalue();












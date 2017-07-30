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
var addform = $('#addformvalid');
var formfile = addform.attr("action");
addform.parsley().on('field:validated', function() {
})
.on('form:submit', function() {
	var str = addform.serialize();
	submitforms(str,"add",formfile);
	return false;
});
/* add form ajax End */


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
		alert(msg);
		
	if (type == "add" || type == "copy" || type == "edit" || type == "multiedit") {
		if (type == "add" || type == "copy") {
			statusarr = msg.split("[||]");
			if (statusarr[0] == "Complete") {
			var rows = statusarr[2];
			var aRow = $("<tr>").attr({"data-file":formfile , "data-pharse":"id="+statusarr[1]}).append(rows);
				table.row.add(aRow).draw();
			}
			if (type != "copy") {
				actiondone = "Add";
			}
			else {
				actiondone = "Copy";
				$('#copymodal').modal('hide');
			}
		}
		
		if (type == "edit") {
			statusarr = msg.split("[||]");
			if (statusarr[0] == "Complete") {
				//alert(msg);
				var cellsdata = statusarr[2].split("||||");
				
				$(".editrow td").each(function(i, obj) {
					table.cell(this).data(cellsdata[i]);
				});
				
				

				$('#editmodal').modal('hide');
			}
			actiondone = "Edit";
		}
		
		if (type == "multiedit") {
			statusarr = msg.split("[||]");
			if (statusarr[0] == "Complete") {
				var place = statusarr[1];
				$(':checkbox:checked').each(function(i){
					if ($(this).val() != "dontcount") {
						table.cell($(this).parents('tr').children('td:eq('+place+')')).data( statusarr[2] ).draw();
					}
				});
				$('#multieditmodal').modal('hide');
			}
			actiondone = "Multi Edit";
		}
		
		if (statusarr[0] == "Complete") {
			new PNotify({
				title: actiondone+" Status",
				type: "success",
				text: " Action Complete Successfully",
				hide: true,
				styling: 'bootstrap3',
				delay:1000
			});
		}
	}

		if (type == "member") {
			if (msg == "Complete") {
				
			}
			actiondone = "Member";
		}

		if (type == "team") {
			if (msg == "Complete") {
				
			}
			actiondone = "Team";
		}
		
		if (type == "details") {
			if (msg == "Complete") {
				
			}
			actiondone = "Details Change";
		}
		
		if (type == "delete") {
			if (msg == "Complete") {
				table
				.rows( '.deleterow' )
				.remove()
				.draw();
				$('#deletemodal').modal('hide');
			}
			actiondone = "Delete";
		}
		
		if (type == "restore") {
			if (msg == "Complete") {
				table
				.rows( '.restorerow' )
				.remove()
				.draw();
				$('#restoremodal').modal('hide');
			}
			actiondone = "Restore";
		}
		
		if (type == "multidelete") {
			if (msg == "Complete") {
				$(':checkbox:checked').each(function(i){
					if ($(this).val() != "dontcount") {
						table.row($(this).parents('tr')).remove().draw(false);
					}
					
				});
				$('#multideletemodal').modal('hide');
			}
			actiondone = "Multi Delete";
		}
		
		if (msg == "Complete") {
			new PNotify({
				title: actiondone+" Status",
				type: "success",
				text: " Action Complete Successfully",
				hide: true,
				styling: 'bootstrap3',
				delay:1000
			});
		
		}
		
		if (msg == "Errorspermission") {
			
			new PNotify({
				title: actiondone+" Status",
				type: "error",
				text: "You haven't permissions for multi delete, you can delete with context menu.",
				hide: true,
				styling: 'bootstrap3',
				delay:5000
			});
		}
		
		if (msg == "Errors") {
			new PNotify({
				title: actiondone+" Status",
				type: "error",
				text: "Action Not Complete Error With Database <br> "+msg,
				hide: true,
				styling: 'bootstrap3',
				delay:5000
			});
		}


		
	})
	.fail(function( jqXHR, textStatus , msg ) {
		//alert(msg);
		new PNotify({
			title: actiondone+" Status",
			type: "error",
			text: "Action Not Complete Error With Database <br> "+msg,
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

function close_exit(modalname) {
	$(':checkbox').removeAttr('checked');
	$('.icheckbox_flat-green').removeClass('checked');
	$('#'+modalname).find(".modal-content").html("");
}

function delete_sele_exit(modalname="") {
	$("table").find(".editrow").removeClass("editrow");
	$("table").find("tr.restorerow").removeClass("restorerow");
	$("table").find("tr.deleterow").removeClass("deleterow");
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


/* Upload Modal And Upload Prograss */

function upload_modal(datafile) {
	modal_open('#uploadmodal',datafile,"","upload");
}

/* Upload Modal */

/* profile Modal */

function profile_modal(datafile) {
$('#profilemodal').modal("show");
$('#profilemodal').on('shown.bs.modal', function (e) {
	var modal = $(this);
	modal.find(".modal-content").load( "forms/"+datafile+"?members" );
});
}

/* profile Modal */

$('#uploadmodal').on('hide.bs.modal', function (e) {
	close_exit('uploadmodal');
});

$('#profilemodal').on('hide.bs.modal', function (e) {
	close_exit('profilemodal');
});












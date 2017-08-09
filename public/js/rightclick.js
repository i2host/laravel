
/* The Right Menu Functions Start */

function modal_open(modal="",datapharse="",type="") {
	$(modal).modal("show");
	$(modal).on('shown.bs.modal', function (e) {
	var modal = $(this);
	if (type == "edit") {
		modal.find(".modal-content").load(formfile+"/"+datapharse+"/edit");
	}
	else if (type == "delete") {
		modal.find(".modal-content").load(formfile+"/"+datapharse);
	}
	else if (type == "upload") {
		if (datapharse != "") {
			datapharse += "/"; 
		}
		modal.find(".modal-content").load(upload_path+datapharse);
	}
	
	if (datapharse != "") {
		if (type == "edit") {
			tris.addClass("editrow");
		}
		if (type == "delete") {
			tris.addClass("deleterow");
		}
	}
	$(this).off('shown.bs.modal');
	});
}

//the <tr> Table currently seleted by the rightmenu action
var tris;
$('.rightmenu tbody').contextMenu({
    selector: 'tr',
    callback: function(key, options) {
		
		tris = $(this);
		var datapharse = tris.attr("data-pharse");

		if (key == "edit") {
			modal_open('#editmodal',datapharse,"edit");
		}
		if (key == "delete") {
			modal_open('#deletemodal',datapharse,"delete");
		}
    },
    items: {
        "edit": {name: "Edit", icon: "edit"},
        "sep1": "---------",
		"delete": {name: "Delete", icon: "delete"}
    }
	
});


/* The Right Menu Functions End */


/* Upload Modal And Upload Prograss */

function upload_modal(datapharse) {
	modal_open('#uploadmodal',datapharse,"upload");
}

/* Upload Modal */

/* profile Modal */

function profile_modal(datapharse) {
$('#profilemodal').modal("show");
$('#profilemodal').on('shown.bs.modal', function (e) {
	var modal = $(this);
	modal.find(".modal-content").load( "forms/"+datapharse+"?members" );
});
}

/*  Modal */

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

$('#uploadmodal').on('hide.bs.modal', function (e) {
	close_exit('uploadmodal');
});

$('#profilemodal').on('hide.bs.modal', function (e) {
	close_exit('profilemodal');
});


/* Remove foucs from <tr> element Start */
$('#deletemodal').on('hide.bs.modal', function (e) {
	delete_sele_exit();
});

$('#editmodal').on('hide.bs.modal', function (e) {
	delete_sele_exit();
});

/* Remove foucs from <tr> element End */
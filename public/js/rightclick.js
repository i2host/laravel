
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



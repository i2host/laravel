
/* The Right Menu Functions Start */

function modal_open(modal="",datafile="",datapharse="",type="") {
	$(modal).modal("show");
	$(modal).on('shown.bs.modal', function (e) {
	var modal = $(this);
	modal.find(".modal-content").load( datafile+"/"+datapharse);
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
		var datafile = tris.attr("data-file");
		var datapharse = tris.attr("data-pharse");

		if (key == "edit") {
			modal_open('#editmodal',datafile,datapharse,"edit");
		}
		if (key == "delete") {
			modal_open('#deletemodal',datafile,datapharse,"delete");
		}
    },
    items: {
        "edit": {name: "Edit", icon: "edit"},
        "copy": {name: "Duplicate", icon: "copy"},
        "sep1": "---------",
		"delete": {name: "Delete", icon: "delete"}
    }
	
});




/* Gereral Datatable Start */
if ( $( "#datatable-buttons2" ).length ) {
$('#datatable-buttons2 thead td').each( function () {
	if ( !$( this ).is( "#nosearch" ) ) {
		var title = $(this).text();
		$(this).html( '<input type="text" class="form-control" placeholder="Filter '+title+'" />' );
	}
	else {
		$(this).html( ' ' );
	}
} );

var table = $("#datatable-buttons2").DataTable({
  dom: '< <"toolbar">Bf <t> <lp>i<"toolbaraction">>',

  buttons: [
	{
	  extend: "copy",
	  className: "btn-sm"
	},
	{
	  extend: "csv",
	  className: "btn-sm"
	},
	{
	  extend: "excel",
	  className: "btn-sm"
	},
	{
	  extend: "pdfHtml5",
	  className: "btn-sm"
	},
	{
	  extend: "print",
	  className: "btn-sm"
	},
  ],
  responsive: false,
  fixedHeader: true,
  'columnDefs': [
	{ orderable: false, targets: [0] }
  ],
  "lengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
  "order": [[ 1, "asc" ]]
  
});


// Apply the search
$("#datatable-buttons2 thead input").on( 'keyup change', function () {
		table
			.column( $(this).parent().index()+':visible' )
			.search( this.value )
			.draw();
});
}
/* Gereral Datatable End */

/* Release Note Datatable Start */
if ( $( "#releasenotetable" ).length ) {
$('#releasenotetable thead td').each( function () {
	if ( !$( this ).is( "#nosearch" ) ) {
		var title = $(this).text();
		$(this).html( '<input type="text" class="form-control" placeholder="Filter '+title+'" />' );
	}
	else {
		$(this).html( ' ' );
	}
} );

var table = $("#releasenotetable").DataTable({
  "processing": true,
  "serverSide": false,
  "ajax": {
      "url": "ajax_querys/releasenotesquerys.php"
  },
  "columns": [
	  { "data": "CHECKBOXDEL" },
	  { "data": "RENOTE_ID" },
	  { "data": "FCNAME" },
      { "data": "SCNAME" },
      { "data": "DCNAME" },
      { "data": "DEPLOYMENT_OBJECT" },
      { "data": "WORKFLOW_FOLDER" },
      { "data": "BNAME" },
      { "data": "BUILD_VERSION" },
	  { "data": "ADDITIONS" },
	  { "data": "CHANGES" },
	  { "data": "REMOVALS" },
	  { "data": "FIXES" },
	  { "data": "DEVELOPER_NAME" },
	  { "data": "EDIT_BY" },
	  { "data": "ADD_DATE" },
	  { "data": "EDIT_DATE" }
  ],
  dom: '< <"toolbar">Bf <t> <lp>i<"toolbaraction">>',

  buttons: [
	{
	  extend: "copy",
	  className: "btn-sm"
	},
	{
	  extend: "csv",
	  className: "btn-sm"
	},
	{
	  extend: "excel",
	  className: "btn-sm"
	},
	{
	  extend: "pdfHtml5",
	  className: "btn-sm"
	},
	{
	  extend: "print",
	  className: "btn-sm"
	},
  ],
  responsive: false,
  fixedHeader: true,
  'columnDefs': [
	{ orderable: false, targets: [0] }
  ],
  "lengthMenu": [[25, 50, 100, 250, 500, 1000, 1500, 2000, -1], [25, 50, 100,250, 500, 1000, 1500, 2000, "All"]],
  "order": [[ 1, "DESC" ]],
  "fnCreatedRow": function( nRow, aData, iDataIndex ) {
	  $(nRow).attr({"data-file":"releasenoteforms.php","data-pharse":"id="+aData['RENOTE_ID']});
  }
  
  
});

var searchindexplus = 0;
// Apply the search
$("#releasenotetable thead input").on( 'keyup change', function () {
	
	var indexnow = $(this).parent().index() - searchindexplus;
	table
		.column( indexnow+':visible' )
		.search( this.value )
		.draw();
});

/* Release Note Datatable Buttons show/hide Start */
$('.toggle-vis').on( 'click', function (e) {
    //e.preventDefault();
    // Get the column API object
    var column = table.column( $(this).attr('data-column') );
	if ($(this).attr('data-column') != -1) {
	$(this).toggleClass( "btn-danger" );
    // Toggle the visibility
    column.visible( ! column.visible() );
	filterhide = $(this).attr('data-column') - 1;
	$("#releasenotetable").find("td.hideshow:eq("+filterhide+")").toggle(0,function() {
		if (!$(this).is(":visible")) 
		searchindexplus++;
		else 
		searchindexplus--;
	});
	
	}
	else {
		table.column(1).visible(true);
		table.column(2).visible(true);
		table.column(3).visible(true);
		table.column(4).visible(true);
		table.column(5).visible(true);
		table.column(6).visible(true);
		table.column(7).visible(true);
		table.column(8).visible(true);
		table.column(9).visible(true);
		table.column(10).visible(true);
		table.column(11).visible(true);
		table.column(12).visible(true);
		table.column(13).visible(true);
		table.column(14).visible(true);
		table.column(15).visible(true);
		table.column(16).visible(true);
		$("#releasenotetable").find("td.hideshow").show();
		$('.toggle-vis').removeClass("btn-danger");

	}
});
/* Release Note Datatable Buttons show/hide End */

}
/* Release Note Datatable End */



/* Release Note Deleted Datatable Start */
if ( $( "#releasenotetabledeleted" ).length ) {
$('#releasenotetabledeleted thead td').each( function () {
	if ( !$( this ).is( "#nosearch" ) ) {
		var title = $(this).text();
		$(this).html( '<input type="text" class="form-control" placeholder="Filter '+title+'" />' );
	}
	else {
		$(this).html( ' ' );
	}
} );

var table = $("#releasenotetabledeleted").DataTable({
  "processing": true,
  "serverSide": false,
  "ajax": {
      "url": "ajax_querys/releasenotesdeletedquerys.php"
  },
  "columns": [
	  { "data": "CHECKBOXDEL" },
	  { "data": "OLD_RENOTE_ID" },
	  { "data": "FCNAME" },
      { "data": "SCNAME" },
      { "data": "DCNAME" },
      { "data": "DEPLOYMENT_OBJECT" },
      { "data": "WORKFLOW_FOLDER" },
      { "data": "BNAME" },
      { "data": "BUILD_VERSION" },
	  { "data": "ADDITIONS" },
	  { "data": "CHANGES" },
	  { "data": "REMOVALS" },
	  { "data": "FIXES" },
	  { "data": "DEVELOPER_NAME" },
	  { "data": "EDIT_BY" },
	  { "data": "ADD_DATE" },
	  { "data": "EDIT_DATE" }
  ],
  dom: '< <"toolbar">Bf <t> <lp>i<"toolbaraction">>',

  buttons: [
	{
	  extend: "copy",
	  className: "btn-sm"
	},
	{
	  extend: "csv",
	  className: "btn-sm"
	},
	{
	  extend: "excel",
	  className: "btn-sm"
	},
	{
	  extend: "pdfHtml5",
	  className: "btn-sm"
	},
	{
	  extend: "print",
	  className: "btn-sm"
	},
  ],
  responsive: false,
  fixedHeader: true,
  'columnDefs': [
	{ orderable: false, targets: [0] }
  ],
  "lengthMenu": [[25, 50, 100, 250, 500, 1000, 1500, 2000, -1], [25, 50, 100,250, 500, 1000, 1500, 2000, "All"]],
  "order": [[ 0, "ASC" ]],
  "fnCreatedRow": function( nRow, aData, iDataIndex ) {
	  $(nRow).attr({"data-file":"releasenotedeletedforms.php","data-pharse":"id="+aData['RENOTE_ID']});
  }
  
  
});

var searchindexplus = 0;
// Apply the search
$("#releasenotetabledeleted thead input").on( 'keyup change', function () {
	var indexnow = $(this).parent().index() - searchindexplus;
	table
		.column( indexnow+':visible' )
		.search( this.value )
		.draw();
});
/* Release Note Datatable Buttons show/hide Start */
$('.toggle-vis').on( 'click', function (e) {
    //e.preventDefault();
    // Get the column API object
    var column = table.column( $(this).attr('data-column') );
	if ($(this).attr('data-column') != -1) {
	$(this).toggleClass( "btn-danger" );
    // Toggle the visibility
    column.visible( ! column.visible() );
	filterhide = $(this).attr('data-column') - 1;
	$("#releasenotetabledeleted").find("td.hideshow:eq("+filterhide+")").toggle(0,function() {
		if (!$(this).is(":visible")) 
		searchindexplus++;
		else 
		searchindexplus--;
	});
	
	}
	else {
		table.column(1).visible(true);
		table.column(2).visible(true);
		table.column(3).visible(true);
		table.column(4).visible(true);
		table.column(5).visible(true);
		table.column(6).visible(true);
		table.column(7).visible(true);
		table.column(8).visible(true);
		table.column(9).visible(true);
		table.column(10).visible(true);
		table.column(11).visible(true);
		table.column(12).visible(true);
		table.column(13).visible(true);
		table.column(14).visible(true);
		table.column(15).visible(true);
		table.column(16).visible(true);
		$("#releasenotetabledeleted").find("td.hideshow").show();
		$('.toggle-vis').removeClass("btn-danger");

	}
});
/* Release Note Datatable Buttons show/hide End */

}
/* Release Note Deleted Datatable End */
/* Datatable Custome toolsbar Start */
if ( !$( "#releasenotetable" ).length && !$(".multisp").length ) {
$("div.toolbar").html('<div class="pull-left"><button type="button" onClick="bluk_delete()" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></div>');
$("div.toolbaraction").before("<div class='clearfix'></div>").html(' ');
}
/* Datatable Custome toolsbar End */

/* Datatable Custome release note toolsbar Start */
else if( $( "#releasenotetable" ).length || $(".multisp").length ) {
$("div.toolbar").html('<div class="pull-left"><button type="button" onClick="bluk_delete()" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button><button type="button" onClick="bluk_edit()" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>');
$("div.toolbaraction").before("<div class='clearfix'></div>").html(' ');
}
/* Datatable Custome toolsbar End */
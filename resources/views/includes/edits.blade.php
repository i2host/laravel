<form method="POST" action="{{ url()->current() }}" id="editformvalid">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabel">Edit</h4>
     </div>
     <div class="modal-body">
     @yield('edit_content')
     </div>
	 <div class="clearfix"></div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" onclick="upload_modal()" name="" class="btn btn-primary">Upload</button>
       <button type="submit" class="btn btn-primary">Save changes</button>
     </div>
	 <input name="_method" type="hidden" value="PATCH">
   <input name="id" type="hidden" value="{{ $data->id }}">
   {{ csrf_field() }}
</form>
@include('includes.editsjs')
	<form id="delformvalid" action="{{ url()->current() }}" class="form-horizontal form-label-left" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Release</h4>
      </div>
      <div class="modal-body">
		    @yield('delete_content')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-danger">Delete</button>
      </div>
    <input name="_method" type="hidden" value="DELETE">
    <input name="id" type="hidden" value="{{ $data->id }}" >
   {{ csrf_field() }}
  </form>
  
@include('includes.deletesjs')
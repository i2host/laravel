    <form id="uploadformvalid" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Upload</h4>
        </div>
        <div class="modal-body">
      <div class="form-group">
        <input type="file" name="uploaded_file" class="uploaded_file" data-classButton="btn btn-primary" data-input="true">
      </div>
      <div class="form-group">
        <input type="text" name="upload_holder" class="form-control" placeholder="Upload Holder">
      </div>
      <div class="progress">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
      </div>
      <div style="display:none;" class="error_place">
        <div style="color:#fff;" class="alert alert-danger errormessage" role="alert">
          <div class="error_reason"></div>
          <div class="error_values"></div>
        </div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default uploadnow">Upload</button>
          {{ csrf_field() }}
        </div>
    </form>
    @include('admin.includes.uploadjs')
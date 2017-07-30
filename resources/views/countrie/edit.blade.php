<form method="POST" id="editformvalid">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabel">Edit</h4>
     </div>
     <div class="modal-body">
	 
	 	<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="name">Name * :</label>
				<input type="text" id="name" value=""  class="form-control" name="name" required placeholder="Name">
			</div>
		</div>
		
	 	<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="form-group">
				<label for="SHORTCODE">Short Code * :</label>
				<input type="text" id="SHORTCODE" value=""  class="form-control" name="shortcode" required placeholder="Short Code">
			</div>
		</div>
		
     </div>
	 <div class="clearfix"></div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-primary">Save changes</button>
     </div>
	 <input type="hidden" value="editrelease" name="type">
	 <input type="hidden" value="" name="id">
</form>
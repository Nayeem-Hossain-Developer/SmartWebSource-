<div class="modal-header">
    <h5 class="modal-title">Add New City</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="{{route('admin.city.store')}}" method="post" class="ajax-form" enctype="multipart/form-data">
    @csrf
  <div class="modal-body">
        <div class="mb-3">
            <label for="">Import Excel File</label>
            <input type="file" class="form-control" name="excel_file">
        </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>

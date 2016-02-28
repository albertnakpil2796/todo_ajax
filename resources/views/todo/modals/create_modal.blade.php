<div class="modal fade" id="createTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New Todo</h4>
      </div>
      <div class="modal-body">
      {{ Form::open([ 'id' => 'todo_create_form']) }}

          <div class="span5">
            <label>Title</label>
            <input type="text" class="form-control" name="title" required>
          </div>
          <div class="span5">
            <label>Description</label>
            <textarea rows="4" class="form-control" name="description" required></textarea>
          </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btn-add">Confirm</button>
         
        </div>
       {{Form::close()}} 	
    </div>
  </div>
</div>
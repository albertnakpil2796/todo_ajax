<div class="modal fade" id="editTodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View Todo</h4>
      </div>
      {{Form::open([ 'id' => 'todo_edit_form'])}}
      <div class="modal-body editGoesHere">
      
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
          <button type="button" class="btn btn-info" id="btn-update">Update</button>    
        </div>
      {{Form::close()}}
    </div>
  </div>
</div>
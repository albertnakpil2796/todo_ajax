
@if(count($todos) >= 1)
<div id="post-ajax"><table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($todos as $todo)
		<tr>
			<td>{{$todo->title}}</td>
			<td>{{$todo->description}}</td>
			<td><a href="#viewTodo" data-toggle="modal" id="{{$todo->id}}" class="btn btn-info">View</a>
			<a href="#editTodo" data-toggle="modal" id="{{$todo->id}}" class="btn btn-primary">Edit</a>
			<a href="#deleteTodo" data-toggle="modal" id="{{$todo->id}}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td>{{$todos->links()}}</td>
		</tr>
	</tfoot>
</table>


</div>
@else
<h3>No Data Yet</h3>
@endif
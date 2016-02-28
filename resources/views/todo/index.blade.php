@extends('template')

@section('content')

<div class="container">
	<div class="col-md-12">
		<h3>Todo List</h3>	
		<a href="#createTodo" data-toggle="modal" class="pull-right btn btn-info btn-m" id="sup" >+</a>
	</div>
	<div class="col-md-12">
		<br>
		<input type="text" class="form-control" id="searchBox" placeholder="Search Todo Here" onkeydown="down()" onkeyup="up()">
		<br>
		@include('todo.list')
	</div>
</div>

@include('todo.modals.create_modal')
@include('todo.modals.delete_modal')
@include('todo.modals.view_modal')
@include('todo.modals.edit_modal')
@stop
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

<script type="text/javascript">
function getList(){
	$.ajax({
		url: '/',
		type: 'get',
        beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');
        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
        },	
        success: function(response){
		$('#post-ajax').html(response);
        }
	})
	
}
	$("#btn-add").click(function(){
		$.ajax({
			url: '/store',
			type: 'post',
        	beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        	},
			data: $("#todo_create_form").serialize(),
			success: function(response){
				getList();	
			}
		});
	
	$("#todo_create_form")[0].reset();
	$("#createTodo").modal("hide");
	});
$("#deleteTodo").on("show.bs.modal", function(e){
	var button = $(e.relatedTarget);
	$("#btn-delete").click(function(){
			$.ajax({
			url: '/destroy',
			type: 'post',
			beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        	},
        	data:{'id':button.attr("id")},
			success: function(response){
				getList();	
			}
		});

	$("#deleteTodo").modal("hide");
	//$(button).parent().parent().remove();		
	});

});
$("#viewTodo").on("show.bs.modal", function(e){
	var button = $(e.relatedTarget);
			$.ajax({
			url: '/view',
			type: 'post',
			beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        	},
        	data:{'id':button.attr("id")},
			success: function(response){
				$('.viewGoesHere').html(response);
			}
		});
});
$("#editTodo").on("show.bs.modal", function(e){
	var button = $(e.relatedTarget);
			$.ajax({
			url: '/edit',
			type: 'post',
			beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        	},
        	data:{'id':button.attr("id")},
			success: function(response){
				$('.editGoesHere').html(response);
			}
		});
	$("#btn-update").click(function(){
			$.ajax({
			url: '/update',
			type: 'post',
			beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        	},
        	data: $("#todo_edit_form").serialize(),
			success: function(response){
				getList();
			}
		});	

	$("#editTodo").modal("hide");
	});
	
});

var timer;
function up()
{
	timer = setTimeout(function(){
		var keywords = $("#searchBox").val();

		if(keywords.length > 0){
			$.ajax({
				url: '/search',
				type: 'post',
				beforeSend: function (xhr) {
	            var token = $('meta[name="csrf_token"]').attr('content');
	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        	},
	        	data: {'keywords':keywords},
	        	success: function(response){
	        		$('#post-ajax').html(response);
	        	}
			});
		}else{
			getList();
		}
	}, 500);
}

function down()
{
	clearTimeout(timer);
}
 $(function() {
            $('#post-ajax').on('click', '.pagination a', function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
     });
     function getPosts(page) {
            $.ajax({
                url : '?page=' + page,
                dataType: 'json',
            }).done(function (data) {
                $('#post-ajax').html(data);
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }

</script>
@stop
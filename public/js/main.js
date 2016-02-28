var timer;

function up(){
timer = setTimeout(function(){
	var keywords = $("#searchBox").val();
	if(keywords.length > 0){
		$.ajax({
			url: '/search',
			type: 'post',
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

function down(){
	clearTimeout(timer);
}


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

function getList(){
	$.ajax({
		url: '/',
		type: 'get',
        success: function(response){
		$('#post-ajax').html(response);

        }
	})
	
}

$(function() {
    $('#post-ajax').on('click', '.pagination a', function (e) {
        getPosts($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});
	
$("#btn-add").click(function(){
	$.ajax({
		url: '/store',
		type: 'post',
		data: $("#todo_create_form").serialize(),
			success: function(response){
			getList();	
			toastr.success(response,"Notification");
		},
		error: function ( jqXhr, json, errorThrown ) 
        {
            var errors = jqXhr.responseJSON;
            var errorsHtml= '';
            $.each( errors, function( key, value ) {
                errorsHtml += '<li>' + value[0] + '</li>'; 
            });
            toastr.error( errorsHtml , "Error " + jqXhr.status +': '+ errorThrown);
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
        	data:{'id':button.attr("id")},
			success: function(response){
				getList();
				toastr.success(response,"Notification");	
			},
			error: function ( jqXhr, json, errorThrown ) 
	        {
	            var errors = jqXhr.responseJSON;
	            var errorsHtml= '';
	            $.each( errors, function( key, value ) {
	                errorsHtml += '<li>' + value[0] + '</li>'; 
	            });
	            toastr.error( errorsHtml , "Error " + jqXhr.status +': '+ errorThrown);
	        }
	});

$("#deleteTodo").modal("hide");	
});

});

$("#viewTodo").on("show.bs.modal", function(e){
	var button = $(e.relatedTarget);
			$.ajax({
			url: '/view',
			type: 'post',
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
        	data:{'id':button.attr("id")},
			success: function(response){
				$('.editGoesHere').html(response);
			}
		});

$("#btn-update").click(function(){
			$.ajax({
			url: '/update',
			type: 'post',
        	data: $("#todo_edit_form").serialize(),
			success: function(response){
				getList();
				toastr.success(response,"Notification");
			},
		error: function ( jqXhr, json, errorThrown ) 
        {
            var errors = jqXhr.responseJSON;
            var errorsHtml= '';
            $.each( errors, function( key, value ) {
                errorsHtml += '<li>' + value[0] + '</li>'; 
            });
            toastr.error( errorsHtml , "Error " + jqXhr.status +': '+ errorThrown);
        }
		});	

	$("#editTodo").modal("hide");
	});
	
});



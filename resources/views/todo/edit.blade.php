<input type="hidden" name="id" value="{{$todo->id}}">
<div class="span5">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="{{$todo->title}}" required>
</div>
<div class="span5">
    <label>Description</label>
    <textarea rows="4" class="form-control" name="description"  required>{{$todo->description}}</textarea>
</div>
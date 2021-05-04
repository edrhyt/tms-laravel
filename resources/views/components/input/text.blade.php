<div class="form-group {{$width}}">
    <label for="{{$slug}}">{{$title}}</label>
    <input type="text" name="{{$slug}}" id="{{$slug}}" class="form-control" {{$disabled ? __('readonly') : ''}}>
</div>
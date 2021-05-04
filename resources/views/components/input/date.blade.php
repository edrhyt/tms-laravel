<div class="form-group {{$width}}">
    <label class="control-label" for="{{$slug}}">{{$title}}</label>  
    <div class="input-group">
        <input type="date" class="form-control px-3 {{$color}}" name="{{$slug}}" id="{{$slug}}" {{$disabled ? __('disabled') : ''}}>
    </div>
</div>
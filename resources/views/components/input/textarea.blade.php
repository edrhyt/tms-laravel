<div class="form-group {{$width}}">
    <label class="control-label" for="{{$slug}}">{{$title}}</label>
    <textarea class="form-control" id="{{$slug}}" name="{{$slug}}" resize="none" rows="{{$height}}">@isset($value){{$value}}@endisset</textarea>
</div>
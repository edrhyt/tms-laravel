<div class="form-group {{$width}}">
    <label class="control-label" for="{{$slug}}">{{$title}}</label>
    <select class="form-control" name="{{$slug}}" id="{{$slug}}">
        <option value="NULL">{{$defaultOption}}</option>
        @foreach ($options as $option)
            <option value="{{$option['value'] ?? $option['id']}}">{{$option['title'] ?? $option['name']}}</option>
        @endforeach
    </select>
</div>
<div class="form-group {{$width}}">
    <label class="control-label" for="{{$slug}}">{{$title}}</label>
    <select class="form-control" name="{{$slug}}" id="{{$slug}}" {{$disabled ? __('disabled') : ''}}>
        <option value="NULL">{{$defaultOption}}</option>
        <?php if(is_array($options)): ?>
        @foreach ($options as $option)
            <option value="{{$option['value'] ?? $option['id']}}" @if(( isset($value) ) && $option['id'] == $value) {{__('selected')}} @endif >
                @if ($isEmployee)
                    {{$option['first_name'].' '.$option['last_name']}}                   
                @else
                    {{$option['title'] ?? $option['name']}}
                @endif
            </option>
        @endforeach
        <?php else: ?>
        @for ($i = 1; $i <= $options; $i++)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
        <?php endif; ?>
    </select>
</div>
<div class="form-group {{$width}}">
    <label for="{{$slug}}">{{$title}}</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        <button class="btn btn-outline rounded-left dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #556; font-weight: 400; border: 1px solid #cfcfcf;">{{$options[0]['title']}}</button>
        <div class="dropdown-menu p-1 pt-3">
            @foreach ($options as $option)
                <p class="dropdown-item" style="cursor: pointer;">{{$option['title']}}</p>
            @endforeach
        </div>
        </div>
        <input type="text" class="form-control pl-2" name="{{$options[0]['slug']}}" id="{{$options[0]['slug']}}">
    </div>
</div>
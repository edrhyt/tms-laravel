<div class="form-group {{$width}}">
    <label for="">{{$title}}</label>
    <div class="card position-relative" style="height: 211px; overflow: auto; border: 1px solid #cfcfcf;">
        <div class="card-body">
            <ul>
                @foreach ($options as $option)
                    <input type="hidden" name="{{$option['id'] ?? $option['value']}}" id="{{$option['id'] ?? $option['value']}}"><li>{{$options['name']}}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn btn-primary position-absolute rounded-circle d-flex align-items-center justify-content-center" style="bottom: 1rem; right: 1rem; width: 45px; height: 45px;" data-toggle="modal" data-target="#cart" id="cart-add-btn">
            <i class="fas fa-plus text-lg"></i>
        </button>
    </div>
</div>
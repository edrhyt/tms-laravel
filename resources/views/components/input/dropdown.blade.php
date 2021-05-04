<div class="form-group {{$width}}">
    <label for="{{$slug}}">{{$title}}</label>
    <div class="input-group mb-3" id="dpd-container">
        <div class="input-group-prepend">
        <button class="btn btn-outline rounded-left dropdown-toggle text-xs p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #556; font-weight: 400; border: 1px solid #cfcfcf;" id="dpd-button">{{$options[0]['title']}}</button>
        <div class="dropdown-menu p-1 pt-3 text-xs">
            @foreach ($options as $key => $option)
                <p class="dropdown-item cursor-pointer dpd-option">{{$option['title']}}</p>
            @endforeach
        </div>
        </div>
        <input type="text" class="form-control pl-2" name="{{$options[0]['slug']}}" id="{{$options[0]['slug']}}" {{$disabled ? __('readonly') : ''}}>
    </div>
</div>    

@push('js')
    <script>
        const dpdOptions = document.querySelectorAll('.dpd-option');

        dpdOptions.forEach(option => {
            option.addEventListener('click', () => {
                $('#dpd-button').text(option.textContent);
                $('#dpd-container').find('input').attr('name', option.textContent.toLowerCase().split(' ').join('-'));
                $('#dpd-container').find('input').attr('id', option.textContent.toLowerCase().split(' ').join('-'));
            });
        });
    </script>
@endpush
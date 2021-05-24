<div class="form-group {{$width ?? 'col-md-12'}}" id="group-{{$slug}}" style="transition: max-height .3s ease">
    <label for="{{$slug}}">{{$title}}</label>
    {{-- <i class="fas fa-times text-danger text-lg cursor-pointer" title="Hapus Konsumen"></i> --}}
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary px-4 konsumen-counter">1</span>
        </div>
        <input type="text" class="form-control pl-3 konsumen-input-text" name="konsumen-1" id="konsumen-1" aria-describedby="basic-addon3">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-plus-circle text-success text-lg cursor-pointer append-text-input toggler-btn" id="btn-konsumen-1" title="Tambah Konsumen"></i>
            </span>
        </div>
    </div>
</div>
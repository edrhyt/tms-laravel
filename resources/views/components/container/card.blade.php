<div class="form-group {{$width}}">
    <label for="">{{$title}}</label>
    <div class="card position-relative overflow-hidden" style="height: 211px; border: 1px solid #cfcfcf; {{($slug == 'cart') ? __('overflow: hidden;') : __('')}}">
        <div class="card-body p-0" id="saved-cart-item-list" style="overflow-y: auto;">
            <!-- Cart Item List Goes Here !-->
            @if ($slug == 'cart')
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span>Jumlah Barang : </span>
                    <span class="badge badge-primary badge-pill"><strong><span id="jumlah-barang">@if(isset($value)){{$value['itemsCount'] ?? 0}}@else{{0}}@endif</span></strong></span>
                </li>
                <li class="list-group-item">
                    <span>Subtotal Keranjang : </span>
                    <span><strong>Rp. <span id="subtotal-keranjang">@if(isset($value)){{number_format($value['subtotal']) ?? 0}}@else{{0}}@endif</span></strong></span>
                <li>
            </ul>
            @endif
            @if ($slug == 'products')
            <ul class="list-group list-group-flush text-sm">
                <li class="list-group-item">
                    <div class="d-flex w-100" style="justify-content: space-between">
                        <span><strong>Jumlah Barang : </strong></span> 
                        <span class="bade badge-primary badge-pill" title="Total Kuantitas"><strong>{{$value['allQty']}}</strong></span>
                    </div>
                </li>
                @foreach ($value['listBarang'] as $product)
                <li class="list-group-item">
                    <div class="d-flex w-100" style="justify-content: space-between">
                        <span>{{$product['title']}}</span>
                        <span class="bade badge-primary badge-pill" title="Kuantitas"><strong>{{$product['value']['qty']}}</strong></span>
                    </div>
                </li>
                @endforeach
                <li class="list-group-item">
                    <div class="d-flex w-100" style="justify-content: space-between">
                        <span><strong>Total Harga : </strong></span>
                        <span><strong>Rp. {{number_format($value['order']->total)}}</strong></span>
                    </div>
                </li>
            </ul>
            @endif
        </div>
        @if ($slug == 'cart')
        <button type="button" class="btn btn-primary position-absolute rounded-circle d-flex align-items-center justify-content-center" style="bottom: 1rem; right: 1rem; width: 45px; height: 45px; z-index: 1" data-toggle="modal" data-target="#cart" id="cart-add-btn">
            <i class="fas fa-plus text-lg"></i>
        </button>
        @endif
    </div>
</div>
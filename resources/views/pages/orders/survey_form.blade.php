<div class="container-fluid mt--7">
    <div class="container-light" style="transition: height 0.3s ease">
      @if (session('status') != NULL)
          {{-- <x-alert></x-alert> --}}
      @endif
        <form class="form-horizontal" method="POST" action="">
            @csrf
            <fieldset>
                <div class="d-flex justify-content-between align-items-center py-2" id="form-head">
                  <strong class="text-xl">Buat Data Suvey</strong>
                  <div class="col-md-6 d-flex align-items-center justify-content-end pr-0">
                    <input class="form-control input-group-text col-md-3 text-center" style="border-radius: 99px 0 0 99px;" type="text" value="BDG" name="kode-wilayah" id="kode-wilayah" readonly> 
                    <input class="form-control col-md-6" style="border-radius: 0 99px 99px 0;" type="text" placeholder="No Surat Order" name="no-so" id="no-so" @isset($order) value="{{substr($order->number, 4)}}" @endisset readonly>
                  </div>
                </div>
                <hr class="my-2 mb-3">

                <div class="form-row">
                   <x-input.date 
                      width="col-md-4" 
                      slug="order-date" 
                      title="Tanggal Surat Order"
                      :value="$order->date ?? NULL"
                      :disabled="TRUE" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="survey-date" 
                      title="Tanggal Survey"
                      color="btn-primary"
                      :disabled="FALSE" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="delivery-date" 
                      title="Tanggal Delivery"
                      :disabled="TRUE" />
                </div>

                <div class="form-row">
                    <x-input.inc-text 
                        width="col-md-12"
                        slug="konsumen"
                        title="Nama Konsumen"
                    />
                </div>

                <div class="form-row">
                    <x-input.select
                      width="col-md-4"
                      slug="regency"
                      title="Kabupaten/Kota"
                      defaultOption="Pilih Kabupaten/Kota"
                      :options="$regencies"
                      :value="isset($order) ? $order->regency_id : NULL" />

                    <x-input.select
                      width="col-md-4"
                      slug="subdistrict"
                      title="Kecamatan"
                      defaultOption="Pilih Kecamatan"
                      :options="$subdistricts ?? array()" 
                      :value="isset($order) ? $order->subdistrict_id : NULL"/>

                    <x-input.select
                      width="col-md-4"
                      slug="village"
                      title="Kelurahan/Desa"
                      defaultOption="Pilih Kelurahan/Desa"
                      :options="$villages ?? array()" 
                      :value="isset($order) ? $order->village_id : NULL" />
                </div>

                 <div class="form-row">
                    <x-input.textarea
                      width="col-md-6" 
                      slug="address" 
                      title="Alamat" 
                      :value="$order->address ?? NULL"
                      :height="9" />

                    <x-container.card 
                      width="col-md-6" 
                      slug="cart" 
                      title="Keranjang"
                      :value="['itemsCount' => $all_qty ?? 0, 'subtotal' => $order->total ?? 0]" />

                </div>
            </fieldset>
            
        </form>
    </div>
    @include('layouts.footers.auth')
</div>

@push('js')
    {{-- OrderLetter --}}
    <script src="{{asset('assets')}}/js/order-letter.js"></script>

    {{-- Konsumen --}}
    <script>
        let consumerNumber = 1;
        let plusBtns = document.querySelectorAll('.append-text-input');
        let konsumenCounter = document.querySelectorAll('.konsumen-counter');
        let konsumenInput = document.querySelectorAll('.konsumen-input-text');

        $(document).on('click', function(e) {
            if($(e.target).hasClass('append-text-input')) {
                consumerNumber++;
                addKonsumenForm();
                togglePlus();
                return;
            }

            if($(e.target).hasClass('remove-text-input')) {
                consumerNumber--;
                removeKonsumenForm(e.target);
                togglePlus(true);
                return;
            }
        });

        function addKonsumenForm() {
            let html = `
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary px-4 konsumen-counter">${consumerNumber}</span>
                </div>
                <input type="text" class="form-control pl-3 konsumen-input-text" id="konsumen-${consumerNumber}" name="konsumen-${consumerNumber}" aria-describedby="basic-addon3">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-plus-circle text-success text-lg cursor-pointer append-text-input toggler-btn" id="btn-konsumen-${consumerNumber}" title="Tambah Konsumen"></i>
                    </span>
                </div>
            </div>
            `;

            $('#group-konsumen').append(html);
        }

        function removeKonsumenForm(btn) {
            $(btn).parent().parent().parent().remove();
        }

        function togglePlus(remove = false) {
            plusBtns = document.querySelectorAll('.append-text-input');

            plusBtns.forEach((btn, idx) => {
                if(idx != plusBtns.length - 1) {
                    $(btn).removeClass('fa-plus-circle');
                    $(btn).addClass('fa-times-circle');

                    $(btn).removeClass('text-success');
                    $(btn).addClass('text-danger');
                    
                    $(btn).removeClass('append-text-input');
                    $(btn).addClass('remove-text-input');

                    btn.setAttribute('title', 'Hapus Konsumen');
                } else {
                    if(!$(btn).hasClass('append-text-input')) {
                        $(btn).removeClass('fa-times-circle');
                        $(btn).addClass('fa-plus-circle');

                        $(btn).removeClass('text-danger');
                        $(btn).addClass('text-success');
                        
                        $(btn).removeClass('remove-text-input');
                        $(btn).addClass('append-text-input');
                    }
                }
            });

            if(remove) {
                konsumenCounter = document.querySelectorAll('.konsumen-counter');
                konsumenInput = document.querySelectorAll('.konsumen-input-text');

                konsumenCounter.forEach(( konsumen, idx ) => {
                    $(konsumen).html(idx+1);
                });

                konsumenInput.forEach(( konsumen, idx ) => {
                    $(konsumen).attr('name', 'konsumen-'+(idx+1));
                    $(konsumen).attr('id', 'konsumen-'+(idx+1));
                });
            }
        }
    </script>

    {{-- Places --}}
    <script src="{{asset('assets')}}/js/places.js"></script>

@endpush
<div class="container-fluid mt--7">
    <div class="container-light">
      @if (session('status') != NULL)
          {{-- <x-alert></x-alert> --}}
      @endif
        <form class="form-horizontal" method="POST" action="@if(isset($order)){{route('order.update', $order->id)}}@else{{route('order.store')}}@endif">
            @isset($order)
                @method('PUT')
            @endisset

            @csrf
            <fieldset>
                @isset($order)
                <input type="hidden" id="isEdit" name="isEdit" value="TRUE">
                @endisset
                <div class="d-flex justify-content-between align-items-center py-2" id="form-head">
                  <strong class="text-xl">{{isset($order) ? __('Ubah') : __('Tambah')}} Data Surat Order</strong>
                  <div class="col-md-6 d-flex align-items-center justify-content-end pr-0">
                    <input class="form-control input-group-text col-md-3 text-center" style="border-radius: 99px 0 0 99px;" type="text" value="BDG" name="kode-wilayah" id="kode-wilayah" readonly> 
                    <input class="form-control col-md-6" style="border-radius: 0 99px 99px 0;" type="text" placeholder="No Surat Order" name="no-so" id="no-so" @isset($order) value="{{substr($order->number, 4)}}" @endisset required>
                  </div>
                </div>
                <hr class="my-2 mb-3">
                <div class="form-row">
                   <x-input.date 
                      width="col-md-4" 
                      slug="order-date" 
                      title="Tanggal Surat Order"
                      color="btn-primary"
                      :value="$order->date ?? NULL"
                      :disabled="FALSE" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="survey-date" 
                      title="Tanggal Survey"
                      :disabled="TRUE" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="delivery-date" 
                      title="Tanggal Delivery"
                      :disabled="true" />
                </div>

                <div class="form-row">
                    <x-input.text 
                      width="col-md-12" 
                      slug="coordinator-name" 
                      title="Nama Koordinator"
                      :value="isset($order) ? $order->coordinator_name : NULL" />
                    
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

                    <x-container.cart-modal 
                      width="col-md-10"
                      slug="cart"
                      title="Tambah Barang"
                      :value="$products ?? NULL"
                      :dataTable="$dataTable" />

                </div>

                <div class="form-row">
                  <x-input.select
                    width="col-md-6"  
                    slug="installment"
                    title="Angsuran"
                    defaultOption="Pilih Angsuran"
                    :options="$list_angsuran"
                    :disabled="isset($order) ? FALSE : TRUE"
                    :value="$order->installments_tenor ?? NULL" />

                  <x-input.text 
                    width="col-md-6" 
                    slug="diskon-dp" 
                    title="Diskon DP"
                    :value="$order->dp_discount ?? NULL"
                    :disabled="isset($order) ? FALSE : TRUE" />

                  {{-- <x-input.dropdown 
                    width="col-md-4" 
                    slug="opsi" 
                    title="Opsi" 
                    :options="$dropdowns"
                    :disabled="true" /> --}}
                </div>

                <div class="form-row">
                  <x-input.text 
                    width="col-md-6" 
                    slug="total-angsuran" 
                    title="Total Angsuran" 
                    :value="$order->total ?? NULL"
                    :disabled="true" />

                  <x-input.text 
                    width="col-md-6" 
                    slug="netto" 
                    title="Netto" 
                    :value="$order->netto ?? NULL"
                    :disabled="true" />

                </div>

                <div class="form-row">
                  <x-input.text 
                    width="col-md-6" 
                    slug="angsuran-1" 
                    title="Angsuran 1" 
                    :value="$order->first_installment ?? NULL"
                    :disabled="true" />

                  <x-input.text 
                    width="col-md-6" 
                    slug="angsuran-per-bulan" 
                    title="Angsuran / Bulan" 
                    :value="$order->monthly_installments ?? NULL"
                    :disabled="true" />

                </div>

                <div class="form-row">
                  <x-input.select
                    width="col-md-4"
                    slug="sales-promotor"
                    title="Sales Promotor"
                    defaultOption="Pilih Sales Promotor"
                    :value="$order->sp_employee_id ?? NULL"
                    :isEmployee="true"
                    :options="$promotors" />

                  <x-input.select
                    width="col-md-4"
                    slug="demo-booker"
                    title="Demo Booker"
                    defaultOption="Pilih Demo Booker"
                    :value="$order->db_employee_id ?? NULL"
                    :isEmployee="true"
                    :options="$demo_bookers" />

                  <x-input.select
                    width="col-md-4"
                    slug="svp-sales"
                    title="SVP Sales"
                    defaultOption="Pilih SVP Sales"
                    :value="$order->ss_employee_id ?? NULL"
                    :isEmployee="true"
                    :options="$svp_sales" />

                </div>
                
                @isset($order)
                  <input type="hidden" name="cartChanges" id="cartChanges" value="0">
                @endisset

                <div class="form-row">
                  <input type="submit" class="btn btn-primary col-md-12" name="submit" style="margin: 0 5px;" value="@if(isset($order)){{__('Update')}}@else{{__('Submit')}}@endif">
                </div>
           </fieldset>
        </form>
    </div>
    @include('layouts.footers.auth')
</div>

@push('js')
    <script src="{{ asset('assets') }}/js/order-letter.js"></script>
    <script src="{{ asset('assets') }}/js/cart.js"></script>

    {{-- Changes --}}
    <script>
      $('#diskon-dp').on('change keyup', () => {
        diskonDP = parseInt ( $('#diskon-dp').val() ) || 0;

        $('#netto').val(getNetto().toFixed());
        $('#angsuran-1').val(getFirstInstallment().toFixed());
      });

      $('#hadiah').on('change keyup', () => {

      });

      $('#diskon-koordinator').on('change keyup', () => {
        
      });

      $('#installment').on('change', () => {
        if($('#installment').find('option:first').val() == 'NULL') {
          $('#installment').find('option:first').remove();
        }

        if($('#installment').val() != 'NULL') {
          $('#diskon-dp').prop('readonly', false);
          $('#hadiah').prop('readonly', false);
        }

        $('#angsuran-1').val(getFirstInstallment().toFixed())
        $('#angsuran-per-bulan').val(getMonthlyInstallments().toFixed());
      })
    </script>

    {{-- Places --}}
    <script src="{{asset('assets')}}/js/places.js"></script>
@endpush
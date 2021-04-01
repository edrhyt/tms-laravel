<div class="container-fluid mt--7">
    <div class="container-light">
      @if (session('status') != NULL)
          {{-- <x-alert></x-alert> --}}
      @endif
        <form class="form-horizontal" method="POST">
            @if(true)
              @method('PUT')
            @endif

            @csrf
            <fieldset>
                <div class="d-flex justify-content-between align-items-center py-2" id="form-head">
                  <strong class="text-xl">Tambah Data Surat Order</strong>
                  <div class="col-md-6 d-flex align-items-center justify-content-end pr-0">
                    <input class="form-control input-group-text col-md-3 text-center" style="border-radius: 99px 0 0 99px;" type="text" value="BDG-" disabled> 
                    <input class="form-control col-md-6" style="border-radius: 0 99px 99px 0;" type="text" placeholder="No Surat Order">
                  </div>
                </div>
                <hr class="my-2 mb-3">
                <div class="form-row">
                    <x-input.date 
                      width="col-md-4" 
                      slug="order-date" 
                      title="Tanggal Surat Order" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="survey-date" 
                      title="Tanggal Survey" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="delivery-date" 
                      title="Tanggal Delivery" />
                </div>

                <div class="form-row">
                    <x-input.text 
                      width="col-md-12" 
                      slug="coordinator-name" 
                      title="Nama Koordinator" />
                    
                    <x-input.select
                      width="col-md-4"
                      slug="regency"
                      title="Kabupaten/Kota"
                      defaultOption="Pilih Kabupaten/Kota"
                      :options="$regencies" />

                    <x-input.select
                      width="col-md-4"
                      slug="subdistrict"
                      title="Kecamatan"
                      defaultOption="Pilih Kecamatan"
                      :options="array()" />

                    <x-input.select
                      width="col-md-4"
                      slug="village"
                      title="Kelurahan/Desa"
                      defaultOption="Pilih Kelurahan/Desa"
                      :options="array()" />
                    
                </div>

                <div class="form-row">
                    <x-input.textarea width="col-md-6" slug="address" title="Alamat" :height="9" />
                </div>

                <div class="form-row">
                  <x-input.text 
                    width="col-md-4" 
                    slug="total" 
                    title="Total" 
                    :disabled="true" />

                  <x-input.select
                    width="col-md-4"  
                    slug="installment"
                    title="Angsuran"
                    defaultOption="Pilih Angsuran"
                    :options="$list_angsuran"
                  />
                  
                  <x-input.text 
                    width="col-md-4" 
                    slug="diskon-dp" 
                    title="Diskon DP" />
                </div>

                <div class="form-row">
                  <x-input.dropdown 
                    width="col-md-4" 
                    slug="opsi" 
                    title="Opsi" 
                    :options="$dropdowns" />
                  
                  <x-input.text 
                    width="col-md-4" 
                    slug="total-angsuran" 
                    title="Total Angsuran" 
                    :disabled="true" />

                  <x-input.text 
                    width="col-md-4" 
                    slug="netto" 
                    title="Netto" 
                    :disabled="true" />

                </div>

                <div class="form-row">
                  <x-input.text 
                  width="col-md-4" 
                  slug="sales-promotor" 
                  title="Sales Promotor" />

                  <x-input.text 
                  width="col-md-4" 
                  slug="demo-booker" 
                  title="Demo Booker" />

                  <x-input.text 
                  width="col-md-4" 
                  slug="spv-sales" 
                  title="SPV Sales" />        
                </div>
                   
                <div class="form-row">
                  <input type="submit" class="btn btn-primary col-md-12" name="submit" style="margin: 0 5px;">
                </div>
           </fieldset>
        </form>
    </div>
    @include('layouts.footers.auth')
</div>
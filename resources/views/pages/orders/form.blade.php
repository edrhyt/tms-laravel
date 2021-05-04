<div class="container-fluid mt--7">
    <div class="container-light">
      @if (session('status') != NULL)
          {{-- <x-alert></x-alert> --}}
      @endif
        <form class="form-horizontal" method="POST">
            @if(false)
              @method('PUT')
            @endif

            @csrf
            <fieldset>
                <div class="d-flex justify-content-between align-items-center py-2" id="form-head">
                  <strong class="text-xl">Tambah Data Surat Order</strong>
                  <div class="col-md-6 d-flex align-items-center justify-content-end pr-0">
                    <input class="form-control input-group-text col-md-3 text-center" style="border-radius: 99px 0 0 99px;" type="text" value="BDG" name="kode-wilayah" id="kode-wilayah" readonly> 
                    <input class="form-control col-md-6" style="border-radius: 0 99px 99px 0;" type="text" placeholder="No Surat Order" name="no-so" id="no-so" required>
                  </div>
                </div>
                <hr class="my-2 mb-3">
                <div class="form-row">
                    <x-input.date 
                      width="col-md-4" 
                      slug="order-date" 
                      color="btn-primary"
                      title="Tanggal Surat Order" />

                    <x-input.date 
                      width="col-md-4" 
                      slug="survey-date" 
                      title="Tanggal Survey"
                      :disabled="true" />

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
                    <x-input.textarea
                      width="col-md-6" 
                      slug="address" 
                      title="Alamat" 
                      :height="9" />

                    <x-container.card 
                      width="col-md-6" 
                      slug="cart" 
                      title="Keranjang" />

                    <x-container.cart-modal 
                      width="col-md-10"
                      slug="cart"
                      title="Tambah Barang"
                      :dataTable="$dataTable" />

                </div>

                <div class="form-row">
                  <x-input.select
                    width="col-md-6"  
                    slug="installment"
                    title="Angsuran"
                    defaultOption="Pilih Angsuran"
                    :options="$list_angsuran"
                    :disabled="true"
                  />
                  
                  <x-input.text 
                    width="col-md-6" 
                    slug="diskon-dp" 
                    title="Diskon DP"
                    :disabled="true" />

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
                    :disabled="true" />

                  <x-input.text 
                    width="col-md-6" 
                    slug="netto" 
                    title="Netto" 
                    :disabled="true" />

                </div>

                <div class="form-row">
                  <x-input.text 
                    width="col-md-6" 
                    slug="angsuran-1" 
                    title="Angsuran 1" 
                    :disabled="true" />

                  <x-input.text 
                    width="col-md-6" 
                    slug="angsuran-per-bulan" 
                    title="Angsuran / Bulan" 
                    :disabled="true" />

                </div>

                <div class="form-row">
                  <x-input.select
                    width="col-md-4"
                    slug="sales-promotor"
                    title="Sales Promotor"
                    defaultOption="Pilih Sales Promotor"
                    :isEmployee="true"
                    :options="$promotors" />

                  <x-input.select
                    width="col-md-4"
                    slug="demo-booker"
                    title="Demo Booker"
                    defaultOption="Pilih Demo Booker"
                    :isEmployee="true"
                    :options="$demo_bookers" />

                  <x-input.select
                    width="col-md-4"
                    slug="svp-sales"
                    title="SVP Sales"
                    defaultOption="Pilih SVP Sales"
                    :isEmployee="true"
                    :options="$svp_sales" />

                </div>
                  
                <div class="form-row">
                  <input type="submit" class="btn btn-primary col-md-12" name="submit" style="margin: 0 5px;">
                </div>
           </fieldset>
        </form>
    </div>
    @include('layouts.footers.auth')
</div>

@push('js')
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

    <script>
      $('#regency').on('change', () => {
        regency_id = $('#regency').val();
        $.ajax(`tambah/kecamatan/${regency_id}`, 
        {
            dataType: 'json', // type of response data
            timeout: 500,     // timeout milliseconds
            success: function (data,status,xhr) {   // success callback function
              options = '';

              data.forEach(kec => {
                options += `
                  <option value="${kec.id}">
                    Kec. ${kec.name}
                  </option>`;
              });

              if($('#regency').find('option:first').val() == 'NULL') {
                $('#regency').find('option:first').remove();
              }
              
              $('#subdistrict').html('');
              $('#subdistrict').append(options);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                alert('Error: ' + errorMessage);
            }
        });
      });

      $('#subdistrict').on('change', () => {
        subdistrict_id = $('#subdistrict').val();
        $.ajax(`tambah/desa/${subdistrict_id}`, 
        {
            dataType: 'json', // type of response data
            timeout: 500,     // timeout milliseconds
            success: function (data,status,xhr) {   // success callback function
              options = '';

              data.forEach(des => {
                options += `
                  <option value="${des.id}">
                    Kel/Des. ${des.name}
                  </option>`;
              });

              $('#village').html('');
              $('#village').append(options);
            },
            error: function (jqXhr, textStatus, errorMessage) { // error callback 
                alert('Error: ' + errorMessage);
            }
        });
      });
    </script>
@endpush
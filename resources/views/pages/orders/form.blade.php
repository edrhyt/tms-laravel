<div class="container-fluid mt--7">
    <div class="container-light">
      @if (session('status') != NULL)
          {{-- <x-alert></x-alert> --}}
      @endif
        <form class="form-horizontal" method="POST" action="@if(isset($employee)){{__("/kepegawaian/update/$employee->id")}}@else{{__('/kepegawaian')}}@endif" enctype="multipart/form-data">
            @if(isset($employee))
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
                    <div class="form-group col-md-4">
                      <label class="control-label" for="order-date">Tanggal Surat Order</label>  
                      <div class="input-group">
                        <input type="date" class="form-control px-3" name="order-date" id="order-date" value="@if(isset($employee)){{substr($employee->employee_identity_number, 3) ?? ''}}@endif" required>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="survey-date">Tanggal Survey</label>  
                      <div class="input-group">
                        <input type="date" class="form-control px-3" name="survey-date" id="survey-date" value="@if(isset($employee)){{substr($employee->employee_identity_number, 3) ?? ''}}@endif">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="delivery-date">Tanggal Delivery</label>  
                      <div class="input-group">
                        <input type="date" class="form-control px-3" name="delivery-date" id="delivery-date" value="@if(isset($employee)){{substr($employee->employee_identity_number, 3) ?? ''}}@endif">
                      </div>
                    </div>
                </div>

                <div class="form-row">
                    <x-input.text width="col-md-12" slug="coordinator-name" title="Nama Koordinator" />
                    
                    <div class="form-group col-md-4">
                      <label class="control-label" for="last-name">Kota/Kabupaten</label>  
                      <select class="form-control" name="regency" id="regency">
                        <option value="NULL">Pilih Kota/Kabupaten</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label class="control-label" for="subdistrict">Kecamatan</label>  
                      <select class="form-control" name="subdistrict" id="subdistrict">
                        <option value="NULL">Pilih Kecamatan</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label class="control-label" for="village">Kelurahan/Desa</label>  
                      <select class="form-control" name="village" id="village">
                        <option value="NULL">Pilih Kelurahan/Desa</option>
                      </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="address">Alamat</label>
                      <textarea class="form-control" id="address" name="address" resize="none" rows="9">@if(isset($employee)){{__($employee->address) ?? ''}}@endif</textarea>
                    </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label class="control-label" for="total">Total</label>
                    <input class="form-control" type="text" disabled value="">
                  </div>
                  <div class="form-group col-md-4">
                    <label class="control-label" for="installment">Angsuran</label>
                    <select class="form-control" name="installment" id="installment">
                      <option value="NULL">Pilih Angsuran</option>
                      <option value="5">5 Bulan</option>
                      <option value="6">6 Bulan</option>
                      <option value="7">7 Bulan</option>
                      <option value="8">8 Bulan</option>
                      <option value="9">9 Bulan</option>
                      <option value="10">10 Bulan</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="diskon-dp">Diskon DP</label>
                    <input class="form-control" type="text">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="hadiah">Opsi</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline rounded-left dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hadiah</button>
                        <div class="dropdown-menu p-1 pt-3">
                          <p class="dropdown-item" style="cursor: pointer;">Hadiah</p>
                          <p class="dropdown-item" style="cursor: pointer;">Diskon Koordinator</p>
                        </div>
                      </div>
                      <input type="text" class="form-control pl-2" name="hadiah" id="hadiah">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="total-angsuran">Total Angsuran</label>
                    <input type="text" class="form-control" name="total-angsuran" id="total-angsuran" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="netto">Netto</label>
                    <input type="text" class="form-control" name="netto" id="netto" disabled>
                  </div>
                </div>

                <div class="form-row">
                  <x-input.text width="col-md-4" slug="sales-promotor" title="Sales Promotor" />
                  <div class="form-group col-md-4">
                    <label for="sales-promotor">Sales Promotor</label>
                    <input type="text" name="sales-promotor" id="sales-promotro" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="sales-promotor">Sales Promotor</label>
                    <input type="text" name="sales-promotor" id="sales-promotro" class="form-control">
                  </div>
                </div>
                   
                <div class="form-row">
                  <input type="submit" class="btn btn-primary col-md-12" name="submit" style="margin: 0 5px;">
                </div>
           </fieldset>
        </form>
    </div>
    @include('layouts.footers.auth')
</div>
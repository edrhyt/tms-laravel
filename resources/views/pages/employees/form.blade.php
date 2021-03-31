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
                <legend><strong>Tambah Karyawan</strong></legend>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="employee-identity-number">Nomor Induk Karyawan</label>  
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text" style="background: rgba(0, 0, 0, 0.065)">TMS</div>
                        </div>
                        <input type="text" class="form-control px-3" name="employee-identity-number" id="employee-identity-number" value="@if(isset($employee)){{substr($employee->employee_identity_number, 3) ?? ''}}@endif">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label" for="email">Email</label>  
                      <input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->email ?? ''}}@endif" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label class="control-label" for="first-name">Nama Depan</label>  
                      <input id="first-name" name="first-name" type="text" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->first_name ?? ''}}@endif" required>
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label class="control-label" for="last-name">Nama Belakang</label>  
                      <input id="last-name" name="last-name" type="text" class="form-control input-md" value="@if(isset($employee)){{$employee->last_name ?? ''}}@endif">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label class="control-label" for="place-of-birth">Tempat Lahir</label>  
                      <input id="place-of-birth" name="place-of-birth" type="text" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->place_of_birth ?? ''}}@endif" required>
                    </div>
                    
                    <div class="form-group col-md-2">
                      <label class="control-label" for="date-of-birth">Tanggal Lahir</label>  
                      <input id="date-of-birth" name="date-of-birth" type="date" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->date_of_birth ?? ''}}@endif" required>
                    </div>
                </div>

                <div class="form-row">                        
                    <div class="form-group col-md-12">
                      <label class="control-label" for="position-id">Jabatan</label>  
                      <select class="custom-select" id="position-id" name="position-id">
                        <option @if(!isset($employee)){{__('selected')}}@endif>Pilih Jabatan</option>
                        @foreach ($positions as $position)
                            <option value="{{$position->id}}" @if(isset($employee)) @if($employee->position_id == $position->id){{__('selected')}}@endif @endif>{{$position->name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="address">Alamat</label>
                      <textarea class="form-control" id="address" name="address" resize="none" rows="9">@if(isset($employee)){{__($employee->address) ?? ''}}@endif</textarea>
                    </div>
                    
                    <div class="form-row col-md-6 pr-0">
                      <div class="form-row col-md-6 pr-0">
                        <div class="form-group w-100 pr-3 ml-1">
                            <label class="control-label" for="identity-card-number">Nomor KTP</label>  
                            <input id="identity-card-number" name="identity-card-number" type="text" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->identity_card_number ?? ''}}@endif" required>
                        </div>
                    
                        <div class="form-group w-100 pr-3 ml-1">
                            <label class="control-label" for="phone-number">Nomor Telepon</label>  
                            <input id="phone-number" name="phone-number" type="text" placeholder="" class="form-control input-md" value="@if(isset($employee)){{$employee->phone_number ?? ''}}@endif" required>
                        </div>
  
                        <div class="form-group pr-3 ml-1">
                          <label class="control-label" for="active">Status</label>
                            <label class="radio" for="active-0">
                                <input type="radio" name="active" id="active-0" value="0" @if(isset($employee)) @if($employee->active == '0'){{__('checked="checked"')}}@endif @else{{__('checked="checked"')}}@endif>
                                Tidak Aktif
                            </label> 
                            <label class="radio" for="active-1">
                                <input type="radio" name="active" id="active-1" value="1" @if(isset($employee)) @if($employee->active == '1'){{__('checked="checked"')}}@endif @endif>
                                Aktif
                            </label>
                        </div>
                      </div>

                      <div class="form-row col-md-6 pr-0">
                        <!-- File Button --> 
                        <div class="form-group d-flex flex-column">
                          <label class="control-label" for="image">Foto</label>
                          <div class="thumb-container mb-2">
                            <img src="@if(isset($employee)){{asset('images').'/'. $employee->image}}@else{{asset('images/').'/avatar.jpg'}}@endif" alt="avatar" class="thumb-img">
                          </div>
                          <input id="image" name="image" class="input-file" type="file">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-row">
                    <input type="submit" class="btn btn-primary col-md-12" value="@if(isset($employee)){{__('Update')}}@else{{__('Submit')}}@endif" name="submit" style="margin: 0 5px;">
                  </div>
           </fieldset>
        </form>
    </div>
    @include('layouts.footers.auth')
</div>
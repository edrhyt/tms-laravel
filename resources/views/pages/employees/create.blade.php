@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="container-light">
            <form class="form-horizontal" method="POST" action="/kepegawaian">
                @csrf
                <fieldset>
                    <legend><strong>Tambah Karyawan</strong></legend>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="employee-identity-number">Nomor Induk Karyawan</label>  
                            <input id="employee-identity-number" name="employee-identity-number" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
    
                        <div class="form-group col-md-6">
                          <label class="control-label" for="email">Email</label>  
                          <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label class="control-label" for="first-name">Nama Depan</label>  
                          <input id="first-name" name="first-name" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                        
                        <div class="form-group col-md-3">
                          <label class="control-label" for="last-name">Nama Belakang</label>  
                          <input id="last-name" name="last-name" type="text" placeholder="" class="form-control input-md">
                        </div>
                        
                        <div class="form-group col-md-4">
                          <label class="control-label" for="place-of-birth">Tempat Lahir</label>  
                          <input id="place-of-birth" name="place-of-birth" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                        
                        <div class="form-group col-md-2">
                          <label class="control-label" for="date-of-birth">Tanggal Lahir</label>  
                          <input id="date-of-birth" name="date-of-birth" type="date" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>

                    <div class="form-row">                        
                        <div class="form-group col-md-12">
                          <label class="control-label" for="position-id">Jabatan</label>  
                          <select class="custom-select" id="position-id" name="position-id">
                            <option selected>Pilih Jabatan</option>
                            @foreach ($positions as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="control-label" for="address">Alamat</label>
                          <textarea class="form-control" id="address" name="address" resize="none" rows="7"></textarea>
                        </div>
                        
                        <div class="form-row col-md-6 pr-0">
                            <div class="form-group col-md-6">
                                <label class="control-label" for="identity-card-number">Nomor KTP</label>  
                                <input id="identity-card-number" name="identity-card-number" type="text" placeholder="" class="form-control input-md" required="">
                            </div>
                        
                            <div class="form-group col-md-6 pr-0">
                                <label class="control-label" for="phone-number">Nomor Telepon</label>  
                                <input id="phone-number" name="phone-number" type="text" placeholder="" class="form-control input-md" required="">
                            </div>

                            <div class="form-group col-md-6">
                              <label class="control-label" for="active">Status</label>
                                <label class="radio" for="active-0">
                                    <input type="radio" name="active" id="active-0" value="0" checked="checked">
                                    Tidak Aktif
                                </label> 
                                <label class="radio" for="active-1">
                                    <input type="radio" name="active" id="active-1" value="1">
                                    Aktif
                                </label>
                            </div>
                            
                            <!-- File Button --> 
                            <div class="form-group col-md-6" style="overflow: hidden;">
                              <label class="control-label" for="image">Foto</label>
                              <input id="image" name="image" class="input-file" type="file">
                            </div>
                        </div>

                      </div>
                      <div class="form-row">
                        <input type="submit" class="btn btn-primary col-md-12" value="Submit" name="submit" style="margin: 0 5px;">
                      </div>
               </fieldset>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>

    @endsection
    
    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
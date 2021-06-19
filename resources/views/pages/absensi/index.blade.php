@extends('layouts.app', ['class' => 'bg-default'])
@section('page-title', 'Absensi')
    
@section('content')
    <div class="header bg-gradient-primary py-4 py-lg-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title m-0">Absensi</h1>
                </div>
                <div class="card-body">

                    {{-- Selectpicker karyawan --}}
                    <select id="search-emp" class="selectpicker col-12 col-md-12 p-0" data-style="btn-primary" data-live-search="true" data-size="3" title="Pilih atau cari nama karyawan..">
                    @foreach ($employees as $karyawan)
                        <option 
                            data-tokens="{{$karyawan->employee_identtity_number}}"
                            data-url="{{route('absensi.search', $karyawan->id)}}"
                            value="{{$karyawan->id}}" >
                            <span>{{$karyawan->first_name .' '. $karyawan->last_name}}</span>
                        </option>
                    @endforeach
                    </select>

                    {{-- Image URL untuk diproses melalui javascript --}}
                    <input type="hidden" name="img-url" id="img-base-url" value="{{asset('images/') . '/'}}">

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-7 col-md-7 col-sm-12">
                                <div class="row">
                                    <div class="col-5 col-md-5 col-sm-12 p-0" style="box-shadow: 0px 6px 17px rgba(0,0,0,0.08); padding-bottom:100%; overflow:hidden; position:relative; border-radius: .3rem;">
                                        <img id="em-img" class="img w-100" src="{{asset('images/') . '/avatar.jpg'}}" alt="profile-avatar" style="position: absolute;">
                                    </div>
                                    <div class="col-7 col-md-7 col-sm-12 pl-2">
                                        <div class="container pb-2">
                                            <span class="text-sm"><em>Nama</em></span><br>
                                            <strong><span id="em-name">-</span></strong>
                                        </div>
                                        <div class="container pb-2">
                                            <span class="text-sm"><em>ID Karyawan</em></span><br>
                                            <strong><span id="em-number">-</span></strong>
                                        </div>
                                        <div class="container pb-2">
                                            <span class="text-sm"><em>Email</em></span><br>
                                            <strong><span id="em-email">-</span></strong>
                                        </div>
                                        <div class="container pb-2">
                                            <span class="text-sm"><em>Telepon</em></span><br>
                                            <strong><span id="em-phone">-</span></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-5 col-md-5 col-sm-12 p-0">
                                <div class="row mx-0">
                                    <h2>Status Absensi</h2>
                                </div>
                                <div class="row mx-0">
                                    <div class="col-6 col-md-6 col-sm-12 px-0 pr-1">
                                        <button id="bt-masuk" type="button" class="btn btn-success w-100 mb-3" style="height: 9rem;">
                                            <i class="fas fa-hand-paper mb-1" style="font-size: 3rem;"></i><br>
                                            <span>Absen Masuk</span>
                                        </button>
                                        <span class="text-danger text-sm"><em>* Belum absen masuk</em></span>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-12 px-0 pl-1">
                                        <button id="bt-pulang" type="button" class="btn btn-light w-100 mb-3" style="height: 9rem;" title="Harap absen masuk terlebih dahulu" disabled>
                                            <i class="fas fa-times mb-1" style="font-size: 3rem;"></i><br>
                                            <span>Absen Pulang</span>
                                        </button>
                                        <span class="text-danger text-sm"><em>* Belum absen pulang</em></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <span class="badge badge-info">Silahkan pilih karyawan terlebih dahulu</span>
                </div>
            </div>
        </div>

        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection


@push('js')
    {{-- Ambil status absensi karyawan pada saat pemilihan karyawan --}}
    <script>
        // Render profile karyawan
        $('#search-emp').on('change', function() {
            const id_karyawan = $('#search-emp :selected').val();
            const url = $('#search-emp :selected').data('url');

            $.ajax({
                url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#em-name').text(`${data.first_name} ${data.last_name}`);
                    $('#em-number').text(`${data.employee_identity_number}`);
                    $('#em-email').text(`${data.email}`);
                    $('#em-phone').text(`${data.phone_number}`);
                    $('#em-img').attr('src', $('#img-base-url').val() + data.image);
                }
            });
        });

        // Absen masuk
        $('#bt-masuk').on('click', function() {
            alert('hello');
        });
    </script>
@endpush
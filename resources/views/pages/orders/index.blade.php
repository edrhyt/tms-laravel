@extends('layouts.app')


@section('content')
    @if (\Session::has('success'))
        <div class="alert-container d-flex" style="justify-content: center">
            <div class="alert auto-close alert-success mt-2">
                {!! \Session::get('success') !!}
            </div>
        </div>
    @endif
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="container-light">
            {!! $dataTable->table() !!}
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
    
@push('js')
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
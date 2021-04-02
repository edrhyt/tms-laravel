@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    @include('pages.orders.form')
@endsection
    
    @push('js')
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="container-light">
            <span class="info-dot-dark">No Surat Order: {{$order->number}}</span>
            <x-order-view-tables.striped
                :tableData="[
                    [
                        'title' => 'Tanggal SO',
                        'value' => $order->date
                    ],
                    [
                        'title' => 'Tanggal Survey',
                        'value' => NULL
                    ],
                    [
                        'title' => 'Tanggal Kirim',
                        'value' => NULL
                    ],
                    [
                        'title' => 'Nama Koordinator',
                        'value' => $order->coordinator_name
                    ],
                    [
                        'title' => 'Kabupaten',
                        'value' => $order->regency
                    ],
                    [
                        'title' => 'Kecamatan',
                        'value' => $order->subdistrict
                    ],
                    [
                        'title' => 'Keluarahan / Desa',
                        'value' => $order->village
                    ],
                    [
                        'title' => 'Alamat',
                        'value' => $order->address
                    ],
                    [
                        'title' => 'Jumlah Angsuran',
                        'value' => $order->installments_tenor
                    ],
                    [
                        'title' => 'Diskon DP',
                        'value' => $order->dp_discount
                    ],
                    [
                        'title' => 'Total Pembayaran',
                        'value' => $order->total
                    ],
                    [
                        'title' => 'Netto',
                        'value' => $order->netto
                    ],
                    [
                        'title' => 'Angsuran 1',
                        'value' => $order->first_installment
                    ],
                    [
                        'title' => 'Angsuran / Bulan',
                        'value' => $order->monthly_installments
                    ],
                    [
                        'title' => 'Sales Promotor',
                        'value' => $order->sp_employee
                    ],
                    [
                        'title' => 'Demo Booker',
                        'value' => $order->db_employee
                    ],
                    [
                        'title' => 'SPV Sales',
                        'value' => $order->ss_employee
                    ],
                ]"
                :size="17" />
            <span class="info-dot-dark mt-4">List Barang SO Kode: {{$order->number}}</span>
            <x-order-view-tables.striped
                :tableData="$products"
                :size="count($products)"
                :header="['Nama Produk', 'Kuantitas', 'Subtotal']"
                />
                </div>
        @include('layouts.footers.auth')
    </div>
@endsection
    
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
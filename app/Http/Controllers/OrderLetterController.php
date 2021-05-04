<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderLetter;
use App\Models\Regency;
use App\Models\Subdistrict;
use App\Models\Village;
use App\Models\Employee;
use App\DataTables\OrderLetterDataTable;
use App\DataTables\CartDataTable;

class OrderLetterController extends Controller
{
    public function index(OrderLetterDataTable $dataTable) {
        $breadcrumb = array(
            [
                'title' => 'Penjualan',
                'route' => 'surat-order',
            ],
            [
                'title' => 'Surat Order',
                'route' => 'surat-order',
            ]
        );

        return $dataTable->render('pages.orders.index', ['breadcrumb' => $breadcrumb, 'create_route' => route('order.create')]);
    }

    public function view(OrderLetter $order) {
        $breadcrumb = array(
            [
                'title' => 'Penjualan',
                'route' => route('order'),
            ],
            [
                'title' => 'Surat Order',
                'route' => route('order'),
            ],
            [
                'title' => $order->number,
                'route' => route('order.view', $order->id),
            ]
        );

        return view('pages.orders.view', ['order' => $order, 'breadcrumb' => $breadcrumb, 'info' => 'Surat Order']);
    }

    public function create(CartDataTable $dataTable) {
        // Options
        $list_angsuran = self::getListAngsuran();
        $dropdowns = self::getOpsi();
        $regencies = Regency::all()->toArray();

        // Data Modeling
        $promotors = Employee::getSalesPromotor()->toArray(); 
        $demo_bookers = Employee::getDemoBooker()->toArray(); 
        $spv_sales = Employee::getSVPSales()->toArray(); 

        return $dataTable->render('pages.orders.inputs', [
            'list_angsuran' => $list_angsuran,
            'regencies' => $regencies,
            'dropdowns' => $dropdowns,
            'promotors' => $promotors,
            'demo_bookers' => $demo_bookers,
            'svp_sales' => $spv_sales,
            ]);
    }

    public function store() {
        // dd(request());

        // Validasi
        request()->validate([
            'kode-wilayah' => 'required',
            'no-so' => 'required',
            'subdistrict' => 'required',
            'regency' => 'required',
            'village' => 'required',
            'sales-promotor' => 'required',
            'demo-booker' => 'required',
            'svp-sales' => 'required',
            'coordinator-name' => 'required',
            'address' => 'required',
            'installment' => 'required',
            'diskon-dp' => 'required',
            'angsuran-1' => 'required',
            'angsuran-per-bulan' => 'required',
            'order-date' => 'required',
        ]);

        // // Pre-proccess no surat order
        $noSuratOrder = request('kode-wilayah') . request('no-so');

        // // Store ke database
        OrderLetter::create([
            'number' => $noSuratOrder,
            'province_id' => 32,
            'regency_id' => request('regency'),
            'subdistrict_id' => request('subdistrict'),
            'village_id' => request('village'),
            'sp_employee_id' => request('sales-promotor'),
            'db_employee_id' => request('demo-booker'),
            'ss_employee_id' => request('svp-sales'),
            'coordinator_name' => request('coordinator-name'),
            'address' => request('address'),
            'installments_tenor' => request('installment'),
            'dp_discount' => request('diskon-dp'),
            'total' => request('total-angsuran'),
            'netto' => request('netto'),
            'first_installment' => request('angsuran-1'),
            'monthly_installments' => request('angsuran-per-bulan'),
            'date' => date("Y-m-d", strtotime(request('order-date'))),
        ]);
    }



    protected function getListAngsuran() {
        return array(
            ['value' => '5', 'title' => '5 Bulan'],
            ['value' => '6', 'title' => '6 Bulan'],
            ['value' => '7', 'title' => '7 Bulan'],
            ['value' => '8', 'title' => '8 Bulan'],
            ['value' => '9', 'title' => '9 Bulan'],
            ['value' => '10', 'title' => '10 Bulan'],
        );
    }

    protected function getOpsi() {
        return array(
            [
                'slug' => 'hadiah',
                'title' => 'Hadiah',
                'script' => '',
            ],
            [
                'slug' => 'diskon-koordinator',
                'title' => 'Diskon Koordinator',
                'script' => '',
            ],
        );
    }

    public function getKecamatan(Regency $regency) {
        return Subdistrict::getKecamatan($regency->id)->toJson();
    }

    public function getDesa(Subdistrict $subdistrict) {
        return Village::getDesa($subdistrict->id)->toJson();
    }
}

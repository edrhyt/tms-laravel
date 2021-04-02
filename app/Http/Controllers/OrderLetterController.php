<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderLetter;
use App\Models\Regency;
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

    public function create(CartDataTable $dataTable) {
        $list_angsuran = array(
            ['value' => '5', 'title' => '5 Bulan'],
            ['value' => '6', 'title' => '6 Bulan'],
            ['value' => '7', 'title' => '7 Bulan'],
            ['value' => '8', 'title' => '8 Bulan'],
            ['value' => '9', 'title' => '9 Bulan'],
            ['value' => '10', 'title' => '10 Bulan'],
        );
        $regencies = Regency::all()->toArray();
        $dropdowns = array(
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

        $promotors = Employee::where('position_id', 5)
                    ->orderBy('first_name')
                    ->get()
                    ->toArray(); 

        $products = array();

        $cartBody = "";

        return $dataTable->render('pages.orders.inputs', [
            'list_angsuran' => $list_angsuran,
            'regencies' => $regencies,
            'dropdowns' => $dropdowns,
            'promotors' => $promotors,
            'products' => $products,
            'cartBody' => $cartBody,
            ]);

        // return view('pages.orders.inputs', [
            // 'list_angsuran' => $list_angsuran,
            // 'regencies' => $regencies,
            // 'dropdowns' => $dropdowns,
            // 'promotors' => $promotors,
            // 'products' => $products,
            // 'cartBody' => $cartBody,
            // ]);
    }
}

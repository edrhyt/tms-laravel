<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderLetter;
use App\DataTables\OrderLetterDataTable;

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

    public function create() {
        return view('pages.orders.inputs');
    }
}

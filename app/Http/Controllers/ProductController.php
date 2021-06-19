<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\DataTables\ProductDataTable;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable) {
        $breadcrumb = array(
            [
                'title' => 'Inventory',
                'route' => 'product',
            ],
        );
        return $dataTable->render('pages.products.index', ['breadcrumb' => $breadcrumb, 'create_route' => route('product.create')]);
    }

    public function create() {
        return view('pages.employees.inputs', ['positions' => array()]);
    }

    public function edit(Product $product) {

    }

    public function store() {

    }

    public function update(Product $product) {

    }
}

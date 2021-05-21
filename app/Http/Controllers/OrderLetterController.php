<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderLetter;
use App\Models\OrderLetterProducts;
use App\Models\Regency;
use App\Models\Subdistrict;
use App\Models\Village;
use App\Models\Employee;
use App\Models\Product;
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

        // Set nama karyawan dan alamat
        $order['regency'] = Regency::getRegencyName($order->regency_id);
        $order['subdistrict'] = Subdistrict::getSubdistrictName($order->subdistrict_id);
        $order['village'] = Village::getVillageName($order->village_id);

        $order['sp_employee'] = Employee::getEmployeeName($order->sp_employee_id);
        $order['db_employee'] = Employee::getEmployeeName($order->db_employee_id);
        $order['ss_employee'] = Employee::getEmployeeName($order->ss_employee_id);

        $order = (object) $order;

        $products = self::getProductList($order->id);

        return view('pages.orders.view', ['order' => $order, 'products' => $products, 'breadcrumb' => $breadcrumb, 'info' => 'Surat Order']);
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

    public function edit(CartDataTable $dataTable, OrderLetter $order) {
        // Options
        $list_angsuran = self::getListAngsuran();
        $dropdowns = self::getOpsi();
        $regencies = Regency::all()->toArray();
        $subdistricts = Subdistrict::getKecamatan($order->regency_id)->toArray();
        $villages = Village::getDesa($order->subdistrict_id)->toArray();

        // Data Modeling
        $promotors = Employee::getSalesPromotor()->toArray(); 
        $demo_bookers = Employee::getDemoBooker()->toArray(); 
        $spv_sales = Employee::getSVPSales()->toArray(); 
        $products = $products = self::getProductList($order->id);
        $all_qty = 0;

        foreach($products as $key => $product) {
            $all_qty += $product['value']['qty'];
        }

        return $dataTable->render('pages.orders.inputs', [
            'list_angsuran' => $list_angsuran,
            'regencies' => $regencies,
            'subdistricts' => $subdistricts,
            'villages' => $villages,
            'dropdowns' => $dropdowns,
            'promotors' => $promotors,
            'demo_bookers' => $demo_bookers,
            'svp_sales' => $spv_sales,
            'order' => $order,
            'products' => $products,
            'all_qty' => $all_qty,
        ]);
    }

    public function store() {
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

        
        // Mulai DB transaksi
        DB::transaction(function(){
            // Pre-process no surat order
            $noSuratOrder = request('kode-wilayah') .'-'. request('no-so');

            // Pre-process list barang
            $requestKeys = request()->except('_token');
            $listBarang = [];

            foreach($requestKeys as $key => $qty) {
                if(preg_match("/^qty-([0-9][0-9][0-9]|[0-9][0-9]|[0-9])$/", $key)) {
                    array_push($listBarang, [
                        'product-id' => (int) explode("-", $key)[1],
                        'quantity' => (int) $qty,
                    ]);
                }
            }

            // Insert data baru ke order_letter
            $orderLetter = OrderLetter::create([
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
    
            // Insert data baru ke pivot table order_letter_products
            foreach($listBarang as $barang) {
                OrderLetterProducts::create([
                    'order_letter_id' => $orderLetter->id,
                    'product_id' => $barang['product-id'],
                    'quantity' => $barang['quantity']
                ]);
            }
        });

    }

    public function update(OrderLetter $order) {
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

        $isCartChanged = request('cartChanges') == '1' ? TRUE : FALSE;
        
        // Mulai DB transaksi
        DB::transaction(function() use ($order, $isCartChanged){
            // Pre-process no surat order
            $noSuratOrder = request('kode-wilayah') .'-'. request('no-so');

            // Pre-process list barang
            $requestKeys = request()->except('_token');
            $listBarang = [];

            foreach($requestKeys as $key => $qty) {
                if(preg_match("/^qty-([0-9][0-9][0-9]|[0-9][0-9]|[0-9])$/", $key)) {
                    array_push($listBarang, [
                        'product-id' => (int) explode("-", $key)[1],
                        'quantity' => (int) $qty,
                    ]);
                }
            }

            // Insert data baru ke order_letter
            $orderLetter = $order->update([
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

            if($isCartChanged) {

                // Clear semua list barang dengan id surat order ini
                $deletedProductList = OrderLetterProducts::where('order_letter_id', $order->id)
                                                        ->delete();
    
                // Insert data baru ke pivot table order_letter_products
                foreach($listBarang as $barang) {
                    OrderLetterProducts::create([
                        'order_letter_id' => $order->id,
                        'product_id' => $barang['product-id'],
                        'quantity' => $barang['quantity']
                    ]);
                }
            }

        });
    }

    protected function getListAngsuran() {
        return array(
            ['id' => '5', 'title' => '5 Bulan'],
            ['id' => '6', 'title' => '6 Bulan'],
            ['id' => '7', 'title' => '7 Bulan'],
            ['id' => '8', 'title' => '8 Bulan'],
            ['id' => '9', 'title' => '9 Bulan'],
            ['id' => '10', 'title' => '10 Bulan'],
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

    protected function getProductList(int $order_id) {
        // Set list barang
        $productList = OrderLetterProducts::where('order_letter_id', $order_id)
                                            ->orderBy('product_id')
                                            ->get();
        foreach($productList as $idx => $product) {
            $productList[$idx]['product_name'] = Product::getProductName($product->product_id);
        }
        $productList = (object) $productList;

        $products = array();        

        foreach($productList as $idx => $product) {
            $products[$idx]['title'] = $product->product_name;
            $products[$idx]['value']['product_id'] = $product->product_id;
            $products[$idx]['value']['qty'] = $product->quantity;
            $products[$idx]['value']['subtotal'] = $product->subtotal_price;
        }

        return $products;
    }

    public function getKecamatan(Regency $regency) {
        return Subdistrict::getKecamatan($regency->id)->toJson();
    }

    public function getDesa(Subdistrict $subdistrict) {
        return Village::getDesa($subdistrict->id)->toJson();
    }
}

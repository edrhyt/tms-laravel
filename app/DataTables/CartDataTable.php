<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CartDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'cart.action')
            ->editColumn('id', function($product) {
                return '<i class="fas fa-plus-circle text-success text-lg" style="cursor: pointer;"></i>';
            })
            ->rawColumns(['id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cart $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('cart-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => 'name', 'title' => 'Nama Barang', 'data' => 'name'],
            ['name' => 'stock', 'title' => 'stock', 'data' => 'stock'],
            ['name' => 'price', 'title' => 'Harga', 'data' => 'price'],
            ['name' => 'id', 'title' => 'Aksi', 'data' => 'id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cart_' . date('YmdHis');
    }
}

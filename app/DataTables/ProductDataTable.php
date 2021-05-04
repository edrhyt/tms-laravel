<?php

namespace App\DataTables;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('action', 'product.action')
            ->editColumn('id', function($product) {
                return '
                    <div class="d-flex">
                        <i class="fas fa-edit text-primary mr-2 cursor-pointer text-lg" id="edit-'.$product->id.'" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                        <i class="fas fa-trash-alt text-danger ml-2 cursor-pointer text-lg" id="delete-'.$product->id.'" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                    </div>';
            })
            ->editColumn('price', function($product){
                return 'Rp. '.numberWithCommas( $product->price );
            })
            ->editColumn('stock', function($product){
                if($product->stock > 0) {
                    $color = 'primary';
                } else {
                    $color = 'danger';
                }
                return '<span class="badge badge-'.$color.' badge-pill"><strong style="font-size: 12px;">'.$product->stock.'</strong></span>';
            })
            ->rawColumns(['id', 'stock']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
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
                    ->setTableId('product-table')
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
            ['name' => 'name', 'title' => 'Nama', 'data' => 'name'],
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
        return 'Product_' . date('YmdHis');
    }
}

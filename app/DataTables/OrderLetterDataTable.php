<?php

namespace App\DataTables;

use App\Models\OrderLetter;
use App\Models\Regency;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderLetterDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', 'orderletter.action')
            ->editColumn('regency_id', function ($orderLetter) {
                return Regency::find($orderLetter->regency_id)->name;
            })
            ->editColumn('id', function ($orderLetter) {
                return '
                    <div class="d-flex">
                        <div class="dropdown show">
                            <a class="btn btn-dark dropdown-toggle bt-small" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="'.route('order.view', $orderLetter->id).'"><i class="fas fa-eye"></i>Pilih Surat Order</a> <a class="dropdown-item" href="#"><i class="far fa-edit"></i>Ubah</a>
                                <hr class="m-2">
                                <a class="dropdown-item text-danger" href="#"><i class="far fa-trash-alt"></i>Hapus</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary bt-small"><i class="far fa-file"></i> Buat Survey</button>
                    </div>';
            })
            ->rawColumns(['id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OrderLetter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrderLetter $model)
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
                    ->setTableId('orderletter-table')
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
            ['name' => 'number', 'title' => 'Kode SO', 'data' => 'number'],
            ['name' => 'coordinator_name', 'title' => 'Nama Koordinator', 'data' => 'coordinator_name'],
            ['name' => 'regency_id', 'title' => 'Alamat', 'data' => 'regency_id'],
            ['name' => 'date', 'title' => 'Tgl SO', 'data' => 'date'],
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
        return 'OrderLetter_' . date('YmdHis');
    }
}

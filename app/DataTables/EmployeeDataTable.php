<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
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
            ->editColumn('action', function ($employee) {
                return '<a href="#edit-'.$employee->id.'" class="bt-action edit">Edit</a> | <a href="#delete-'.$employee->id.'" class="bt-action delete">Delete</a>';
            })
            ->editColumn('first_name', function($employee) {
                return $employee->first_name .' '. $employee->last_name;
            })
            ->editColumn('active', function($employee) {
                if($employee->active == '1') return 'Aktif';
                return 'Tidak Aktif';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
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
                    ->setTableId('employee-table')
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
            ['name' => 'image', 'title' => 'Foto', 'data' => 'image'],
            ['name' => 'employee_identity_number', 'title' => 'NIK', 'data' => 'employee_identity_number'],
            ['name' => 'first_name', 'title' => 'Nama', 'data' => 'first_name'],
            'email',
            ['name' => 'address', 'title' => 'Alamat', 'data' => 'address'],
            ['name' => 'phone_number', 'title' => 'Telepon', 'data' => 'phone_number'],
            ['name' => 'active', 'title' => 'Status', 'data' => 'active'],
            ['name' => 'action', 'title' => 'Aksi', 'data' => 'action']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Employee_' . date('YmdHis');
    }
}

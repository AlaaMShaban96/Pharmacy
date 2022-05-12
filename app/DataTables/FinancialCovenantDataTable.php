<?php

namespace App\DataTables;

use App\Models\FinancialCovenant;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class FinancialCovenantDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->editColumn('user_id', function ($financialCovenant) {
            return $financialCovenant->user->name;
        })
        ->editColumn('department_id', function ($financialCovenant) {
            return $financialCovenant->department->name;
        })
        ->editColumn('financial_covenant_type_id', function ($financialCovenant) {
            return $financialCovenant->financialCovenantType->name;
        })
        ->editColumn('date', function ($financialCovenant) {
            return $financialCovenant->date->format('Y-m-d');
        })
        ->addColumn('remaining', function ($financialCovenant) {
            return $financialCovenant->amount-$financialCovenant->total;
        })
        ->addColumn('action', 'financial_covenants.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FinancialCovenant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FinancialCovenant $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'data' =>'user_id',
                'title' => 'User ',
                'searchable' => false,
            ],
            [
                'data' =>'department_id',
                'title' => 'Department ',
                'searchable' => false,
            ],
            [
                'data' =>'financial_covenant_type_id',
                'title' => 'Type ',
                'searchable' => false,
            ],
            'number',
            'amount',
            'date',
            'remaining',
            'total'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'financial_covenants_datatable_' . time();
    }
}

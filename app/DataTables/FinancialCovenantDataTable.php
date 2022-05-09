<?php

namespace App\DataTables;

use App\Models\FinancialCovenant;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Barryvdh\DomPDF\Facade as PDF;

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
        ->editColumn('remaining', function ($financialCovenant) {
            return $financialCovenant->remaining;
        })
        ->orderColumn('remaining', function ($query) {

            $query->orderBy('total', 'desc');

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
            ->addAction(['width' => '120px', 'printable' => false,"ordering"=> false])
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
            'name',
            'amount',
            [
                'data' => 'user_id',
                'title' => 'User Name',
                'searchable' => false,
            ],
            [
                'data' => 'remaining',
                'title' => 'remaining',
                'searchable' => false,
            ],
            'total'
        ];
    }
    /**
     * Export PDF using DOMPDF
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = PDF::loadView($this->printPreview, compact('data'));
        return $pdf->download($this->filename() . '.pdf');
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

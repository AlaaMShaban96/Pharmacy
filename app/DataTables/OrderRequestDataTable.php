<?php

namespace App\DataTables;

use App\Models\OrderRequest;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OrderRequestDataTable extends DataTable
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
        ->editColumn('doctor_id', function ($order) {
            return $order->doctor->name;
        })
        ->addColumn('action', function ($order) {
            return view('order_requests.datatables_actions',compact('order'));
        });

        // ->addColumn('action', 'order_requests.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OrderRequest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OrderRequest $model)
    {
        $query = $model->newQuery();
        if (request()->filled('status')) {
            $query->where('status',  request('status'));
        }
        if (request()->filled('from') && request()->filled('to') ) {
            $query->whereBetween('created_at',[request('from'),request('to')]);
        }
        if (request()->filled('from') ) {
            $query->whereDate('created_at','<=',request('from'));
        }
        if (request()->filled('to') ) {
            $query->whereDate('created_at','<=',request('to'));
        }
        return $query;

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
            'code',
            [
                'data' => 'doctor_id',
                'title' => 'doctor',
                'searchable' => false,
            ],
            'total',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'order_requests_datatable_' . time();
    }
}

<?php

namespace App\DataTables;

use App\Models\Receive;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ReceiveDataTable extends DataTable
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
        ->editColumn('receive_date', function ($receive) {
            return $receive->receive_date->format('Y-m-d H:m');
        })
        ->editColumn('inventory_date', function ($receive) {
            return $receive->inventory_date->format('Y-m-d H:m');
        })
        ->editColumn('company_id', function ($receive) {
            return $receive->company->name;
        })
        ->addColumn('action', 'receives.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Receive $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Receive $model)
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
                'data' => 'receive_date',
                'title' => 'Receive date',
                'searchable' => false,
            ],
            [
                'data' => 'inventory_date',
                'title' => 'Inventory date',
                'searchable' => false,
            ],
            [
                'data' => 'company_id',
                'title' => 'Company',
                'searchable' => false,
            ],
            'company_code',
            'shipment_number',
            'invoice_number',
            'packing_list_number',
            [
                'data' => 'packing_list_number',
                'title' => 'Packing list',
                'searchable' => false,
            ],
            [
                'data' => 'containers_number',
                'title' => 'Containers',
                'searchable' => false,
            ],
            [
                'data' => 'pallet_number',
                'title' => 'Pallet',
                'searchable' => false,
            ],
            'shipment_type'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'receives_datatable_' . time();
    }
}

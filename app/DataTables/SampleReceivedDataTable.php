<?php

namespace App\DataTables;

use Barryvdh\DomPDF\PDF;
use App\Models\SampleReceived;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class SampleReceivedDataTable extends DataTable
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
        ->addColumn('code', function ($sampleReceived) {
            return  "<a href='". route('sampleReceiveds.show', $sampleReceived->code,['fromIndex'=>true])."' class='btn btn-ghost-success'> ".$sampleReceived->code." </a>";
            // return $sampleReceived->drug->code;
        })
        // ->addColumn('total', function ($sampleReceived) {
        //     return $sampleReceived->price * $sampleReceived->quantity. 'DL' ;
        // })
        // ->editColumn('company_id', function ($sampleReceived) {
        //     return $sampleReceived->company->name;
        // })
        // ->editColumn('store_id', function ($sampleReceived) {
        //     return $sampleReceived->store?$sampleReceived->store->name:'';
        // })
        ->filterColumn('code', function ($query, $keyword) {

            return $query->where('code','like','%'.$keyword.'%');
        })

        ->addColumn('action', 'sample_receiveds.datatables_actions')
        ->rawColumns(['action', 'code']);;

        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SampleReceived $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SampleReceived $model)
    {
        $query = $model->newQuery();
        if (request()->filled('code')) {
            $query->where('code',  request('code'));
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

        $query->select('code','drug_id')->groupBy('code','drug_id')->get();
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
                'searching'=> false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner',],
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
                'data' => 'code',
                'title' => 'Code',
                'searchable' => false,
            ],
            // 'name',
            // [
            //     'data' => 'company_id',
            //     'title' => 'Company',
            //     'searchable' => false,
            // ],
            // 'validity',
            // [
            //     'data' => 'store_id',
            //     'title' => 'Store',
            //     'searchable' => false,
            // ],
            // 'quantity',
            // 'price',
            [
                'data' => 'total',
                'title' => 'Total',
                'searchable' => false,
            ],
            [
                'data' => 'remaining',
                'title' => 'Remaining',
                'searchable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sample_receiveds_datatable_' . time();
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
}

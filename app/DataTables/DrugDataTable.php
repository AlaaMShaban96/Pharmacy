<?php

namespace App\DataTables;

use App\Models\Drug;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DrugDataTable extends DataTable
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
        ->editColumn('drug_dosage.name', function ($drug) {
            return $drug->drugDosage->name;
            return getLinksColumnByRouteName([$drug->drugDosage], 'drugDosages.edit', 'id', 'name');
        })
        ->editColumn('company.name', function ($drug) {
            return $drug->company->name;
            return getLinksColumnByRouteName([$drug->company], 'company.edit', 'id', 'name');
        })
        ->addColumn('action', 'drugs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Drug $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Drug $model)
    {

        $query=$model->newQuery();


        if (request()->filled('atc')) {
            $query->where('atc',  request('atc'));
        }
        if (request()->filled('name')) {
            $query->where('name', 'like',  '%'.request('name').'%');

        }
        if (request()->filled('b_g')) {
            $query->where('b_g', request('b_g'));
        }
        if (request()->filled('ingredients')) {
            $query->where('ingredients', 'like',  '%'.request('ingredients').'%');

        }
        if (request()->filled('company_id')) {
            $query->whereHas('company', function($q){
                $q->where('id',request('company_id'));
            });
        }
        if (request()->filled('drug_dosage_id')) {
            $query->whereHas('drugDosage', function($q){
                $q->where('id',  request('drug_dosage_id'));
            });
        }
        return $query
        ->orderByDesc('id');
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
            'atc',
            'name',
            'code',
            'package',
            'b_g',
            'ingredients',
            'drug_dosage.name',
            'company.name',
            'price'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'drugs_datatable_' . time();
    }
}

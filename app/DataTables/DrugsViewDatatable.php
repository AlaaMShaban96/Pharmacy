<?php

namespace App\DataTables;

use App\Models\Drug;
use App\Models\Drugs;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DrugsViewDatatable extends DataTable
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
        ->editColumn('ingredients', function ($drug) {
            return $drug->getAbbreviatedIngredientsAttribute();
        })
        ->editColumn('package.name', function ($drug) {
            return $drug->package->name;
        })
        ->editColumn('drug_dosage.name', function ($drug) {
            return $drug->drugDosage->name;
        })
        ->editColumn('currency.name', function ($drug) {
            return $drug->currency->name;
        })
        ->editColumn('company.name', function ($drug) {
            return $drug->company->name;
        })
        ->editColumn('strata.name', function ($drug) {
            return $drug->strata->name;
        })
        ->editColumn('package.name', function ($drug) {
            return $drug->package->name;
        })
        ->editColumn('route.name', function ($drug) {
            return $drug->route->name;
        })
        ->editColumn('country.name', function ($drug) {
            return $drug->country->name;
        })
        ->editColumn('laboratory.name', function ($drug) {
            return $drug->laboratory->name;
        })
            ->addColumn('action', 'drugsviewdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DrugsViewDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Drug $model)
    {
        $query= $model->newQuery();
        return $query->where('atc', $this->drug->atc);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('drugsviewdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters(['scrollY' => true])
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
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
            'package.name',
            'b_g',
            'ingredients',
            'drug_dosage.name',
            'company.name',
            'currency.name',
            'strata.name',
            'package.name',
            'route.name',
            'country.name',
            'laboratory.name',
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
        return 'DrugsView_' . date('YmdHis');
    }
}

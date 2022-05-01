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
use Barryvdh\DomPDF\Facade as PDF;

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
        ->editColumn('package_id', function ($drug) {
            return $drug->package->name;
        })
        ->editColumn('drug_dosage_id', function ($drug) {
            return $drug->drugDosage->name;
        })
        ->editColumn('currency_id', function ($drug) {
            return $drug->currency->name;
        })
        ->editColumn('company_id', function ($drug) {
            return $drug->company->name;
        })
        ->editColumn('strata_id', function ($drug) {
            return $drug->strata->name;
        })
        ->editColumn('package_id', function ($drug) {
            return $drug->package->name;
        })
        ->editColumn('route_id', function ($drug) {
            return $drug->route->name;
        })
        ->editColumn('country_id', function ($drug) {
            return $drug->country->name;
        })
        ->editColumn('laboratory_id', function ($drug) {
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
            [
                'data' => 'package_id',
                'title' => 'package name',
                'searchable' => false,
            ],
            'b_g',
            'ingredients',
            [
                'data' => 'drug_dosage_id',
                'title' => 'drug dosage name',
                'searchable' => false,
            ],
            [
                'data' => 'company_id',
                'title' => 'company name',
                'searchable' => false,
            ],
            [
                'data' => 'currency_id',
                'title' => 'currency name',
                'searchable' => false,
            ],
            [
                'data' => 'strata_id',
                'title' => 'strata name',
                'searchable' => false,
            ],
            [
                'data' => 'package_id',
                'title' => 'package name',
                'searchable' => false,
            ],
            [
                'data' => 'route_id',
                'title' => 'route name',
                'searchable' => false,
            ],
            [
                'data' => 'country_id',
                'title' => 'country name',
                'searchable' => false,
            ],
            [
                'data' => 'laboratory_id',
                'title' => 'laboratory name',
                'searchable' => false,
            ],
            'price'
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
        return 'DrugsView_' . date('YmdHis');
    }
}

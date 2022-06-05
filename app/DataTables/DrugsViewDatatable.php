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
        ->addColumn('percentage', function ($drug) {
            return (($drug->price/$drug->selling_price)*100).'%';
        })
        ->orderColumn('percentage', function ($query) {

            $query->orderBy('price', 'desc');

         })
         ->addColumn('supplier_reg_no', function ($drug) {
            return $drug->laboratory->regNo;
        })
        ->addColumn('supplier_status', function ($drug) {
            return $drug->laboratory->status;
        });
            // ->addColumn('action', 'drugs.datatables_actions')
            // ->rawColumns(['action']);;

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DrugsViewDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Drug $model)
    {
        $query= $model->newQuery()->where('laboratory_id','!=',null);
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
                    ->addAction(['scrollY' => true,'width' => '80px', 'printable' => false, 'responsivePriority' => '100'])
                    // ->parameters(['scrollY' => true])
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        // Button::make('create'),
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
            [
                'data' => 'atc',
                'title' => 'U-code',
                'searchable' => false,
            ],
            [
                'data' => 'code',
                'title' => 'S-code',
                'searchable' => false,
            ],
            [
                'data' => 'strata_id',
                'title' => 'Specialty',
                'searchable' => false,
            ],
            [
                'data' => 'laboratory_id',
                'title' => 'Supplier',
                'searchable' => false,
            ],
            [
                'data' => 'country_id',
                'title' => 'Country',
                'searchable' => false,
            ],
            [
                'data' => 'name',
                'title' => 'Brand name',
                'searchable' => false,
            ],
            'ingredients',
            [
                'data' => 'drug_dosage_id',
                'title' => 'Dosage',
                'searchable' => false,
            ],
            [
                'data' => 'route_id',
                'title' => 'Form',
                'searchable' => false,
            ],
            [
                'data' => 'package_id',
                'title' => 'Pack size',
                'searchable' => false,
            ],
            [
                'data' => 'b_g',
                'title' => 'Shelf life',
                'searchable' => false,
            ],
            [
                'data' => 'company_id',
                'title' => 'Agent',
                'searchable' => false,
            ],
            [
                'data' => 'currency_id',
                'title' => 'Currency',
                'searchable' => false,
            ],
            [
                'data' => 'selling_price',
                'title' => 'Selling price',
                'searchable' => false,
            ],
            [
                'data' => 'price',
                'title' => 'Purchase price',
                'searchable' => false,
            ],

            [
                'data' => 'percentage',
                'title' => 'margin%',
                'searchable' => false,
            ],
            [
                'data' => 'supplier_status',
                'title' => 'Supplier status',
                'searchable' => false,
            ],
            [
                'data' => 'supplier_reg_no',
                'title' => 'Supplier Reg No',
                'searchable' => false,
            ],
            // 'action'
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

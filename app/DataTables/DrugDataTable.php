<?php

namespace App\DataTables;

use App\Models\Drug;
use App\Models\Currency;
use Yajra\DataTables\EloquentDataTable;
use App\Repositories\CurrencyRepository;
use Yajra\DataTables\Services\DataTable;
use Barryvdh\DomPDF\Facade as PDF;

class DrugDataTable extends DataTable
{
    /** @var CurrencyRepository $currencyRepository*/
    private $currencyRepository;
    public function __construct(CurrencyRepository $currencyRepo)
    {
        $this->currencyRepository = $currencyRepo;
    }
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
            return $drug->ingredients;
        })
        ->editColumn('package_id', function ($drug) {
            return $drug->package->name;
        })
        ->editColumn('drug_dosage_id', function ($drug) {
            return $drug->drugDosage->name;
        })
        ->editColumn('currency_id', function ($drug) {
            $x=$this->getCurrencyPrice($drug);;
            return "<a href='#' id='price_list' data-toggle='modal'  data-target='#exampleModalCenter' data-x='$x'>".$drug->currency->name."</a>";
        })
        ->editColumn('company_id', function ($drug) {
            return $drug->company->name;
        })
        ->editColumn('laboratory_id', function ($drug) {
            return $drug->laboratory->name;
        })
        ->addColumn('supplier_reg_no', function ($drug) {
            return $drug->laboratory->regNo;
        })

        ->editColumn('country_id', function ($drug) {
            return $drug->country->name;
        })
        ->addColumn('supplier_status', function ($drug) {
            return $drug->laboratory->status;
        })
        ->editColumn('route_id', function ($drug) {
            return $drug->route->name;
        })
        ->addColumn('percentage', function ($drug) {
            return ((($drug->price*$drug->currency->price)/$drug->selling_price)*100).'%';
        })
        ->addColumn('purchase_ly', function ($drug) {
            return $drug->price*$drug->currency->price;
        })
        ->orderColumn('percentage', function ($query) {

            $query->orderBy('price', 'desc');

         })
         ->setRowClass('{{ $drug->id % 2 == 0 ? "alert-success" : "alert-warning" }}')
        ->addColumn('action', 'drugs.datatables_actions')
        ->rawColumns(['action', 'ingredients','drug_dosage_id','currency_id','company_id']);;
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
        if (request()->filled('code')) {
            $query->where('code',  request('code'));
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
        if (request()->filled('currency_id')) {
            $query->whereHas('currency', function($q){
                $q->where('id',request('currency_id'));
            });
        }
        if (request()->filled('drug_dosage_id')) {
            $query->whereHas('drugDosage', function($q){
                $q->where('id',  request('drug_dosage_id'));
            });
        }
        if (request()->filled('package_id')) {
            $query->whereHas('package', function($q){
                $q->where('id',  request('package_id'));
            });
        }
        if (request()->filled('laboratory_id')) {
            $query->whereHas('laboratory', function($q){
                $q->where('id',  request('laboratory_id'));
            });
        }
        if (request()->filled('route_id')) {
            $query->whereHas('route', function($q){
                $q->where('id',  request('route_id'));
            });
        }
        return $query
        ->orderByDesc('id')->with('package','drugDosage','currency','company');
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
                'data' => 'price',
                'title' => 'Purchase price INC',
                'searchable' => false,
            ],
            [
                'data' => 'purchase_ly',
                'title' => 'Purchase LY',
                'searchable' => false,
            ],
            [
                'data' => 'selling_price',
                'title' => 'Selling price LY',
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
        return 'drugs_datatable_' . time();
    }
    public function getCurrencyPrice($drug)
    {
        $li="";
        $defaultCurrency=Currency::where('default',1)->first();
        $currencies=$this->currencyRepository->all();
       foreach ($currencies as $currency) {
           if ($currency->name==$drug->currency->name) {
            $li=$li.'<li class="list-group-item">'.$currency->name.' :'.$drug->price.'</li>';
           }else {
            $li=$li.'<li class="list-group-item">'.$currency->name.' :'.(($drug->currency->price * $drug->price)/$currency->price).'</li>';
           }
       }
       return $li;
    }
}

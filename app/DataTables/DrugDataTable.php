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
        ->editColumn('atc', function ($drug) {
            return "<a href='".route('drugs.show', $drug->id) ."'>".$drug->atc."</a>";
        })
        ->editColumn('company_id', function ($drug) {
            return "<a href='".route('drugs.show', $drug->id) ."'>".$drug->company->name."</a>";
        })

        ->editColumn('country_id', function ($drug) {
            return "<a href='".route('drugs.show', $drug->id) ."'>".$drug->country->name."</a>";

        })
        ->editColumn('laboratory_id', function ($drug) {
            if($drug->laboratory){
                return "<a href='".route('drugs.show', $drug->id) ."'>".$drug->laboratory->name."</a>";
            }
        })
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

        ->addColumn('supplier_reg_no', function ($drug) {
            return $drug->laboratory?$drug->laboratory->regNo:'';
        })
        ->addColumn('supplier_status', function ($drug) {
            return $drug->laboratory?$drug->laboratory->status:'';
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
        ->addColumn('action', 'drugs.datatables_actions')
        ->rawColumns(['action','country_id','laboratory_id','atc','ingredients','drug_dosage_id','currency_id','company_id']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Drug $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Drug $model)
    {

        $query=$model->newQuery()->where('laboratory_id',null);


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
                'data' => 'atc',
                'title' => trans('health.U_Code'),
                'searchable' => false,
            ],
            [
                'data' => 'code',
                'title' => trans('health.S_Code'),
                'searchable' => false,
            ],
            [
                'data' => 'strata_id',
                'title' => trans('health.Specialty'),
                'searchable' => false,
            ],
            [
                'data' => 'laboratory_id',
                'title' => trans('health.Supplier'),
                'searchable' => false,
            ],
            [
                'data' => 'country_id',
                'title' => trans('health.Country'),
                'searchable' => false,
            ],
            [
                'data' => 'name',
                'title' => trans('health.Brand_Name'),
                'searchable' => false,
            ],
            [
                'data' => 'ingredients',
                'title' => trans('health.Ingredients'),
                'searchable' => false,
            ],
            [
                'data' => 'drug_dosage_id',
                'title' => trans('health.Dosage'),
                'searchable' => false,
            ],
            [
                'data' => 'route_id',
                'title' =>  trans('health.Form'),
                'searchable' => false,
            ],
            [
                'data' => 'package_id',
                'title' => trans('health.Pack_size'),
                'searchable' => false,
            ],
            [
                'data' => 'b_g',
                'title' => trans('health.Shelf_life'),
                'searchable' => false,
            ],
            [
                'data' => 'company_id',
                'title' => trans('health.Agent'),
                'searchable' => false,
            ],
            [
                'data' => 'currency_id',
                'title' => trans('health.Currency'),
                'searchable' => false,
            ],
            [
                'data' => 'price',
                'title' => trans('health.Purchase_price_INC'),
                'searchable' => false,
            ],
            [
                'data' => 'purchase_ly',
                'title' => trans('health.Purchase_LY'),
                'searchable' => false,
            ],
            [
                'data' => 'selling_price',
                'title' => trans('health.Selling_price_LY'),
                'searchable' => false,
            ],


            [
                'data' => 'percentage',
                'title' => trans('health.margin'),
                'searchable' => false,
            ],
            [
                'data' => 'supplier_status',
                'title' => trans('health.Supplier_status'),
                'searchable' => false,
            ],
            [
                'data' => 'supplier_reg_no',
                'title' => trans('health.Supplier_Reg_No'),
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

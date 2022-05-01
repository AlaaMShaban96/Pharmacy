<?php

namespace App\DataTables;

use App\Models\Drug;
use App\Models\Currency;
use Yajra\DataTables\EloquentDataTable;
use App\Repositories\CurrencyRepository;
use Yajra\DataTables\Services\DataTable;

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
            return $drug->getAbbreviatedIngredientsAttribute();
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

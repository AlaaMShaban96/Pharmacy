<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Drug;
use App\Http\Requests;
use App\Models\Company;
use App\Models\Package;
use App\Models\Currency;
use App\Models\DrugDosage;
use App\DataTables\DrugDataTable;
use App\Repositories\DrugRepository;
use App\Repositories\RouteRepository;
use App\DataTables\DrugsViewDatatable;
use App\Repositories\CompanyRepository;
use App\Repositories\CountryRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\PackageRepository;
use App\Repositories\StratumRepository;
use App\Http\Requests\CreateDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Repositories\CurrencyRepository;
use App\Repositories\DrugDosageRepository;
use App\Repositories\LaboratoryRepository;
use App\Http\Controllers\AppBaseController;

class DrugController extends AppBaseController
{
    /** @var DrugRepository $drugRepository*/
    private $drugRepository;
    /** @var DrugDosageRepository $drugDosageRepository*/
    private $drugDosageRepository;
    /** @var CurrencyRepository $currencyRepository*/
    private $currencyRepository;
    /** @var PackageRepository $currencyRepository*/
    private $packageRepository;
    /** @var StratumRepository $stratumRepository*/
    private $stratumRepository;
    /** @var RouteRepository $routeRepository*/
    private $routeRepository;
    /** @var CompanyRepository $companyRepository*/
    private $companyRepository;
    /** @var CountryRepository $countryRepository*/
    private $countryRepository;
    /** @var LaboratoryRepository $laboratoryRepository*/
    private $laboratoryRepository;
/** @var InvoiceRepository $invoiceRepository*/
    private $invoiceRepository;
    public function __construct(InvoiceRepository $invoiceRepo,LaboratoryRepository $laboratoryRepo,CountryRepository $countryRepo,CompanyRepository $companyRepo,RouteRepository $routeRepo,StratumRepository $stratumRepo,PackageRepository $packageRepo,CurrencyRepository $currencyRepo,DrugRepository $drugRepo,DrugDosageRepository $drugDosageRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
        $this->laboratoryRepository = $laboratoryRepo;
        $this->countryRepository = $countryRepo;
        $this->companyRepository = $companyRepo;
        $this->routeRepository = $routeRepo;
        $this->stratumRepository = $stratumRepo;
        $this->currencyRepository = $currencyRepo;
        $this->drugRepository = $drugRepo;
        $this->drugDosageRepository = $drugDosageRepo;
        $this->packageRepository = $packageRepo;


    }

    /**
     * Display a listing of the Drug.
     *
     * @param DrugDataTable $drugDataTable
     *
     * @return Response
     */
    public function index(DrugDataTable $drugDataTable)
    {
        $companies=$this->drugRepository->all();
        $drugDosages=$this->drugDosageRepository->all();
        $currencies=$this->currencyRepository->all();
        $packages=$this->packageRepository->all();
        $laboratories=$this->laboratoryRepository->all();
        return $drugDataTable->render('drugs.index',compact('laboratories','companies','drugDosages','currencies','packages'));
    }

    /**
     * Show the form for creating a new Drug.
     *
     * @return Response
     */
    public function create()
    {

        $companies=$this->companyRepository->where('type','pharmacy')->pluck('name','id');
        $drugDosages=$this->drugDosageRepository->pluck('name','id');
        $currencies=$this->currencyRepository->pluck('name','id');
        $packages=$this->packageRepository->pluck('name','id');
        $routes=$this->routeRepository->pluck('name','id');
        $stratums=$this->stratumRepository->pluck('name','id');
        $countries=$this->countryRepository->pluck('name','id');
        $laboratories=$this->laboratoryRepository->pluck('name','id');


        return view('drugs.create',compact('companies','drugDosages','currencies','packages','routes','stratums','countries','laboratories'));
    }

    /**
     * Store a newly created Drug in storage.
     *
     * @param CreateDrugRequest $request
     *
     * @return Response
     */
    public function store(CreateDrugRequest $request)
    {
        $input = $request->all();
        $drug = $this->drugRepository->create($input);
        $this->invoiceRepository->create([
            'drug_id'=>$drug->id,
            'company_id'=>$drug->company_id,
            'currency_id'=>$drug->currency_id,
            'price'=>$drug->price,
            'user_id'=>auth()->user()->id,
            'type'=>'drug'
        ]);
        Flash::success('Drug saved successfully.');

        return redirect(route('drugs.index'));
    }

    /**
     * Display the specified Drug.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(DrugsViewDatatable $drugDataTable,$id)
    {
        $drug = $this->drugRepository->find($id);
        $companies=$this->companyRepository->where('type','pharmacy')->pluck('name','id');
        $drugDosages=$this->drugDosageRepository->pluck('name','id');
        $currencies=$this->currencyRepository->pluck('name','id');
        $packages=$this->packageRepository->pluck('name','id');
        $routes=$this->routeRepository->pluck('name','id');
        $stratums=$this->stratumRepository->pluck('name','id');
        $countries=$this->countryRepository->pluck('name','id');
        $laboratories=$this->laboratoryRepository->pluck('name','id');
        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }
        return $drugDataTable->with('drug',$drug)->render('drugs.show',compact('drug','companies','drugDosages','currencies','packages','routes','stratums','countries','laboratories'));

        return view('drugs.show')->with('drug', $drug);
    }

    /**
     * Show the form for editing the specified Drug.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Drug $drug)
    {
        $companies=$this->companyRepository->where('type','pharmacy')->pluck('name','id');
        $drugDosages=$this->drugDosageRepository->pluck('name','id');
        $currencies=$this->currencyRepository->pluck('name','id');
        $packages=$this->packageRepository->pluck('name','id');
        $routes=$this->routeRepository->pluck('name','id');
        $stratums=$this->stratumRepository->pluck('name','id');
        $countries=$this->countryRepository->pluck('name','id');
        $laboratories=$this->laboratoryRepository->pluck('name','id');
        $invoices=$this->invoiceRepository->where('drug_id',$drug->id)->where('type','drug')->get();
        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }

        return view('drugs.edit',compact('invoices','drug','companies','drugDosages','currencies','packages','routes','stratums','countries','laboratories'))->with('drug', $drug);
    }

    /**
     * Update the specified Drug in storage.
     *
     * @param int $id
     * @param UpdateDrugRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDrugRequest $request)
    {
        $drug = $this->drugRepository->find($id);

        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }

        $drug = $this->drugRepository->update($request->all(), $id);
        $this->invoiceRepository->create([
            'drug_id'=>$drug->id,
            'company_id'=>$drug->company_id,
            'currency_id'=>$drug->currency_id,
            'price'=>$drug->price,
            'user_id'=>auth()->user()->id,
            'type'=>'drug'
        ]);
        Flash::success('Drug updated successfully.');

        return redirect(route('drugs.index'));
    }

    /**
     * Remove the specified Drug from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drug = $this->drugRepository->find($id);

        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }

        $this->drugRepository->delete($id);

        Flash::success('Drug deleted successfully.');

        return redirect(route('drugs.index'));
    }
}

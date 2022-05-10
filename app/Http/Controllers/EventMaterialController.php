<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Repositories\CompanyRepository;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use App\Repositories\CurrencyRepository;
use App\DataTables\EventMaterialDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventMaterialRepository;
use App\Http\Requests\CreateEventMaterialRequest;
use App\Http\Requests\UpdateEventMaterialRequest;

class EventMaterialController extends AppBaseController
{
    /** @var EventMaterialRepository $eventMaterialRepository*/
    private $eventMaterialRepository;
    /** @var InvoiceRepository $invoiceRepository*/
    private $invoiceRepository;
    /** @var CurrencyRepository $currencyRepository*/
    private $currencyRepository;
    /** @var CompanyRepository $companyRepository*/
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepo,CurrencyRepository $currencyRepo,InvoiceRepository $invoiceRepo,EventMaterialRepository $eventMaterialRepo)
    {
        $this->companyRepository = $companyRepo;
        $this->currencyRepository = $currencyRepo;
        $this->invoiceRepository = $invoiceRepo;
        $this->eventMaterialRepository = $eventMaterialRepo;
    }

    /**
     * Display a listing of the EventMaterial.
     *
     * @param EventMaterialDataTable $eventMaterialDataTable
     *
     * @return Response
     */
    public function index(EventMaterialDataTable $eventMaterialDataTable)
    {
        return $eventMaterialDataTable->render('event_materials.index');
    }

    /**
     * Show the form for creating a new EventMaterial.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_materials.create');
    }

    /**
     * Store a newly created EventMaterial in storage.
     *
     * @param CreateEventMaterialRequest $request
     *
     * @return Response
     */
    public function store(CreateEventMaterialRequest $request)
    {
        $input = $request->all();

        $eventMaterial = $this->eventMaterialRepository->create($input);

        Flash::success('Event Material saved successfully.');

        return redirect(route('eventMaterials.index'));
    }

    /**
     * Display the specified EventMaterial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);
        $currencies=$this->currencyRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','event')->pluck('name','id');

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        return view('event_materials.show',compact('currencies','companies'))->with('eventMaterial', $eventMaterial);
    }

    /**
     * Show the form for editing the specified EventMaterial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        return view('event_materials.edit')->with('eventMaterial', $eventMaterial);
    }

    /**
     * Update the specified EventMaterial in storage.
     *
     * @param int $id
     * @param UpdateEventMaterialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventMaterialRequest $request)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        $eventMaterial = $this->eventMaterialRepository->update($request->all(), $id);

        Flash::success('Event Material updated successfully.');

        return redirect(route('eventMaterials.index'));
    }

    /**
     * Remove the specified EventMaterial from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        $this->eventMaterialRepository->delete($id);

        Flash::success('Event Material deleted successfully.');

        return redirect(route('eventMaterials.index'));
    }
    public function addInvoices(Request $request)
    {
        $eventMaterial = $this->eventMaterialRepository->find($request->event_material_id);
        try {
            DB::beginTransaction();
            $data=$request->all();
            $data['user_id']=auth()->user()->id;
            $invoice=$this->invoiceRepository->create($data);
            $eventMaterial->price=$invoice->currency->price*$invoice->price;
            $eventMaterial->count+=$invoice->count;
            $eventMaterial->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($eventMaterial->invoices()->with('company')->with('currency')->get()->toArray(), 200);
    }
    public function removeInvoices(Request $request)
    {
        $eventMaterial = $this->eventMaterialRepository->find($request->event_material_id);
        try {
            DB::beginTransaction();
            $this->invoiceRepository->delete($request->invoice_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($eventMaterial->invoices()->with('company')->with('currency')->get()->toArray(), 200);
    }
}

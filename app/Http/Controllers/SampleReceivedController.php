<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Repositories\DrugRepository;
use App\Repositories\StoreRepository;
use App\Repositories\CompanyRepository;
use App\DataTables\SampleReceivedDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SampleReceivedRepository;
use App\Http\Requests\CreateSampleReceivedRequest;
use App\Http\Requests\UpdateSampleReceivedRequest;

class SampleReceivedController extends AppBaseController
{
    /** @var SampleReceivedRepository $sampleReceivedRepository*/
    private $sampleReceivedRepository;
    /** @var StoreRepository $storeRepository*/
    private $storeRepository;
    /** @var DrugRepository $drugRepository*/
    private $drugRepository;
    /** @var CompanyRepository $companyRepository*/
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepo,DrugRepository $drugRepo,StoreRepository $storeRepo,SampleReceivedRepository $sampleReceivedRepo)
    {
        $this->companyRepository = $companyRepo;
        $this->drugRepository = $drugRepo;
        $this->storeRepository = $storeRepo;
        $this->sampleReceivedRepository = $sampleReceivedRepo;
    }

    /**
     * Display a listing of the SampleReceived.
     *
     * @param SampleReceivedDataTable $sampleReceivedDataTable
     *
     * @return Response
     */
    public function index(SampleReceivedDataTable $sampleReceivedDataTable)
    {
        return $sampleReceivedDataTable->render('sample_receiveds.index');
    }

    /**
     * Show the form for creating a new SampleReceived.
     *
     * @return Response
     */
    public function create()
    {
        $stores= $this->storeRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','pharmacy')->pluck('name','id');
        $drugs=$this->drugRepository->all();
        $drugscodes=$drugs->pluck('code','code');
        return view('sample_receiveds.create',compact('stores','drugs','drugscodes','companies'));
    }

    /**
     * Store a newly created SampleReceived in storage.
     *
     * @param CreateSampleReceivedRequest $request
     *
     * @return Response
     */
    public function store(CreateSampleReceivedRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $sampleReceived = $this->sampleReceivedRepository->create($input);

        Flash::success('Sample Received saved successfully.');

        return redirect(route('sampleReceiveds.index'));
    }

    /**
     * Display the specified SampleReceived.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($code)
    {
        $sampleReceiveds = $this->sampleReceivedRepository->where('code',$code)->get();
        if (empty($sampleReceiveds)) {
            Flash::error('Sample Received not found');

            return redirect(route('sampleReceiveds.index'));
        }

        return view('sample_receiveds.show')->with('sampleReceiveds', $sampleReceiveds);
    }

    /**
     * Show the form for editing the specified SampleReceived.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sampleReceived = $this->sampleReceivedRepository->find($id);
        $stores= $this->storeRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','pharmacy')->pluck('name','id');
        $drugs=$this->drugRepository->all();
        $drugscodes=$drugs->pluck('code','code');
        if (empty($sampleReceived)) {
            Flash::error('Sample Received not found');

            return redirect(route('sampleReceiveds.index'));
        }

        return view('sample_receiveds.edit',compact('stores','drugs','drugscodes','companies'))->with('sampleReceived', $sampleReceived);
    }

    /**
     * Update the specified SampleReceived in storage.
     *
     * @param int $id
     * @param UpdateSampleReceivedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSampleReceivedRequest $request)
    {
        $sampleReceived = $this->sampleReceivedRepository->find($id);

        if (empty($sampleReceived)) {
            Flash::error('Sample Received not found');

            return redirect(route('sampleReceiveds.show',$sampleReceived->code));
        }

        $sampleReceived = $this->sampleReceivedRepository->update($request->all(), $id);

        Flash::success('Sample Received updated successfully.');

        return redirect(route('sampleReceiveds.show',$sampleReceived->code));
    }

    /**
     * Remove the specified SampleReceived from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sampleReceived = $this->sampleReceivedRepository->find($id);

        if (empty($sampleReceived)) {
            Flash::error('Sample Received not found');

            return redirect(route('sampleReceiveds.index'));
        }

        $this->sampleReceivedRepository->delete($id);

        Flash::success('Sample Received deleted successfully.');

        return redirect(route('sampleReceiveds.index'));
    }
}

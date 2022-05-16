<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\ReceiveDataTable;
use App\Repositories\StoreRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\ReceiveRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateReceiveRequest;
use App\Http\Requests\UpdateReceiveRequest;

class ReceiveController extends AppBaseController
{
    /** @var ReceiveRepository $receiveRepository*/
    private $receiveRepository;
    /** @var CompanyRepository $companyRepository*/
    private $companyRepository;
    /** @var StoreRepository $storeRepository*/
    private $storeRepository;
    public function __construct(StoreRepository $storeRepo,CompanyRepository $companyRepo,ReceiveRepository $receiveRepo)
    {
        $this->storeRepository = $storeRepo;
        $this->companyRepository = $companyRepo;
        $this->receiveRepository = $receiveRepo;
    }

    /**
     * Display a listing of the Receive.
     *
     * @param ReceiveDataTable $receiveDataTable
     *
     * @return Response
     */
    public function index(ReceiveDataTable $receiveDataTable)
    {
        return $receiveDataTable->render('receives.index');
    }

    /**
     * Show the form for creating a new Receive.
     *
     * @return Response
     */
    public function create()
    {
        $stores=$this->storeRepository->pluck('name','id');
        $all_companies=$this->companyRepository->where('type','store')->get();

        $companies=$all_companies->pluck('name','id');
        return view('receives.create',compact('all_companies','companies','stores'));
    }

    /**
     * Store a newly created Receive in storage.
     *
     * @param CreateReceiveRequest $request
     *
     * @return Response
     */
    public function store(CreateReceiveRequest $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        $receive = $this->receiveRepository->create($input);

        Flash::success('Receive saved successfully.');

        return redirect(route('receives.index'));
    }

    /**
     * Display the specified Receive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $receive = $this->receiveRepository->find($id);

        if (empty($receive)) {
            Flash::error('Receive not found');

            return redirect(route('receives.index'));
        }

        return view('receives.show')->with('receive', $receive);
    }

    /**
     * Show the form for editing the specified Receive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receive = $this->receiveRepository->find($id);
        $stores=$this->storeRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','store')->pluck('name','id');
        if (empty($receive)) {
            Flash::error('Receive not found');

            return redirect(route('receives.index'));
        }

        return view('receives.edit',compact('companies','stores'))->with('receive', $receive);
    }

    /**
     * Update the specified Receive in storage.
     *
     * @param int $id
     * @param UpdateReceiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceiveRequest $request)
    {
        $receive = $this->receiveRepository->find($id);

        if (empty($receive)) {
            Flash::error('Receive not found');

            return redirect(route('receives.index'));
        }

        $receive = $this->receiveRepository->update($request->all(), $id);

        Flash::success('Receive updated successfully.');

        return redirect(route('receives.index'));
    }

    /**
     * Remove the specified Receive from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $receive = $this->receiveRepository->find($id);

        if (empty($receive)) {
            Flash::error('Receive not found');

            return redirect(route('receives.index'));
        }

        $this->receiveRepository->delete($id);

        Flash::success('Receive deleted successfully.');

        return redirect(route('receives.index'));
    }
}

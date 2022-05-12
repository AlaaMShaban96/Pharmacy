<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\Repositories\UserRepository;
use App\Repositories\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use App\DataTables\FinancialCovenantDataTable;
use App\Repositories\FinancialCovenantRepository;
use App\Http\Requests\CreateFinancialCovenantRequest;
use App\Http\Requests\UpdateFinancialCovenantRequest;
use App\Repositories\FinancialCovenantTypeRepository;

class FinancialCovenantController extends AppBaseController
{
    /** @var FinancialCovenantRepository $financialCovenantRepository*/
    private $financialCovenantRepository;
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;
    /** @var FinancialCovenantTypeRepository $financialCovenantTypeRepository*/
    private $financialCovenantTypeRepository;
    /** @var UserRepository $userRepository*/
    private $userRepository;
    public function __construct(UserRepository $userRepo,FinancialCovenantTypeRepository $financialCovenantTypeRepo,DepartmentRepository $departmentRepo,FinancialCovenantRepository $financialCovenantRepo)
    {
        $this->userRepository = $userRepo;
        $this->financialCovenantTypeRepository = $financialCovenantTypeRepo;
        $this->departmentRepository = $departmentRepo;
        $this->financialCovenantRepository = $financialCovenantRepo;
    }

    /**
     * Display a listing of the FinancialCovenant.
     *
     * @param FinancialCovenantDataTable $financialCovenantDataTable
     *
     * @return Response
     */
    public function index(FinancialCovenantDataTable $financialCovenantDataTable)
    {
        return $financialCovenantDataTable->render('financial_covenants.index');
    }

    /**
     * Show the form for creating a new FinancialCovenant.
     *
     * @return Response
     */
    public function create()
    {
        $financialCovenantTypes=$this->financialCovenantTypeRepository->pluck('name','id');
        $departments=$this->departmentRepository->pluck('name','id');
        $users=$this->userRepository->pluck('name','id');

        return view('financial_covenants.create',compact('users','financialCovenantTypes','departments'));
    }

    /**
     * Store a newly created FinancialCovenant in storage.
     *
     * @param CreateFinancialCovenantRequest $request
     *
     * @return Response
     */
    public function store(CreateFinancialCovenantRequest $request)
    {
        $input = $request->all();

        $financialCovenant = $this->financialCovenantRepository->create($input);

        Flash::success('Financial Covenant saved successfully.');

        return redirect(route('financialCovenants.index'));
    }

    /**
     * Display the specified FinancialCovenant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $financialCovenant = $this->financialCovenantRepository->find($id);

        if (empty($financialCovenant)) {
            Flash::error('Financial Covenant not found');

            return redirect(route('financialCovenants.index'));
        }

        return view('financial_covenants.show')->with('financialCovenant', $financialCovenant);
    }

    /**
     * Show the form for editing the specified FinancialCovenant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $financialCovenant = $this->financialCovenantRepository->find($id);
                $financialCovenantTypes=$this->financialCovenantTypeRepository->pluck('name','id');
        $departments=$this->departmentRepository->pluck('name','id');
        if (empty($financialCovenant)) {
            Flash::error('Financial Covenant not found');

            return redirect(route('financialCovenants.index'));
        }

        return view('financial_covenants.edit',compact('financialCovenantTypes','departments'))->with('financialCovenant', $financialCovenant);
    }

    /**
     * Update the specified FinancialCovenant in storage.
     *
     * @param int $id
     * @param UpdateFinancialCovenantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancialCovenantRequest $request)
    {
        $financialCovenant = $this->financialCovenantRepository->find($id);

        if (empty($financialCovenant)) {
            Flash::error('Financial Covenant not found');

            return redirect(route('financialCovenants.index'));
        }

        $financialCovenant = $this->financialCovenantRepository->update($request->all(), $id);

        Flash::success('Financial Covenant updated successfully.');

        return redirect(route('financialCovenants.index'));
    }

    /**
     * Remove the specified FinancialCovenant from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $financialCovenant = $this->financialCovenantRepository->find($id);

        if (empty($financialCovenant)) {
            Flash::error('Financial Covenant not found');

            return redirect(route('financialCovenants.index'));
        }

        $this->financialCovenantRepository->delete($id);

        Flash::success('Financial Covenant deleted successfully.');

        return redirect(route('financialCovenants.index'));
    }
}

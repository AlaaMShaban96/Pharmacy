<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\DepartmentRepository;
use App\Http\Controllers\AppBaseController;
use App\DataTables\FinancialCovenantTypeDataTable;
use App\Repositories\FinancialCovenantTypeRepository;
use App\Http\Requests\CreateFinancialCovenantTypeRequest;
use App\Http\Requests\UpdateFinancialCovenantTypeRequest;

class FinancialCovenantTypeController extends AppBaseController
{
    /** @var FinancialCovenantTypeRepository $financialCovenantTypeRepository*/
    private $financialCovenantTypeRepository;
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepo,FinancialCovenantTypeRepository $financialCovenantTypeRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->financialCovenantTypeRepository = $financialCovenantTypeRepo;
    }

    /**
     * Display a listing of the FinancialCovenantType.
     *
     * @param FinancialCovenantTypeDataTable $financialCovenantTypeDataTable
     *
     * @return Response
     */
    public function index(FinancialCovenantTypeDataTable $financialCovenantTypeDataTable)
    {
        return $financialCovenantTypeDataTable->render('financial_covenant_types.index');
    }

    /**
     * Show the form for creating a new FinancialCovenantType.
     *
     * @return Response
     */
    public function create()
    {
        $departments=$this->departmentRepository->pluck('name','id');
        return view('financial_covenant_types.create',compact('departments'));
    }

    /**
     * Store a newly created FinancialCovenantType in storage.
     *
     * @param CreateFinancialCovenantTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateFinancialCovenantTypeRequest $request)
    {
        $input = $request->all();

        $financialCovenantType = $this->financialCovenantTypeRepository->create($input);

        Flash::success('Financial Covenant Type saved successfully.');

        return redirect(route('financialCovenantTypes.index'));
    }

    /**
     * Display the specified FinancialCovenantType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $financialCovenantType = $this->financialCovenantTypeRepository->find($id);

        if (empty($financialCovenantType)) {
            Flash::error('Financial Covenant Type not found');

            return redirect(route('financialCovenantTypes.index'));
        }

        return view('financial_covenant_types.show')->with('financialCovenantType', $financialCovenantType);
    }

    /**
     * Show the form for editing the specified FinancialCovenantType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $financialCovenantType = $this->financialCovenantTypeRepository->find($id);
        $departments=$this->departmentRepository->pluck('name','id');
        if (empty($financialCovenantType)) {
            Flash::error('Financial Covenant Type not found');

            return redirect(route('financialCovenantTypes.index'));
        }

        return view('financial_covenant_types.edit',compact('departments'))->with('financialCovenantType', $financialCovenantType);
    }

    /**
     * Update the specified FinancialCovenantType in storage.
     *
     * @param int $id
     * @param UpdateFinancialCovenantTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancialCovenantTypeRequest $request)
    {
        $financialCovenantType = $this->financialCovenantTypeRepository->find($id);

        if (empty($financialCovenantType)) {
            Flash::error('Financial Covenant Type not found');

            return redirect(route('financialCovenantTypes.index'));
        }

        $financialCovenantType = $this->financialCovenantTypeRepository->update($request->all(), $id);

        Flash::success('Financial Covenant Type updated successfully.');

        return redirect(route('financialCovenantTypes.index'));
    }

    /**
     * Remove the specified FinancialCovenantType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $financialCovenantType = $this->financialCovenantTypeRepository->find($id);

        if (empty($financialCovenantType)) {
            Flash::error('Financial Covenant Type not found');

            return redirect(route('financialCovenantTypes.index'));
        }

        $this->financialCovenantTypeRepository->delete($id);

        Flash::success('Financial Covenant Type deleted successfully.');

        return redirect(route('financialCovenantTypes.index'));
    }


     /**
     * Store a newly created FinancialCovenantType in storage.
     *
     * @param CreateFinancialCovenantTypeRequest $request
     *
     * @return Response
     */
    public function addFinancialCovenantTypes(Request $request)
    {
        $department =$this->departmentRepository->find($request->department_id);
        try {
            DB::beginTransaction();
            $input = $request->all();
            $this->financialCovenantTypeRepository->create($input);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($department->financialCovenantTypes->toArray(), 200);
    }
    /**
     * Remove the specified FinancialCovenantType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function removeFinancialCovenantTypes(Request $request)
    {
        $department =$this->departmentRepository->find($request->department_id);
        try {
            DB::beginTransaction();
            $this->financialCovenantTypeRepository->delete($request->financial_covenant_type_id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        $data=empty($department->materials)?[]:$department->materials->toArray();
        return response()->json($data, 200);
    }
}

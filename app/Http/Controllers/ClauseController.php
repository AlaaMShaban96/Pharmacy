<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\ClauseDataTable;
use App\Repositories\ClauseRepository;
use App\Http\Requests\CreateClauseRequest;
use App\Http\Requests\UpdateClauseRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FinancialCovenantTypeRepository;

class ClauseController extends AppBaseController
{
    /** @var ClauseRepository $clauseRepository*/
    private $clauseRepository;
    /** @var FinancialCovenantTypeRepository $financialCovenantTypeRepository*/
    private $financialCovenantTypeRepository;
    public function __construct(FinancialCovenantTypeRepository $financialCovenantTypeRepo,ClauseRepository $clauseRepo)
    {
        $this->financialCovenantTypeRepository = $financialCovenantTypeRepo;
        $this->clauseRepository = $clauseRepo;
    }

    /**
     * Display a listing of the Clause.
     *
     * @param ClauseDataTable $clauseDataTable
     *
     * @return Response
     */
    public function index(ClauseDataTable $clauseDataTable)
    {
        return $clauseDataTable->render('clauses.index');
    }

    /**
     * Show the form for creating a new Clause.
     *
     * @return Response
     */
    public function create()
    {
        return view('clauses.create');
    }

    /**
     * Store a newly created Clause in storage.
     *
     * @param CreateClauseRequest $request
     *
     * @return Response
     */
    public function store(CreateClauseRequest $request)
    {
        $input = $request->all();

        $clause = $this->clauseRepository->create($input);

        Flash::success('Clause saved successfully.');

        return redirect(route('clauses.index'));
    }

    /**
     * Display the specified Clause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clause = $this->clauseRepository->find($id);

        if (empty($clause)) {
            Flash::error('Clause not found');

            return redirect(route('clauses.index'));
        }

        return view('clauses.show')->with('clause', $clause);
    }

    /**
     * Show the form for editing the specified Clause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clause = $this->clauseRepository->find($id);

        if (empty($clause)) {
            Flash::error('Clause not found');

            return redirect(route('clauses.index'));
        }

        return view('clauses.edit')->with('clause', $clause);
    }

    /**
     * Update the specified Clause in storage.
     *
     * @param int $id
     * @param UpdateClauseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClauseRequest $request)
    {
        $clause = $this->clauseRepository->find($id);

        if (empty($clause)) {
            Flash::error('Clause not found');

            return redirect(route('clauses.index'));
        }

        $clause = $this->clauseRepository->update($request->all(), $id);

        Flash::success('Clause updated successfully.');

        return redirect(route('clauses.index'));
    }

    /**
     * Remove the specified Clause from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clause = $this->clauseRepository->find($id);

        if (empty($clause)) {
            Flash::error('Clause not found');

            return redirect(route('clauses.index'));
        }

        $this->clauseRepository->delete($id);

        Flash::success('Clause deleted successfully.');

        return redirect(route('clauses.index'));
    }
       /**
     * Store a newly created FinancialCovenantType in storage.
     *
     * @param CreateFinancialCovenantTypeRequest $request
     *
     * @return Response
     */
    public function addClause(Request $request)
    {
        $financialCovenantType =$this->financialCovenantTypeRepository->find($request->financial_covenant_type_id);
        try {
            DB::beginTransaction();
            $input = $request->all();
            $this->clauseRepository->create($input);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        $data=empty($financialCovenantType->clauses)?[]:$financialCovenantType->clauses->toArray();
        return response()->json($data, 200);
    }
    /**
     * Remove the specified FinancialCovenantType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function removeClause(Request $request)
    {
        $department =$this->financialCovenantTypeRepository->find($request->financial_covenant_type_id);
        try {
            DB::beginTransaction();
            $this->clauseRepository->delete($request->clause_id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        $data=empty($financialCovenantType->clauses)?[]:$financialCovenantType->clauses->toArray();
        return response()->json($data, 200);
    }
}

<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Company;
use App\Models\DrugDosage;
use Illuminate\Http\Request;
use App\Repositories\DrugRepository;
use App\Repositories\CompanyRepository;
use App\Http\Requests\CreateDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Repositories\DrugDosageRepository;
use App\Http\Controllers\AppBaseController;

class DrugController extends AppBaseController
{
    /** @var DrugRepository $drugRepository*/
    private $drugRepository;
    /** @var CompanyRepository $drugRepository*/
    private $companyRepository;
    /** @var DrugDosageRepository $drugRepository*/
    private $drugDosageRepository;
    public function __construct(DrugRepository $drugRepo,CompanyRepository $companyRepo,DrugDosageRepository $drugDosageRepo)
    {
        $this->drugRepository = $drugRepo;
        $this->companyRepository = $companyRepo;
        $this->drugDosageRepository = $drugDosageRepo;


    }

    /**
     * Display a listing of the Drug.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $drugs = $this->drugRepository->all();

        return view('drugs.index')
            ->with('drugs', $drugs);
    }

    /**
     * Show the form for creating a new Drug.
     *
     * @return Response
     */
    public function create()
    {
        $companies=Company::pluck('name','id');
        $drugDosage=DrugDosage::pluck('name','id');

        return view('drugs.create',compact('companies','drugDosage'));
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
    public function show($id)
    {
        $drug = $this->drugRepository->find($id);

        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }

        return view('drugs.show')->with('drug', $drug);
    }

    /**
     * Show the form for editing the specified Drug.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $drug = $this->drugRepository->find($id);
        $companies=Company::pluck('name','id');
        $drugDosage=DrugDosage::pluck('name','id');
        if (empty($drug)) {
            Flash::error('Drug not found');

            return redirect(route('drugs.index'));
        }

        return view('drugs.edit',compact('companies','drugDosage'))->with('drug', $drug);
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

        Flash::success('Drug updated successfully.');

        return redirect(route('drugs.index'));
    }

    /**
     * Remove the specified Drug from storage.
     *
     * @param int $id
     *
     * @throws \Exception
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

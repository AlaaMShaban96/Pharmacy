<?php

namespace App\Http\Controllers;

use App\DataTables\DrugDosageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDrugDosageRequest;
use App\Http\Requests\UpdateDrugDosageRequest;
use App\Repositories\DrugDosageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DrugDosageController extends AppBaseController
{
    /** @var DrugDosageRepository $drugDosageRepository*/
    private $drugDosageRepository;

    public function __construct(DrugDosageRepository $drugDosageRepo)
    {
        $this->drugDosageRepository = $drugDosageRepo;
    }

    /**
     * Display a listing of the DrugDosage.
     *
     * @param DrugDosageDataTable $drugDosageDataTable
     *
     * @return Response
     */
    public function index(DrugDosageDataTable $drugDosageDataTable)
    {
        return $drugDosageDataTable->render('drug_dosages.index');
    }

    /**
     * Show the form for creating a new DrugDosage.
     *
     * @return Response
     */
    public function create()
    {
        return view('drug_dosages.create');
    }

    /**
     * Store a newly created DrugDosage in storage.
     *
     * @param CreateDrugDosageRequest $request
     *
     * @return Response
     */
    public function store(CreateDrugDosageRequest $request)
    {
        $input = $request->all();

        $drugDosage = $this->drugDosageRepository->create($input);

        Flash::success('Drug Dosage saved successfully.');

        return redirect(route('drugDosages.index'));
    }

    /**
     * Display the specified DrugDosage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $drugDosage = $this->drugDosageRepository->find($id);

        if (empty($drugDosage)) {
            Flash::error('Drug Dosage not found');

            return redirect(route('drugDosages.index'));
        }

        return view('drug_dosages.show')->with('drugDosage', $drugDosage);
    }

    /**
     * Show the form for editing the specified DrugDosage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $drugDosage = $this->drugDosageRepository->find($id);

        if (empty($drugDosage)) {
            Flash::error('Drug Dosage not found');

            return redirect(route('drugDosages.index'));
        }

        return view('drug_dosages.edit')->with('drugDosage', $drugDosage);
    }

    /**
     * Update the specified DrugDosage in storage.
     *
     * @param int $id
     * @param UpdateDrugDosageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDrugDosageRequest $request)
    {
        $drugDosage = $this->drugDosageRepository->find($id);

        if (empty($drugDosage)) {
            Flash::error('Drug Dosage not found');

            return redirect(route('drugDosages.index'));
        }

        $drugDosage = $this->drugDosageRepository->update($request->all(), $id);

        Flash::success('Drug Dosage updated successfully.');

        return redirect(route('drugDosages.index'));
    }

    /**
     * Remove the specified DrugDosage from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drugDosage = $this->drugDosageRepository->find($id);

        if (empty($drugDosage)) {
            Flash::error('Drug Dosage not found');

            return redirect(route('drugDosages.index'));
        }

        $this->drugDosageRepository->delete($id);

        Flash::success('Drug Dosage deleted successfully.');

        return redirect(route('drugDosages.index'));
    }
}

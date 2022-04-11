<?php

namespace App\Http\Controllers;

use App\DataTables\LaboratoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Repositories\LaboratoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LaboratoryController extends AppBaseController
{
    /** @var LaboratoryRepository $laboratoryRepository*/
    private $laboratoryRepository;

    public function __construct(LaboratoryRepository $laboratoryRepo)
    {
        $this->laboratoryRepository = $laboratoryRepo;
    }

    /**
     * Display a listing of the Laboratory.
     *
     * @param LaboratoryDataTable $laboratoryDataTable
     *
     * @return Response
     */
    public function index(LaboratoryDataTable $laboratoryDataTable)
    {
        return $laboratoryDataTable->render('laboratories.index');
    }

    /**
     * Show the form for creating a new Laboratory.
     *
     * @return Response
     */
    public function create()
    {
        return view('laboratories.create');
    }

    /**
     * Store a newly created Laboratory in storage.
     *
     * @param CreateLaboratoryRequest $request
     *
     * @return Response
     */
    public function store(CreateLaboratoryRequest $request)
    {
        $input = $request->all();

        $laboratory = $this->laboratoryRepository->create($input);

        Flash::success('Laboratory saved successfully.');

        return redirect(route('laboratories.index'));
    }

    /**
     * Display the specified Laboratory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laboratory = $this->laboratoryRepository->find($id);

        if (empty($laboratory)) {
            Flash::error('Laboratory not found');

            return redirect(route('laboratories.index'));
        }

        return view('laboratories.show')->with('laboratory', $laboratory);
    }

    /**
     * Show the form for editing the specified Laboratory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laboratory = $this->laboratoryRepository->find($id);

        if (empty($laboratory)) {
            Flash::error('Laboratory not found');

            return redirect(route('laboratories.index'));
        }

        return view('laboratories.edit')->with('laboratory', $laboratory);
    }

    /**
     * Update the specified Laboratory in storage.
     *
     * @param int $id
     * @param UpdateLaboratoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaboratoryRequest $request)
    {
        $laboratory = $this->laboratoryRepository->find($id);

        if (empty($laboratory)) {
            Flash::error('Laboratory not found');

            return redirect(route('laboratories.index'));
        }

        $laboratory = $this->laboratoryRepository->update($request->all(), $id);

        Flash::success('Laboratory updated successfully.');

        return redirect(route('laboratories.index'));
    }

    /**
     * Remove the specified Laboratory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laboratory = $this->laboratoryRepository->find($id);

        if (empty($laboratory)) {
            Flash::error('Laboratory not found');

            return redirect(route('laboratories.index'));
        }

        $this->laboratoryRepository->delete($id);

        Flash::success('Laboratory deleted successfully.');

        return redirect(route('laboratories.index'));
    }
}

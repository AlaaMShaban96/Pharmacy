<?php

namespace App\Http\Controllers;

use App\DataTables\TrainingTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTrainingTypeRequest;
use App\Http\Requests\UpdateTrainingTypeRequest;
use App\Repositories\TrainingTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TrainingTypeController extends AppBaseController
{
    /** @var TrainingTypeRepository $trainingTypeRepository*/
    private $trainingTypeRepository;

    public function __construct(TrainingTypeRepository $trainingTypeRepo)
    {
        $this->trainingTypeRepository = $trainingTypeRepo;
    }

    /**
     * Display a listing of the TrainingType.
     *
     * @param TrainingTypeDataTable $trainingTypeDataTable
     *
     * @return Response
     */
    public function index(TrainingTypeDataTable $trainingTypeDataTable)
    {
        return $trainingTypeDataTable->render('training_types.index');
    }

    /**
     * Show the form for creating a new TrainingType.
     *
     * @return Response
     */
    public function create()
    {
        return view('training_types.create');
    }

    /**
     * Store a newly created TrainingType in storage.
     *
     * @param CreateTrainingTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingTypeRequest $request)
    {
        $input = $request->all();

        $trainingType = $this->trainingTypeRepository->create($input);

        Flash::success('Training Type saved successfully.');

        return redirect(route('trainingTypes.index'));
    }

    /**
     * Display the specified TrainingType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trainingType = $this->trainingTypeRepository->find($id);

        if (empty($trainingType)) {
            Flash::error('Training Type not found');

            return redirect(route('trainingTypes.index'));
        }

        return view('training_types.show')->with('trainingType', $trainingType);
    }

    /**
     * Show the form for editing the specified TrainingType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trainingType = $this->trainingTypeRepository->find($id);

        if (empty($trainingType)) {
            Flash::error('Training Type not found');

            return redirect(route('trainingTypes.index'));
        }

        return view('training_types.edit')->with('trainingType', $trainingType);
    }

    /**
     * Update the specified TrainingType in storage.
     *
     * @param int $id
     * @param UpdateTrainingTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingTypeRequest $request)
    {
        $trainingType = $this->trainingTypeRepository->find($id);

        if (empty($trainingType)) {
            Flash::error('Training Type not found');

            return redirect(route('trainingTypes.index'));
        }

        $trainingType = $this->trainingTypeRepository->update($request->all(), $id);

        Flash::success('Training Type updated successfully.');

        return redirect(route('trainingTypes.index'));
    }

    /**
     * Remove the specified TrainingType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trainingType = $this->trainingTypeRepository->find($id);

        if (empty($trainingType)) {
            Flash::error('Training Type not found');

            return redirect(route('trainingTypes.index'));
        }

        $this->trainingTypeRepository->delete($id);

        Flash::success('Training Type deleted successfully.');

        return redirect(route('trainingTypes.index'));
    }
}

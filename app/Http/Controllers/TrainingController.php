<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\TrainingDataTable;
use App\Repositories\TrainingRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Repositories\TrainingTypeRepository;

class TrainingController extends AppBaseController
{
    /** @var TrainingRepository $trainingRepository*/
    private $trainingRepository;
    /** @var TrainingTypeRepository $trainingTypeRepository*/
    private $trainingTypeRepository;
    public function __construct(TrainingTypeRepository $trainingTypeRepo,TrainingRepository $trainingRepo)
    {
        $this->trainingTypeRepository = $trainingTypeRepo;
        $this->trainingRepository = $trainingRepo;
    }

    /**
     * Display a listing of the Training.
     *
     * @param TrainingDataTable $trainingDataTable
     *
     * @return Response
     */
    public function index(TrainingDataTable $trainingDataTable)
    {
        return $trainingDataTable->render('trainings.index');
    }

    /**
     * Show the form for creating a new Training.
     *
     * @return Response
     */
    public function create()
    {
        $trainingTypes=$this->trainingTypeRepository->pluck('name','id');
        return view('trainings.create',compact('trainingTypes'));
    }

    /**
     * Store a newly created Training in storage.
     *
     * @param CreateTrainingRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingRequest $request)
    {
        $input = $request->all();
        $training = $this->trainingRepository->create($input);

        Flash::success('Training saved successfully.');

        return redirect(route('trainings.index'));
    }

    /**
     * Display the specified Training.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $training = $this->trainingRepository->find($id);

        if (empty($training)) {
            Flash::error('Training not found');

            return redirect(route('trainings.index'));
        }

        return view('trainings.show')->with('training', $training);
    }

    /**
     * Show the form for editing the specified Training.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $training = $this->trainingRepository->find($id);

        if (empty($training)) {
            Flash::error('Training not found');

            return redirect(route('trainings.index'));
        }

        return view('trainings.edit')->with('training', $training);
    }

    /**
     * Update the specified Training in storage.
     *
     * @param int $id
     * @param UpdateTrainingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingRequest $request)
    {
        $training = $this->trainingRepository->find($id);

        if (empty($training)) {
            Flash::error('Training not found');

            return redirect(route('trainings.index'));
        }

        $training = $this->trainingRepository->update($request->all(), $id);

        Flash::success('Training updated successfully.');

        return redirect(route('trainings.index'));
    }

    /**
     * Remove the specified Training from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $training = $this->trainingRepository->find($id);

        if (empty($training)) {
            Flash::error('Training not found');

            return redirect(route('trainings.index'));
        }

        $this->trainingRepository->delete($id);

        Flash::success('Training deleted successfully.');

        return redirect(route('trainings.index'));
    }
}

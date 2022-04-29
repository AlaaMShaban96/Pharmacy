<?php

namespace App\Http\Controllers;

use App\DataTables\EventSpecialtyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEventSpecialtyRequest;
use App\Http\Requests\UpdateEventSpecialtyRequest;
use App\Repositories\EventSpecialtyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EventSpecialtyController extends AppBaseController
{
    /** @var EventSpecialtyRepository $eventSpecialtyRepository*/
    private $eventSpecialtyRepository;

    public function __construct(EventSpecialtyRepository $eventSpecialtyRepo)
    {
        $this->eventSpecialtyRepository = $eventSpecialtyRepo;
    }

    /**
     * Display a listing of the EventSpecialty.
     *
     * @param EventSpecialtyDataTable $eventSpecialtyDataTable
     *
     * @return Response
     */
    public function index(EventSpecialtyDataTable $eventSpecialtyDataTable)
    {
        return $eventSpecialtyDataTable->render('event_specialties.index');
    }

    /**
     * Show the form for creating a new EventSpecialty.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_specialties.create');
    }

    /**
     * Store a newly created EventSpecialty in storage.
     *
     * @param CreateEventSpecialtyRequest $request
     *
     * @return Response
     */
    public function store(CreateEventSpecialtyRequest $request)
    {
        $input = $request->all();

        $eventSpecialty = $this->eventSpecialtyRepository->create($input);

        Flash::success('Event Specialty saved successfully.');

        return redirect(route('eventSpecialties.index'));
    }

    /**
     * Display the specified EventSpecialty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventSpecialty = $this->eventSpecialtyRepository->find($id);

        if (empty($eventSpecialty)) {
            Flash::error('Event Specialty not found');

            return redirect(route('eventSpecialties.index'));
        }

        return view('event_specialties.show')->with('eventSpecialty', $eventSpecialty);
    }

    /**
     * Show the form for editing the specified EventSpecialty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventSpecialty = $this->eventSpecialtyRepository->find($id);

        if (empty($eventSpecialty)) {
            Flash::error('Event Specialty not found');

            return redirect(route('eventSpecialties.index'));
        }

        return view('event_specialties.edit')->with('eventSpecialty', $eventSpecialty);
    }

    /**
     * Update the specified EventSpecialty in storage.
     *
     * @param int $id
     * @param UpdateEventSpecialtyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventSpecialtyRequest $request)
    {
        $eventSpecialty = $this->eventSpecialtyRepository->find($id);

        if (empty($eventSpecialty)) {
            Flash::error('Event Specialty not found');

            return redirect(route('eventSpecialties.index'));
        }

        $eventSpecialty = $this->eventSpecialtyRepository->update($request->all(), $id);

        Flash::success('Event Specialty updated successfully.');

        return redirect(route('eventSpecialties.index'));
    }

    /**
     * Remove the specified EventSpecialty from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventSpecialty = $this->eventSpecialtyRepository->find($id);

        if (empty($eventSpecialty)) {
            Flash::error('Event Specialty not found');

            return redirect(route('eventSpecialties.index'));
        }

        $this->eventSpecialtyRepository->delete($id);

        Flash::success('Event Specialty deleted successfully.');

        return redirect(route('eventSpecialties.index'));
    }
}

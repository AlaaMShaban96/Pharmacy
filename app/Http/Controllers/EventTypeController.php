<?php

namespace App\Http\Controllers;

use App\DataTables\EventTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;
use App\Repositories\EventTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EventTypeController extends AppBaseController
{
    /** @var EventTypeRepository $eventTypeRepository*/
    private $eventTypeRepository;

    public function __construct(EventTypeRepository $eventTypeRepo)
    {
        $this->eventTypeRepository = $eventTypeRepo;
    }

    /**
     * Display a listing of the EventType.
     *
     * @param EventTypeDataTable $eventTypeDataTable
     *
     * @return Response
     */
    public function index(EventTypeDataTable $eventTypeDataTable)
    {
        return $eventTypeDataTable->render('event_types.index');
    }

    /**
     * Show the form for creating a new EventType.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_types.create');
    }

    /**
     * Store a newly created EventType in storage.
     *
     * @param CreateEventTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateEventTypeRequest $request)
    {
        $input = $request->all();

        $eventType = $this->eventTypeRepository->create($input);

        Flash::success('Event Type saved successfully.');

        return redirect(route('eventTypes.index'));
    }

    /**
     * Display the specified EventType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventType = $this->eventTypeRepository->find($id);

        if (empty($eventType)) {
            Flash::error('Event Type not found');

            return redirect(route('eventTypes.index'));
        }

        return view('event_types.show')->with('eventType', $eventType);
    }

    /**
     * Show the form for editing the specified EventType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventType = $this->eventTypeRepository->find($id);

        if (empty($eventType)) {
            Flash::error('Event Type not found');

            return redirect(route('eventTypes.index'));
        }

        return view('event_types.edit')->with('eventType', $eventType);
    }

    /**
     * Update the specified EventType in storage.
     *
     * @param int $id
     * @param UpdateEventTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventTypeRequest $request)
    {
        $eventType = $this->eventTypeRepository->find($id);

        if (empty($eventType)) {
            Flash::error('Event Type not found');

            return redirect(route('eventTypes.index'));
        }

        $eventType = $this->eventTypeRepository->update($request->all(), $id);

        Flash::success('Event Type updated successfully.');

        return redirect(route('eventTypes.index'));
    }

    /**
     * Remove the specified EventType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventType = $this->eventTypeRepository->find($id);

        if (empty($eventType)) {
            Flash::error('Event Type not found');

            return redirect(route('eventTypes.index'));
        }

        $this->eventTypeRepository->delete($id);

        Flash::success('Event Type deleted successfully.');

        return redirect(route('eventTypes.index'));
    }
}

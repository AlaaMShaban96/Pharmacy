<?php

namespace App\Http\Controllers;

use App\DataTables\EventLocationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEventLocationRequest;
use App\Http\Requests\UpdateEventLocationRequest;
use App\Repositories\EventLocationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EventLocationController extends AppBaseController
{
    /** @var EventLocationRepository $eventLocationRepository*/
    private $eventLocationRepository;

    public function __construct(EventLocationRepository $eventLocationRepo)
    {
        $this->eventLocationRepository = $eventLocationRepo;
    }

    /**
     * Display a listing of the EventLocation.
     *
     * @param EventLocationDataTable $eventLocationDataTable
     *
     * @return Response
     */
    public function index(EventLocationDataTable $eventLocationDataTable)
    {
        return $eventLocationDataTable->render('event_locations.index');
    }

    /**
     * Show the form for creating a new EventLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_locations.create');
    }

    /**
     * Store a newly created EventLocation in storage.
     *
     * @param CreateEventLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateEventLocationRequest $request)
    {
        $input = $request->all();

        $eventLocation = $this->eventLocationRepository->create($input);

        Flash::success('Event Location saved successfully.');

        return redirect(route('eventLocations.index'));
    }

    /**
     * Display the specified EventLocation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventLocation = $this->eventLocationRepository->find($id);

        if (empty($eventLocation)) {
            Flash::error('Event Location not found');

            return redirect(route('eventLocations.index'));
        }

        return view('event_locations.show')->with('eventLocation', $eventLocation);
    }

    /**
     * Show the form for editing the specified EventLocation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventLocation = $this->eventLocationRepository->find($id);

        if (empty($eventLocation)) {
            Flash::error('Event Location not found');

            return redirect(route('eventLocations.index'));
        }

        return view('event_locations.edit')->with('eventLocation', $eventLocation);
    }

    /**
     * Update the specified EventLocation in storage.
     *
     * @param int $id
     * @param UpdateEventLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventLocationRequest $request)
    {
        $eventLocation = $this->eventLocationRepository->find($id);

        if (empty($eventLocation)) {
            Flash::error('Event Location not found');

            return redirect(route('eventLocations.index'));
        }

        $eventLocation = $this->eventLocationRepository->update($request->all(), $id);

        Flash::success('Event Location updated successfully.');

        return redirect(route('eventLocations.index'));
    }

    /**
     * Remove the specified EventLocation from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventLocation = $this->eventLocationRepository->find($id);

        if (empty($eventLocation)) {
            Flash::error('Event Location not found');

            return redirect(route('eventLocations.index'));
        }

        $this->eventLocationRepository->delete($id);

        Flash::success('Event Location deleted successfully.');

        return redirect(route('eventLocations.index'));
    }
}

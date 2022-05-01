<?php

namespace App\Http\Controllers;

use App\DataTables\EventMaterialDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEventMaterialRequest;
use App\Http\Requests\UpdateEventMaterialRequest;
use App\Repositories\EventMaterialRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EventMaterialController extends AppBaseController
{
    /** @var EventMaterialRepository $eventMaterialRepository*/
    private $eventMaterialRepository;

    public function __construct(EventMaterialRepository $eventMaterialRepo)
    {
        $this->eventMaterialRepository = $eventMaterialRepo;
    }

    /**
     * Display a listing of the EventMaterial.
     *
     * @param EventMaterialDataTable $eventMaterialDataTable
     *
     * @return Response
     */
    public function index(EventMaterialDataTable $eventMaterialDataTable)
    {
        return $eventMaterialDataTable->render('event_materials.index');
    }

    /**
     * Show the form for creating a new EventMaterial.
     *
     * @return Response
     */
    public function create()
    {
        return view('event_materials.create');
    }

    /**
     * Store a newly created EventMaterial in storage.
     *
     * @param CreateEventMaterialRequest $request
     *
     * @return Response
     */
    public function store(CreateEventMaterialRequest $request)
    {
        $input = $request->all();

        $eventMaterial = $this->eventMaterialRepository->create($input);

        Flash::success('Event Material saved successfully.');

        return redirect(route('eventMaterials.index'));
    }

    /**
     * Display the specified EventMaterial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        return view('event_materials.show')->with('eventMaterial', $eventMaterial);
    }

    /**
     * Show the form for editing the specified EventMaterial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        return view('event_materials.edit')->with('eventMaterial', $eventMaterial);
    }

    /**
     * Update the specified EventMaterial in storage.
     *
     * @param int $id
     * @param UpdateEventMaterialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventMaterialRequest $request)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        $eventMaterial = $this->eventMaterialRepository->update($request->all(), $id);

        Flash::success('Event Material updated successfully.');

        return redirect(route('eventMaterials.index'));
    }

    /**
     * Remove the specified EventMaterial from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventMaterial = $this->eventMaterialRepository->find($id);

        if (empty($eventMaterial)) {
            Flash::error('Event Material not found');

            return redirect(route('eventMaterials.index'));
        }

        $this->eventMaterialRepository->delete($id);

        Flash::success('Event Material deleted successfully.');

        return redirect(route('eventMaterials.index'));
    }
}

<?php

namespace App\Http\Controllers;

use PDF;
use Flash;
use Response;
use Barryvdh\Snappy;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\DataTables\EventDataTable;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use App\Repositories\EventRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\SpeakerRepository;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\EventTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventLocationRepository;
use App\Repositories\EventMaterialRepository;
use App\Repositories\EventSpecialtyRepository;

class EventController extends AppBaseController
{
    /** @var EventRepository $eventRepository*/
    private $eventRepository;
    /** @var EventLocationRepository $eventLocationRepository*/
    private $eventLocationRepository;
    /** @var CompanyRepository $companyRepository*/
    private $companyRepository;
    /** @var EventMaterialRepository $eventMaterialRepository*/
    private $eventMaterialRepository;
    /** @var EventSpecialtyRepository $eventSpecialtyRepository*/
    private $eventSpecialtyRepository;
    /** @var EventTypeRepository $eventTypeRepository*/
    private $eventTypeRepository;
    /** @var UserRepository $userRepository*/
    private $userRepository;
    /** @var SpeakerRepository $speakerRepository*/
    private $speakerRepository;
    public function __construct( SpeakerRepository $speakerRepo,UserRepository $userRepo,EventTypeRepository $eventTypeRepo,EventSpecialtyRepository $eventSpecialtyRepo,EventMaterialRepository $eventMaterialRepo,CompanyRepository $companyRepo,EventLocationRepository $eventLocationRepo,EventRepository $eventRepo)
    {
        $this->speakerRepository = $speakerRepo;
        $this->userRepository = $userRepo;
        $this->eventTypeRepository = $eventTypeRepo;
        $this->eventSpecialtyRepository = $eventSpecialtyRepo;
        $this->eventMaterialRepository = $eventMaterialRepo;
        $this->companyRepository = $companyRepo;
        $this->eventLocationRepository = $eventLocationRepo;
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the Event.
     *
     * @param EventDataTable $eventDataTable
     *
     * @return Response
     */
    public function index(EventDataTable $eventDataTable)
    {
        return $eventDataTable->render('events.index');
    }

    /**
     * Show the form for creating a new Event.
     *
     * @return Response
     */
    public function create()
    {

        $users=$this->userRepository->pluck('name','id');
        $eventTypes=$this->eventTypeRepository->pluck('name','id');
        $eventSpecialties=$this->eventSpecialtyRepository->pluck('name','id');
        $eventMaterials=$this->eventMaterialRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','event')->pluck('name','id');
        $eventLocations=$this->eventLocationRepository->pluck('name','id');
        return view('events.create',compact('users','eventTypes','eventSpecialties','eventMaterials','companies','eventLocations'));
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param CreateEventRequest $request
     *
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Display the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);
        $eventMaterials=$this->eventMaterialRepository->pluck('name','id');
        $speakers=$this->speakerRepository->pluck('name','id');

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show',compact('eventMaterials','speakers'))->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);
        $users=$this->userRepository->pluck('name','id');
        $eventTypes=$this->eventTypeRepository->pluck('name','id');
        $eventSpecialties=$this->eventSpecialtyRepository->pluck('name','id');
        $eventMaterials=$this->eventMaterialRepository->pluck('name','id');
        $companies=$this->companyRepository->where('type','event')->pluck('name','id');
        $eventLocations=$this->eventLocationRepository->pluck('name','id');
        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit',compact('users','eventTypes','eventSpecialties','eventMaterials','companies','eventLocations'))->with('event', $event);
    }

    /**
     * Update the specified Event in storage.
     *
     * @param int $id
     * @param UpdateEventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $event = $this->eventRepository->update($request->all(), $id);

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
    public function addMaterials(Request $request)
    {
        try {
            DB::beginTransaction();
                $event = $this->eventRepository->find($request->event_id);
                if ($event->materials()->where('event_material_id',$request->material_id)->exists()) {
                    $event->materials()->updateExistingPivot($request->material_id,['count'=>$request->count]);

                } else {
                    $event->materials()->attach($request->material_id,['count'=>$request->count]);
                }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($event->materials->toArray(), 200);
    }

    public function removeMaterials(Request $request)
    {
        try {
            DB::beginTransaction();
                $event = $this->eventRepository->find($request->event_id);
                $event->materials()->detach($request->material_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($event->materials->toArray(), 200);
    }
    public function addSpeakers(Request $request)
    {
        try {
            DB::beginTransaction();
                $event = $this->eventRepository->find($request->event_id);
                if ($event->speakers()->where('speaker_id',$request->speaker_id)->exists()) {
                    $event->speakers()->updateExistingPivot($request->speaker_id,['count'=>$request->count,'note'=>$request->note]);

                } else {
                    $event->speakers()->attach($request->speaker_id,['count'=>$request->count,'note'=>$request->note]);
                }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

       return response()->json($event->speakers->toArray(), 200);
    }
    public function removeSpeakers(Request $request)
    {
        try {
            DB::beginTransaction();
                $event = $this->eventRepository->find($request->event_id);
                $event->speakers()->detach($request->speaker_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


        return response()->json($event->speakers->toArray(), 200);
    }
}

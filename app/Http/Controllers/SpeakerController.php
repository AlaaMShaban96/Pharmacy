<?php

namespace App\Http\Controllers;

use App\DataTables\SpeakerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use App\Repositories\SpeakerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SpeakerController extends AppBaseController
{
    /** @var SpeakerRepository $speakerRepository*/
    private $speakerRepository;

    public function __construct(SpeakerRepository $speakerRepo)
    {
        $this->speakerRepository = $speakerRepo;
    }

    /**
     * Display a listing of the Speaker.
     *
     * @param SpeakerDataTable $speakerDataTable
     *
     * @return Response
     */
    public function index(SpeakerDataTable $speakerDataTable)
    {
        return $speakerDataTable->render('speakers.index');
    }

    /**
     * Show the form for creating a new Speaker.
     *
     * @return Response
     */
    public function create()
    {
        return view('speakers.create');
    }

    /**
     * Store a newly created Speaker in storage.
     *
     * @param CreateSpeakerRequest $request
     *
     * @return Response
     */
    public function store(CreateSpeakerRequest $request)
    {
        $input = $request->all();

        $speaker = $this->speakerRepository->create($input);

        Flash::success('Speaker saved successfully.');

        return redirect(route('speakers.index'));
    }

    /**
     * Display the specified Speaker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $speaker = $this->speakerRepository->find($id);

        if (empty($speaker)) {
            Flash::error('Speaker not found');

            return redirect(route('speakers.index'));
        }

        return view('speakers.show')->with('speaker', $speaker);
    }

    /**
     * Show the form for editing the specified Speaker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $speaker = $this->speakerRepository->find($id);

        if (empty($speaker)) {
            Flash::error('Speaker not found');

            return redirect(route('speakers.index'));
        }

        return view('speakers.edit')->with('speaker', $speaker);
    }

    /**
     * Update the specified Speaker in storage.
     *
     * @param int $id
     * @param UpdateSpeakerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpeakerRequest $request)
    {
        $speaker = $this->speakerRepository->find($id);

        if (empty($speaker)) {
            Flash::error('Speaker not found');

            return redirect(route('speakers.index'));
        }

        $speaker = $this->speakerRepository->update($request->all(), $id);

        Flash::success('Speaker updated successfully.');

        return redirect(route('speakers.index'));
    }

    /**
     * Remove the specified Speaker from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $speaker = $this->speakerRepository->find($id);

        if (empty($speaker)) {
            Flash::error('Speaker not found');

            return redirect(route('speakers.index'));
        }

        $this->speakerRepository->delete($id);

        Flash::success('Speaker deleted successfully.');

        return redirect(route('speakers.index'));
    }
}

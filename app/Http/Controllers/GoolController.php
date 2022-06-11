<?php

namespace App\Http\Controllers;

use App\DataTables\GoolDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGoolRequest;
use App\Http\Requests\UpdateGoolRequest;
use App\Repositories\GoolRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GoolController extends AppBaseController
{
    /** @var GoolRepository $goolRepository*/
    private $goolRepository;

    public function __construct(GoolRepository $goolRepo)
    {
        $this->goolRepository = $goolRepo;
    }

    /**
     * Display a listing of the Gool.
     *
     * @param GoolDataTable $goolDataTable
     *
     * @return Response
     */
    public function index(GoolDataTable $goolDataTable)
    {
        return $goolDataTable->render('gools.index');
    }

    /**
     * Show the form for creating a new Gool.
     *
     * @return Response
     */
    public function create()
    {
        return view('gools.create');
    }

    /**
     * Store a newly created Gool in storage.
     *
     * @param CreateGoolRequest $request
     *
     * @return Response
     */
    public function store(CreateGoolRequest $request)
    {
        $input = $request->all();

        $gool = $this->goolRepository->create($input);

        Flash::success('Gool saved successfully.');

        return redirect(route('gools.index'));
    }

    /**
     * Display the specified Gool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gool = $this->goolRepository->find($id);

        if (empty($gool)) {
            Flash::error('Gool not found');

            return redirect(route('gools.index'));
        }

        return view('gools.show')->with('gool', $gool);
    }

    /**
     * Show the form for editing the specified Gool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gool = $this->goolRepository->find($id);

        if (empty($gool)) {
            Flash::error('Gool not found');

            return redirect(route('gools.index'));
        }

        return view('gools.edit')->with('gool', $gool);
    }

    /**
     * Update the specified Gool in storage.
     *
     * @param int $id
     * @param UpdateGoolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGoolRequest $request)
    {
        $gool = $this->goolRepository->find($id);

        if (empty($gool)) {
            Flash::error('Gool not found');

            return redirect(route('gools.index'));
        }

        $gool = $this->goolRepository->update($request->all(), $id);

        Flash::success('Gool updated successfully.');

        return redirect(route('gools.index'));
    }

    /**
     * Remove the specified Gool from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gool = $this->goolRepository->find($id);

        if (empty($gool)) {
            Flash::error('Gool not found');

            return redirect(route('gools.index'));
        }

        $this->goolRepository->delete($id);

        Flash::success('Gool deleted successfully.');

        return redirect(route('gools.index'));
    }
}

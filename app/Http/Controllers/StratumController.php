<?php

namespace App\Http\Controllers;

use App\DataTables\StratumDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStratumRequest;
use App\Http\Requests\UpdateStratumRequest;
use App\Repositories\StratumRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StratumController extends AppBaseController
{
    /** @var StratumRepository $stratumRepository*/
    private $stratumRepository;

    public function __construct(StratumRepository $stratumRepo)
    {
        $this->stratumRepository = $stratumRepo;
    }

    /**
     * Display a listing of the Stratum.
     *
     * @param StratumDataTable $stratumDataTable
     *
     * @return Response
     */
    public function index(StratumDataTable $stratumDataTable)
    {
        return $stratumDataTable->render('strata.index');
    }

    /**
     * Show the form for creating a new Stratum.
     *
     * @return Response
     */
    public function create()
    {
        return view('strata.create');
    }

    /**
     * Store a newly created Stratum in storage.
     *
     * @param CreateStratumRequest $request
     *
     * @return Response
     */
    public function store(CreateStratumRequest $request)
    {
        $input = $request->all();

        $stratum = $this->stratumRepository->create($input);

        Flash::success('Stratum saved successfully.');

        return redirect(route('strata.index'));
    }

    /**
     * Display the specified Stratum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stratum = $this->stratumRepository->find($id);

        if (empty($stratum)) {
            Flash::error('Stratum not found');

            return redirect(route('strata.index'));
        }

        return view('strata.show')->with('stratum', $stratum);
    }

    /**
     * Show the form for editing the specified Stratum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stratum = $this->stratumRepository->find($id);

        if (empty($stratum)) {
            Flash::error('Stratum not found');

            return redirect(route('strata.index'));
        }

        return view('strata.edit')->with('stratum', $stratum);
    }

    /**
     * Update the specified Stratum in storage.
     *
     * @param int $id
     * @param UpdateStratumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStratumRequest $request)
    {
        $stratum = $this->stratumRepository->find($id);

        if (empty($stratum)) {
            Flash::error('Stratum not found');

            return redirect(route('strata.index'));
        }

        $stratum = $this->stratumRepository->update($request->all(), $id);

        Flash::success('Stratum updated successfully.');

        return redirect(route('strata.index'));
    }

    /**
     * Remove the specified Stratum from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stratum = $this->stratumRepository->find($id);

        if (empty($stratum)) {
            Flash::error('Stratum not found');

            return redirect(route('strata.index'));
        }

        $this->stratumRepository->delete($id);

        Flash::success('Stratum deleted successfully.');

        return redirect(route('strata.index'));
    }
}

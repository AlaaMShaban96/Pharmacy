<?php

namespace App\Http\Controllers;

use App\DataTables\ToolDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Repositories\ToolRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ToolController extends AppBaseController
{
    /** @var ToolRepository $toolRepository*/
    private $toolRepository;

    public function __construct(ToolRepository $toolRepo)
    {
        $this->toolRepository = $toolRepo;
    }

    /**
     * Display a listing of the Tool.
     *
     * @param ToolDataTable $toolDataTable
     *
     * @return Response
     */
    public function index(ToolDataTable $toolDataTable)
    {
        return $toolDataTable->render('tools.index');
    }

    /**
     * Show the form for creating a new Tool.
     *
     * @return Response
     */
    public function create()
    {
        return view('tools.create');
    }

    /**
     * Store a newly created Tool in storage.
     *
     * @param CreateToolRequest $request
     *
     * @return Response
     */
    public function store(CreateToolRequest $request)
    {
        $input = $request->all();

        $tool = $this->toolRepository->create($input);

        Flash::success('Tool saved successfully.');

        return redirect(route('tools.index'));
    }

    /**
     * Display the specified Tool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tool = $this->toolRepository->find($id);

        if (empty($tool)) {
            Flash::error('Tool not found');

            return redirect(route('tools.index'));
        }

        return view('tools.show')->with('tool', $tool);
    }

    /**
     * Show the form for editing the specified Tool.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tool = $this->toolRepository->find($id);

        if (empty($tool)) {
            Flash::error('Tool not found');

            return redirect(route('tools.index'));
        }

        return view('tools.edit')->with('tool', $tool);
    }

    /**
     * Update the specified Tool in storage.
     *
     * @param int $id
     * @param UpdateToolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateToolRequest $request)
    {
        $tool = $this->toolRepository->find($id);

        if (empty($tool)) {
            Flash::error('Tool not found');

            return redirect(route('tools.index'));
        }

        $tool = $this->toolRepository->update($request->all(), $id);

        Flash::success('Tool updated successfully.');

        return redirect(route('tools.index'));
    }

    /**
     * Remove the specified Tool from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tool = $this->toolRepository->find($id);

        if (empty($tool)) {
            Flash::error('Tool not found');

            return redirect(route('tools.index'));
        }

        $this->toolRepository->delete($id);

        Flash::success('Tool deleted successfully.');

        return redirect(route('tools.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ReceiveRepository;
use App\DataTables\ShipmentModelDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ShipmentModelRepository;
use App\Http\Requests\CreateShipmentModelRequest;
use App\Http\Requests\UpdateShipmentModelRequest;

class ShipmentModelController extends AppBaseController
{
    /** @var ShipmentModelRepository $shipmentModelRepository*/
    private $shipmentModelRepository;
        /** @var ReceiveRepository $receiveRepository*/
    private $receiveRepository;
    public function __construct(ReceiveRepository $receiveRepo,ShipmentModelRepository $shipmentModelRepo)
    {
        $this->receiveRepository = $receiveRepo;
        $this->shipmentModelRepository = $shipmentModelRepo;
    }

    /**
     * Display a listing of the ShipmentModel.
     *
     * @param ShipmentModelDataTable $shipmentModelDataTable
     *
     * @return Response
     */
    public function index(ShipmentModelDataTable $shipmentModelDataTable)
    {
        return $shipmentModelDataTable->render('shipment_models.index');
    }

    /**
     * Show the form for creating a new ShipmentModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('shipment_models.create');
    }

    /**
     * Store a newly created ShipmentModel in storage.
     *
     * @param CreateShipmentModelRequest $request
     *
     * @return Response
     */
    public function store(CreateShipmentModelRequest $request)
    {
        $input = $request->all();

        $shipmentModel = $this->shipmentModelRepository->create($input);

        Flash::success('Shipment Model saved successfully.');

        return redirect(route('shipmentModels.index'));
    }

    /**
     * Display the specified ShipmentModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shipmentModel = $this->shipmentModelRepository->find($id);

        if (empty($shipmentModel)) {
            Flash::error('Shipment Model not found');

            return redirect(route('shipmentModels.index'));
        }

        return view('shipment_models.show')->with('shipmentModel', $shipmentModel);
    }

    /**
     * Show the form for editing the specified ShipmentModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shipmentModel = $this->shipmentModelRepository->find($id);

        if (empty($shipmentModel)) {
            Flash::error('Shipment Model not found');

            return redirect(route('shipmentModels.index'));
        }

        return view('shipment_models.edit')->with('shipmentModel', $shipmentModel);
    }

    /**
     * Update the specified ShipmentModel in storage.
     *
     * @param int $id
     * @param UpdateShipmentModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShipmentModelRequest $request)
    {
        $shipmentModel = $this->shipmentModelRepository->find($id);

        if (empty($shipmentModel)) {
            Flash::error('Shipment Model not found');

            return redirect(route('shipmentModels.index'));
        }

        $shipmentModel = $this->shipmentModelRepository->update($request->all(), $id);

        Flash::success('Shipment Model updated successfully.');

        return redirect(route('shipmentModels.index'));
    }

    /**
     * Remove the specified ShipmentModel from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shipmentModel = $this->shipmentModelRepository->find($id);

        if (empty($shipmentModel)) {
            Flash::error('Shipment Model not found');

            return redirect(route('shipmentModels.index'));
        }

        $this->shipmentModelRepository->delete($id);

        Flash::success('Shipment Model deleted successfully.');

        return redirect(route('shipmentModels.index'));
    }
    public function addShipmentModels(Request $request)
    {
        // dd($request->all());
        $receive = $this->receiveRepository->find($request->receive_id);
        // try {
        //     DB::beginTransaction();
            $data=$request->all();
            $data['user_id']=auth()->user()->id;
            $invoice=$this->shipmentModelRepository->create($data);
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }

       return response()->json($receive->shipmentModels()->with('drug')->get()->toArray(), 200);
    }
    public function removeShipmentModels(Request $request)
    {
        $receive = $this->receiveRepository->find($request->receive_id);
        try {
            DB::beginTransaction();
            $this->shipmentModelRepository->delete($request->shipment_model_id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return response()->json($receive->shipmentModels()->with('drug')->get()->toArray(), 200);
    }
}

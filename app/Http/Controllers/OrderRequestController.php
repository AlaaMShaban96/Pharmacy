<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\DataTables\OrderRequestDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OrderRequestRepository;
use App\Http\Requests\CreateOrderRequestRequest;
use App\Http\Requests\UpdateOrderRequestRequest;

class OrderRequestController extends AppBaseController
{
    /** @var OrderRequestRepository $orderRequestRepository*/
    private $orderRequestRepository;

    public function __construct(OrderRequestRepository $orderRequestRepo)
    {
        $this->orderRequestRepository = $orderRequestRepo;
    }

    /**
     * Display a listing of the OrderRequest.
     *
     * @param OrderRequestDataTable $orderRequestDataTable
     *
     * @return Response
     */
    public function index(OrderRequestDataTable $orderRequestDataTable)
    {
        return $orderRequestDataTable->render('order_requests.index');
    }

    /**
     * Show the form for creating a new OrderRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_requests.create');
    }

    /**
     * Store a newly created OrderRequest in storage.
     *
     * @param CreateOrderRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequestRequest $request)
    {
        $input = $request->all();

        $orderRequest = $this->orderRequestRepository->create($input);

        Flash::success('Order Request saved successfully.');

        return redirect(route('orderRequests.index'));
    }

    /**
     * Display the specified OrderRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderRequest = $this->orderRequestRepository->find($id);

        if (empty($orderRequest)) {
            Flash::error('Order Request not found');

            return redirect(route('orderRequests.index'));
        }

        return view('order_requests.show')->with('orderRequest', $orderRequest);
    }

    /**
     * Show the form for editing the specified OrderRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderRequest = $this->orderRequestRepository->find($id);

        if (empty($orderRequest)) {
            Flash::error('Order Request not found');

            return redirect(route('orderRequests.index'));
        }

        return view('order_requests.edit')->with('orderRequest', $orderRequest);
    }

    /**
     * Update the specified OrderRequest in storage.
     *
     * @param int $id
     * @param UpdateOrderRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequestRequest $request)
    {
        $orderRequest = $this->orderRequestRepository->find($id);

        if (empty($orderRequest)) {
            Flash::error('Order Request not found');

            return redirect(route('orderRequests.index'));
        }

        $orderRequest = $this->orderRequestRepository->update($request->all(), $id);

        Flash::success('Order Request updated successfully.');

        return redirect(route('orderRequests.index'));
    }

    /**
     * Remove the specified OrderRequest from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderRequest = $this->orderRequestRepository->find($id);

        if (empty($orderRequest)) {
            Flash::error('Order Request not found');

            return redirect(route('orderRequests.index'));
        }

        $this->orderRequestRepository->delete($id);

        Flash::success('Order Request deleted successfully.');

        return redirect(route('orderRequests.index'));
    }
    /**
     * Update the specified OrderRequest in storage.
     *
     * @param int $id
     * @param UpdateOrderRequestRequest $request
     *
     * @return Response
     */
    public function changeStatus($id,Request $request)
    {
        $orderRequest = $this->orderRequestRepository->find($id);
        $orderRequest->status=$request->status;
        $orderRequest->save();
        Flash::success('Order Request updated successfully.');

        return redirect(route('orders.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Carbon\Carbon;
use App\Http\Requests;
use App\Models\SampleReceived;
use App\DataTables\OrderDataTable;
use Illuminate\Support\Facades\DB;
use App\Repositories\DrugRepository;
use App\Repositories\OrderRepository;
use App\Repositories\DoctorRepository;
use App\DataTables\OrderRequestDataTable;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\OrderRequestRepository;
use App\Repositories\SampleReceivedRepository;

class OrderController extends AppBaseController
{
    /** @var OrderRepository $orderRepository*/
    private $orderRepository;
    /** @var SampleReceivedRepository $sampleReceivedRepository*/
    private $sampleReceivedRepository;
    /** @var DrugRepository $drugRepository*/
    private $drugRepository;
    /** @var OrderRequestRepository $orderRequestRepository*/
    private $orderRequestRepository;
    /** @var DoctorRepository $doctorRepository*/
    private $doctorRepository;
    private $dateStart ;
    private $dateEnd ;
    public function __construct(OrderRequestRepository $orderRequestRepo,DoctorRepository $doctorRepo,DrugRepository $drugRepo,SampleReceivedRepository $sampleReceivedRepo,OrderRepository $orderRepo)
    {
        $this->dateStart = Carbon::now()->startOfMonth();
        $this->dateEnd = Carbon::now();
        $this->orderRequestRepository = $orderRequestRepo;

        $this->doctorRepository = $doctorRepo;
        $this->drugRepository = $drugRepo;
        $this->sampleReceivedRepository = $sampleReceivedRepo;
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param OrderDataTable $orderDataTable
     *
     * @return Response
     */
    public function index(OrderRequestDataTable $orderDataTable)
    {
        return $orderDataTable->render('orders.index');
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $drugIDS=$this->sampleReceivedRepository->query()->select('drug_id')
        ->whereBetween('created_at',[$this->dateStart,$this->dateEnd])
        ->groupBy('drug_id')->get()->toArray();
        $drugs=$this->drugRepository->query()->whereIn('id',$drugIDS)->get();
        $drugsForSeclect=$drugs->pluck('code','id');
        $doctors=$this->doctorRepository->pluck('name','id');
        return view('orders.create',compact('drugs','drugsForSeclect','doctors'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        // try {
        //     DB::beginTransaction();
                $input = $request->all();
                // dd($input['doctor_id']);

                $orderRequest = $this->orderRequestRepository->create([
                    'code'=>'sfweg',
                    'doctor_id'=>$input['doctor_id'],
                    'status'=>'pending',
                    "user_id"=>auth()->user()->id,

                ]);
                foreach ($input['drug_id'] as $key => $value) {
                    $order = $this->orderRepository->create([
                        "price" => $input['price'][$key],
                        "for" => $input['for'][$key],
                        "drug_id" => $input['drug_id'][$key],
                        "quantity" => $input['quantity'][$key],
                        "order_request_id"=>$orderRequest->id,
                    ]);

                }
            DB::commit();
            Flash::success('Order saved successfully.');

            return redirect(route('orders.index'));
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return redirect(route('orders.index'));

        // }
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
}

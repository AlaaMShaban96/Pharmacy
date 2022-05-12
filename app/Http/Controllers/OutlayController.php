<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\OutlayDataTable;
use App\Repositories\OutlayRepository;
use App\Http\Requests\CreateOutlayRequest;
use App\Http\Requests\UpdateOutlayRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FinancialCovenantRepository;

class OutlayController extends AppBaseController
{
    /** @var OutlayRepository $outlayRepository*/
    private $outlayRepository;
    /** @var FinancialCovenantRepository $financialCovenantRepository*/
    private $financialCovenantRepository;
    public function __construct(FinancialCovenantRepository $financialCovenantRepo,OutlayRepository $outlayRepo)
    {
        $this->financialCovenantRepository = $financialCovenantRepo;
        $this->outlayRepository = $outlayRepo;
    }

    /**
     * Display a listing of the Outlay.
     *
     * @param OutlayDataTable $outlayDataTable
     *
     * @return Response
     */
    public function index(OutlayDataTable $outlayDataTable)
    {
        return $outlayDataTable->render('outlays.index');
    }

    /**
     * Show the form for creating a new Outlay.
     *
     * @return Response
     */
    public function create()
    {
        $financialCovenants=$this->financialCovenantRepository->pluck('name','id');
        return view('outlays.create',compact('financialCovenants'));
    }

    /**
     * Store a newly created Outlay in storage.
     *
     * @param CreateOutlayRequest $request
     *
     * @return Response
     */
    public function store(CreateOutlayRequest $request)
    {
        DB::beginTransaction();
        $financialCovenant = $this->financialCovenantRepository->find($request->financial_covenant_id);

        if ($financialCovenant->amount <= ($financialCovenant->total+$request->price)) {
            Flash::error('financialCovenant if cosed.');
            return redirect(route('outlays.index'));

        }
            $input = $request->all();
            $input['user_id']=auth()->user()->id;
            $outlay = $this->outlayRepository->create($input);
            $financialCovenant->total+=$outlay->price;
            $financialCovenant->save();
            Flash::success('Outlay saved successfully.');
        DB::commit();
        return redirect(route('outlays.index'));
    }

    /**
     * Display the specified Outlay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outlay = $this->outlayRepository->find($id);

        if (empty($outlay)) {
            Flash::error('Outlay not found');

            return redirect(route('outlays.index'));
        }

        return view('outlays.show')->with('outlay', $outlay);
    }

    /**
     * Show the form for editing the specified Outlay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outlay = $this->outlayRepository->find($id);
        $financialCovenants=$this->financialCovenantRepository->pluck('name','id');

        if (empty($outlay)) {
            Flash::error('Outlay not found');

            return redirect(route('outlays.index'));
        }

        return view('outlays.edit',compact('financialCovenants'))->with('outlay', $outlay);
    }

    /**
     * Update the specified Outlay in storage.
     *
     * @param int $id
     * @param UpdateOutlayRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutlayRequest $request)
    {
        DB::beginTransaction();
            $outlay = $this->outlayRepository->find($id);

            if (empty($outlay)) {
                Flash::error('Outlay not found');

                return redirect(route('outlays.index'));
            }
            $financialCovenant = $this->financialCovenantRepository->find($outlay->financial_covenant_id);
            $financialCovenant->total-=$outlay->price;
            $financialCovenant->save();
            $outlay = $this->outlayRepository->update($request->all(), $id);
            $financialCovenant->total+=$outlay->price;
            $financialCovenant->save();
            Flash::success('Outlay updated successfully.');
        DB::commit();

        return redirect(route('outlays.index'));
    }

    /**
     * Remove the specified Outlay from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outlay = $this->outlayRepository->find($id);
        DB::beginTransaction();
        if (empty($outlay)) {
            Flash::error('Outlay not found');

            return redirect(route('outlays.index'));
        }
        $financialCovenant = $this->financialCovenantRepository->find($outlay->financial_covenant_id);
        $financialCovenant->total-=$outlay->price;
        $financialCovenant->save();

        $this->outlayRepository->delete($id);

        DB::commit();


        Flash::success('Outlay deleted successfully.');

        return redirect(route('outlays.index'));
    }
    /**
     * Store a newly created FinancialCovenantType in storage.
     *
     * @param CreateFinancialCovenantTypeRequest $request
     *
     * @return Response
     */
    public function addOutlays(Request $request)
    {
        $financialCovenant =$this->financialCovenantRepository->find($request->financial_covenant_id);

        try {
            DB::beginTransaction();
            if ($financialCovenant->amount < ($financialCovenant->total+$request->price)) {
                return response()->json(['error'=>'financialCovenant if cosed.'], 200);
            }
                $input = $request->all();
                $input['user_id']=auth()->user()->id;
                $outlay = $this->outlayRepository->create($input);
                $financialCovenant->total+=$request->price;
                $financialCovenant->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        $data=empty($financialCovenant->outlays)?[]:$financialCovenant->outlays()->with('user')->with('clause')->get()->toArray();
        return response()->json($data, 200);
    }
    /**
     * Remove the specified FinancialCovenantType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function removeOutlays(Request $request)
    {

        $financialCovenant = $this->financialCovenantRepository->find($request->financial_covenant_id);
        $outlay = $this->outlayRepository->find($request->outlay_id);

        DB::beginTransaction();
            $financialCovenant = $this->financialCovenantRepository->find($outlay->financial_covenant_id);
            $financialCovenant->total-=$outlay->price;
            $financialCovenant->save();

            $this->outlayRepository->delete($request->outlay_id);
        DB::commit();


        $data=empty($financialCovenant->outlays)?[]:$financialCovenant->outlays()->with('user')->with('clause')->get()->toArray();
        return response()->json($data, 200);
    }
}

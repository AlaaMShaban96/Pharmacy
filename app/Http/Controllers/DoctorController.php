<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\DoctorDataTable;
use App\Repositories\UserRepository;
use App\Repositories\DoctorRepository;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Controllers\AppBaseController;

class DoctorController extends AppBaseController
{
    /** @var DoctorRepository $doctorRepository*/
    private $doctorRepository;
    /** @var UserRepository $userRepository*/
    private $userRepository;
    public function __construct(UserRepository $userRepo,DoctorRepository $doctorRepo)
    {
        $this->userRepository = $userRepo;
        $this->doctorRepository = $doctorRepo;
    }

    /**
     * Display a listing of the Doctor.
     *
     * @param DoctorDataTable $doctorDataTable
     *
     * @return Response
     */
    public function index(DoctorDataTable $doctorDataTable)
    {
        return $doctorDataTable->render('doctors.index');
    }

    /**
     * Show the form for creating a new Doctor.
     *
     * @return Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created Doctor in storage.
     *
     * @param CreateDoctorRequest $request
     *
     * @return Response
     */
    public function store(CreateDoctorRequest $request)
    {
        $input = $request->all();

        $doctor = $this->doctorRepository->create($input);
        $user = $this->userRepository->create([
            'name'=>$doctor->name,
            'mobile'=>$doctor->phone_number,
            'password'=>bcrypt($doctor->phone_number)
        ]);

        Flash::success('Doctor saved successfully.');

        return redirect(route('doctors.index'));
    }

    /**
     * Display the specified Doctor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doctor = $this->doctorRepository->find($id);

        if (empty($doctor)) {
            Flash::error('Doctor not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified Doctor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doctor = $this->doctorRepository->find($id);

        if (empty($doctor)) {
            Flash::error('Doctor not found');

            return redirect(route('doctors.index'));
        }

        return view('doctors.edit')->with('doctor', $doctor);
    }

    /**
     * Update the specified Doctor in storage.
     *
     * @param int $id
     * @param UpdateDoctorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDoctorRequest $request)
    {
        $doctor = $this->doctorRepository->find($id);

        if (empty($doctor)) {
            Flash::error('Doctor not found');

            return redirect(route('doctors.index'));
        }

        $doctor = $this->doctorRepository->update($request->all(), $id);

        Flash::success('Doctor updated successfully.');

        return redirect(route('doctors.index'));
    }

    /**
     * Remove the specified Doctor from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doctor = $this->doctorRepository->find($id);

        if (empty($doctor)) {
            Flash::error('Doctor not found');

            return redirect(route('doctors.index'));
        }

        $this->doctorRepository->delete($id);

        Flash::success('Doctor deleted successfully.');

        return redirect(route('doctors.index'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use App\Repositories\FinancialCovenantRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /** @var EventRepository $eventRepository*/
    private $eventRepository;
    /** @var FinancialCovenantRepository $financialCovenantRepository*/
    private $financialCovenantRepository;
    public function __construct(FinancialCovenantRepository $financialCovenantRepo,EventRepository $eventRepo)
    {
        $this->financialCovenantRepository = $financialCovenantRepo;
        $this->eventRepository = $eventRepo;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Super-Admin') ||auth()->user()->hasRole('Admin-Pro')) {
            $eventRepository=$this->eventRepository->all();
            $financialCovenantRepository=$this->financialCovenantRepository->all();

        } else {
            $eventRepository=auth()->user()->events;
            $financialCovenantRepository=auth()->user()->financialCovenants;
        }
        return view('home',compact('eventRepository','financialCovenantRepository'));
    }
}

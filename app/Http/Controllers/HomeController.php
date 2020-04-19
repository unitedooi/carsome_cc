<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $appointments = Appointment::orderBy("date", "DESC")->get();

        $events = [];
                $data = Appointment::all();
                if($data->count()) {
                    foreach ($data as $key => $value) {
                        $events[] = Calendar::event(
                            $value->name,
                            false,
                            new \DateTime($value->date.'T'.$value->slot->startTime),
                            new \DateTime($value->date.'T'.$value->slot->endTime),
                            null,
                            // Add color and link on event
                         [
                             'color' => '#ff0000',
                              'url' => route('appointment.edit', $value->id),
                         ]
                        );
                    }
                }
                $calendar = Calendar::addEvents($events);

        return view('home', compact(['appointments', 'calendar']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Day;
use App\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointment');
    }

    public function fetch(Request $request)
    {

        $date = $request->get('date');
        $date_name = Carbon::createFromFormat('Y-m-d', $date)->format('l');

        $days = Day::select('id')->where('name', '=', $date_name)->first();
        $day_id = $days->id;

        $slots = Slot::where('day_id', '=', $day_id)->get();

        $output = '<option value="">Select Slot</option>';

    
        foreach($slots as $slot){
            //calculate available slot
            $taken_slot = Appointment::where('date', '=', $date, 'and')->where('slot_id', '=', $slot->id)->get()->count();
            $available_slot = $slot->no - $taken_slot;
            $available_slot == 0 ? $disable = 'disabled' : $disable = '';

            $output .= '<option '.$disable.' value="'.$slot->id.'">'.$slot->startTime.' ('.$available_slot.' available)</option>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {   
        $check_duplicate = Appointment::where('date', '=', $request->date, 'and')->where('slot_id', '=', $request->slot_id, 'and')->where('mobile', '=', $request->mobile)->get()->count();

        if($check_duplicate == 1){
            Session::flash('error_appointment', 'Duplicate entry, please book another slot, Thank You');

            return redirect('/appointment');

        }else{

            $appointment = Appointment::create($request->all());

            Session::flash('new_appointment', 'You appointment has been book successfully.');

            return redirect()->route('appointment.show', [$appointment->id]);

        }
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $appointment = Appointment::findOrFail($id);

        return view('appointmentView', compact('appointment'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        $slots = Slot::where('day_id', '=', $appointment->slot->day->id)->get();

        return view('appointmentEdit', compact(['appointment','slots']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, $id)
    {
        Appointment::findOrFail($id)->update($request->all());

        Session::flash('status', 'You appointment has been edit successfully.');

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::findOrFail($id)->delete();

        Session::flash('status', 'You appointment has been delete successfully.');

        return redirect('/home');
    }
}

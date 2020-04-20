<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slot;
use Carbon\Carbon;
use App\Day;
use App\Appointment;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //AppointmentCollection::withoutWrapping();
        //return AppointmentCollection::collection(Appointment::all());

        $date = $request->get('date');
        $date_name = Carbon::createFromFormat('Y-m-d', $date)->format('l');

        $days = Day::select('id')->where('name', '=', $date_name)->first();
        $day_id = $days->id;

        $slots = Slot::where('day_id', '=', $day_id)->get();

        $data = array();
        foreach($slots as $slot){
            //calculate available slot
            $taken_slot = Appointment::where('date', '=', $date, 'and')->where('slot_id', '=', $slot->id)->get()->count();
            $available_slot = $slot->no - $taken_slot;

            if($available_slot != 0){
                $data[] = array(
                    'id' => $slot->id,
                    'startTime' => $slot->startTime,
                    'available' => $available_slot,
                );
            }
        }
        
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

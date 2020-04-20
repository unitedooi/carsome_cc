<?php

namespace App\Http\Controllers\Api;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\Api\AppointmentCollection;
use App\Http\Resources\Api\AppointmentResource;
use Symfony\Component\HttpFoundation\Response;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        AppointmentCollection::withoutWrapping();
        return AppointmentCollection::collection(Appointment::all());
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

        $check_duplicate = Appointment::where('date', '=', $request->date, 'and')->where('slot_id', '=', $request->slot_id, 'and')->where('mobile', '=', $request->mobile)->get()->count();

        if($check_duplicate == 1){

            return [
                'error'=> 'Duplicate Entry'
            ];

        }else{

            $appointment = new Appointment;
            $appointment->name = $request->name;
            $appointment->mobile = $request->mobile;
            $appointment->email = $request->email;
            $appointment->date = $request->date;
            $appointment->slot_id = $request->slot_id;
            $appointment->needReminder = $request->needReminder;
            $appointment->remark = $request->remark;
            $appointment->save();

            return response([
                'data' => $appointment
            ],Response::HTTP_CREATED);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Appointment::findOrFail($id);
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
        $appointment = Appointment::findOrFail($id)->update($request->all());

        return response([
            'data' => $appointment
        ],Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}

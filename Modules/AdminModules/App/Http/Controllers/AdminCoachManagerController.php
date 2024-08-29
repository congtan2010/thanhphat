<?php

namespace Modules\AdminModules\App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AdminCoachManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::get();

        return view('adminmodules::AdminCoachManager', ['coaches' => $coaches]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'license_plate' => 'required|unique:coaches',
            'coach_maintenance_date' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $coach = new Coach();
        $coach->license_plate = $request->license_plate;
        $coach->coach_maintenance_date = $request->coach_maintenance_date;
        $coach->service = $request->service;
        $coach->vehicle_type = $request->vehicle_type;
        $coach->sum_ticket = $request->sum_ticket;
        $coach->save();
        return back();
    }


    public function destroy($id)
    {
        Coach::where('id', $id)->delete();

        return back();
    }
}
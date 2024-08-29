<?php

namespace Modules\AdminModules\App\Http\Controllers;

use App\Models\Coach;
use App\Models\Itinerary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ItineraryManagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
//quan ly lo trinh
class AdminItineraryManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ItineraryManagements = ItineraryManagement::join(
            'coaches',
            'itinerary_management.coaches_id',
            '=',
            'coaches.id'
        )->join('itineraries', 'itinerary_management.itineraries_id', '=', 'itineraries.id')
            ->select(
                'itinerary_management.id',
                'coaches.license_plate',
                'itinerary_management.price',
                'itinerary_management.start_time',
                'itinerary_management.end_time',
                'itineraries.starting_poin',
                'itineraries.destination',
            )->orderby('itinerary_management.created_at', 'asc') //sap xep theo thu tu tang dan
            ->get();
        $coaches = Coach::select('license_plate', 'vehicle_type')->where('service', '=', 'Người')->get();

        return view('adminmodules::AdminItineraryManager', ['ItineraryManagements' => $ItineraryManagements, 'coaches' => $coaches]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {

        $ItineraryManagement = new ItineraryManagement();
        $ItineraryManagement->price = $request->price;
        $ItineraryManagement->start_time = $request->start_time;
        $ItineraryManagement->end_time = $request->end_time;

        $coach = Coach::where('license_plate', $request->license_plate)->first();
        $Itinerary = Itinerary::where('starting_poin', $request->starting_poin)
            ->where('destination', $request->destination)
            ->first();
        if ($coach && $Itinerary) {
            $ItineraryManagement->coaches_id = $coach->id;
            $ItineraryManagement->itineraries_id = $Itinerary->id;
            $ItineraryManagement->save();
            return back();
        }
        return back();
    }

    public function destroy($id)
    {
        ItineraryManagement::where('id', $id)->delete();

        return back();
    }
}

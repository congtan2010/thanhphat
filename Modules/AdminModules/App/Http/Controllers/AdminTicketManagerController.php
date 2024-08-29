<?php

namespace Modules\AdminModules\App\Http\Controllers;

use Log;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\ItineraryManagement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminTicketManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $startingPoin = $request->input('startingPoin');
        $destination = $request->input('destination');
        $date = $request->input('date');
        $currentDate = Carbon::now()->toDateString();
        if (!$startingPoin && !$destination && !$date) {
            $itineraryManagements = DB::table('itinerary_management')
                ->join('coaches', 'coaches.id', '=', 'itinerary_management.coaches_id')
                ->join('itineraries', 'itineraries.id', '=', 'itinerary_management.itineraries_id')
                ->leftJoin('tickets', 'tickets.itinerary_management_id', '=', 'itinerary_management.id')
                ->select(
                    'coaches.id as coach_id',
                    'coaches.license_plate',
                    'coaches.vehicle_type',
                    'coaches.sum_ticket',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'itinerary_management.id as itinerary_management_id',
                    'itinerary_management.price',
                    DB::raw('COUNT(tickets.id) as total_tickets')
                )->whereDate('itinerary_management.start_time', '>=', $currentDate)
                ->groupBy(
                    'coaches.id',
                    'coaches.license_plate',
                    'coaches.vehicle_type',
                    'coaches.sum_ticket',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'itinerary_management.id',
                    'itinerary_management.price'
                )
                ->orderBy('itinerary_management.start_time', 'desc')
                ->get();
                
            $tickets = Ticket::join(
                'itinerary_management',
                'itinerary_management.id',
                '=',
                'tickets.itinerary_management_id'
            )
                ->select(
                    'tickets.id as tickets_id',
                    'tickets.phoneNumber',
                    'tickets.seat_position',
                    'tickets.status',
                    'tickets.userName',
                    'itinerary_management.id'
                )
                ->get();
            return view('adminmodules::AdminTicketManager', ['itineraryManagements' => $itineraryManagements, 'tickets' => $tickets]);
        } else {
            $itineraryManagements = DB::table('itinerary_management')
                ->join('coaches', 'coaches.id', '=', 'itinerary_management.coaches_id')
                ->join('itineraries', 'itineraries.id', '=', 'itinerary_management.itineraries_id')
                ->leftJoin('tickets', 'tickets.itinerary_management_id', '=', 'itinerary_management.id')
                ->select(
                    'coaches.id as coach_id',
                    'coaches.license_plate',
                    'coaches.vehicle_type',
                    'coaches.sum_ticket',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'itinerary_management.id as itinerary_management_id',
                    'itinerary_management.price',
                    DB::raw('COUNT(tickets.id) as total_tickets')
                )
                ->whereDate('itinerary_management.start_time', '>=', $currentDate)
                ->where('itineraries.starting_poin', '=', $startingPoin)
                ->where('itineraries.destination', '=', $destination)
                ->whereDate('itinerary_management.start_time', '=', Carbon::parse($date))
                ->groupBy(
                    'coaches.id',
                    'coaches.license_plate',
                    'coaches.vehicle_type',
                    'coaches.sum_ticket',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'itinerary_management.id',
                    'itinerary_management.price'
                )
                ->orderBy('itinerary_management.start_time', 'desc')
                ->get();
            $tickets = Ticket::join('itinerary_management', 'itinerary_management.id', '=', 'tickets.itinerary_management_id')
                ->select(
                    'tickets.id as tickets_id',
                    'tickets.phoneNumber',
                    'tickets.seat_position',
                    'tickets.status',
                    'tickets.userName',
                    'tickets.itinerary_management_id'
                )
                ->orderby('tickets.created_at', 'desc')
                ->get();

            return view('adminmodules::AdminTicketManager', ['itineraryManagements' => $itineraryManagements, 'tickets' => $tickets]);
        }
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($ticketId);
        $status = $request->input('newStatus');
        $phoneNumber = $request->input('phoneNumber');
        $ticketupdate = Ticket::where('id', $id)->update([
            'status' => $status,
            'phoneNumber' => $phoneNumber,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'phoneNumber' =>  $phoneNumber,
            'status' => $status,

        ]);
    }
    public function destroy($id)
    {

        Ticket::where('id', $id)->delete();

        return back();
    }
    public function AdminCreateBookTicket(Request $request, $id, $itinerary_management_id)
    {

        $user = Auth::user();
        $name = $request->input('userName');
        $phoneNumber = $request->input('phoneNumber');
        $seatPosition = $request->input('seat_position');
        $ticketId = Ticket::insertGetId([
            'seat_position' => $seatPosition,
            'coaches_id' => $id,
            'userName' => $name,
            'phoneNumber' => $phoneNumber,
            'user_id' => $user->id,
            'itinerary_management_id' => $itinerary_management_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return back();
    }
}

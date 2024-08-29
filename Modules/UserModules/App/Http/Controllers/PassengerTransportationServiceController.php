<?php

namespace Modules\UserModules\App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PassengerTransportationServiceController extends Controller
{

    //  tìm kiếm vé xe
    public function SearchItinerary(Request $request)

    {
        $startingPoin = $request->input('startingPoin');
        $destination = $request->input('destination');
        $date = $request->input('date');
        $currentDate = Carbon::now()->toDateString();
        //sai trả về toàn bộ
        if (!$startingPoin && !$date && !$destination) {

            $results = DB::table('itinerary_management')
                ->join('coaches', 'itinerary_management.coaches_id', '=', 'coaches.id')
                ->join('itineraries', 'itineraries.id', '=', 'itinerary_management.itineraries_id')
                ->select(
                    'coaches.vehicle_type',
                    'itinerary_management.price',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'coaches.id',
                    'itinerary_management.id as itinerary_management_id',
                    'coaches.sum_ticket'
                )
                ->where('coaches.service', '=', 'Người')
                ->whereDate('itinerary_management.start_time', '>=', $currentDate)
                ->orderby('itinerary_management.start_time', 'desc')
                ->get();
            //ghế đã đặt
            $ticketsBooked = DB::table('tickets')
                ->select(
                    'coaches_id as coaches_id',
                    'itinerary_management_id as itinerary_management_id',
                    'seat_position',
                    'status'
                )
                ->get();
            //tổng số vé từng xe
            $totalTickets = DB::table('itinerary_management')
                ->leftJoin('tickets', 'itinerary_management.id', '=', 'tickets.itinerary_management_id')
                ->select('itinerary_management.id  as itinerary_management_id', DB::raw('COUNT(tickets.id) as totalTickets'))
                ->groupBy('itinerary_management.id')
                ->get();

            return view('usermodules::PassengerTransportationService', ['results' => $results, 'ticketsBooked' => $ticketsBooked, 'totalTickets' => $totalTickets]);
        } else {


            $results = Coach::join('itinerary_management', 'coaches.id', '=', 'itinerary_management.coaches_id')
                ->join('itineraries', 'itinerary_management.itineraries_id', '=', 'itineraries.id')

                ->select(
                    'coaches.vehicle_type',
                    'itinerary_management.price',
                    'itinerary_management.start_time',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'coaches.id',
                    'itinerary_management.id AS itinerary_management_id',
                    'coaches.sum_ticket'
                )
                ->where('coaches.service', '=', 'Người')
                ->where('itineraries.starting_poin', '=', $startingPoin)
                ->where('itineraries.destination', '=', $destination)
                ->whereDate('itinerary_management.start_time', '=', Carbon::parse($date))
                ->whereDate('itinerary_management.start_time', '>=', $currentDate)
                ->get();


            $ticketsBooked = Ticket::select(
                'coaches_id',
                'itinerary_management_id AS itinerary_management_id',
                'seat_position',
                'status'
            )->get();
            $totalTickets = DB::table('coaches')
                ->join('tickets', 'tickets.coaches_id', '=', 'coaches.id')
                ->join('itinerary_management', 'itinerary_management.coaches_id', '=', 'coaches.id')
                ->select(
                    'coaches.sum_ticket',
                    'coaches.id',
                    'itinerary_management.id as itinerary_management_id',
                    DB::raw('coaches.sum_ticket - COUNT(tickets.id) AS total_ticket_booked')
                )
                ->groupBy('coaches.sum_ticket', 'coaches.id', 'itinerary_management.id')
                ->get();

            return view('usermodules::PassengerTransportationService', ['results' => $results, 'ticketsBooked' => $ticketsBooked, 'totalTickets' => $totalTickets]);
        }
    }



    public function CreateBookTicket(Request $request, $id, $itinerary_management_id)
    {
        try {
            $user = Auth::user();
            $selectedValues = $request->input('selectedValues');
            foreach ($selectedValues as $value) {
                $ticket = Ticket::join('coaches', 'coaches.id', '=', 'tickets.coaches_id')
                    ->join('itinerary_management', 'itinerary_management.coaches_id', '=', 'coaches.id')
                    ->where('itinerary_management.id', '=', $itinerary_management_id)
                    ->where('coaches.id', '=', $id)
                    ->insert([
                        'seat_position' => $value,
                        'coaches_id' => $id,
                        'userName' => $user->name,
                        'phoneNumber' => $user->phone_number,
                        'user_id' => $user->id,
                        'itinerary_management_id' => $itinerary_management_id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
            }
            return response()->json([
                'status' => 200,
                'message' => 'success',
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'error' => $error,
            ]);
        }
    }
}

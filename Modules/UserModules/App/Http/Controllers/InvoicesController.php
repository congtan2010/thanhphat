<?php

namespace Modules\UserModules\App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\InvoiceFreght;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usermodules::Invoices');
    }



    public function storeInvoice(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $results = Ticket::select('tickets')
                ->join('users', 'users.id', '=', 'tickets.user_id')
                ->join('coaches', 'coaches.id', '=', 'tickets.coaches_id')
                ->join('itinerary_management', 'itinerary_management.id', '=', 'tickets.itinerary_management_id')
                ->join('itineraries', 'itineraries.id', '=', 'itinerary_management.itineraries_id')
                ->select(
                    'tickets.id',
                    'tickets.seat_position',
                    'users.name',
                    'users.phone_number',
                    'coaches.license_plate',
                    'itinerary_management.price',
                    'itineraries.starting_poin',
                    'itineraries.destination',
                    'itinerary_management.start_time',
                    'itinerary_management.end_time',
                    'tickets.status'
                )

                ->where('tickets.user_id', '=', $user->id)
                ->orderby('tickets.created_at', 'desc')
                ->get();

            $datas = InvoiceFreght::select(
                'id',
                'recipient_name',
                'recipient_phone_number',
                'sender_name',
                'sender_phone_number',
                'recipient_address',
                'sender_address'
            )
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'ASC')
                ->get();

            return view('usermodules::Invoices', ['results' => $results, 'datas' => $datas]);
        }
        return view('usermodules::Invoices', ['message' => 'Bạn cần đằng nhập để xem thêm thông tin ']);
    }


    public function destroytickets($id)
    {
        Ticket::where('id', $id)->delete();
        Ticket::where('id', $id)->delete();
        InvoiceFreght::where('id', $id)->delete();
        return back();
    }
}

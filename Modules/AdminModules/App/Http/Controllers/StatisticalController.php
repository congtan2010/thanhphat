<?php

namespace Modules\AdminModules\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class StatisticalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       //theo thang va da tra
        $saleByMonths = DB::table('tickets as t')
            ->join('itinerary_management as im', 't.itinerary_management_id', '=', 'im.id')
            ->select(
                DB::raw("DATE_FORMAT(im.start_time, '%m-%Y') as month"),
                DB::raw('SUM(im.price) as total_prices'),
                DB::raw('COUNT(t.id) as total_tickets')
            )
            ->where('t.status', '=', 'pay')
            ->groupBy('month')
            ->get();

        // $saleByMonths = DB::table('tickets')
        //     ->join('tickets', 'tickets.itinerary_management_id', '=', 'itinerary_management.id')
        //     ->select(
        //         DB::raw("DATE_FORMAT(itinerary_management.start_time, '%m-%Y') as month"),
        //         DB::raw('SUM(itinerary_management.price) as total_prices'),
        //         DB::raw('COUNT(tickets.id) as total_tickets')
        //     )->where('tickets.status', '=', 'pay')
        //     ->groupBy('month')
        //     ->get();
        //theo thang va tuyen duong
        $salesByMonthAndRoute = DB::table('tickets')
            ->join('itinerary_management', 'tickets.itinerary_management_id', '=', 'itinerary_management.id')
            ->join('coaches', 'tickets.coaches_id', '=', 'coaches.id')
            ->join('itineraries', 'itinerary_management.itineraries_id', '=', 'itineraries.id')

            ->select(
                'itineraries.starting_poin',
                'itineraries.destination',
                DB::raw("DATE_FORMAT(itinerary_management.start_time, '%m-%Y') as month"),
                DB::raw('SUM(itinerary_management.price) as total_sales'),
                DB::raw('COUNT(tickets.id) as total_tickets')
            )
            ->where('tickets.status', '=', 'pay')
            ->groupBy(
                DB::raw("DATE_FORMAT(itinerary_management.start_time, '%m-%Y')"),
                'itineraries.starting_poin',
                'itineraries.destination'
            )
            ->get();

        //theo thang van chuyen hang hoa
        $salesByMonthFreight = DB::table('invoice_freghts')
            ->select(
                DB::raw("DATE_FORMAT(invoice_freghts.created_at, '%Y-%m') as month"),
                DB::raw('SUM(invoice_freghts.price) as total_price'),
                DB::raw('COUNT(invoice_freghts.id) as total_invoice')
            )
            ->where('invoice_freghts.status', '=', 'finish')
            ->groupBy(DB::raw("DATE_FORMAT(invoice_freghts.created_at, '%Y-%m')"))
            ->get();
        return view('adminmodules::AdminStatistical', ['saleByMonths' => $saleByMonths, 'salesByMonthAndRoute' => $salesByMonthAndRoute, 'salesByMonthFreight' => $salesByMonthFreight]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('adminmodules::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('adminmodules::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

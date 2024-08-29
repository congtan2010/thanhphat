<?php

namespace Modules\UserModules\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceFreght;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class FreightTransportationServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usermodules::FreightTransportationServices');
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'recipient_phone_number' => 'required|regex:/(0)[0-9]{9}/',
            'sender_phone_number' => 'required|regex:/(0)[0-9]{9}/'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        if ($user) {
            $InvoiceFreght = new InvoiceFreght();
            $InvoiceFreght->weight = $request->input('weight');
            $InvoiceFreght->recipient_name = $request->input('recipient_name');
            $InvoiceFreght->recipient_address = $request->input('recipient_address');
            $InvoiceFreght->recipient_phone_number = $request->input('recipient_phone_number');
            $InvoiceFreght->payer = $request->input('payer');
            $InvoiceFreght->sender_name = $request->input('sender_name');
            $InvoiceFreght->sender_phone_number = $request->input('sender_phone_number');
            $InvoiceFreght->sender_address = $request->input('sender_address');
            $InvoiceFreght->user_id = $user->id;
            $InvoiceFreght->save();
            session()->flash('alert', 'Settings saved successfully.');

            return redirect()->back()->with('success', 'Bạn đã tạo hóa đơn giao hang thành công.');
        } else {
            return back();
        }
    }
}
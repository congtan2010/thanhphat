<?php

namespace Modules\AdminModules\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceFreght;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminFreightManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $InvoiceFreights = InvoiceFreght::OrderBy('created_at', 'desc')->get();

        return view('adminmodules::AdminInvoiceFreight', ['InvoiceFreights' => $InvoiceFreights]);
    }


    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the input data
        $sender_name = $request->input('sender_name');
        $sender_phone_number = $request->input('sender_phone_number');
        $sender_address = $request->input('sender_address');
        $recipient_name = $request->input('recipient_name');
        $recipient_phone_number = $request->input('recipient_phone_number');
        $recipient_address = $request->input('recipient_address');

        // Create a new InvoiceFreght record
        $invoiceFreght = InvoiceFreght::insert([
            'sender_address' => $sender_address,
            'sender_name' => $sender_name,
            'sender_phone_number' => $sender_phone_number,
            'recipient_address' => $recipient_address,
            'recipient_name' => $recipient_name,
            'recipient_phone_number' => $recipient_phone_number,
            'user_id' => $user->id,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Invoice created successfully.');
    }
    public function update(Request $request, $id)
    {

        $senderAddress = $request->input('senderAddress');
        $recipientAddress = $request->input('recipientAddress');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $status = $request->input('status');
        $currentPosition = $request->input('currentPosition');
        $InvoiceFreght = InvoiceFreght::where('id', $id)->update([
            'status' => $status,
            'sender_address' => $senderAddress,
            'recipient_address' => $recipientAddress,
            'weight' => $weight,
            'price' => $price,
            'current_position' => $currentPosition,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'InvoiceFreght' => $InvoiceFreght,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        InvoiceFreght::where('id', $id)->delete();

        return back();
    }
}
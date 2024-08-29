<?php

namespace Modules\AuthModules\App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authmodules::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authmodules::Register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [


            'name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/(0)[0-9]{9}/|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password|min:6'

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $user = new User();
        $user->name = $request->input('name');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();

        return  redirect('/login')->with(["succsess", 'thanh cong'], 200);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('authmodules::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('authmodules::edit');
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

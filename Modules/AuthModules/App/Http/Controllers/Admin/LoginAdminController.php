<?php

namespace Modules\AuthModules\App\Http\Controllers\Admin;


use App\Models\User;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authmodules::AdminLogin');
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator->errors())
                    ->withInput();
            }

            if (!Auth::guard('staff')->attempt(['phone_number' => request('phone_number'), 'password' => request('password')])) {
                return redirect()->back()->withErrors(['message' => 'Tài khoản hoặc mật khẩu không đúng']);
            }
            $userdetail = Auth::guard('staff')->user();
            $staff = Staff::find($userdetail->id);
            $token = $staff->createToken('accessToken')->plainTextToken;
            return response()->redirectTo('/admin')->withCookie(cookie('loginAdmin', $token, 60 * 24 * 30,  '/', NULL, TRUE, TRUE));
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error->getMessage(),
            ]);
        }
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

    /**
     * Remove the specified resource from storage.
     */
}

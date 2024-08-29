<?php

namespace Modules\AuthModules\App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authmodules::Home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authmodules::Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone_number' => 'required|regex:/(0)[0-9]{9}/',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator->errors())
                    ->withInput();
            }

            if (!Auth::attempt(['phone_number' => request('phone_number'), 'password' => request('password')])) {
                return redirect()->back()->withErrors(['message' => 'Tài khoản hoặc mật khẩu không đúng']);
            }
            $userdetail = Auth::user();
            $user = User::find($userdetail->id);
            $token = $user->createToken('accessToken')->plainTextToken;
            return response()->redirectTo('/')->withCookie(cookie('login', $token, 60 * 24 * 30,  '/', NULL, TRUE, TRUE));
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    /**
     * Show the specified resource.
     */

    public function getUserDetail()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            return Response(['data' => $user], 200);
        }
        return Response()->json(['data' => ''], 401);
    }
}

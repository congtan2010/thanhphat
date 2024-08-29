<?php

namespace Modules\AdminModules\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdminUserManagerController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('adminmodules::AdminUserManager', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = $request->password;
        $user->save();
        return back();
    }

    public function update(Request $request, $id)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $user = User::where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone_number' => $phone_number,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'user' => $user,

        ]);
    }


    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return back();
    }
}

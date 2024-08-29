<?php

namespace Modules\UserModules\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usermodules::Home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usermodules::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('usermodules::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('usermodules::edit');
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

<?php

namespace App\Http\Controllers;

use App\OSVersion;
use Illuminate\Http\Request;

class OSVersionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $osVersions = OSVersion::all();

        return view('admin.os_versions.index', compact('osVersions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required']
        ]);

        $data['user_id'] = auth()->id();

        OSVersion::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OSVersion  $oSVersion
     * @return \Illuminate\Http\Response
     */
    public function show(OSVersion $oSVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OSVersion  $oSVersion
     * @return \Illuminate\Http\Response
     */
    public function edit(OSVersion $osVersion)
    {
        return view('admin.os_versions.edit', compact('osVersion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OSVersion  $oSVersion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OSVersion $osVersion)
    {
        $data = $request->validate([
            'name' => ['required']
        ]);

        $osVersion->update($data);

        return redirect('/admin/os-versions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OSVersion  $oSVersion
     * @return \Illuminate\Http\Response
     */
    public function destroy(OSVersion $oSVersion)
    {
        //
    }
}

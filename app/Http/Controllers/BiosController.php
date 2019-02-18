<?php

namespace App\Http\Controllers;

use App\Bios;
use App\Product;
use Illuminate\Http\Request;

class BiosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.products.bios.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'url' => ['required'],
            'version' => ['required']
        ]);

        $data['product_id'] = $product->id;
        $data['user_id'] = auth()->id();

        Bios::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bios  $bios
     * @return \Illuminate\Http\Response
     */
    public function show(Bios $bios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bios  $bios
     * @return \Illuminate\Http\Response
     */
    public function edit(Bios $bios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bios  $bios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bios $bios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bios  $bios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bios $bios)
    {
        //
    }
}
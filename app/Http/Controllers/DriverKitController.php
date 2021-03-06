<?php

namespace App\Http\Controllers;

use App\Product;
use App\DriverKit;
use App\OSVersion;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DriverKitController extends Controller
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
        $productCategories = ProductCategory::all();
        $osVersions = OSVersion::all();

        return view('driver_kits.index', compact('productCategories', 'osVersions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $osVersions = OSVersion::all();

        return view('admin.products.driver_kits.create', compact('product', 'osVersions'));
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
            'os_version_id' => ['required']
        ]);

        $data['product_id'] = $product->id;
        $data['user_id'] = auth()->id();

        DriverKit::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DriverKit  $driverKit
     * @return \Illuminate\Http\Response
     */
    public function show(DriverKit $driverKit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverKit  $driverKit
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, DriverKit $driverKit)
    {
        return view('admin.products.driver_kits.edit', compact('driverKit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverKit  $driverKit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, DriverKit $driverKit)
    {
        $data = $request->validate([
            'url' => ['required']
        ]);

        $driverKit->update($data);

        return redirect($product->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverKit  $driverKit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, DriverKit $driverKit)
    {
        $driverKit->delete();

        return back();
    }
}

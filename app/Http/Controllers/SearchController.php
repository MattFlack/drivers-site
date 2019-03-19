<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
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

    public function show()
    {
        $search = request('q');

        $products = Product::search($search)->paginate(25);

        if(request()->expectsJson()) {
            return $products;
        }

        return view('admin.products.index', compact('products'));
    }
}

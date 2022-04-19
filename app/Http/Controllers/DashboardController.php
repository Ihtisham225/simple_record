<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{

    //Dashboard View
    public function dashboard()
    {
       
        return Inertia::render('Admin/Dashboard', 
            [
                //products
                'totalbudget' => array_sum(Product::where('user_id', Auth::user()->id)->get()
                ->pluck('price')->toArray()) ?? 0, 
                'totalproducts' => count(Product::where('user_id', Auth::user()->id)->get()),
                
                //brands
                'totalbrands' => count(Brand::where('user_id', Auth::user()->id)->get()),

                //customers
                'totalcustomers' => count(Customer::where('user_id', Auth::user()->id)->get()),

                //sellers 
                'totalsellers' => count(Seller::where('user_id', Auth::user()->id)->get())
            ]);
    }
}

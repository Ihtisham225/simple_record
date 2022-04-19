<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Symfony\Component\Console\Input\Input;

class BrandController extends Controller
{
        /**
     * 
     * Brands CRUD Operation starts here
     */

    //list all brands
    public function list()
    {   
        return Inertia::render('Admin/Brands/list', ['brands' => Brand::where('user_id', Auth::user()->id)->paginate(10), 'totalbrands' => count(Brand::where('user_id', Auth::user()->id)->get())]);
    }


    //this function render a component to add new brand
    public function create()
    {
        return Inertia::render('Admin/Brands/create');
    }


    //this function save the brand in database
    public function save(BrandRequest $request)
    {
        
        $brand = new Brand();
        $brand->name = $request->b_name;
        $brand->user_id = Auth::user()->id;
        $brand->status = 1;
        
            if($brand->save())
            return Redirect::route('create-brand')->with('success', $request->b_name.' Added!');
        else
            return Redirect::route('create-brand')->with('error', $request->b_name.' Not Added!');
    }


    //this function render a component to edit a specific brand
    public function edit($id)
    {
        return Inertia::render('Admin/Brands/edit', ['brand' => Brand::find($id)]);
    }


    //this function update the brand
    public function update(BrandRequest $request)
    {
        $brand = Brand::find($request->b_id);
        $brand->name = $request->b_name;
        $brand->user_id = Auth::user()->id;
        $brand->status = $request->b_status;

        if($brand->save())
            return Redirect::route('list-brand')->with('success', $request->b_name.' Updated!');
        else
            return Redirect::route('list-brand')->with('error', $request->b_name.'Not Updated!');
    }


    //this function delete the brand
    public function delete($id)
    {
        if(Brand::find($id)->delete())
            return Redirect::route('list-brand')->with('success', 'Record Deleted!');
        else
            return Redirect::route('list-brand')->with('error', 'Recored Not Deleted!');
    }



    /**
     * 
     * Brand CRUD Operation ends here
     */
}

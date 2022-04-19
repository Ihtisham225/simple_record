<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SellerController extends Controller
{
     /**
     * 
     * Seller CRUD Operation starts here
     */

    //list all sellers
    public function list()
    {
        return Inertia::render('Admin/Sellers/list', ['sellers' => Seller::where('user_id', Auth::user()->id)->paginate(10), 'totalsellers' => count(Seller::where('user_id', Auth::user()->id)->get())]);
    }


    //this function render a component to add new seller
    public function create()
    {
        return Inertia::render('Admin/Sellers/create');
    }


    //this function save the seller in database
    public function save(SellerRequest $request)
    {
        $seller = new Seller();
        $seller->name = $request->s_name;
        $seller->phone = $request->phone;
        $seller->shop = $request->shop;
        $seller->user_id = Auth::user()->id;
        $seller->address = $request->address;
        $seller->status = 1;


        if($seller->save())
            return Redirect::route('create-seller')->with('success', $request->s_name.' Created!');
        else
            return Redirect::route('create-seller')->with('error', $request->s_name.' Not Created!');
    }


    //this function render a component to edit a specific seller
    public function edit($id)
    {
        return Inertia::render('Admin/Sellers/edit', ['seller' => Seller::find($id)]);
    }


    //this function update the seller
    public function update(SellerRequest $request)
    {
        $seller = Seller::find($request->s_id);
        $seller->name = $request->s_name;
        $seller->phone = $request->phone;
        $seller->shop = $request->shop;
        $seller->user_id = Auth::user()->id;
        $seller->address = $request->address;
        $seller->status = $request->status;

        

        if($seller->save())
            return Redirect::route('list-seller')->with('success', $request->s_name.' Updated!');
        else
            return Redirect::route('list-seller')->with('error', $request->s_name.'Not Updated!');
    }


    //this function delete the seller
    public function delete($id)
    {
        if(Seller::find($id)->delete())
            return Redirect::route('list-seller')->with('success', 'Record Deleted!');
        else
            return Redirect::route('list-seller')->with('error', 'Recored Not Deleted!');
    }


    //this function show details of the seller
    public function detail($id)
    {
        return Inertia::render('Admin/Sellers/detail', ['seller' => Seller::find($id)]);
    }



    /**
     * 
     * Seller CRUD Operation ends here
     */
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Mail\NewUserMail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
     /**
     * 
     * Customer CRUD Operation starts here
     */

    //list all Custoemr
    public function list()
    {
        return Inertia::render('Admin/Customers/list', ['customers' => Customer::where('user_id', Auth::user()->id)->with('product')->paginate(10), 'totalcustomers' => count(Customer::where('user_id', Auth::user()->id)->get())]);
    }


    //this function render a component to add new customer
    public function create()
    {
        return Inertia::render('Admin/Customers/create');
    }


    //this function save the customer in database
    public function save(CustomerRequest $request)
    {

        $customer = new Customer();
        $customer->name = $request->c_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->user_id = Auth::user()->id;
        $customer->status = 1;


        if($customer->save())
            return Redirect::route('create-customer')->with('success', $request->c_name.' Created!');
        else
            return Redirect::route('create-customer')->with('error', $request->c_name.' Not Created!');
    }


    //this function render a component to edit a specific customer
    public function edit($id)
    {
        return Inertia::render('Admin/Customers/edit', ['customer' => Customer::find($id), 'products' => Product::all()]);
    }


    //this function update the customer
    public function update(CustomerRequest $request)
    {
        $customer = Customer::find($request->c_id);
        $customer->name = $request->c_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->user_id = Auth::user()->id;
        $customer->status = $request->status;

        

        if($customer->save())
            return Redirect::route('list-customer')->with('success', $request->c_name.' Updated!');
        else
            return Redirect::route('list-customer')->with('error', $request->c_name.'Not Updated!');
    }


    //this function delete the customer
    public function delete($id)
    {
        if(Customer::find($id)->delete())
            return Redirect::route('list-customer')->with('success', 'Record Deleted!');
        else
            return Redirect::route('list-customer')->with('error', 'Recored Not Deleted!');
    }



    //this function show details of the customer
    public function detail($id)
    {
        return Inertia::render('Admin/Customers/detail', ['customer' => Customer::find($id)]);
    }




    /***
     * 
     * New User Functions
     */


    //Checkout
    public function checkout()
    {
        return Inertia::render('Auth/Checkout');
    }


    //new user information
    public function newUser(Request $request)
    {

        //validating data
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required',
            ]
            );

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        //mail data
        $data = [
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
        ];


        Mail::to('uihtisham0@gmail.com')->send(new NewUserMail($data));

        return Inertia::render('Auth/Gratitude');
    }



    /**
     * 
     * Customer CRUD Operation ends here
     */
}

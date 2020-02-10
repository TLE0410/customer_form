<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use App\Mail\WelcomeMail;
use Illuminate\support\Facades\Mail;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index() {
    	$customers = Customer::where('status', request()->query('active', 1))->get();
    	return view('customer.index', ['customers'=> $customers, 'title' => 'home']);
    }
    function create() {
        $companies = Company::all();
        $customer = new Customer();
    	return view('customer.create', compact('companies', 'customer'));
    }

    function show($customerId) {
    	$customer = Customer::findOrFail($customerId);
    	return view('customer.show', compact('customer'));
    }

    function edit($customerId) {
        $companies = Company::all();
    	$customer = Customer::findOrFail($customerId);
    	return view('customer.edit', compact('customer', 'companies'));    }

    function store() {
    	$customer = Customer::create($this->requestData());
        Mail::to($customer->email)->send(new WelcomeMail($customer));
    	return redirect('/customer/create')->with('status','success');
    }

    function update(Customer $customer) {
    	
    	$customer->update($this->requestData());
    	return redirect('/customer');
    }

    function destroy(Customer $customer) {
        $customer->delete();
        return redirect('/customer');
    }

    private function requestData() {
        return $data = request()->validate([
            'name'        => 'required',
            'email'       => 'required|email',
            'status'      => 'required',
            'company_id'  =>  'required'     
        ]);

    }
}

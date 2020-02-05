<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;

class CustomerController extends Controller
{
    function index() {
    	$customers = Customer::all();
    	return view('customer.index', ['customers'=> $customers, 'title' => 'home']);
    }
    function create() {
        $companies = Company::all();
    	return view('customer.create', compact('companies'));
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
    	$data = request()->validate([
    		'name'        => 'required',
    		'email'       => 'required|email',
    		'status'      => 'required',
            'company_id'  => 'required',
    	]);
    	Customer::create($data);
    	return redirect('/customer/create')->with('status','success');
    }

    function update(Customer $customer) {
    	$data = request()->validate([
    		'name'        => 'required',
    		'email'       => 'required|email',
    		'status'      => 'required',
            'company_id'  =>  'required'     
    	]);

    	$customer->update($data);
    	return redirect('/customer');
    }
}

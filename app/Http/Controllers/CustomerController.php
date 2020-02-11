<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;
use \Carbon\Carbon;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('remind');
    }
    function index() {
        
    	$customers = Customer::all();
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
        //Mail::to($customer->email)->send(new WelcomeMail($customer));
        event(new NewCustomerHasRegisteredEvent($customer));
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

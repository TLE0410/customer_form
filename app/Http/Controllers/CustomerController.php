<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;
use Intervention\Image\Facades\Image;
use \Carbon\Carbon;
use App\User;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('remind');
    }
    function index() {       
        
    	$customers = Customer::with('company')->paginate(15);
    	return view('customer.index', ['customers'=> $customers, 'title' => 'home']);
    }
    function create() {
        $companies = Company::all();
        $customer = new Customer();
    	return view('customer.create', compact('companies', 'customer'));
    }

    function show(Customer $customer) {
    	
    	return view('customer.show', compact('customer'));
    }

    function edit(Customer $customer) {
        
        $companies = Company::all();
    	return view('customer.edit', compact('customer', 'companies'));    }

    function store() {
    	$customer = Customer::create($this->requestData());
        //Mail::to($customer->email)->send(new WelcomeMail($customer));
        $this->storeImage($customer);
        event(new NewCustomerHasRegisteredEvent($customer));
    	return redirect('/customer/create')->with('status','success');
    }

    function update(Customer $customer) {
    	
    	$customer->update($this->requestData());
        $this->storeImage($customer);
    	return redirect('/customer/'.$customer->id);
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
            'company_id'  => 'required',
            'image'       =>  'sometimes|file|image|max:5000',     
        ]);

    }

    function storeImage($customer) {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public')
            ]);

            $image = Image::make(public_path('storage/'.$customer->image))->fit(300, 300);
            $image->save();

        }
    }
}

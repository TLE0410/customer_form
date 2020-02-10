@extends('customer.form.layout')
@section('content')
<div class="justify-content-center row">
	<div class="col-6">
		<a href="/customer/create" class="alert alert-link">Create a new customer</a>
		
		<div class="row justify-content-center mt-5 border rounded">
			<div class="col-4 mb-5 card-header">Name</div>
			<div class="col-4 mb-5 card-header">Company</div>
			<div class="col-4 mb-5 card-header">Status</div>
			<div></div>
			@foreach($customers as $customer)
			
			<div class="col-4 mb-2">
				@if($customer->status == 1)
				<a href="{{ route('/customer/show', ['customerId' => $customer]) }}" class="text-info">
					{{ $customer->name }}
				</a>
				@else
				<a href="{{ route('/customer/show', ['customerId' => $customer] ) }}" class="text-muted">
					{{ $customer->name }}
				</a>
				@endif
			</div>
			<div class="col-4 mb-2">
				@if($customer->status == 1)
				<span >{{ $customer->company->name }}</span>
				
				@else
				
				<span class="text-muted">{{ $customer->company->name }}</span>
				@endif
			</div>
			<div class="col-4 mb-2">
				@if($customer->status == 1)
				<div class="text-success"> <li>Active</li></div>
				
				@else
				
				<div class="text-muted"><li>Inactive</li></div>
				@endif
			</div>
		
			@endforeach
		</div>
	</div>
</div>
@endsection
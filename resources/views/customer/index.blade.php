@extends('customer.form.layout')
@section('content')
<a href="/customer/create" class="alert alert-link">Create a new customer</a>
	<div class="text-primary py-3">
		All customer:
		<a href="customer?active=1" class="href">Active</a>
		<a href="customer?active=0" class="href">Inactive</a>
	</div>
	<div class="row">
		
		@foreach($customers as $customer)
			<div class="col-12">
				@if($customer->status == 1)
					<a href="/customer/{{ $customer->id }}" class="text-info"> 
						{{ $customer->name }} 
						<span class="text-muted">({{ $customer->company->name }})</span>
					</a>

					@else
					<a href="/customer/{{ $customer->id }}" class="text-muted"> 
						{{ $customer->name }} 
						<span class="text-muted">({{ $customer->company->name }})</span>
					</a>
				@endif
			</div>
		@endforeach
	</div>
@endsection
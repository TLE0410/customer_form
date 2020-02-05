@extends('layout')
@section('content')
<a href="/customer/create" class="alert alert-link">Create a new customer</a>
	<div class="text-info">All customer:</div>
	<div class="row">
		
		@foreach($customers as $customer)
			<div class="col-12">
				<a href="/customer/{{ $customer->id }}"> 
					{{ $customer->name }} 
					<span class="text-muted">({{ $customer->company->name }})</span>
				</a>
			</div>
		@endforeach
	</div>
@endsection
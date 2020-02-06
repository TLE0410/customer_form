@extends('customer.form.layout',['title' => 'Create a new customer'])

@section('content')

	@if(session('status'))
		<span class="alert alert-success">{{ session('status') }}</span>
	@endif
	
	<form action="/store" method="post" class="py-3">
		@include('customer.form.formInput')

		@csrf
		<div class="py-3 px-3">
			<button class="btn btn-primary btn-block">ADD</button>
		</div>
		
	</form>
@endsection

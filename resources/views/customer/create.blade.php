@extends('customer.form.layout',['title' => 'Create a new customer'])
@section('content')
@if(session('status'))
<span class="alert alert-success">{{ session('status') }}</span>
@endif

<div class="row justify-content-center">
	<div class="col-8">
		<form action="{{ route('/customer/store') }}" method="post" class="py-3">
			@include('customer.form.formInput')
			@csrf
			<div class="py-3 px-3">
				<button class="btn btn-primary">ADD</button>
			</div>
			
		</form>
	</div>
</div>

@endsection
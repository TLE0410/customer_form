@extends('layout',['title' => 'Create a new customer'])

@section('content')

	@if(session('status'))
		<span class="alert alert-success">{{ session('status') }}</span>
	@endif
	
	<form action="/store" method="post" class="py-3">
		<div class="form-group">
			<span class="text-dark">Name:</span>
			<input type="text" name = "name" class="form-control">
		</div>
		
		@error('name')
			<span class="text-danger">{{ $message }}</span>
		@enderror

		<div class="form-group">
			<span class="text-dark">Email:</span>
			<input type="text" name = "email" class="form-control">
		</div>

		@error('email')
			<span class="text-danger">{{ $message }}</span>
		@enderror

		<div class="form-group">
			<span class="text-dark">Status:</span>
			<select name="status" class="custom-select">
				<option value="1">Active</option>
				<option value="0">Inactive</option>
			</select>
		</div>

		@error('status')
			<span class="text-danger">{{ $message }}</span>
		@enderror

		<div class="form-group">
			<span class="text-dark">Company:</span>
			<select name="company_id" class="custom-select">
				@foreach($companies as $company)
					<option value="{{ $company->id }}">{{ $company->name }}</option>
				@endforeach
			</select>
		</div>

		@error('company_id')
			<span class="text-danger">{{ $message }}</span>
		@enderror

		@csrf
		<div class="py-3">
			<button class="btn btn-primary">ADD</button>
		</div>
		
	</form>
@endsection

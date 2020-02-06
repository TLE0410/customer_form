<div class="container">
	<div class="form-group">
		<span>Name: </span>
		<input type="text" name="name" class="form-control" value="{{ $customer->name ??'' }}">
	</div>
	@error('name')
	<span class="text-danger">{{ $message }}</span>
	@enderror
	<div class="form-group">
		<span>Email: </span>
		<input type="email" name="email" class="form-control" value="{{ $customer->email ?? '' }}">
		@error('email')
		<span class="text-danger">{{ $message }}</span>
		@enderror
	</div>
	<div class="form-group">
		<span>Status: </span>
		<select name="status" class="custom-select">
			<option value="1">Active</option>
			<option value="2">Inactive</option>
		</select>
		@error('status')
		<span class="text-danger">{{ $message }}</span>
		@enderror
	</div>
	<div class="form-group">
		<span>Company: </span>
		<select name="company_id" class="custom-select">
			@foreach($companies as $company)
			@if($customer->company_id != $company->id)
			<option value="{{ $company->id }}">
				{{ $company->name }}
			</option>
			@else
			<option value="{{ $company->id }}" selected>
				{{ $company->name }}
			</option>
			@endif
			@endforeach
		</select>
		@error('company_id')
		<span class="text-danger">{{ $message }}</span>
		@enderror
	</div>
</div>
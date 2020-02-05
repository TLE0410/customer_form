<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> {{ $customer->name }}</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="row py-3">
		<div class="col-2 ">
			<a href="/customer/{{ $customer->id }}" class="alert-link ">_ &#60 back</a>
		</div>
		<div class="col-8">
			<form action="/customer/{{ $customer->id }}" method="post" class="border rounded container w-50 ">
				@method('PATCH')
				<div class="container">
					<div class="form-group">
						<span>Name: </span>
						<input type="text" name="name" class="form-control" value="{{ $customer->name }}">
					</div>
					@error('name')
						<span class="text-danger">{{ $message }}</span>
					@enderror
					<div class="form-group">
						<span>Email: </span>
						<input type="email" name="email" class="form-control" value="{{ $customer->email }}">
						@error('email')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						
						<select name="status">
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
						@error('status')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						
						<select name="company_id">
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
				
				@csrf
				<button class="btn btn-primary btn-block">Save</button>
			</form>
		</div>
	</div>

</body>
</html>
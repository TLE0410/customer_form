<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $customer->name }}</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
<body>
	<div class="row py-3">
		<div class="col-1 pt-3">
			<a href="{{ route('/customer') }}" class="alert-link"> &#60back</a>
		</div>
		<div class="col-3 container w-50 border">
			<div class="container">
					<div class="form-group">
						<span>Name: {{ $customer->name }}</span>
					</div>
					<div class="form-group">
						<span>Email: {{ $customer->email }}</span>
					</div>
					<div class="form-group">
						<span>Status: {{ $customer->status }}</span>
					</div>
					<div class="form-group">
						<span>Company: {{ $customer->company->name }}</span>
					</div>
			</div>
			<div class="row">
				<div class="col-6">
					<a href="{{ route('/customer/edit', ['customerId' => $customer]) }}" class="btn btn-primary btn-block" > Edit </a>
				</div>
				<div class="col-6">
					<form action="{{ route('/customer/delete', ['customer' => $customer]) }}" method="post">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger btn-block">Delete</button>
					</form>
				</div>
			</div>

		</div>
	</div>
	
	
</body>
</html>
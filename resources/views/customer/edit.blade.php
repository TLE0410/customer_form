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
			<a href="/customer/{{ $customer->id }}" class="alert-link "> &#60 back</a>
		</div>
		<div class="col-8">
			<form action="/customer/{{ $customer->id }}" method="post" class="border rounded container w-50 ">
				@method('PATCH')
				@include('customer.form.formInput')
				@csrf
				<button class="btn btn-primary btn-block">Save</button>
			</form>
		</div>
	</div>

</body>
</html>
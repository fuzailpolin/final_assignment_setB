
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>User Details</h1>
	<a href="{{route('home.index')}}">Back</a> | 
	<a href="/logout">logout</a>
	
	<table border="1">
		@foreach($users as $s)
		<tr>
			<td>ID</td>
			<td>{{$s['id']}}</td>
		</tr>
		<tr>
			<td>USERNAME</td>
			<td>{{$s['username']}}</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>{{$s['name']}}</td>
		</tr>

		<tr>
			<td>Contact Info</td>
			<td>{{$s['contact_info']}}</td>
		</tr>

		<tr>
			<td>Company Name</td>
			<td>{{$s['company_name']}}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>
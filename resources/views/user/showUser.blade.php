<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>User List</h1>
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	
	<table border="1">
		<tr>
			<td>ID</td>
			<td>USERNAME</td>
			<td>Name</td>
			<td>PASSWORD</td>
			<td>Company Name</td>
			<td>Contact Info</td>
			<td>Type</td>
			<td>ACTION</td>
		</tr>

	 @foreach($users as $s)
		@if($s->type != "admin")<tr>
			<td>{{$s->id}}</td>
			<td>{{$s->username}}</td>
			<td>{{$s->name}}</td>
			<td>{{$s->company_name}}</td>
			<td>{{$s->contact_info}}</td>
			<td>{{$s->type}}</td>
			<td>{{$s->password}}</td>
			<td>
				<a href="{{route('user.edit', $s->id)}}">Edit</a> | 
				<a href="{{route('user.delete', $s->id)}}">Delete</a> | 
				<a href="{{route('user.details', $s->id)}}">Details</a>
			</td>
		</tr>
		@endif
	@endforeach

	</table>

</body>
</html>
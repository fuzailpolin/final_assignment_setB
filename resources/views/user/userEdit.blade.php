<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>
	<h1>Edit User</h1>
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	
	<form method="post" enctype="multipart/form-data">
		 {{ csrf_field() }}
	<table border="1">
		@foreach($users as $s)
		<tr>
			<td>USERNAME</td>
			<td>{{$s['username']}}</td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="{{$s['name']}}"></td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="company_name" value="{{$s['company_name']}}"></td>
		</tr>
		<tr>
			<td>Contact Info</td>
			<td><input type="text" name="contact_info" value="{{$s['contact_info']}}"></td>
		</tr>
		<tr>
			<td>Type</td>
			<td><input type="text" name="type" value="{{$s['type']}}"></td>
		</tr>
		@endforeach
		<tr>
			<td><input type="submit" name="submit" value="Save"></td>
			<td></td>
		</tr>
	</table>
</form>

</body>
</html>

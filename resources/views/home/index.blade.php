
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Welcome Home! {{session('name')}}</h1>

	<a href="{{route('admin.add')}}">Add user</a> | 
	<a href="{{route('user.show')}}">UserList</a> | 
	<a href="/logout">logout</a>

	<table>
		<tr>
			<td>Name :</td>
			<td> {{$users['name']}}</td>
		</tr>
		<tr>
			<td>ID :</td>
			<td>{{session('name')}}</td>
		</tr>
		<tr>
			<td>Type :</td>
			<td>{{$users['type']}}</td>
		</tr>
	</table>

</body>
</html>
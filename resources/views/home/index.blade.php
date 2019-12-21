
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Welcome Home! {{session('name')}}</h1>
	@if(session()->get('user') == 'admin')
	<a href="{{route('admin.add')}}">Add user</a> | 
	<a href="{{route('user.show')}}">UserList</a> |
	@elseif(session()->get('user') == 'employer')
	<a href="{{route('add.job')}}">Add job</a> |
	<a href="{{route('job.list')}}">Job List</a> |
	@endif
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
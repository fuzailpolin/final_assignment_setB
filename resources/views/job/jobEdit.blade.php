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
		@foreach($jobs as $s)
		<tr>
			<td>Job Title</td>
			<td><input type="text" name="job_title" value="{{$s['job_title']}}"></td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="company_name" value="{{$s['company_name']}}"></td>
		</tr>
		<tr>
			<td>Location</td>
			<td><input type="text" name="job_location" value="{{$s['job_location']}}"></td>
		</tr>
		<tr>
			<td>Salary</td>
			<td><input type="text" name="salary" value="{{$s['salary']}}"></td>
		</tr>
		@endforeach
		<tr>
			<td><input type="submit" name="submit" value="Save"></td>
			<td></td>
		</tr>
		@foreach($errors->all() as $err)
			<p style="color:red;">*{{$err}} </p>
		@endforeach	
	</table>
</form>

</body>
</html>

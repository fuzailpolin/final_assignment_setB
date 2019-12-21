<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>JOb List</h1>
	<form method="post">
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	<br/>
	<br>
	<input type="text" name="search" placeholder="search...."> <input type="submit" name="btnSubmit" value="Search">
	<br>
	<br>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Job Title</td>
			<td>Salary</td>
			<td>Location</td>
			<td>Company Name</td>
			
			<td>ACTION</td>
		</tr>

	 @foreach($jobs as $s)
		<tr>
			<td>{{$s->id}}</td>
			<td>{{$s->job_title}}</td>
			<td>{{$s->salary}}</td>
			<td>{{$s->job_location}}</td>
			<td>{{$s->company_name}}</td>
			<td>
				<a href="{{route('job.edit', $s->id)}}">Edit</a> | 
				<a href="{{route('job.delete', $s->id)}}">Delete</a> | 
				<a href="#">Details</a>
			</td>
		</tr>
	@endforeach

	</table>
	</form>
</body>
</html>
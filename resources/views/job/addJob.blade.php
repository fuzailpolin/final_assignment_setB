<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<h1>Add User</h1>
	<a href="/home">Back</a> | 
	<a href="/logout">logout</a>
	
	<form method="post" enctype="multipart/form-data">
		 {{ csrf_field() }}
	<table border="1">
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="company_name" value=""></td>
		</tr>
		<tr>
			<td>JOb Title</td>
			<td><input type="text" name="job_title" value=""></td>
		</tr>
		<tr>
			<td>Salary</td>
			<td><input type="text" name="salary" value=""></td>
		</tr>
		<tr>
			<td>Job Location</td>
			<td><input type="text" name="job_location" value=""></td>
		</tr>	
		<tr>
			<td><input type="submit" name="submit" value="Save"></td>
			<td></td>
		</tr>
	</table>
</form>

</body>
</html>

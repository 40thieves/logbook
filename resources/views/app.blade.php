<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logbook</title>

	<link href="/css/app.css" rel="stylesheet">
</head>
<body>
	<nav>
		@if (Auth::guest())
			<a href="/login">Login</a>
			<a href="/new">Create New</a>
		@else
			<a href="/logout">Logout</a>
		@endif
	</nav>

	@yield('content')

</body>
</html>

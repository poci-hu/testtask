<!DOCTYPE html>
<html>
<head>
	<title>Laravid</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<header class="well text-center">
					<h1><a href="/">Laravid</a></h1>
					<h5>Video uploading site for demonstration purposes</h5>
			</header>
		</div>
		<div>
			&nbsp;
		</div>
		<div class="row">
			<div class="col-sm-4">
				<a href="/upload" class="btn btn-warning btn-block">
				Feltöltés
			</a><br>
				@include('partials/categories')
			</div>
			<div class="col-sm-8">
				@yield('main')
			</div>
		</div>
	</div>
</body>
</html>

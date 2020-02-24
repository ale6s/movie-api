<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Search</title>
</head>
<!--Navbar-->
<nav class="navbar navbar-dark indigo">
<ul>
            <li><a href="index.php">Top Movies</a></li>
            <li><a href="upcoming.php">Upcoming Movies</a></li>
        </ul>
	<form class="form-inline my-2 my-lg-0 ml-auto" action="" method="GET">
		<input class="form-control" name="search" type="search" placeholder="Search.." aria-label="Search" required>
		<button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>
	</form>
</nav>
<h1 class="text-primary">Result: <b class="primary-text"><?php echo $_GET["search"]; ?></b> </h1>
<hr>
<div class="wrapper">
	<?php
	$input = $_GET["search"];
	$search = $input;
	$cs = curl_init();
	curl_setopt($cs, CURLOPT_URL, "http://api.themoviedb.org/3/search/movie?api_key=3a3330a1ff29d7badf49edcdd5daf3b6&query=" . $search . "&language=en-US&page=1&include_adult=true");
	curl_setopt($cs, CURLOPT_RETURNTRANSFER, TRUE);
	$array_data = curl_exec($cs);
	$search = json_decode($array_data);
	?>
	<div class="row">
		<?php
		foreach ($search->results as $results) {
			$title = $results->title;
			$id = $results->id;
			$release_date = $results->release_date;
			$release = $results->release_date;
			$overview = $results->overview;

			$background = $results->backdrop_path;
			if (empty($background) && is_null($background)) {
				$background =  dirname($_SERVER['PHP_SELF']) . 'no-image.png';
			} else {
				$background = 'https://image.tmdb.org/t/p/original' . $background;
			}
		?>
			<img class="col-lg-3" src="<?php echo $background; ?>" alt="<?php $background ?>">
			<div class="col-md-3">
				<h3 class="text-primary"><?php echo $title; ?></h3>
				<b><?php echo $release_date; ?></b>
				<b><?php echo $overview;?></b>
			</div>
		<?php
		}
		?>
	</div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>

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
        <title>Top movies</title>
    </head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-dark indigo">
    <ul>
            <li><a href="index.php" class="active">Top Movies</a></li>
            <li><a href="upcoming.php">Upcoming Movies</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0 ml-auto" action="search.php" method="GET">
            <input class="form-control" name="search" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>
        </form>
    </nav>
    <h1 class="text-white">Top movies</h1>
    <hr>
    <div class="container">
        <?php
        //api key = 3a3330a1ff29d7badf49edcdd5daf3b6
        /*
    *declaring The Movie Database API
    *decoding Api
    */
        $json = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=3a3330a1ff29d7badf49edcdd5daf3b6&language=en-US&page=1');
        $data = json_decode($json, true);
        //storing api into an array
        $array_data = $data['results'];


        ?>
        <div class="row">
            <?php foreach ($array_data as $row) {
                $poster_path = "https://image.tmdb.org/t/p/original/$row[poster_path]"; ?>

                <img class="col-md-3" src="<?php echo $poster_path; ?>" alt="<?php $row['original_title'] ?>">
                <div class="col-md-3">
                    <h3 class="text-primary"><?php echo $row['original_title']; ?></h3>
                    <b><?php echo $row['release_date']; ?></b>
                    <p><?php echo $row['overview']; ?></p>
                </div>
            <?php } ?>
        </div>

</body>

</html>
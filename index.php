<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <title>Music DB</title>
</head>
<script>
    $(document).ready(function() {
  $('#myTab a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });
});

    </script>
<body>
    <div align="center">
<button onclick="location.href='view1.php'">View 1</button>
<button onclick="location.href='view2.php'">View 2</button>
<button onclick="location.href='view3.php'">View 3</button>
<button onclick="location.href='view4.php'">View 4</button>
<button onclick="location.href='view5.php'">View 5</button>
</div>
    <div class="container mt-4">

        <?php include('message.php'); ?>
        <ul class="nav nav-tabs" id="myTab">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#users">Users</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#songs">Songs</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#artists">Artists</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#albums">Albums</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#genres">Genres</a>
		</li>
	</ul>

	<div class="tab-content">

        <div id="users" class="tab-pane fade show active">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <a href="Users\user-create.php" class="btn btn-primary float-end">Add Users</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['username']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['password']; ?></td>
                                                <td>
                                                    <a href="Users\user-view.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="Users\user-edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="Users\code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_user" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
<div id="songs" class="tab-pane fade" >
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Song Details
                    <a href="Songs\song-create.php" class="btn btn-primary float-end">Add Song</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Album ID</th>
                            <th>Length</th>
                            <th>Track Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM songs";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $song)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $song['id']; ?></td>
                                        <td><?= $song['title']; ?></td>
                                        <td><?= $song['album_id']; ?></td>
                                        <td><?= $song['length']; ?></td>
                                        <td><?= $song['track_number']; ?></td>
                                        <td>
                                            <a href="Songs\song-view.php?id=<?= $song['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="Songs\song-edit.php?id=<?= $song['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="Songs\song-code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_song" value="<?=$song['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="artists" class="tab-pane fade">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Artist Details
                    <a href="Artists\artist-create.php" class="btn btn-primary float-end">Add Artists</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM artists";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $artist)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $artist['id']; ?></td>
                                        <td><?= $artist['name']; ?></td>
                                        <td><?= $artist['country']; ?></td>
                                        <td>
                                            <a href="Artists\artist-view.php?id=<?= $artist['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="Artists\artist-edit.php?id=<?= $artist['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="Artists\artist-code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_artist" value="<?=$artist['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="albums" class="tab-pane fade">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Album Details
                    <a href="Albums\album-create.php" class="btn btn-primary float-end">Add Albums</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Genre ID</th>
                            <th>Artist ID</th>
                            <th>Release Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM albums";
                            $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $album)
                            {
                                ?>
                                <tr>
                                    <td><?= $album['id']; ?></td>
                                    <td><?= $album['title']; ?></td>
                                    <td><?= $album['genre_id']; ?></td>
                                    <td><?= $album['artist_id']; ?></td>
                                    <td><?= $album['release_year']; ?></td>
                                    <td>
                                        <a href="Albums\album-view.php?id=<?= $album['id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="Albums\album-edit.php?id=<?= $album['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <form action="Albums\album-code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_album" value="<?=$album['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h5> No Record Found </h5>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div id="genres" class="tab-pane fade">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Genre Details
                    <a href="Genres\genre-create.php" class="btn btn-primary float-end">Add Genres</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM genres";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $artist)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $artist['id']; ?></td>
                                        <td><?= $artist['name']; ?></td>
                                        <td>
                                            <a href="Genres\genre-view.php?id=<?= $artist['id']; ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="Genres\genre-edit.php?id=<?= $artist['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="Genres\genre-code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_genre" value="<?=$artist['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
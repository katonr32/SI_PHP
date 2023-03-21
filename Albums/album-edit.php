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

    <title>Album Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('..\message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Album Edit 
                            <a href="..\index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $album_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM albums WHERE id='$album_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $album = mysqli_fetch_array($query_run);
                                ?>
                                <form action="album-code.php" method="POST">
                                    <input type="hidden" name="album_id" value="<?= $album['id']; ?>">

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?=$album['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Artist_id</label>
                                        <input type="text" name="artist_id" value="<?=$album['artist_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Genre_id</label>
                                        <input type="text" name="genre_id" value="<?=$album['genre_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Release_year</label>
                                        <input type="text" name="release_year" value="<?=$album['release_year'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_album" class="btn btn-primary">
                                            Update Album
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
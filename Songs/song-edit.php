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

    <title>Song Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('..\message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Song Edit 
                            <a href="..\index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $song_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM songs WHERE id='$song_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $Song = mysqli_fetch_array($query_run);
                                ?>
                                <form action="song-code.php" method="POST">
                                    <input type="hidden" name="song_id" value="<?= $Song['id']; ?>">

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?=$Song['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Album_id</label>
                                        <input type="text" name="album_id" value="<?=$Song['album_id'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Length</label>
                                        <input type="text" name="length" value="<?=$Song['length'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Track_number</label>
                                        <input type="text" name="track_number" value="<?=$Song['track_number'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_song" class="btn btn-primary">
                                            Update Song
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
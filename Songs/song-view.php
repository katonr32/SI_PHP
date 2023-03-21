<?php
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

    <title>Song View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Songs View Details 
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
                                $song = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <p class="form-control">
                                            <?=$song['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Album_id</label>
                                        <p class="form-control">
                                            <?=$song['album_id'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Length</label>
                                        <p class="form-control">
                                            <?=$song['length'];?>
                                        </p>
                                    </div><div class="mb-3">
                                        <label>Track_number</label>
                                        <p class="form-control">
                                            <?=$song['track_number'];?>
                                        </p>
                                    </div>

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
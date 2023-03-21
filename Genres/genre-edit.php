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

    <title>Genre Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('..\message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Genre Edit 
                            <a href="..\index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $genre_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM genres WHERE id='$genre_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $genre = mysqli_fetch_array($query_run);
                                ?>
                                <form action="genre-code.php" method="POST">
                                    <input type="hidden" name="genre_id" value="<?= $genre['id']; ?>">

                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?=$genre['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_genre" class="btn btn-primary">
                                            Update genre
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
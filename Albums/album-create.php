<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Album Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('..\message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Album Add 
                            <a href="..\index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="album-code.php" method="POST">

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Artist_id</label>
                                <input type="int" name="artist_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Genre_id</label>
                                <input type="int" name="genre_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Release_year</label>
                                <input type="int" name="release_year" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_album" class="btn btn-primary">Save album</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
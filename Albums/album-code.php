<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_album']))
{
    $album_id = mysqli_real_escape_string($con, $_POST['delete_album']);

    $query = "DELETE FROM albums WHERE id='$album_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "album Deleted Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "album Not Deleted";
        header("Location: ..\index.php");
        exit(0);
    }
}

if(isset($_POST['update_album']))
{
    $album_id = mysqli_real_escape_string($con, $_POST['album_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $artist_id = mysqli_real_escape_string($con, $_POST['artist_id']);
    $genre_id = mysqli_real_escape_string($con, $_POST['genre_id']);
    $release_year = mysqli_real_escape_string($con, $_POST['release_year']);

    $query = "UPDATE albums SET title='$title', artist_id='$artist_id', genre_id='$genre_id', release_year='$release_year' WHERE id='$album_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "album Updated Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "album Not Updated";
        header("Location: ..\index.php");
        exit(0);
    }

}


if(isset($_POST['save_album']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $artist_id = mysqli_real_escape_string($con, $_POST['artist_id']);
    $genre_id = mysqli_real_escape_string($con, $_POST['genre_id']);
    $release_year = mysqli_real_escape_string($con, $_POST['release_year']);


    $query = "INSERT INTO albums (title,artist_id,genre_id,release_year) VALUES ('$title','$artist_id','$genre_id','$release_year')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "album Created Successfully";
        header("Location: album-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "album Not Created";
        header("Location: album-create.php");
        exit(0);
    }
}

?>
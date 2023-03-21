<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_song']))
{
    $song_id = mysqli_real_escape_string($con, $_POST['delete_song']);

    $query = "DELETE FROM songs WHERE id='$song_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "song Deleted Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "song Not Deleted";
       header("Location: ..\index.php");
        exit(0);
    }
}

if(isset($_POST['update_song']))
{
    $song_id = mysqli_real_escape_string($con, $_POST['song_id']);

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $album_id = mysqli_real_escape_string($con, $_POST['album_id']);
    $length = mysqli_real_escape_string($con, $_POST['length']);
    $track_number = mysqli_real_escape_string($con, $_POST['track_number']);

    $query = "UPDATE songs SET title='$title', album_id='$album_id', length='$length',track_number='$track_number' WHERE id='$song_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "song Updated Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "song Not Updated";
        header("Location: ..\index.php");
        exit(0);
    }

}


if(isset($_POST['save_song']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $album_id = mysqli_real_escape_string($con, $_POST['album_id']);
    $length = mysqli_real_escape_string($con, $_POST['length']);
    $track_number = mysqli_real_escape_string($con, $_POST['track_number']);


    $query = "INSERT INTO songs (title,album_id,length,track_number) VALUES ('$title','$album_id','$length','$track_number')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "song Created Successfully";
        header("Location: song-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "song Not Created";
        header("Location: song-create.php");
        exit(0);
    }
}

?>
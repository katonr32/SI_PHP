<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_artist']))
{
    $artist_id = mysqli_real_escape_string($con, $_POST['delete_artist']);

    $query = "DELETE FROM artists WHERE id='$artist_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "artist Deleted Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "artist Not Deleted";
        header("Location: ..\index.php");
        exit(0);
    }
}

if(isset($_POST['update_artist']))
{
    $artist_id = mysqli_real_escape_string($con, $_POST['artist_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "UPDATE artists SET name='$name', country='$country'WHERE id='$artist_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "artist Updated Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "artist Not Updated";
        header("Location: ..\index.php");
        exit(0);
    }

}


if(isset($_POST['save_artist']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "INSERT INTO artists (name,country) VALUES ('$name','$country')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "artist Created Successfully";
        header("Location: artist-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "artist Not Created";
        header("Location: artist-create.php");
        exit(0);
    }
}

?>
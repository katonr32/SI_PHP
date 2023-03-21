<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_genre']))
{
    $genre_id = mysqli_real_escape_string($con, $_POST['delete_genre']);

    $query = "DELETE FROM genres WHERE id='$genre_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "genre Deleted Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "genre Not Deleted";
        header("Location: ..\index.php");
        exit(0);
    }
}

if(isset($_POST['update_genre']))
{
    $genre_id = mysqli_real_escape_string($con, $_POST['genre_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);

    $query = "UPDATE genres SET name='$name' WHERE id='$genre_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "genre Updated Successfully";
        header("Location: ..\index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "genre Not Updated";
        header("Location: ..\index.php");
        exit(0);
    }

}


if(isset($_POST['save_genre']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);

    $query = "INSERT INTO genres (name) VALUES ('$name')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "genre Created Successfully";
        header("Location: genre-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "genre Not Created";
        header("Location: genre-create.php");
        exit(0);
    }
}

?>
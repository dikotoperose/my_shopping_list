<?php
    include 'db_connection.php';
    $user_id = $_SESSION['user_id'];

    // Display Shopping Item
    $select = "SELECT * FROM `shoppinglist` WHERE user_id = '$user_id'";
    $s_query = mysqli_query($conn,$select);
    // $row = mysqli_fetch_assoc($query);

    // Add Shopping Item
    $tasks = $_POST['add-list'];
    if(isset($_POST['add-list-btn'])){
        $insert = "INSERT INTO `shoppinglist`(`user_id`, `list`, `created_at`, `updated_at`) VALUES ('$user_id','$tasks', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
        $query = mysqli_query($conn,$insert);
        if($query){
            echo "<script> window.location='../../home.php';</script>";
        }else{
            // echo $user_id;
            echo "<script>alert('Something Went wrong...try again!!'); window.location='../../home.php';</script>";
        }
    }

    // Delete Shopping Item
    if(isset($_POST['del-item'])){
        $row_id = $_GET['id'];
        $delete = "DELETE FROM `shoppinglist` WHERE id = $row_id";
        $d_query = mysqli_query($conn,$delete);
        if($d_query){
            echo "<script> window.location='../../home.php';</script>";
        }else{
            // echo $row['id'];
            echo "<script>alert('Something Went wrong...try again!!'); window.location='../../home.php';</script>";
        }
    }

    // Edit Shopping Item
    if(isset($_POST['edit-item'])){
        $row_id = $_GET['id'];
        $delete = "DELETE FROM `shoppinglist` WHERE id = $row_id";
        $d_query = mysqli_query($conn,$delete);
        if($d_query){
            echo "<script> window.location='../../home.php';</script>";
        }else{
            // echo $row['id'];
            echo "<script>alert('Something Went wrong...try again!!'); window.location='../../home.php';</script>";
        }
    }
?>
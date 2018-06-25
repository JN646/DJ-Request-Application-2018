<?php
################ DJ APP 2018 ###################################################
// Author: Josh Ginn
// Copyright: 2018
################################################################################

################ DRINKS SERVER FILE ############################################
################ Start Session #################################################
session_start();

################ Database Connection ###########################################
$db = mysqli_connect('localhost', 'root', '', 'djapp2');

################ Variables #####################################################
// Drinks
$name = $category = $quantity = $measurment = $cost = "";
$collectionID = $id = 0;
$update = false;


################ DRINKS CRUD ###################################################
################ Add Record ####################################################
if (isset($_POST['drink_save'])) {
    $name = test_input($_POST['drink_name']);
    $category = test_input($_POST['drink_category']);
    $quantity = test_input($_POST['drink_quantity']);
    $measurement = test_input($_POST['drink_measurement']);
    $cost = test_input($_POST['drink_cost']);

    if (mysqli_query($db, "INSERT INTO drinks (drink_name, drink_category, drink_quantity, drink_measurement, drink_cost) VALUES ('$name', '$category', '$quantity', '$measurement', '$cost')")) {
        $_SESSION['message'] = "<div class='alert alert-success'>Drink saved</div>";
        header('location: ../admin/list_manager.php');
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
        header('location: ../admin/drink_manager.php');
    }
}

################ Update Record #################################################
if (isset($_POST['drink_update'])) {
    $id = test_input($_POST['drink_id']);
    $name = test_input($_POST['drink_name']);
    $category = test_input($_POST['drink_category']);
    $quantity = test_input($_POST['drink_quantity']);
    $measurement = test_input($_POST['drink_measurement']);
    $cost = test_input($_POST['drink_cost']);

    if (mysqli_query($db, "UPDATE drinks SET drink_name='$name', drink_category='$category', drink_quantity='$quantity', drink_measurement='$measurement', drink_cost='$cost' WHERE drink_id='$id'")) {
        $_SESSION['message'] = "<div class='alert alert-success'>Drink updated</div>";
        header('location: ../admin/list_manager.php');
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
        header('location: ../admin/drink_manager.php');
    }
}

################ Delete Record #################################################
if (isset($_GET['drink_del'])) {
    $id = $_GET['del'];
    if (mysqli_query($db, "DELETE FROM drinks WHERE drink_id=$id")) {
        $_SESSION['message'] = "<div class='alert alert-success'>Drink deleted</div>";
        header('location: ../admin/list_manager.php');
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
        header('location: ../admin/drink_manager.php');
    }
}

<?php

session_start();
include '../config/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $settings_sitename = $_POST["settings_sitename"];
    $settings_description = $_POST["settings_description"];
    $settings_keywords = $_POST["settings_keywords"];
    $settings_instagram = $_POST["settings_instagram"];
    $settings_x = $_POST["settings_x"];
    $settings_mailserver = $_POST["settings_mailserver"];
    $settings_mailaddress = $_POST["settings_mailaddress"];
    $settings_mailpassword = $_POST["settings_mailpassword"];

    $settings_query = "INSERT INTO settings 
    (settings_sitename, settings_description, settings_keywords, settings_instagram, settings_x, settings_mailserver, settings_mailaddress, settings_mailpassword)
    VALUES ('$settings_sitename', '$settings_description', '$settings_keywords', '$settings_instagram', '$settings_x', '$settings_mailserver', '$settings_mailaddress', '$settings_mailpassword')";

    $con = createConnectionToDatabase();
    $settings_query_run = mysqli_query($con, $settings_query);
    endConnectionToDatabase($con);

    if ($settings_query_run){
        $status = 1;
    }
    else{
        $status = 0;        
    }
    header("Location: ../settings.php?Status=$status");
    exit;
}
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted via POST request


    // Get the values from the form
    $updateData = [
        'settings_sitename' => $_POST['settings_sitename'],
        'settings_description' => $_POST['settings_description'],
        'settings_keywords' => $_POST['settings_keywords'],
        'settings_instagram' => $_POST['settings_instagram'],
        'settings_x' => $_POST['settings_x'],
        'settings_mailserver' => $_POST['settings_mailserver'],
        'settings_port' => $_POST['settings_port'],
        'settings_mailaddress' => $_POST['settings_mailaddress'],
        'settings_mailpassword' => $_POST['settings_mailpassword']
    ];

    $whereClause = "settings_id = 1";

    // Call the updateDatabase function
    if (updateDatabase('settings', $updateData, $whereClause)) {
        // Successful update
        $status = 1;
    } else {
        // Update failed
        $status = 0;
    }
}

    header("Location: ../settings.php?Status=$status");
    exit;
*/
?>


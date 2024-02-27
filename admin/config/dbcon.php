<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pcomdb";

    function createConnectionToDatabase(){
        global $host;
        global $username;
        global $password;
        global $database;
        // Creating the database connection
        $con = mysqli_connect($host, $username, $password, $database);

        // Checking database connection
        if(!$con){
            die("Connection Failed".mysqli_connect_error());
        }

        return $con;
    }

    function endConnectionToDatabase($con){
        // Close the database connection
        mysqli_close($con);
    }
/*
    // General update function
    function updateDatabase($table, $updateData, $whereClause) {
        $con = createConnectionToDatabase();

        // Ensure that the $updateData is an associative array
        if (!(!is_array($updateData) || empty($updateData) || !is_array(current($updateData)))) {
            endConnectionToDatabase($con);
            return false;
        }
        
        
        // Create the SQL query
        $set = [];
        $values = [];
        foreach ($updateData as $field => $value) {
            $set[] = "$field = ?";
            $values[] = $value;
        }
        $setClause = implode(', ', $set);
        $sql = "UPDATE $table SET $setClause WHERE $whereClause";

        // Prepare and execute the query
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, str_repeat('s', count($values)), ...$values);
            if (mysqli_stmt_execute($stmt)) {
                endConnectionToDatabase($con);
                return true; // Update successful
            }
            mysqli_stmt_close($stmt);
        }
        endConnectionToDatabase($con);
        return false; // Update failed
    }

*/

    function selectFromDatabase($table){
        $con = createConnectionToDatabase();

        // Retrieve settings data from the database
        $id_name = $table.'_id';
        $query = "SELECT * FROM $table ORDER BY $id_name DESC LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        }

        endConnectionToDatabase($con);
        return $row;

    }

    function get_all($table){
        $con = createConnectionToDatabase();

        $id_name = $table.'_id';
        $query = "SELECT * FROM $table ORDER BY $id_name";
        $result = mysqli_query($con, $query);

        endConnectionToDatabase($con);
        return $result;
    }

    function get_by_id($table, $id){
        $con = createConnectionToDatabase();

        $id_name = $table.'_id';
        $id = mysqli_real_escape_string($con, $id); // Escape the $id variable
        $query = "SELECT * FROM $table WHERE $id_name = '$id' ";
        $result = mysqli_query($con, $query);

        endConnectionToDatabase($con);
        return $result;
    }

    function get_all_active($table){
        $con = createConnectionToDatabase();
        $status = $table.'_status';
        $query = "SELECT * FROM $table WHERE $status = '0' ";
        $query_run = mysqli_query($con, $query);
        endConnectionToDatabase($con);
        return $query_run;
    }

    function get_by_id_active($table, $id){
        $con = createConnectionToDatabase();

        $id_name = $table.'_id';
        $status_name = $table.'_status';
        $query = "SELECT * FROM $table WHERE $id_name = $id AND $status_name = '0' ";
        $result = mysqli_query($con, $query);

        endConnectionToDatabase($con);
        return $result;
    }

    function get_slug_active($table, $slug){
        $con = createConnectionToDatabase();

        $slug_name = $table.'_slug';     
        $status = $table.'_status';   
        $query = "SELECT * FROM $table WHERE $slug_name = '$slug' AND $status = '0' LIMIT 1";
        $result = mysqli_query($con, $query);
        endConnectionToDatabase($con);
        return $result;
    }

    function get_all_active_by_category_id($table, $id){
        $con = createConnectionToDatabase();
        $status = $table.'_status';
        $query = "SELECT * FROM $table WHERE $status = '0' AND product_categoryid = $id ";
        $query_run = mysqli_query($con, $query);
        endConnectionToDatabase($con);
        return $query_run;
    }

    function get_showcase(){
        $con = createConnectionToDatabase();
        $status = 'products_status';
        $show = 'product_showcase';
        $query = "SELECT * FROM products WHERE $status = '0' AND $show = '1' ";
        $query_run = mysqli_query($con, $query);
        endConnectionToDatabase($con);
        return $query_run;
    }

    function get_slug_of_category($id) {

        $con = createConnectionToDatabase(); 
    
        $query = "SELECT * FROM categories WHERE categories_id = '$id' AND categories_status = '0' LIMIT 1";
        $result = mysqli_query($con, $query);
    
        // Fetch the slug from the query result
        $slug = null;
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $slug = $row['categories_slug'];
        }
    
        endConnectionToDatabase($con);
    
        return $slug;
    }

    function get_all_active_popular(){
        $con = createConnectionToDatabase();
        $table = 'categories';
        $status = $table.'_status';
        $query = "SELECT * FROM $table WHERE $status = '0' AND category_popular = '1' ";
        $query_run = mysqli_query($con, $query);
        endConnectionToDatabase($con);
        return $query_run;
    }
    
?>

<!--
// Example usage of the updateDatabase function
$tableName = "your_settings_table";
$updateData = [
    "settings_sitename" => "New Site Name",
    "settings_description" => "New Description"
];
$whereClause = "id = 1";  // Use an appropriate WHERE clause

if (updateDatabase($tableName, $updateData, $whereClause)) {
    echo "Update successful!";
} else {
    echo "Update failed!";
}
-->